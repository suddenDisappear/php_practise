<?php

namespace practise\create\simpleFactory;

class MathBook implements BookInterface
{
    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return '数学';
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return '1+1=2';
    }
}