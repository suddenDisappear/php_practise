<?php


namespace practise\struct\bridge;


class GoogleSearchEngine implements SearchEngine
{
    public function search($keyword)
    {
        echo 'search ', $keyword, ' via https://www.google.com', PHP_EOL;
    }
}