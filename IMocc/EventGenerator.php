<?php
namespace IMocc;
//事件产生者
abstract class EventGenerator
{
    private $obServer = [];

    //增加观察者
    public function addObjServer(ObServer $obServer)
    {
        $this->obServer[] = $obServer;
    }

    //逐个通知所有观察者
    public function notity()
    {
        foreach ($this->obServer as $obServer){
            $obServer->update();
        }
    }
}