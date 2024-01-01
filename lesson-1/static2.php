<?php

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;
    private $name;
    private $type;

    private function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function createOchn($name)
    {
        return new self($name, self::TYPE_OCHN);
    }

    public static function createZaochn($name)
    {
        return new self($name, self::TYPE_ZAOCHN);
    }
}

$student_1 = Student::createOchn('Abbosxon');
$student_2 = Student::createZaochn('Abbosxon');
echo "<pre>";
print_r("PHPda konstruktor faqat bitta bo'lganli sababli ko'plab noqulayliklar bo'lishi mumkin, shu kabi noqulayliklarni statik metodlar yordamida ham xam qilsa bo'ladi. Bu ham statik metoddan foydalnishga bir namuna");
echo "</pre>";
die();