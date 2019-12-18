<?php
namespace practise\struct\bridge;

abstract class Browser
{
    /**
     * @var SearchEngine
     */
    public $searchEngine;

    public function __construct($searchEngine)
    {
        $this->searchEngine = $searchEngine;
    }

    /**
     * 获取浏览器信息
     * @return string
     */
    abstract public function info();

    /**
     * 搜索
     * @param string $keyWord
     * @return string
     */
    public function search($keyWord)
    {
        return $this->searchEngine->search($keyWord);
    }
}