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

class Sub extends Base
{
    public function first()
    {
        return 'first + ' . parent::first();
    }
}

$sub = new Sub();

echo $sub->first() . PHP_EOL;