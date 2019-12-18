<?php


namespace practise\algorithm\sort;

/**
 * 希尔排序
 * @package practise\algorithm\sort
 */
class Shell extends Insert
{
    /**
     * @inheritDoc
     */
    public function sort() :array
    {
        $origin = $this->getOrigin();
        $len = count($origin);
        if ($len <= 1) {
            return $origin;
        }
        $step = $len >> 1;
        while ($step >= 1) {
            for ($start = 0; $start < $step; $start++) {
                $this->inPlace($origin, $start, $step);
            }
            $step >>= 1;
        }
        return $origin;
    }
}