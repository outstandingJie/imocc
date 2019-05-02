<?php
include __DIR__.'/index.php';
//装饰器模式例子
$canvas = new IMocc\Canvas();
$canvas->addDecorator(new IMocc\ColorDrawDecorator());
$canvas->addDecorator(new IMocc\SizeDrawDecorator());
$canvas->init();
$canvas->rect(3,6,4,12);
$canvas->draw();