<?php
namespace IMocc;

/**
 * 1、与工厂模式作用类似，都是用来创建对象
 * 2、与工厂模式的实现不同，原型模式是先创建好一个原型对象，然后通过clone原型对象来创建新的对象。这样就免去了类创建时重复的出始化操作
 * 3、原型模式适用于大对象的创建。创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可
 * Class Canvas
 * @package IMooc
 */
class Canvas
{
    public $data;
    protected $decorators = array();

    //Decorator
    function init($width = 20, $height = 10)
    {
        $data = array();
        for($i = 0; $i < $height; $i++)
        {
            for($j = 0; $j < $width; $j++)
            {
                $data[$i][$j] = '*';
            }
        }
        $this->data = $data;
    }

    //动态添加装饰器对象
    function addDecorator(DrawDecorator $decorator)
    {
        $this->decorators[] = $decorator;
    }

    function beforeDraw()
    {
        foreach($this->decorators as $decorator)
        {
            $decorator->beforeDraw();
        }
    }

    function afterDraw()
    {
        $decorators = array_reverse($this->decorators);
        foreach($decorators as $decorator)
        {
            $decorator->afterDraw();
        }
    }

    function draw()
    {
        //调用装饰器模式
        $this->beforeDraw();
        foreach($this->data as $line)
        {
            foreach($line as $char)
            {
                echo $char;
            }
            echo "<br />\n";
        }
        $this->afterDraw();
    }

    function rect($a1, $a2, $b1, $b2)
    {
        foreach($this->data as $k1 => $line)
        {
            if ($k1 < $a1 or $k1 > $a2) continue;
            foreach($line as $k2 => $char)
            {
                if ($k2 < $b1 or $k2 > $b2) continue;
                $this->data[$k1][$k2] = '&nbsp;';
            }
        }
    }
}

