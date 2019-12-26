<?php

namespace practise\algorithm\sort;

/**
 * 归并排序
 * @package practise\algorithm\sort
 */
class Merge extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort(): array
    {
//        return $this->recurseSort($this->getOrigin());
        return $this->iterationSort($this->getOrigin());
    }

    /**
     * 迭代归并排序
     * @param array $arr
     * @return array
     */
    public function iterationSort($arr)
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }
        // 初始归并数组长度
        $num = 1;
        // 根据num * 2分组
        while ($num <= $len) {
            for ($i = 0; $i < $len - $num; $i += $num * 2) {
                $tmpArr = $this->merge(array_slice($arr, $i, $num), array_slice($arr, $i + $num, $num));
                foreach ($tmpArr as $index => $value) {
                    $arr[$i + $index] = $value;
                }
            }
            $num *= 2;
        }
        return $arr;
    }

    /**
     * 递归
     * @param array $arr
     * @return array
     */
    public function recurseSort($arr)
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }
        $mid = ($len >> 1) + ($len & 1);
        $chunk = array_chunk($arr, $mid);
        $left = $this->recurseSort($chunk[0]);
        $right = $this->recurseSort($chunk[1]);
        return $this->merge($left, $right);
    }

    /**
     * 归并
     * @param array $left
     * @param array $right
     * @return array
     */
    public function merge($left, $right)
    {
        $lenL = count($left);
        $lenR = count($right);
        if ($lenL === 0) {
            return $right;
        } elseif ($lenR === 0) {
            return $left;
        }
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        $arr = [];
        $i = $j = 0;
        while (true) {
            if ($this->compare($left[$i], $right[$j]) * $symbol > 0) {
                $arr[] = $right[$j];
                $j++;
                if ($j === $lenR) {
                    $arr = array_merge($arr, array_slice($left, $i));
                    break;
                }
            } else {
                $arr[] = $left[$i];
                $i++;
                if ($i === $lenL) {
                    $arr = array_merge($arr, array_slice($right, $j));
                    break;
                }
            }
        }
        return $arr;

        // 注释部分是循环的另一种方式，和上面并无区别
//        $reg = [];
//        while (count($left) && count($right)) {
//            if ($this->compare($left[0], $right[0]) * $symbol < 0) {
//                $reg[] = array_shift($left);
//            } else {
//                $reg[] = array_shift($right);
//            }
//        }
//        return array_merge($reg, $left, $right);
    }
}