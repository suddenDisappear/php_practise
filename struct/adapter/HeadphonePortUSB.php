<?php


namespace practise\struct\adapter;


class HeadphonePortUSB implements AdvancedHeadphonePort
{
    /**
     * @inheritDoc
     */
    public function connectTypeC()
    {

    }

    /**
     * @inheritDoc
     */
    public function connectUSB()
    {
        echo 'connect headphone success via USB', PHP_EOL;
    }
}