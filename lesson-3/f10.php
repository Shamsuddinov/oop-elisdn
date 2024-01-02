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

    public function isEqualTo(Phone $phone)
    {
        return $this->code == $phone->code && $this->number = $phone->number;
    }
}

class PhoneCollection{
    public $phones;

    public function __construct(array $phones)
    {
        foreach ($phones as $phone){
            if (!$phone instanceof Phone){
                throw new InvalidArgumentException('Invalid phone type');
            }
        }

        $this->phones = $phones;
    }

    public function add(Phone $new_phone)
    {
        /**
         * @var Phone $phone
         */
        foreach ($this->phones as $phone){
            if ($phone->isEqualTo($new_phone)){
                throw new Exception('Phone number already exists');
            }
        }

        $this->phones[] = $new_phone;
    }

    public function remove(Phone $new_phone)
    {
        /**
         * @var Phone $phone
         */
        foreach ($this->phones as $id => $phone){
            if ($phone->isEqualTo($new_phone)){
                unset($this->phones[$id]);
                return;
            }
        }

        throw new Exception('Phone does not exists');
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

    public function __construct($id, Name $name, PhoneCollection $phones, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phones = $phones;
        $this->address = $address;
    }

    public function addPhone(Phone $new_phone)
    {
        $this->phones->add($new_phone);
    }

    public function removePhone(Phone $new_phone)
    {
        $this->phones->remove($new_phone);
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
     * @return PhoneCollection
     */
    public function getPhones()
    {
        return $this->phones;
    }
}

class IdGenerator{
    public function next()
    {
        return rand(10000, 99999);
    }
}

class EmployeeRepository{
    public function find($id)
    {
        return null;
    }
    public function save(Employee $employee)
    {
        $file = __DIR__ . '/data/employee_' . $employee->getId() . '.php';

        file_put_contents($file, '<?php return ' . var_export($employee, true) . '; ?>');
    }
}

class StaffService
{
    private $employeeRepository;
    private $idGenerator;

    public function __construct(EmployeeRepository $employeeRepository, IdGenerator $idGenerator)
    {
        $this->employeeRepository = $employeeRepository;
        $this->idGenerator = $idGenerator;
    }

    public function recruitEmployee(Name $name, PhoneCollection $phones, Address $address)
    {
        $employee = new Employee($this->idGenerator->next(), $name, $phones, $address);

        $this->employeeRepository->save($employee);
        return $employee;
    }
}

$staff = new StaffService(new EmployeeRepository(), new IdGenerator());

$name = new Name('Abror','Javoxirov');
$phones = new PhoneCollection([new Phone('998','883247865')]);
$address = new Address('Uzbekistan','Andijan','Andijan','Boburshox','31 B');

// Konstruktorga o'zgarish kiritildi
$employee = $staff->recruitEmployee($name, $phones, $address);

echo $employee->getName()->first . PHP_EOL;