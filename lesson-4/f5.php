<?php

class Base
{
    public $first_name;
    public $second_name;

    public function first()
    {
        return 'first + ' . $this->second();
    }

    private function second()
    {
        return 'second';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;