<?php
include __DIR__.'/index.php';
/**
 * 策略模式使用例子
 * Class page
 */
class page
{
    /** @var \IMocc\UserStrategy $strategy */
    protected $strategy;

    function index()
    {
        echo 'AD:';
        $this->strategy->showAd();
        echo "\n";

        echo 'category';
        $this->strategy->showCategory();
    }

    /**
     * @param \IMocc\UserStrategy $strategy
     */
    function setStrategy(IMocc\UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

if(isset($_GET['female'])){
    $strategy = new IMocc\FemaleUserStartge();
}else{
    $strategy = new IMocc\MaleUserStartge();
}
$page = new page();
$page->setStrategy($strategy);
$page->index();