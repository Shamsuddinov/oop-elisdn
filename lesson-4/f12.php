<?php

abstract class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    public function second()
    {
        // TODO: aytaylik, buni Base klassidan foydalanayotgan dasturchi
        // o'zi yozishi kerak deb.
    }
}

class Sub extends Base
{

}

$sub = new Sub();

echo $sub->first() . PHP_EOL;
// first +  chiqadi, sababi dasturchi second() metodini overwrite qilishi kerak edi.
// lekin unga hech qanday xatolik chiqmadi, va u kutubxonadan xato foydalandi!
// bunday xatolikni oldini olish uchun f13.phpdagi ishni qilish kerak. Ya'ni kutubxonadan
// foydalangan dasturchi o'zi realizatsiya qiladigan metodlarni abstract deb e'lon qilish kerak.