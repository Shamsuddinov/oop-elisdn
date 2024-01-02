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
    private $id;
    private $name;
    private $phones;
    private $address;

    public function __construct(Name $name, array $phones, Address $address)
    {
        foreach ($phones as $phone){
            if (!$phone instanceof Phone){
                throw new InvalidArgumentException('Invalid phone type');
            }
        }

        $this->id = $this->generateId();
        $this->name = $name;
        $this->phones = $phones;
        $this->address = $address;
    }

    public function addPhone(Phone $new_phone)
    {
        /**
         * @var Phone $phone
         */
        foreach ($this->phones as $phone){
            if ($phone->code == $new_phone->code && $phone->number == $new_phone->number){
                throw new Exception('Phone number already exists');
            }
        }

        $this->phones[] = $new_phone;
    }

    public function generateId()
    {
        return rand(10000, 99999);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }
}

class StaffService
{
    public function recruitEmployee(Name $name, array $phones, Address $address)
    {
        $employee = new Employee($name, $phones, $address);

        $this->save($employee);
        return $employee;
    }

    private function save(Employee $employee)
    {
        $file = __DIR__ . '/data/employee_' . $employee->getId() . '.php';

        file_put_contents($file, '<?php return ' . var_export($employee, true) . '; ?>');
    }
}

$staff = new StaffService();

$name = new Name('Abror','Javoxirov');
$phones[] = new Phone('998','883247865');
$address = new Address('Uzbekistan','Andijan','Andijan','Boburshox','31 B');

// Konstruktorga o'zgarish kiritildi
$employee = $staff->recruitEmployee($name, $phones, $address);

echo $employee->getName()->first . PHP_EOL;