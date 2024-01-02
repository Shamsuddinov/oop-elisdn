<?php

class StringHelper
{
    public static function toUppercase($string)
    {
        return mb_strtoupper($string, 'utf-8');
    }

    public static function toLowercase($string)
    {
        return mb_strtolower($string, 'utf-8');
    }
}

echo StringHelper::toUppercase('Abbosxon') . PHP_EOL; // ABBOSXON
echo StringHelper::toLowercase('Abbosxon') . PHP_EOL; // ABBOSXON
