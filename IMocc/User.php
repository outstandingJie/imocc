<?php
namespace IMocc;

use IMocc\Database\Pdo;
use IMocc\Database\Mysqli;

/**
 * 数据库对象映射模式
 * 1.数据对象映射模式，是将对象和数据存储映射起来，对一个对象的操作会映射为对数据存储的操作
 * 2.在代码中实现数据对象映射模式，我们将实现一个ORM类，将复杂的sql语句映射成对象属性的操作
 * 3.结合使用数据对象映射模式，工厂模式，注册模式
 * Class User
 * @package IMocc
 */
class User
{
    public $id;
    public $mobile;
    public $name;
    public $regtime;

    protected $db;

    public function __construct($id)
    {
        $this->db = new Mysqli();
        $this->db->content('127.0.0.1','root','toor','zaojiance');
        $res = $this->db->query('select * from user limit 1');
        $this->data = $res->fetch_assoc();
        $this->id = $this->data['id'];
        $this->mobile = $this->data['email'];
        $this->name = $this->data['username'];
        $this->regtime = $this->data['created'];
    }

    public function __destruct()
    {
        $this->db->query("update user set username='$this->name',email='$this->mobile' WHERE  id = $this->id ");
    }
}