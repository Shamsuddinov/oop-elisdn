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

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }
}

class StudentRepository
{
    public static function findAll($file)
    {
        $students = [];
        $rows = file(__DIR__ . '/' . $file);
        foreach ($rows as $row){
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values['0'], $values['1'], $values['2']);
        }

        return $students;
    }

    public static function saveAll($students, $file)
    {
        $values = [];
        foreach ($students as $student){
            $values[] = implode(';', [
                $student->getFirstName(),
                $student->getDate(),
                $student->getLastName(),
            ]);
        }

        file_put_contents(__DIR__ . '/' . $file, implode(PHP_EOL, $values));
    }
}


$students = StudentRepository::findAll('students.txt');

StudentRepository::saveAll($students, 'students-1.txt');

//
//foreach ($students as $student){
//    echo $student;
//}