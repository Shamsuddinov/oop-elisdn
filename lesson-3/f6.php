<?php

class StaffService
{
    public function recruitEmployee($name, $phone, $address)
    {
        $employee = [
            'id' => rand(10000, 99999),
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ];

        $this->save($employee);
        return $employee;
    }

    private function save($employee)
    {
        $file = __DIR__ . '/data/employee_' . $employee['id'] . '.php';

        file_put_contents($file, '<?php return ' . var_export($employee, true) . '; ?>');
    }
}

$staff = new StaffService();

$name = [
    'first' => 'Abror',
    'last' => 'Javoxirov'
];

$phone = [
    'code' => '998',
    'number' => '883247865'
];

$address = [
    'country' => 'Uzbekistan',
    'region' => 'Andijan',
    'city' => 'Andijan',
    'street' => 'Boburshox',
    'house' => '31 B'
];

$employee = $staff->recruitEmployee($name, $phone, $address);

echo $employee['phone']['number'] . PHP_EOL;