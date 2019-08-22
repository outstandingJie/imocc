<?php
include __DIR__ . '/../index.php';
/**
 * 数据对象映射模式结合工厂模式、注册树模式使用例子
 * Class Page
 */
class Page
{
    function index()
    {
        $user = IMocc\Factory::getUser(1);

        $user->name = 'test22';
        $user->regtime = date('Y-m-d H:i:s');
        $this->text();
        echo 'OK';
    }

    function text()
    {
        $user = IMocc\Factory::getUser(1);

        $user->name = 'test2asdf2';
        $user->regtime = date('Y-m-d H:i:s');
    }
}

$page = new Page();
$page->index();