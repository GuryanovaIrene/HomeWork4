<?php
namespace carsharing;

class TariffStudent extends TariffBase
{
    const DRIVER_NOT_YOUNG = 'Возраст водителя не может быть более 25 лет!!!';
    public function __construct($kmNumber, $minNumber, $age, $addGps)
    {
        parent::__construct($kmNumber, $minNumber, $age, $addGps);
        $this->tariffName = 'Тариф студенческий';
        $this->pricePerTime = 1;
        $this->pricePerKm = 4;
        if ($this->age > 25) {
            $this->errors[] = TariffStudent::DRIVER_NOT_YOUNG;
        }
    }
}