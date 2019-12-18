<?php


namespace practise\struct\adapter;


class HeadphonePort35 implements StandardHeadphonePort
{
    /**
     * @var HeadphonePortAdapter
     */
    private $adapter;

    public function connect($headPhone)
    {
        if ($headPhone === '3.5mm') {
            echo 'connect headphone success via 3.5mm', PHP_EOL;
        } elseif ($headPhone === 'type-c' || $headPhone === 'USB') {
            $this->adapter = new HeadphonePortAdapter($headPhone);
            $this->adapter->connect($headPhone);
        } else {
            throw new \Exception('not support headphone type');
        }
    }
}