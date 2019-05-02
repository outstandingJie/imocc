<?php
include __DIR__.'/index.php';
//观察者模式例子
$event = new \IMocc\Event();
$event->addObjServer(new \IMocc\Object1());
$event->addObjServer(new \IMocc\Object2());

$event->trigger();