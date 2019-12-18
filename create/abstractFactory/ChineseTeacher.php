<?php


namespace practise\create\abstractFactory;


class ChineseTeacher implements Teacher
{
    /**
     * @inheritDoc
     */
    public function teach()
    {
        return '马说主要介绍了...';
    }

    /**
     * @inheritDoc
     */
    public function read()
    {
        return '子曾经曰过:...';
    }
}