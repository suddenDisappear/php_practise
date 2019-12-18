<?php


namespace practise\create\abstractFactory;


use practise\create\simpleFactory\MathBook;

class MathClassFactory extends ClassFactory
{
    /**
     * @inheritDoc
     */
    public function getBook()
    {
        return new MathBook();
    }

    /**
     * @inheritDoc
     */
    public function getTeacher()
    {
        return new MathTeacher();
    }
}