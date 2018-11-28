<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;
class TariffDaily extends TariffBase
{
    public $addDriver;
    public function __construct($kmNumber, $minNumber, $age, $addGps, $addDriver)
    {
        parent::__construct($kmNumber, $minNumber, $age, $addGps);
        $this->tariffName = 'Тариф суточный';
        $this->pricePerTime = 1000;
        $this->pricePerKm = 1;
        $this->timeNumber = ceil($this->minNumber / (24 * 60));
        if (isset($addDriver)) {
            if ($addDriver) {
                $this->options['Дополнительный водитель'] = 100;
            }
        }
    }
}