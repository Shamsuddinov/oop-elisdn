<?php

class Discount
{
    public $limit;
    public $percent;

    public function __construct($limit, $percent)
    {
        $this->limit = $limit;
        $this->percent = $percent;
    }

    public function calc($cost)
    {
        if ($cost >= $this->limit)
        {
            return $cost * $this->percent;
        } else {
            return $cost;
        }
    }
}

$discount = new Discount(1000, 0.95);

echo $discount->calc(850) . PHP_EOL;
echo $discount->calc(1850) . PHP_EOL;
