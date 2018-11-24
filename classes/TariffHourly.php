<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;

class TariffHourly extends TariffBase
{
    use AddGps;
    use AddDriver;

    public $addGps;
    public $addDriver;

    public function __construct($addGps, $addDriver)
    {
        $this->addGps = $addGps;
        $this->addDriver = $addDriver;
    }

    public function cost($kmNumber, $minNumber, $age, $pricePerKm = 0, $pricePerHour = 200)
    {
        $hourNumber = ceil($minNumber / 60);
        return parent::cost($kmNumber, $hourNumber, $age, $pricePerKm = 0, $pricePerHour = 200);
    }
}