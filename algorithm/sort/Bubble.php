<?php

namespace practise\algorithm\sort;

/**
 * 冒泡排序
 * @package practise\algorithm\sort
 */
class Bubble extends Sort
{
    /**
     * @return array 排序结果数组
     */
    public function sort() :array
    {
        $origin = $this->getOrigin();
        $count = count($origin);
        if ($count < 2) {
            return $origin;
        }
        for ($i = 0; $i < $count - 1; $i++) {
            // 内循环减去$i，因为后$i个元素已经排序完成
            $num = 0;
            for ($j = 0; $j < $count - $i - 1; $j++) {
                if ($this->shouldTransfer($origin[$j], $origin[$j+1])) {
                    $tmp = $origin[$j];
                    $origin[$j] = $origin[$j+1];
                    $origin[$j+1] = $tmp;
                    $num++;
                }
            }
            // 若内循环为0次则表示排序已经提前完成
            if ($num === 0) {
                break;
            }
        }
        return $origin;
    }

    /**
     * 是否需要交换顺序
     * @param mixed $a
     * @param mixed $b
     * @return bool
     */
    private function shouldTransfer($a, $b)
    {
        $order = $this->getOrder();
        $result = $this->compare($a, $b);
        return $order === SORT_ASC ? $result > 0 : $result < 0;
    }
}