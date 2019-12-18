<?php

namespace practise\create;

use practise\Psr4AutoloaderClass;
use practise\create\abstractFactory\ChineseClassFactory;
use practise\create\abstractFactory\MathClassFactory;
use practise\create\builder\Staff;
use practise\create\builder\Supervisor;
use practise\create\factory\ChineseBookFactory;
use practise\create\factory\MathBookFactory;
use practise\create\simpleFactory\BookFactory;
use practise\create\singleton\Restaurant;

//spl_autoload_register(function ($class) {
//    $prefix = 'practise\\create';
//    $baseDir = __DIR__;
//    $len = strlen($prefix);
//    if (strncmp($prefix, $class, $len) !== 0) {
//        // no, move to the next registered autoloader
//        return;
//    }
//
//    // get the relative class name
//    $relative_class = substr($class, $len);
//
//    // replace the namespace prefix with the base directory, replace namespace
//    // separators with directory separators in the relative class name, append
//    // with .php
//    $file = $baseDir . str_replace('\\', '/', $relative_class) . '.php';
//
//    // if the file exists, require it
//    if (file_exists($file)) {
//        require $file;
//    }
//});

// autoload namespace
require_once('../Psr4AutoloaderClass.php');
$autoloader = new Psr4AutoloaderClass();
$autoloader->addNamespace('practise\create', __DIR__);
$autoloader->register();
/**
 * 简单工厂模式
 */
// math
$book = BookFactory::create('math');
echo $book->getTitle(), PHP_EOL;
echo $book->getContent(), PHP_EOL;
// chinese
$book = BookFactory::create('chinese');
echo $book->getTitle(), PHP_EOL;
echo $book->getContent(), PHP_EOL;
/**
 * 工厂模式
 */
// math
$book = new MathBookFactory();
echo $book->create()->getTitle(), PHP_EOL;
// chinese
$book = new ChineseBookFactory();
echo $book->create()->getTitle(), PHP_EOL;
/**
 * 抽象工厂模式
 */
// math
$class = new MathClassFactory();
echo $class->getBook()->getTitle(), PHP_EOL;
echo $class->getTeacher()->teach(), PHP_EOL;
// chinese
$class = new ChineseClassFactory();
echo $class->getBook()->getTitle(), PHP_EOL;
echo $class->getTeacher()->teach(), PHP_EOL;
/**
 * 单例模式
 */
$restaurant = Restaurant::getInstance();
$restaurant->setDinner('meat');
$restaurant1 = Restaurant::getInstance();
$restaurant1->setDinner('vegetable');
echo $restaurant->getDinner(), PHP_EOL;
/**
 * 建造者模式
 */
$quandanzhang = new Staff();
$supervisor = new Supervisor($quandanzhang);
$supervisor->assembleWithTwoBattery();
echo $quandanzhang->getMobile(), PHP_EOL;
$supervisor->assembleWithThreeCamera();
echo $quandanzhang->getMobile(), PHP_EOL;