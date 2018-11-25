<?php
namespace carsharing;

class TariffStudent extends TariffBase
{
    public function __construct($kmNumber, $minNumber, $age)
    {
        parent::__construct($kmNumber, $minNumber, $age);
        if ($this->age > 25) {
            $this->errors[] = 'Возраст водителя не может быть более 25 лет!!!';
        }
    }

    public function addNote()
    {
        return 'без дополнительных услуг';
    }

    public function tariffDescribe()
    {
        return 'Тариф студенческий (' . $this->kmNumber . ' км, ' . $this->minNumber . ' мин., ' .
            $this->age . ' лет, ' . $this->addNote() . ')';
    }

    public function cost($pricePerKm = 4, $pricePerMinute = 1)
    {
        return parent::cost($pricePerKm, $pricePerMinute);
    }
}