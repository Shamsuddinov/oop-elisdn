<?php

function getStudentsFromFile($file)
{
    $students = [];
    $rows = file(__DIR__ . '/' . $file);
    foreach ($rows as $row){
        $values = array_map('trim', explode(';', $row));
        $students[] = new Student($values['0'], $values['1'], $values['2']);
    }

    return $students;
}

class Student
{
    private $first_name;
    private $last_name;
    private $date;

    public function __construct($first_name, $last_name, $date)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date = $date;
    }

    public function __toString()
    {
        return $this->first_name . ' ' . $this->last_name . ' ' . $this->date . PHP_EOL;
    }
}

$students = getStudentsFromFile('students.txt');

foreach ($students as $student){
    echo $student;
}