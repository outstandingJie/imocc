<?php
namespace IMocc;
//观察者模式事件
class Event extends EventGenerator
{
    public function trigger()
    {
        echo 'Event'."\n";
        $this->notity();
    }
}

//观察者1
class Object1 implements \IMocc\ObServer
{
    public function update($even_info = null)
    {
        echo "逻辑1\n";
    }
}

//观察者2
class Object2 implements \IMocc\ObServer
{
    public function update($even_info = null)
    {
        echo "逻辑2\n";
    }
}