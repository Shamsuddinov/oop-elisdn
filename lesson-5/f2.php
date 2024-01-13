<?php

class Measurer
{
    public function getMax(Measurable $obj)
    {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

// Bunday qilinishi sababi barcha klasslarni mana shu obyekt
// yordamida birlashtirish qulay, bu tur uchun aloxida klass yaratish
// shart, shunda u oson birlashtiriladi.
interface Measurable
{
    public function getWidth();

    public function getHeight();
}

class Table implements Measurable
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

class Shelf implements Measurable
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

$obj = new Table();
$measure = new Measurer();

echo $measure->getMax($obj) . PHP_EOL;