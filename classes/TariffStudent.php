<?php
namespace carsharing;

class TariffStudent extends TariffBase
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

    public function cost($kmNumber, $minNumber, $age, $pricePerKm = 4, $pricePerMinute = 1)
    {
        if ($age > 25) {
            return 'Возраст водителя не может быть более 25 лет!!!';
        }
        return parent::cost($kmNumber, $minNumber, $age, $pricePerKm = 4, $pricePerMinute = 1);
    }
}