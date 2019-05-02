<?php
define('BASEDIR',__DIR__);

include BASEDIR.'/IMocc/Loader.php';

//类自动加载
spl_autoload_register('\\IMocc\\Loader::autoload');
#echo '<meta http-equiv="content-type" content="text/html;charset=utf-8">';
/**
 * php中三种基本模式
 * 1.工厂模式 @var IMocc\Factory
 * 2.单例模式 @var IMocc\Database
 * 3.注册树模式 @var IMocc\Register
 * 4.适配器模式 @var IMocc\Database\IDatabase
 * 5.策略模式 @var IMocc\UserStrategy 例子 strategy.php
 * 6.数据对象映射模式 @var IMocc\User 例子 objectMap
 * 7.观察者模式 @var IMocc\ObServer 例子 observe
 * 8.原型模式 @var IMocc\Canvas
 * 9.装饰器模式 @var IMocc\DrawDecorator
 * 10.迭代器模式 @var IMocc\AllUser
 * 11.代理模式 @var IMocc\IUserProxy
 *
 * 面向对象编程的基本原则
 * 1、单一职责：一个类，只需要做好一件事情
 * 2、开放封闭：一个类，应该是可扩展的，而不可修改的
 * 3、依赖倒置：一个类，不应该依赖另外一个类。每个类对于另外一个类都是可替换的。
 * 4、配置化：尽可能地使用配置，而不是硬编码
 * 5、面向接口编程：只需要关系接口，不需要关心实现
 *
 * mvc结构
 * 1、模型（model）：数据和存储的封装
 * 2、视图（View）：展现层的封装，如web系统中的模版文件
 * 3、控制器（Controller）：逻辑层的封装
 *
 * 1.php中使用ArrayAccess实现配置文件的加载
 * 2.在工厂方法中读取配置，生成可配置化对象
 * 3.使用装饰器模式实现权限验证，模版渲染，json串化
 * 4.使用观察者模式实现数据更新事件的一系列更新操作
 * 5.使用代理模式实现数据库的主从自动切换
 */

/*
 迭代器模式的使用
$users = new \IMocc\AllUser();
foreach ($users as $user){
    var_dump($user);
}
*/

//$config = new IMocc\Config(__DIR__.'/configs');
//var_dump($config['controller']);



IMocc\Application::getInstance(__DIR__)->dispatch();

