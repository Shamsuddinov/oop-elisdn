<?php

class Measurer
{
    public function getMax($obj)
    {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

class Table
{
    public function getWidth()
    {
        return 58;
    }

    public function getHeight()
    {
        return 12;
    }
}

$obj = new Table();
$measure = new Measurer();

echo $measure->getMax($obj) . PHP_EOL;