<?php


namespace practise\algorithm\sort;

/**
 * 快速排序
 * @package practise\algorithm\sort
 */
class Quick extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort(): array
    {
        $origin = $this->getOrigin();
        $this->inPlaceRecursive($origin, 0, count($origin) - 1);
        return $origin;
//        return $this->simpleRecursive($origin);
    }

    /**
     * 原地递归
     * @param array $origin
     * @param int $begin
     * @param int $end
     */
    private function inPlaceRecursive(array &$origin, int $begin, int $end)
    {
        // 递归终止条件：当待排序元素数量<=1时则无需排序（即begin >= end）
        $len = $end - $begin + 1;
        if ($len <= 1) {
            return;
        }
        // 选择第一个元素作为基准值（如果选取随机下标作为基准值，则先将基准值置换第一个元素然后继续标准流程）
        $refIndex = $begin + ($len >> 1); // 选取中间元素作为基准值
        $ref = $origin[$refIndex];
        $origin[$refIndex] = $origin[$begin];
        $origin[$begin] = $ref;
        // 根据基准值分割为左右两部分（SORT_ASC:左侧小于基准值;SORT_DESC:左侧大于基准值）
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        $i = $begin;
        $j = $end;
        while ($i < $j) {
            // 从右往左搜索（基准值选择左边则先从右往左搜索）
            for (; $j > $i; $j--) {
                $res = $this->compare($origin[$j], $ref);
                if ($symbol * $res < 0) {
                    break;
                }
            }
            // 从左往右搜索
            for (; $i < $j; $i++) {
                $res = $this->compare($origin[$i], $ref);
                if ($symbol * $res > 0) {
                    break;
                }
            }
            // 如果找到同时满足的i和j则交换两者顺序
            if ($i < $j) {
                $tmp = $origin[$i];
                $origin[$i] = $origin[$j];
                $origin[$j] = $tmp;
            }
        }
        // 交换基准值和最终停留位置（循环结束时最终停留位置始终为i===j）
        $tmp = $origin[$j];
        $origin[$j] = $ref;
        $origin[$begin] = $tmp;
        if ($j > $begin) {
            $this->inPlaceRecursive($origin, $begin, $j - 1);
        }
        if ($j < $end) {
            $this->inPlaceRecursive($origin, $j + 1, $end);
        }
    }

    /**
     * 简单递归排序
     * @param array $origin
     * @return array
     */
    private function simpleRecursive(array $origin)
    {
        $len = count($origin);
        if ($len <= 1) {
            return $origin;
        }
        // 选取基准值
        $refIndex = 0;
        $ref = $origin[$refIndex];
        // 根据基准值分割左右数组
        $left = $mid = $right = [];
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        for ($i = 0; $i < $len; $i++) {
            $res = $this->compare($origin[$i], $ref);
            if ($res * $symbol < 0) {
                $left[] = $origin[$i];
            } elseif ($res === 0) {
                $mid[] = $origin[$i];
            } else {
                $right[] = $origin[$i];
            }
        }
        return array_merge($this->simpleRecursive($left), $mid, $this->simpleRecursive($right));
    }
}