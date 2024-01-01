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

    public function __toString()
    {
        return 'klassimizdagi obyektni matn ko\'rinishida foydalanmoqchi bo\'lganimizda ishga tushadi';
    }
}

$student = new Student('Abbosxon', 'Shamsuddinov');

echo $student;