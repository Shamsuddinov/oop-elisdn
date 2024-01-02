<?php

class Name{
    public $first;
    public $last;

    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }
}

class Phone{
    public $code;
    public $number;

    public function __construct($code, $number)
    {
        $this->code = $code;
        $this->number = $number;
    }
}

class Address{
    public $country;
    public $region;
    public $city;
    public $street;
    public $house;

    public function __construct($country, $region, $city, $street, $house)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
    }
}

class Employee{
    public $id;
    public $name;
    public $phone;
    public $address;

    public function __construct(Name $name, Phone $phone, Address $address)
    {
        $this->id = $this->generateId();
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function generateId()
    {
        return rand(10000, 99999);
    }
}

class StaffService
{
    public function recruitEmployee(Name $name, Phone $phone, Address $address)
    {
        $employee = new Employee($name, $phone, $address);

        $this->save($employee);
        return $employee;
    }

    private function save($employee)
    {
        $file = __DIR__ . '/data/employee_' . $employee->id . '.php';

        file_put_contents($file, '<?php return ' . var_export($employee, true) . '; ?>');
    }
}

$staff = new StaffService();

$name = new Name('Abror','Javoxirov');
$phone = new Phone('998','883247865');
$address = new Address('Uzbekistan','Andijan','Andijan','Boburshox','31 B');

// Bu nimani beradi. f6.phpda ko'rgan edik, bir dunyo parametrlar $employee yaratishni
// Bu yondashuvda, o'sha bir dunyo parametrlarni guruh-guruh qilib oldik.
// Masalan, ism-familiyaga tegishligini $name, telefon ma'lumotlarini $phone
// Manzil ma'lumotlarini bo'lsa $address. Ya'ni bu yerda 9 ta parametr o'rniga 3ta parametr kirityapmiz.
$employee = $staff->recruitEmployee($name, $phone, $address);

echo $employee->phone->number . PHP_EOL;