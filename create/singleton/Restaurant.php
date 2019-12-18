<?php

namespace practise\create\singleton;

final class Restaurant
{
    private static $restaurant;

    private $dinner;

    private function __construct() {}

    private function __clone() {}

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$restaurant === null) {
            // 多线程需要考虑并发
            return self::$restaurant = new self();
        }
        return self::$restaurant;
    }

    /**
     * 设定晚餐
     * @param string $dinner
     * @return void
     */
    public function setDinner($dinner)
    {
        $this->dinner = $dinner;
    }

    /**
     * @return string 晚餐
     */
    public function getDinner()
    {
        return $this->dinner;
    }
}