<?php
namespace carcharing;

class TariffHourly extends TariffBase
{
    public $kmNumber;
    public $minNumber;
    public $age;

    public function cost($kmNumber, $minNumber, $age, $pricePerKm = 0, $pricePerHour = 200)
    {
        $hourNumber = ceil($minNumber / 60);
        return parent::cost($kmNumber, $hourNumber, $age, $pricePerKm = 0, $pricePerHour = 200);
    }
}