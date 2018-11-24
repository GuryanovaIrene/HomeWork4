<?php

namespace carsharing;


trait AddDriver
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime) {
        $cost = parent::cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
        if ($this->addDriver) {
            return $cost + 100;
        }
        return $cost;
    }

}