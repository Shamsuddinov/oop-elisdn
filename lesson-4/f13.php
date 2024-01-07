<?php

abstract class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    abstract public function second();
}

class Sub extends Base
{

}



$sub = new Sub();

echo $sub->first() . PHP_EOL;
// xatolik sodir bo'ladi, sababi dasturchi second() metodini overwrite qilishi kerak edi.
// f12.phpdagi muammoni shu ko'rinishda yechsa bo'ladi.