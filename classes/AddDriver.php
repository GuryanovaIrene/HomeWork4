<?php

namespace carsharing;


trait AddDriver
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime) {
        switch ($this->tariff) {
            case 'TariffHourly':
                $timeNumber = ceil($minNumber / 60);
                break;
            case 'TariffDaily':
                $timeNumber = ceil(($minNumber - 30) / (60 * 24));
                break;
        }
        $cost = parent::cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
        if ($this->addDriver) {
            return $cost + 100;
        }
        return $cost;
    }

}