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

class TXTStudentRepository
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function findAll()
    {
        $students = [];
        $rows = file(__DIR__ . '/' . $this->file);
        foreach ($rows as $row){
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values['0'], $values['1'], $values['2']);
        }

        return $students;
    }

    public function saveAll($students)
    {
        $values = [];
        foreach ($students as $student){
            $values[] = implode(';', [
                $student->getFirstName(),
                $student->getDate(),
                $student->getLastName(),
            ]);
        }

        file_put_contents(__DIR__ . '/' . $this->file, implode(PHP_EOL, $values));
    }
}

class XMLStudentRepository
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function findAll()
    {
        $students = [];
        $rows = simplexml_load_file(__DIR__ . '/' . $this->file);
        foreach ($rows->student as $row){
            $students[] = new Student($row->firstName, $row->lastName, $row->date);
        }

        return $students;
    }
}


$type = 'txt';

switch ($type)
{
    case 'txt':
        $repository = new TXTStudentRepository('students.txt');
        break;
    case 'xml':
        $repository = new XMLStudentRepository('students.xml');
        break;
    default:
        throw new InvalidArgumentException('Invalid type');
}

$students = $repository->findAll();

foreach ($students as $student){
    echo $student;
}

//$repository->saveAll($students, 'students-1.txt');

$students = $repository->findAll();

foreach ($students as $student){
    echo $student;
}