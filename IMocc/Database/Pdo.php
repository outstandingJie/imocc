<?php
namespace IMocc\Database;

class Pdo implements IDatabase
{
    /**
     * @var \PDO
     */
    protected $conn;

    public function content($host, $user, $passwd, $dbname)
    {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        unset($this->conn);
    }
}