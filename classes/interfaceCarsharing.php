<?php
namespace carcharing;

interface InterfaceCarsharing
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime, $ageRate);
}