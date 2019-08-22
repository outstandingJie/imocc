<?php
namespace IMocc;
/**
 * 单例模式 构造方法私有 对象只被创建一次
 * Class Database
 * @package IMocc
 */
class Database
{
    static public $db;
    //单例模式 构造方法私有
    private function __construct()
    {
    }

    //对象只被创建一次
    static public function getInstance()
    {
        if(self::$db){
            return self::$db;
        }
        return self::$db = new self();
    }

    public function query()
    {

    }

    public function remove()
    {

    }

    public function update()
    {

    }
}