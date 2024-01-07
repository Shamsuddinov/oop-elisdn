<?php

class Base
{
    public $first_name;
    public $second_name;

    public static function first()
    {
        return 'first + ' . static::second();
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
// first + second_2 chiqadi. static::second()ligi uchun, qaysi klassdan murojaat bo'lsa
// o'sha klassdagi metodni ishlatadi, selfda esa aksi: first + second chiqadi.