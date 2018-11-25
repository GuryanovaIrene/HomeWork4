<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;

class TariffHourly extends TariffBase
{
    use AddGps;
    use AddDriver;

    public $addGps;
    public $addDriver;

    public function __construct($kmNumber, $minNumber, $age, $addGps, $addDriver)
    {
        parent::__construct($kmNumber, $minNumber, $age);
        $this->timeNumber = ceil($this->minNumber / 60);
        $this->addGps = $addGps;
        $this->addDriver = $addDriver;
    }

    public function addNote()
    {
        $addNote = '';
        if ($this->addGps) {
            $addNote .= 'GPS в салон; ';
        }
        if ($this->addDriver) {
            $addNote .= 'дополнительный водитель; ';
        }
        if ($addNote != '') {
            $addNote = 'дополнительные услуги: ' . substr($addNote, 0, strlen($addNote) - 2);
        } else {
            $addNote = 'без дополнительных услуг';
        }
        return $addNote;
    }

    public function tariffDescribe()
    {
        return 'Тариф почасовой (' . $this->kmNumber . ' км, ' . $this->minNumber . ' мин., ' .
            $this->age . ' лет, ' . $this->addNote() . ')';
    }

    public function cost($pricePerKm = 0, $pricePerHour = 200)
    {
        return parent::cost($pricePerKm, $pricePerHour);
    }
}