<?php
/**
 * Created by PhpStorm.
 * User: ПАПА
 * Date: 23.11.2018
 * Time: 5:10
 */

namespace carcharing;

class TariffHourly extends TariffBase
{
    public $kmNumber;
    public $minNumber;
    public $age;
    protected $pricePerKm = 0;
    protected $pricePerHour = 200;
    protected $ageRate = 1.1;

    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerHour, $ageRate)
    {
        $hourNumber = ceil($minNumber / 60);
        if ($age >= 18 and $age <= 21) {
            return parent::cost($kmNumber, $hourNumber, $age, $pricePerKm, $pricePerHour, $ageRate);
        }
        return $pricePerHour * $hourNumber;
    }
}