<?php

class Base
{
    public $name = 'Abbosxon';

    public function first()
    {
        return 'first';
    }
}


$base = new Base();

echo $base->name;