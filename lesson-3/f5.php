<?php

class StaffService
{
    public function recruitEmployee($first_name, $last_name, $position, $address, $birthday, $region, $phone)
    {
        // Something
    }
}

$staff = new StaffService();

// Uuuzuun parametrli metodlar bilan ishlash
$staff->recruitEmployee('Ikrom', 'Ro\'ziboyev', 'Dasturchi', 'Alimjonov', '1991-02-07', 'Asaka', '998885431900');