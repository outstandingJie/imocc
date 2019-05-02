<?php
namespace IMocc;

//注册树模式、将一个对象注册到全局的树上面，可在其他任何地方使用
class Register
{
    protected static $object;

    static public function set($align,$object)
    {
        self::$object[$align] = $object;
    }

    static function get($align)
    {
        return self::$object[$align];
    }

    public function _unset($align)
    {
        unset(self::$object[$align]);
    }
}