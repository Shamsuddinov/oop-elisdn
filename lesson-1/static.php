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

    public static function getList($info = '')
    {
        return [
            1 => '1-ma\'lumot',
            2 => '2-ma\'lumot',
        ];
    }
}

echo "<pre>";
print_r(Student::getList('qandaydir listlarni olish uchun biz aloxida obyeky yaratishimiz shart bo\'lmasligi kerak. Shu sababli listlar uchun static kalit so\'zidan foydalanishimiz to\'g\'ri bo\'ladi.'));
echo "</pre>";
die();