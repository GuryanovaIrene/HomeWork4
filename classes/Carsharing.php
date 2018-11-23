<?php
namespace carcharing;
abstract class Carsharing implements InterfaceCarsharing
{
    public $age;
    public function ageAnalis($age) // Метод анализа возраста водителя
    {
        if (gettype($age) != 'integer') {
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

    abstract public function cost($kmNumber, $minNumber, $age, $pricePerKm, $pricePerTime);
}