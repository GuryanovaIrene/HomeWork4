<?php

namespace carsharing;


trait AddGps
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime) {
        $cost = parent::cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
        if (parent::addGps) {
            $hourNumber = ceil($minNumber / 60);
            echo 'Дополнительная услуга GPS';
            return $cost + $hourNumber;
        }
        echo 'Дополнительных услуг нет';
        return $cost;
    }

}