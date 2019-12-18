<?php


namespace practise\create\abstractFactory;


class MathTeacher implements Teacher
{
    /**
     * @inheritDoc
     */
    public function teach()
    {
        return '1+1的结果是2';
    }

    /**
     * @inheritDoc
     */
    public function read()
    {
        return '数学课即将开始';
    }
}