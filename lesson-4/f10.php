<?php

abstract class Base
{
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
//    public function second()
//    {
//        return 'second_2';
//    }
}

//$base = new Base();
// Base klassidan obyekt yaratish uchun foydalanib bo'lmaydi

$sub = new Sub();

echo $sub->first() . PHP_EOL;
// first + second_2 chiqadi, sababi metod overwrite bo'lyapti