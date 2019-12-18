<?php


namespace practise\create\simpleFactory;


interface BookInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getContent();

}