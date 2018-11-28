<?php
namespace carsharing;
abstract class Carsharing implements InterfaceCarsharing
{
    abstract public function ageAnalysis($age);
    abstract public function ageRate();
    abstract public function addNote();
    abstract public function tariffCharacteristics();
    abstract public function tariffDescribe($characteristics);
    abstract public function cost();
    abstract public function costWoOptions();
//    abstract public function optionsCost();
}