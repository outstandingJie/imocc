<?php
namespace IMocc\Database;

class Mysqli implements IDatabase
{
    protected $conn;

    public function content($host, $user, $password, $dbname)
    {
        $conn = mysqli_connect($host,$user,$password,$dbname);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return mysqli_query($this->conn,$sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}