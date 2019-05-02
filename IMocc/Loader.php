<?php
namespace IMocc;
/**
 * 自动加载类
 * Class Loader
 * @package IMocc
 */
class Loader
{
    static function autoload($class)
    {
        include BASEDIR.'/'.str_replace('\\','/',$class).'.php';
    }
}