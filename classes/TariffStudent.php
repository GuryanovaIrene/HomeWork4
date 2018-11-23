<?php
/**
 * Created by PhpStorm.
 * User: ПАПА
 * Date: 23.11.2018
 * Time: 5:41
 */

namespace carcharing;

class TariffStudent extends TariffBase
{
    public $kmNumber;
    public $minNumber;
    public $age;
    protected $pricePerKm = 4;
    protected $pricePerMinute = 1;
    protected $ageRate = 1.1;

    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerMinute, $ageRate)
    {
        if ($age > 25) {
            return 'Возраст водителя не может быть более 25 лет!!!';
        }
        return parent::cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerMinute, $ageRate);
    }
}