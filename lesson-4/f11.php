<?php

final class Base
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

// final kalit so'zi bilan yasalgan klassdan voris olib bo'lmaydi
//class Sub extends Base
//{
////    public function second()
////    {
////        return 'second_2';
////    }
//}

$base = new Base();
echo $base->first() . PHP_EOL;
