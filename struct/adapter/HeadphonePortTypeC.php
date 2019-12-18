<?php


namespace practise\struct\adapter;


class HeadphonePortTypeC implements AdvancedHeadphonePort
{
    /**
     * @inheritDoc
     */
    public function connectTypeC()
    {
        echo 'connect headphone success via type-c', PHP_EOL;
    }

    /**
     * @inheritDoc
     */
    public function connectUSB()
    {

    }
}