<?php

trait BaseTrait
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    final public function second()
    {
        return 'second';
    }
}

class Base
{
    use BaseTrait;
}

class Sub extends Base
{

}

trait RunTrait
{

}

$sub = new Sub();
echo $sub->first() . PHP_EOL;
// Cannot override final method Base::second() xatolik sodir bo'ladi,
// sababi second() metodini override qilib bo'lmaydi,
// chunki u final kalit so'zi bilan e'lon qilingan


