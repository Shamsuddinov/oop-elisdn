<?php

class Discount
{
    public static function calc($cost)
    {
        if ($cost >= 1000)
        {
            return $cost * 0.95;
        } else {
            return $cost;
        }
    }
}

echo Discount::calc(850) . PHP_EOL;
echo Discount::calc(1850) . PHP_EOL;
