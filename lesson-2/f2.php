<?php

$rows = file(__DIR__ . '/students.txt');

class Student
{
    public $first_name;
    public $last_name;
    public $date;
}

foreach ($rows as $row){
    $values = array_map('trim', explode(';', $row));
    $student = new Student();

    $student->first_name = $values['0'];
    $student->last_name = $values['1'];
    $student->date = $values['2'];

    echo $student->first_name . ' ' . $student->last_name . ' ' . $student->date . PHP_EOL;
}