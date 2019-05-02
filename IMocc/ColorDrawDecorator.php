<?php
namespace IMocc;

//颜色装饰器
class ColorDrawDecorator implements DrawDecorator
{
    protected $color;
    function __construct($color = 'red')
    {
        $this->color = $color;
    }
    function beforeDraw()
    {
        echo "<div style='color: {$this->color};'>";
    }
    function afterDraw()
    {
        echo "</div>";
    }
}