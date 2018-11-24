<?php

namespace carsharing;


trait AddDriver
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime) {
        $cost = parent::cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
        if (parent::addDriver) {
            return $cost + 100;
        }
        return $cost;
    }

}