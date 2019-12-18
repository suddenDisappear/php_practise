<?php

namespace practise\create\abstractFactory;

abstract class ClassFactory
{
    /**
     * @return \practise\create\simpleFactory\BookInterface
     */
    abstract public function getBook();

    /**
     * @return \practise\create\abstractFactory\Teacher
     */
    abstract public function getTeacher();
}