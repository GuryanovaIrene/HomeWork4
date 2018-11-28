<?php
namespace carsharing;

interface InterfaceCarsharing
{
    public function ageAnalysis($age);
    public function ageRate();

    public function addNote();
    public function tariffCharacteristics();
    public function tariffDescribe($characteristics);

    public function cost();
    public function costWoOptions();
    public function optionsCost();
}