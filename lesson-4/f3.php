<?php

class Base
{
    public $name = 'Abbosxon';

    public function first()
    {
        return 'first';
    }
}

class Sub extends Base
{
    public $feature = 'Abbosxon';

    public function first()
    {
        return 'first_2';
    }
}


$base = new Base();

echo $base->first() . PHP_EOL;

$sub = new Sub();

echo $sub->name . PHP_EOL;
echo $sub->feature . PHP_EOL;
echo $sub->first() . PHP_EOL;
