<?php


namespace practise\struct\adapter;


class HeadphonePortAdapter implements StandardHeadphonePort
{
    /**
     * @var AdvancedHeadphonePort
     */
    public $advancedHeadphonePort;

    public function __construct($headphone)
    {
        if ($headphone === 'type-c') {
            $this->advancedHeadphonePort = new HeadphonePortTypeC();
        } elseif ($headphone === 'USB') {
            $this->advancedHeadphonePort = new HeadphonePortUSB();
        }
    }

    /**
     * @inheritDoc
     */
    public function connect($headphone)
    {
        if ($headphone === 'type-c') {
            $this->advancedHeadphonePort->connectTypeC();
        } elseif ($headphone === 'USB') {
            $this->advancedHeadphonePort->connectUSB();
        }
    }
}