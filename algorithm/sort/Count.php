<?php


namespace practise\algorithm\sort;

/**
 * 计数排序
 * @package practise\algorithm\sort
 */
class Count extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort(): array
    {
        $origin = $this->getOrigin();
        $len = count($origin);
        if ($len < 2) {
            return $origin;
        }
        $min = $max = $origin[0];
        for ($i = 1; $i < $len; $i++) {
            if ($this->compare($origin[$i], $min) < 0) {
                $min = $origin[$i];
            }
            if ($this->compare($origin[$i], $max) > 0) {
                $max = $origin[$i];
            }
        }
        $bucket = $this->createBucket($min, $max);
        foreach ($origin as $value) {
            $index = $value - $min;
            $bucket[$index]++;
        }
        $bucketLen = count($bucket);
        if ($bucketLen > 1) {
            if ($this->getOrder() === SORT_ASC) {
                for ($i = 1; $i < $bucketLen; $i++) {
                    $bucket[$i] += $bucket[$i - 1];
                }
            } else {
                for ($i = $bucketLen - 2; $i >= 0; $i--) {
                    $bucket[$i] += $bucket[$i + 1];
                }
            }
        }
        // 初始化数组键值，否则可能会出现数组key乱序（如10在1前面）
        $res = array_fill(0, $len, 0);
        for ($i = $len - 1; $i >= 0; $i--) {
            $index = $origin[$i] - $min;
            $res[--$bucket[$index]] = $origin[$i];
        }
        return $res;
    }

    /**
     * 创建桶
     * @param mixed $min
     * @param mixed $max
     * @return array
     */
    private function createBucket($min, $max)
    {
        $len = $max - $min + 1;
        return array_fill(0, $len, 0);
    }
}