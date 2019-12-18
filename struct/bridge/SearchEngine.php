<?php


namespace practise\struct\bridge;


interface SearchEngine
{
    /**
     * 搜索
     * @param string $keyword
     * @return string
     */
    public function search($keyword);
}