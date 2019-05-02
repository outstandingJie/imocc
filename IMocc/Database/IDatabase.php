<?php
namespace IMocc\Database;

/**
 * 适配器模式
 * 1.适配器模式，可以将截然不同的函数接口封装成统一的API
 * 2.实际应用举例，php的数据库操作有mysql，mysqlli，pdo 3种，
 * 可以用适配器模式统一成一致。类似的场景还有cache适配器，将memcache、redis、file、apc等不同的缓存函数，统一成一致
 */
interface IDatabase
{
    public function content($host,$user,$password,$dbname);

    public function query($sql);

    public function close();
}