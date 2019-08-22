<?php
namespace IMocc\Database;

use IMocc\Factory;

class DataBaseLocker
{
    protected $lockId;
    protected $locks = [];
    protected $tableName = 'semaphore';
    protected $connect;

    public function __construct()
    {
        $this->connect = Factory::getDatabase('master');
        register_shutdown_function([$this,'releaseAll']);
    }

    static public function instance()
    {
        static $instance;
        if(!isset($instance)){
            $instance = new self();
        }
        return $instance;
    }

    public function acquire($name,$timeout = 30.0)
    {
        $timeout = max($timeout,0.001);
        $expire = microtime(true)+$timeout;

        if(isset($this->locks[$name])){
            $edit = "update {$this->tableName} set expire='$expire' where name='$name' and value='{$this->getLockId ()}'";
            $num = $this->connect->query($edit);
            if(!$num){
                unset ( $this->locks [$name] );
            }
            return ( bool ) $num;
        }

        $retry = FALSE;
        do{
            try{
                $sql = 'insert into '.$this->tableName.'(name,value,expire) value(\''.$name.'\',\''.$this->getLockId().'\','.$expire.')';
                $this->connect->query($sql);
                $this->locks[$name] = true;
                $retry = false;
            }catch (\Exception $e){
                $retry = $retry ? FALSE : $this->lockMayBeAvailable($name);
            }
        }while($retry);

        return isset($this->locks[$name]);
    }

    public function wait($name,$delay = 30)
    {
        $delay = ( int ) $delay * 1000000;
        $sleep = 25000;
        while ($delay > 0){
            usleep ( $sleep );
            $delay = $delay - $sleep;
            $sleep = min ( 500000, $sleep + 25000, $delay );
            if ($this->lockMayBeAvailable ( $name )) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function lockMayBeAvailable($name)
    {
        try{
            $sql = 'select * from '.$this->tableName.' where name=\''.$name.'\'';
            $lock = $this->connect->query($sql)->fetch_assoc();

        }catch (\Exception $e){
            $lock=false;
        }

        if(!$lock){
            return true;
        }

        $expire = ( float ) $lock ['expire'];
        $now = microtime ( TRUE );
        if ($now > $expire) {
            $del = 'delete from '.$this->tableName.' where `name`=\''.$name.'\' and `value`=\''.$lock['value'].'\' and expire<='.(float)(0.0001+$expire);
            return (bool)$this->connect->query($del);
        }
        return false;
    }

    public function releaseAll($lock_id = NULL)
    {
        if (! empty ( $this->locks )) {
            $this->locks = [];
            if (empty ( $lock_id )) {
                $lock_id = $this->getLockId();
            }
            $del = "delete from {$this->tableName} WHERE `value`={$this->getLockId()}";
            $this->connect->query($del);
        }
    }

    public function release($name)
    {
        unset ( $this->locks [$name] );
        try {
            $this->connect->query('delete from '.$this->tableName.' where `name`=\''.$name.'\' and `value`=\''.$this->getLockId ().'\'');
        } catch ( \Exception $e ) {

        }
    }

    public function getLockId() {
        if (! isset ( $this->lockId )) {
            $this->lockId = uniqid ( mt_rand (), TRUE );
        }
        return $this->lockId;
    }
}