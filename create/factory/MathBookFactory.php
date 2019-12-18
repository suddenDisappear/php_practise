<?php


namespace practise\create\factory;

use practise\create\simpleFactory\MathBook;

class MathBookFactory extends BookFactory
{
    public function create()
    {
        return new MathBook();
    }
}