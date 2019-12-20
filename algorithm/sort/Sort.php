<?php

namespace practise\algorithm\sort;

abstract class Sort implements Sorter
{
    /**
     * @var array 待排序数组
     */
    private $origin;

    /**
     * @var int 排序
     */
    private $order;

    /**
     * Sort constructor.
     * @param array $origin
     * @param int $order
     */
    public function __construct(array $origin, int $order)
    {
        $this->origin = $origin;
        $this->order = $order;
    }

    /**
     * @inheritDoc
     */
    public function setOrder(int $order)
    {
        $this->order = $order;
    }

    /**
     * @inheritDoc
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @inheritDoc
     */
    public function setOrigin(array $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function getOrigin(): array
    {
        return $this->origin;
    }

    /**
     * 比较两个元素的大小
     * 1.当a < b时返回-1
     * 2.当a = b时返回0
     * 3.当a > b时返回1
     * @param mixed $a
     * @param mixed $b
     * @return int
     */
    public function compare($a, $b)
    {
        return $a - $b;
    }

    /**
     * 交换值
     * @param mixed $a
     * @param mixed $b
     */
    public function swap(&$a, &$b)
    {
        $t = $b;
        $b = $a;
        $a = $t;
    }
}