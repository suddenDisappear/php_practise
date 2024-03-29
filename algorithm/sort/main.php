<?php

namespace practise\algorithm\sort;

use practise\Psr4AutoloaderClass;

// autoload namespace
$dir = __DIR__;
require_once($dir . '/../../Psr4AutoloaderClass.php');
$autoloader = new Psr4AutoloaderClass();
$autoloader->addNamespace('practise\algorithm\sort', $dir);
$autoloader->register();
$arr = [];
for ($i = 0; $i < 50; $i++) {
    $arr[] = rand(0, 10000);
}
//$arr = [2, 9, 10, 0, 4, 50, 68];
//$arr = [2, 3, 6, 4, 5];
//$arr = [1, 2, 3, 4, 5];
//$arr = [];

// bubble
//$object = new Bubble($arr, SORT_ASC);
// quick
//$object = new Quick($arr, SORT_ASC);
// insert
//$object = new Insert($arr, SORT_ASC);
// shell
//$object = new Shell($arr, SORT_ASC);
// select
//$object = new Select($arr, SORT_ASC);
// heap
//$object = new Heap($arr, SORT_ASC);
// merge
//$object = new Merge($arr, SORT_ASC);
// count
//$object = new Count($arr, SORT_ASC);
// radix
$object = new Radix($arr, SORT_ASC);
var_export($object->sort());
echo PHP_EOL;
$object->setOrder(SORT_DESC);
var_export($object->sort());