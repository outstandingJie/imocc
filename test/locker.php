<?php
include __DIR__ . '/../index.php';
$instance = \IMocc\Database\DataBaseLocker::instance();
$instance->acquire('jieke',10);

echo "-----------begin--------\n";
sleep(10);
echo "-----------end--------\n";

$instance->release('jieke');

