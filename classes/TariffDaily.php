<?php
namespace carsharing;
use carsharing\AddGps;
use carsharing\AddDriver;

class TariffDaily extends TariffBase
{
    use AddGps;
    use AddDriver;

    public $addGps;
    public $addDriver;

    public function __construct($kmNumber, $minNumber, $age, $addGps, $addDriver)
    {
        parent::__construct($kmNumber, $minNumber, $age);
        $this->timeNumber = ceil(($this->minNumber - 30) / (60 * 24));
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
        return 'Тариф суточный (' . $this->kmNumber . ' км, ' . $this->minNumber . ' мин., ' .
            $this->age . ' лет, ' . $this->addNote() . ')';
    }

    function cost($pricePerKm = 1, $pricePerTime = 1000)
    {
        return parent::cost($pricePerKm, $pricePerTime);
    }
}