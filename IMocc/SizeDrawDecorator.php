<?php
namespace IMocc;
//字体大小装饰器
class SizeDrawDecorator implements DrawDecorator
{
    protected $size;
    function __construct($size = '14px')
    {
        $this->size = $size;
    }

    function beforeDraw()
    {
        echo "<div style='font-size: {$this->size};'>";
    }

    function afterDraw()
    {
        echo "</div>";
    }
}