<?php
namespace carsharing;
abstract class Carsharing implements InterfaceCarsharing
{
    public function ageAnalis($age) // Метод анализа возраста водителя
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
        return 'Возраст водителя соответствует требованиям';
    }

    public function addNote($tariff, $addGps, $addDriver)
    {
        switch ($tariff) {
            case 'TariffBase':
            case 'TariffStudent':
                return 'без дополнительных услуг';
            case 'TariffHourly':
            case 'TariffDaily':
                $addNote = '';
                if ($addGps) {
                    $addNote .= 'GPS в салон; ';
                }
                if ($addDriver) {
                    $addNote .= 'дополнительный водитель; ';
                }
                if ($addNote != '') {
                    $addNote = 'дополнительные услуги: ' . substr($addNote, 0, strlen($addNote) - 2);
                } else {
                    $addNote = 'без дополнительных услуг';
                }
                return $addNote;
        }
    }

    abstract public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
}