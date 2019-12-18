<?php


namespace practise\algorithm\sort;

/**
 * 插入排序
 * @package practise\algorithm\sort
 */
class Insert extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort() :array
    {
        $origin = $this->getOrigin();
//        return $this->simple($origin);
        $this->inPlace($origin);
        return $origin;
    }


    /**
     * 简单排序（需要额外的存储）
     * @param array $origin 待排序数组
     * @return array
     */
    public function simple($origin)
    {
        // 小于等于1个元素直接返回
        $len = count($origin);
        if ($len <= 1) {
            return $origin;
        }
        // 已排序数组
        $sorted = [];
        $sortedLen = 0;
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        for ($i = 0; $i < $len; $i++) {
            do {
                // 1.当插入值大于（小于 SORT_DESC）已排序数组最大（小 SORT_DESC）值时，直接插入数组最右侧
                if ($sortedLen === 0 || $this->compare($origin[$i], $sorted[$sortedLen - 1]) * $symbol > 0) {
                    $sorted[] = $origin[$i];
                    break;
                }
                // 2.从左往右遍历，当插入值小于（大于 SORT_DESC）已排序数组当前值时，将插入值插入到当前值的左侧
                for ($j = 0; $j <= $sortedLen - 1; $j++) {
                    $res = $this->compare($origin[$i], $sorted[$j]);
                    if ($res * $symbol <= 0) {
                        $left = array_slice($sorted, 0, $j);
                        $left[] = $origin[$i];
                        $right = array_slice($sorted, $j);
                        $sorted = array_merge($left, $right);
                        break;
                    }
                }
            } while (false);
            $sortedLen++;
        }
        return $sorted;
    }

    /**
     * 原地排序
     * @param array $origin 待排序数组
     * @param int $start 起始位置
     * @param int $step 步长
     */
    protected function inPlace(&$origin, $start = 0, $step = 1)
    {
        $len = count($origin);
        if ($len <= 1) {
            return;
        }
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        for ($i = $start + $step; $i < $len; $i += $step) {
            // 当前值比左侧值小时，将左侧大于（小于 SORT_DESC）当前值的部分整体右移，并将当前值插入到右移部分的头部
            if ($this->compare($origin[$i - $step], $origin[$i]) * $symbol > 0) {
                $tmp = $origin[$i];
                for ($j = $i - $step; $j >= 0 && $this->compare($origin[$j], $tmp) * $symbol > 0; $j -= $step) {
                    $origin[$j + $step] = $origin[$j];
                }
                $origin[$j + $step] = $tmp;
            }
        }
    }
}