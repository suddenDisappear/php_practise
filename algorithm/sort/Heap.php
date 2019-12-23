<?php

namespace practise\algorithm\sort;

/**
 * 堆排序
 * 定义：
 * 1.每个结点的值都大于或等于其左右孩子结点的值，称为大顶堆
 * 2.每个结点的值都小于或等于其左右孩子结点的值，称为小顶堆。
 * @package practise\algorithm\sort
 */
class Heap extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort(): array
    {
        $origin = $this->getOrigin();
        $len = count($origin);
        if ($len <= 1) {
            return $origin;
        }
        $this->inPlace($origin);
        return $origin;
    }

    /**
     * 原地排序
     * @param array $arr
     */
    public function inPlace(&$arr)
    {
        // 大顶堆和小顶堆分别对应升序和降序
        $len = count($arr);
        // 起始非叶子节点
        $index = intval(floor($len / 2) - 1);
        // 初始化堆
        for ($i = $index; $i >= 0; $i--) {
            $this->heapify($arr, $i, $len - 1);
        }
        for ($i = $len - 1; $i > 0; $i--) {
            // 将本次排序的最大（小 SORT_DESC）交换到已排序首位
            $this->swap($arr[0], $arr[$i]);
            // 重新调整堆
            $this->heapify($arr, 0, $i - 1);
        }
    }

    /**
     * 构造堆
     * @param array $arr
     * @param int $start 父节点下标
     * @param int $end 数组截止下标
     */
    public function heapify(&$arr, $start, $end)
    {
        $dad = $start;
        $son = 2 * $dad + 1;
        if ($son > $end) {
            return;
        }
        // 1.取得子节点中较大（小 SORT_DESC）一个
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        if ($son + 1 <= $end && $this->compare($arr[$son], $arr[$son + 1]) * $symbol < 0) {
            $son++;
        }
        // 2.如果子节点大（小 SORT_DESC）于父节点，交换子节点和父节点
        if ($this->compare($arr[$dad], $arr[$son]) * $symbol < 0) {
            $this->swap($arr[$dad], $arr[$son]);
            $this->heapify($arr, $son, $end);
        }
    }
}