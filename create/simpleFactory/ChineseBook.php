<?php

namespace practise\create\simpleFactory;

class ChineseBook implements BookInterface
{
    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return '语文';
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return '今天天气不错';
    }
}