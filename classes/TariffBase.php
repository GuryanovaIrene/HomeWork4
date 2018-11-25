<?php
namespace carsharing;

class TariffBase extends Carsharing
{
    protected $kmNumber;
    protected $minNumber;
    protected $age;
    protected $timeNumber;
    public $errors = [];

    public function ageAnalysis($age) // Метод анализа возраста водителя
    {
        if (gettype((int)$age) != 'integer') {
            return 'Введенный возраст водителя должен быть числом!!!';
        }
        if ($age < 18) {
            return 'Водитель не может быть младше 18 лет!!!';
        }
        if ($age > 65) {
            return 'Водитель не может быть старше 65 лет!!!';
        }
        return 'OK';
    }

    public function __construct($kmNumber, $minNumber, $age)
    {
        if (isset($kmNumber)) {
            $this->kmNumber = $kmNumber;
        } else {
            $this->errors[] = 'Вы не ввели количество километров';
        }

        if (isset($minNumber)) {
            $this->minNumber = $minNumber;
            $this->timeNumber = $minNumber;
        } else {
            $this->errors[] = 'Вы не ввели количество минут';
        }

        if (isset($age)) {
            $this->age = $age;
            $ageAnalysis = $this->ageAnalysis($age);
            if ($ageAnalysis != 'OK') {
                $this->errors[] = $ageAnalysis;
            }
        } else {
            $this->errors[] = 'Вы не ввели количество лет';
        }
    }

    public function ageRate()
    {
        if ($this->age >= 18 and $this->age <= 21) {
            return 1.1;
        }
        return $ageRate = 1;
    }

    public function addNote()
    {
        return 'без дополнительных услуг';
    }

    public function tariffDescribe()
    {
        return 'Тариф базовый (' . $this->kmNumber . ' км, ' . $this->minNumber . ' мин., ' .
                $this->age . ' лет, ' . $this->addNote() . ')';
    }

    public function cost($pricePerKm = 10, $pricePerTime = 3)
    {
        return ($pricePerKm * $this->kmNumber + $pricePerTime * $this->timeNumber) * $this->ageRate();
    }
}
