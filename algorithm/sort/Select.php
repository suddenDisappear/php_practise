<?php


namespace practise\algorithm\sort;

/**
 * 选择排序
 * @package practise\algorithm\sort
 */
class Select extends Sort
{
    /**
     * @inheritDoc
     */
    public function sort(): array
    {
        $origin = $this->getOrigin();
        $this->inPlace($origin);
        return $origin;
    }

    /**
     * @param array $origin
     */
    private function inPlace(array &$origin)
    {
        $len = count($origin);
        if ($len <= 1) {
            return;
        }
        $symbol = $this->getOrder() === SORT_ASC ? 1 : -1;
        for ($i = 0; $i < $len - 1; $i++) {
            $pos = $i;
            for ($j = $pos + 1; $j < $len; $j++) {
                if ($this->compare($origin[$j], $origin[$pos]) * $symbol < 0) {
                    $pos = $j;
                }
            }
            if ($pos !== $i) {
                $this->swap($origin[$pos], $origin[$i]);
            }
        }
    }
}