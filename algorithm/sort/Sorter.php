<?php

namespace practise\algorithm\sort;

/**
 * Interface Sorter
 */
interface Sorter
{
    /**
     * @param int $order
     */
    public function setOrder(int $order);

    /**
     * @return int
     */
    public function getOrder() :int;

    /**
     * @param array $origin
     */
    public function setOrigin(array $origin);

    /**
     * @return array
     */
    public function getOrigin() :array;

    /**
     * @return array
     */
    public function sort() :array;
}