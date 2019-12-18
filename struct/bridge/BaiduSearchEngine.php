<?php


namespace practise\struct\bridge;


class BaiduSearchEngine implements SearchEngine
{
    /**
     * @inheritDoc
     */
    public function search($keyword)
    {
        echo 'search ', $keyword, ' via https://www.baidu.com', PHP_EOL;
    }
}