<?php

namespace practise\create\simpleFactory;

class BookFactory
{
    /**
     * 生产书本简单工厂
     * @param string $type
     * @return \practise\create\simpleFactory\BookInterface
     * @throws \Exception
     */
    public static function create($type)
    {
        switch ($type) {
            case 'math':
                return new MathBook();
            case 'chinese':
                return new ChineseBook();
            default:
                throw new \Exception('not support book type');
        }
    }
}