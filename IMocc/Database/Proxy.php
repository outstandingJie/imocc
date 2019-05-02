<?php
namespace IMocc\Database;

use IMocc\Factory;

class Proxy
{
    function query($sql)
    {
        if (substr($sql, 0, 6) == 'select')
        {
            echo "读操作：$sql<br />";
            return Factory::getDatabase('slave')->query($sql);
        } else
        {
            echo "写操作：$sql<br />";
            return Factory::getDatabase('master')->query($sql);
        }
    }
}