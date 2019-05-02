<?php
namespace IMocc\Database;

class Mysql implements IDatabase
{
    protected $conn;

    public function content($host, $user, $password, $dbname)
    {
        // TODO: Implement content() method.
        $conn = mysql_connect($host,$user,$password);
        mysqli_select_db($dbname,$conn);
        $this->conn = $conn;

    }

    public function query($sql)
    {
        // TODO: Implement query() method.
        mysql_query($sql,$this->conn);
    }

    public function close()
    {
        // TODO: Implement close() method.
        mysql_close($this->conn);
    }
}