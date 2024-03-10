<?php

class Measurer
{
    public function getMax(iMeasurable $obj)
    {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

// Bunday qilinishi sababi barcha klasslarni mana shu obyekt
// yordamida birlashtirish qulay, bu tur uchun aloxida klass yaratish
// shart, shunda u oson birlashtiriladi.
interface iMeasurable
{
    public function getWidth();

    public function getHeight();
}

class Table implements iMeasurable
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

class Shelf implements iMeasurable
{
    public function getWidth()
    {
        return 120;
    }

    public function getHeight()
    {
        return 180;
    }
}

$obj1 = new Table();
$obj2 = new Shelf();
$measure = new Measurer();

echo $measure->getMax($obj1) . PHP_EOL;
echo $measure->getMax($obj2) . PHP_EOL;
