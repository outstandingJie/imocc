<?php
namespace IMocc;
//工厂模式,工厂方法或者类生成对象，而不是直接在代码中new
class Factory
{
    static public function createDatabase()
    {

        //工厂模和注册树模式一起使用
        Register::set('db',Database::getInstance());
        //工厂模和单列模式一起使用
        return Database::getInstance();
    }

    static public function getUser($id)
    {
        $key = 'user_'.$id;
        //工厂模和注册树模式一起使用
        $user = Register::get($key);
        if(!$user){
            $user = new User($id);
            Register::set($key,$user);
        }
        return $user;
    }

    /**
     * @param $name
     * @return bool
     */
    static function getModel($name)
    {
        $key = 'app_model_'.$name;
        $model = Register::get($key);
        if (!$model) {
            $class = '\\App\\Model\\'.ucwords($name);
            $model = new $class;
            Register::set($key, $model);
        }
        return $model;
    }

    static function getDatabase($id = 'proxy')
    {
        if ($id == 'proxy')
        {
            if (!self::$proxy)
            {
                self::$proxy = new \IMocc\Database\Proxy;
            }
            return self::$proxy;
        }

        $key = 'database_'.$id;
        if ($id == 'slave')
        {
            $slaves = Application::getInstance()->config['database']['slave'];
            $db_conf = $slaves[array_rand($slaves)];
        }
        else
        {
            $db_conf = Application::getInstance()->config['database'][$id];
        }
        $db = Register::get($key);
        if (!$db) {
            $db = new Database\MySQLi();
            $db->connect($db_conf['host'], $db_conf['user'], $db_conf['password'], $db_conf['dbname']);
            Register::set($key, $db);
        }
        return $db;
    }

}