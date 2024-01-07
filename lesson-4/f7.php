<?php

class Base
{
    public $first_name;
    public $second_name;

    public function first()
    {
        return 'first + ' . $this->second();
    }

    public function second()
    {
        return 'second';
    }
}

class Sub extends Base
{
    public function second()
    {
        return 'second_2';
    }
}

$sub = new Sub();

echo $sub->first() . PHP_EOL;