<?php
namespace carsharing;

class TariffDaily extends TariffBase
{
    use AddGps;
    public $kmNumber;
    public $minNumber;
    public $age;
    public $addGps;
    public $addDriver;

    public function __construct($addGps, $addDriver)
    {
        return ['addGps' => $addGps, 'addDriver' => $addDriver];
    }

    function cost($kmNumber, $minNumber, $age, $pricePerKm = 1, $pricePerTime = 1000)
    {
        $daysNumber = ceil(($minNumber - 30) / (60 * 24)) ;
        return parent::cost($kmNumber,$daysNumber, $age, $pricePerKm,$pricePerTime);
    }
}