<?php

namespace practise\struct;

use practise\Psr4AutoloaderClass;
use practise\struct\adapter\HeadphonePort35;
use practise\struct\bridge\BaiduSearchEngine;
use practise\struct\bridge\ChromeBrowser;

// autoload namespace
require_once('../Psr4AutoloaderClass.php');
$autoloader = new Psr4AutoloaderClass();
$autoloader->addNamespace('practise\struct', __DIR__);
$autoloader->register();
/**
 * 适配器模式
 */
$port = new HeadphonePort35();
$port->connect('3.5mm');
$port->connect('type-c');
$port->connect('USB');
/**
 * 桥接模式(感觉更像策略模式，需要验证)
 */
$engine = new BaiduSearchEngine();
$browser = new ChromeBrowser($engine);
echo $browser->search('test'), PHP_EOL;
