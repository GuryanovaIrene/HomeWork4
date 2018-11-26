<?php

namespace carsharing;


trait AddDriver
{
    public function cost($pricePerKm, $pricePerTime) {
        $cost = parent::cost($pricePerKm, $pricePerTime);
        if ($this->addDriver) {
            return $cost + 100;
        }
        return $cost;
    }

}