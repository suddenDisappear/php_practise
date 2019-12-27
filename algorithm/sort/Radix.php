<?php


namespace practise\algorithm\sort;

/**
 * 基数排序
 * @package practise\algorithm\sort
 */
class Radix extends Sort
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
        $factor = 1;
        while (true) {
            $bucket = $this->createBucket();
            $bucketLen = count($bucket);
            for ($i = 0; $i < $len; $i++) {
                $index = intval($origin[$i] / $factor) % 10;
                $bucket[$index]++;
            }
            if ($bucket[0] === $len) {
                break;
            }
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
            $tmp = array_fill(0, $len, 0);
            for ($i = $len - 1; $i >= 0; $i--) {
                $index = intval($origin[$i] / $factor) % 10;
                $tmp[--$bucket[$index]] = $origin[$i];
            }
            $origin = $tmp;
            $factor *= 10;
        }
        return $origin;
    }

    /**
     * 创建桶
     * @return array
     */
    private function createBucket()
    {
        return array_fill(0, 10, 0);
    }
}