<?php

class Base
{
    public $first_name;
    public $second_name;

    public static function first()
    {
        return 'first + ' . self::second();
    }

    public static function second()
    {
        return 'second';
    }
}

class Sub extends Base
{
    public static function second()
    {
        return 'second_2';
    }
}

$sub = new Sub();

echo $sub->first() . PHP_EOL;