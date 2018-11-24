<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;

class TariffDaily extends TariffBase
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

    function cost($kmNumber, $minNumber, $age, $pricePerKm = 1, $pricePerTime = 1000)
    {
        $daysNumber = ceil(($minNumber - 30) / (60 * 24)) ;
        return parent::cost($kmNumber,$daysNumber, $age, $pricePerKm,$pricePerTime);
    }
}