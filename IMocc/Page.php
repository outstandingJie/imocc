<?php

namespace IMocc;

include __DIR__."/../index.php";

class Page
{
    /** @var \IMocc\UserStrategy $strategy */
    protected $strategy;

    public function index()
    {
        echo 'AD:';
        $this->strategy->showAd();
        echo 'category:';
        $this->strategy->showCategory();
    }

    public function setStrategy(\IMocc\UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page();
if($female = false){
    $strategy = new FemaleUserStartge();
}else{
    $strategy = new MaleUserStartge();
}
$page->setStrategy($strategy);
$page->index();