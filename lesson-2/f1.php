<?php

$rows = file(__DIR__ . '/students.txt');

foreach ($rows as $row){
    $values = array_map('trim', explode(';', $row));

    echo $values['0'] . ' ' . $values['1'] . ' ' . $values['2'] . PHP_EOL;
}