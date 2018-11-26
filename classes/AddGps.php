<?php

namespace carsharing;


trait AddGps
{
    public function cost($pricePerKm, $pricePerTime) {
        if ($this->addGps) {
            $hourNumber = ceil($this->minNumber / 60);
            return $cost + 15 * $hourNumber;
        }
        return $cost;
    }

}