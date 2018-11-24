<?php
namespace carsharing;

class TariffBase extends Carsharing
{
    public $kmNumber;
    public $minNumber;
    public $age;
    public $addGps;
    public $addDriver;

    public function __construct()
    {
        $addGps = 0;
        $addDriver = 0;
    }

    public function cost($kmNumber, $minNumber, $age, $pricePerKm = 10, $pricePerTime = 3)
    {
        if ($age >= 18 and $age <= 21) {
            $ageRate = 1.1;
        } else {
            $ageRate = 1;
        }
        return ($pricePerKm * $kmNumber + $pricePerTime * $minNumber) * $ageRate;
    }
}