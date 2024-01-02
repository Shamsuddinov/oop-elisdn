<?php

function toUppercase($string)
{
    return mb_strtoupper($string, 'utf-8');
}

echo toUppercase('Abbosxon') . PHP_EOL; // ABBOSXON