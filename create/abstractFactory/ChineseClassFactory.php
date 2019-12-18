<?php


namespace practise\create\abstractFactory;


use practise\create\simpleFactory\ChineseBook;

class ChineseClassFactory extends ClassFactory
{
    /**
     * @inheritDoc
     */
    public function getBook()
    {
        return new ChineseBook();
    }

    /**
     * @inheritDoc
     */
    public function getTeacher()
    {
        return new ChineseTeacher();
    }
}