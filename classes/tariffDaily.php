<?php
namespace carcharing;

class tariffDaily extends TariffBase
{
    public $kmNumber;
    public $minNumber;
    public $age;

    function cost($kmNumber, $minNumber, $age, $pricePerKm = 1, $pricePerTime = 1000)
    {
        $daysNumber = ceil(($minNumber - 30) / (60 * 24)) ;
        return parent::cost($kmNumber,$daysNumber, $age, $pricePerKm,$pricePerTime);
    }
}