<?php

interface iMeasurable
{
    public function getWidth();

    public function getHeight();
}

class Measurer
{
    public function getMax(iMeasurable $obj)
    {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

interface iVisible
{
    public function getColor();
}

class View
{
    public function getView(iVisible $obj)
    {
        return $obj->getColor();
    }
}

class Table implements iMeasurable, iVisible
{
    public function getWidth()
    {
        return 58;
    }

    public function getHeight()
    {
        return 12;
    }

    public function getColor()
    {
        return 'blue';
    }
}

class Shelf implements iMeasurable, iVisible
{
    public function getWidth()
    {
        return 120;
    }

    public function getHeight()
    {
        return 180;
    }

    public function getColor()
    {
        return 'red';
    }
}

$obj1 = new Table();
$obj2 = new Shelf();
$measure = new Measurer();
$view = new View();

echo $measure->getMax($obj1) . PHP_EOL;
echo $measure->getMax($obj2) . PHP_EOL;

echo $view->getView($obj1) . PHP_EOL;
echo $view->getView($obj2) . PHP_EOL;
