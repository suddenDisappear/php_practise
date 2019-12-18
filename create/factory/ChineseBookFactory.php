<?php
namespace practise\create\factory;

use practise\create\simpleFactory\ChineseBook;

class ChineseBookFactory extends BookFactory
{
    public function create()
    {
        return new ChineseBook();
    }
}