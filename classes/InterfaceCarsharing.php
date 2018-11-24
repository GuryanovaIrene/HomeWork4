<?php
namespace carsharing;

interface InterfaceCarsharing
{
    public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
}