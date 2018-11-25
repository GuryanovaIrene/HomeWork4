<?php
namespace carsharing;
abstract class Carsharing implements InterfaceCarsharing
{
    abstract public function addNote();

    abstract public function cost($pricePerKm, $pricePerTime);
}