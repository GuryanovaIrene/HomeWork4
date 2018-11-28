<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;

class TariffHourly extends TariffBase
{
    public $addDriver;

    public function __construct($kmNumber, $minNumber, $age, $addGps, $addDriver)
    {
        parent::__construct($kmNumber, $minNumber, $age, $addGps);

        $this->tariffName = 'Тариф почасовой';
        $this->pricePerTime = 200;
        $this->pricePerKm = 0;

        $this->timeNumber = ceil($this->minNumber / 60);

        if (isset($addDriver)) {
            if ($addDriver) {
                $this->options['Driver'] = 100;
            }
        }
    }
}