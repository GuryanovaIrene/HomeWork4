<?php
namespace carcharing;

class TariffBase extends Carsharing
{
    public $kmNumber;
    public $minNumber;
    public $age;
    protected $pricePerKm = 10;
    protected $pricePerTime = 3;
    protected $ageRate = 1.1;

    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime, $ageRate)
    {
        if ($age >= 18 and $age <= 21) {
            return ($pricePerKm * $kmNumber + $pricePerTime * $minNumber) * $ageRate;
        }
        return $pricePerKm * $kmNumber + $pricePerTime * $minNumber;
    }
}