<?php


namespace practise\create\builder;


class Staff extends FutukangStaff
{
    private $mobile = [];

    /**
     * @inheritDoc
     */
    public function assembleBattery()
    {
        $this->mobile[] = 'Samsung';
    }

    /**
     * @inheritDoc
     */
    public function assembleScreen()
    {
        $this->mobile[] = 'daxingxing';
    }

    /**
     * @inheritDoc
     */
    public function assembleCamera()
    {
        $this->mobile[] = 'laika';
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        $str = 'mobile assembled with:' . PHP_EOL;
        foreach ($this->mobile as $item) {
            $str .= $item . PHP_EOL;
        }
        // finish assemble mobile
        $this->mobile = [];
        return $str;
    }
}