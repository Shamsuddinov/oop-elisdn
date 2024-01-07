<?php

class Base
{
    public $first_name;
    public $second_name;

    public function __construct($first_name, $second_name)
    {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
    }
}

class Sub extends Base
{
    public $email = 'Abbosxon';

    public function __construct($first_name, $second_name, $email)
    {
        parent::__construct($first_name, $second_name);
        $this->email = $email;
    }
}


$base = new Base('first_name', 'second_name');

echo $base->first_name . ' ' . $base->second_name . PHP_EOL;

$sub = new Sub('first_name', 'second_name', 'email');

echo $sub->first_name . ' ' . $sub->second_name . ' ' . $sub->email . PHP_EOL;
