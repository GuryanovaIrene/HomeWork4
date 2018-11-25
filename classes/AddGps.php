<?php

namespace carsharing;


trait AddGps
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
        $cost = parent::cost($kmNumber, $timeNumber, $age, $pricePerKm, $pricePerTime);
        if ($this->addGps) {
            $hourNumber = ceil($minNumber / 60);
            return $cost + $hourNumber;
        }
        return $cost;
    }

}