<?php
/**
 * Created by PhpStorm.
 * User: ПАПА
 * Date: 23.11.2018
 * Time: 6:11
 */

namespace carcharing;

class tariffDaily extends TariffBase
{
    public $kmNumber;
    public $minNumber;
    public $age;
    protected $pricePerKm = 1;
    protected $pricePerTime = 1000;
    protected $ageRate = 1.1;

    function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime, $ageRate)
    {
        $daysNumber = ceil(($minNumber + 30) / (60 * 24)) ;
        return parent::cost($kmNumber,$daysNumber, $age, $pricePerKm,$pricePerTime, $ageRate);
    }
}