<?php

namespace practise\create\builder;

class Supervisor
{
    /* @var $staff FutukangStaff */
    private $staff;

    /**
     * Supervisor constructor.
     * @param FutukangStaff $staff
     */
    public function __construct($staff)
    {
        $this->staff = $staff;
    }

    /**
     * 组装两块电池的手机
     */
    public function assembleWithTwoBattery()
    {
        $this->staff->assembleCamera();
        for ($i = 0; $i < 2; $i++) {
            $this->staff->assembleBattery();
        }
        $this->staff->assembleScreen();
    }

    /**
     * 组装三块电池的手机
     */
    public function assembleWithThreeCamera()
    {
        $this->staff->assembleBattery();
        $this->staff->assembleScreen();
        for ($i = 0; $i < 3; $i++) {
            $this->staff->assembleCamera();
        }
    }
}