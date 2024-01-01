<?php

class Student
{
    private $firstName;
    private $secondName;

    public function __construct($firstName, $secondName)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->secondName;
    }

    public function __invoke($text = null)
    {
        return !is_null($text) ? $text : $this->firstName;
    }
}

$student = new Student('Abbosxon', 'Shamsuddinov');

echo $student('obyektga funksiya sifatida murojaat qilsa __invoke() ishga tushadi');