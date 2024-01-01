<?php

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

    public static function getStudentsFromFile($file)
    {
        $students = [];
        $rows = file(__DIR__ . '/' . $file);
        foreach ($rows as $row){
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values['0'], $values['1'], $values['2']);
        }

        return $students;
    }

    public static function saveStudentsToFile($students, $file)
    {
        $values = [];
        foreach ($students as $student){
            $values[] = implode(';', [
                $student->first_name,
                $student->last_name,
                $student->date,
            ]);
        }

        file_put_contents(__DIR__ . '/' . $file, implode(PHP_EOL, $values));
    }
}


$students = Student::getStudentsFromFile('students.txt');

Student::saveStudentsToFile($students, 'students-1.txt');

//
//foreach ($students as $student){
//    echo $student;
//}