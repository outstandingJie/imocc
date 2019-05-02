<?php
namespace IMocc;
/**
 * 装饰器模式
 * 1、装饰器模式（Decorator），可动态地添加修改类的功能
 * 2、一个类提供了一项功能，如果要在修改并添加额外的功能，传统的编程模式，需要写一个子类继承它，并重新实现方法
 * 3、使用装饰器模式，仅需在运行时添加一个装饰器对象即可实现，可以实现最大的灵活性
 * Interface DrawDecorator
 * @package IMocc
 */
interface DrawDecorator
{
    function beforeDraw();
    function afterDraw();
}