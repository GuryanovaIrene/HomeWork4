<?php
namespace carsharing;

class TariffBase extends Carsharing
{
    const WO_ADD_OPTIONS = 'Без дополнительных услуг';
    const GPS = 'GPS в салон';
    const AGE_NOT_NUMBER = 'Введенный возраст водителя должен быть числом!!!';
    const AGE_LESS_18 = 'Водитель не может быть младше 18 лет!!!';
    const AGE_MORE_65 = 'Водитель не может быть старше 65 лет!!!';
    const ABSENT_KM_NUMBER = 'Вы не ввели количество километров';
    const ABSENT_MIN_NUMBER = 'Вы не ввели количество минут';
    const ABSENT_AGE = 'Вы не ввели количество лет';
    const OK = 'OK';

    protected $kmNumber;
    protected $minNumber;
    protected $age;
    protected $timeNumber;
    protected $tariffName;
    protected $pricePerKm = 10;
    protected $pricePerTime = 3;
    protected $options = [];
    public $errors = [];

    public function ageAnalysis($age) // Метод анализа возраста водителя
    {
        if (gettype((int)$age) != 'integer') {
            return TariffBase::AGE_NOT_NUMBER;
        }
        if ($age < 18) {
            return TariffBase::AGE_LESS_18;
        }
        if ($age > 65) {
            return TariffBase::AGE_MORE_65;
        }
        return 'OK';
    }

    public function __construct($kmNumber, $minNumber, $age, $addGps)
    {
        $this->tariffName = 'Тариф базовый';

        if (isset($kmNumber)) {
            $this->kmNumber = $kmNumber;
        } else {
            $this->errors[] = TariffBase::ABSENT_KM_NUMBER;
        }

        if (isset($minNumber)) {
            $this->minNumber = $minNumber;
            $this->timeNumber = $minNumber;
        } else {
            $this->errors[] = TariffBase::ABSENT_MIN_NUMBER;
        }

        if (isset($age)) {
            $this->age = $age;
            $ageAnalysis = $this->ageAnalysis($age);
            if ($ageAnalysis != TariffBase::OK) {
                $this->errors[] = $ageAnalysis;
            }
        } else {
            $this->errors[] = TariffBase::ABSENT_AGE;
        }

        if (isset($addGps)) {
            if ($addGps) {
                $hourCount = ceil($minNumber / 60);
                $this->options['GPS в салон'] = 15 * $hourCount;
            }
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
        if (empty($this->options)) {
            return TariffBase::WO_ADD_OPTIONS;
        }
        $str = '';
        foreach ($this->options as $key => $option) {
            $str .= $key . ', ';
        }
        return substr($str, 0, strlen($str) - 2);
    }

    public function tariffCharacteristics()
    {
        return [
            'Наименование тарифа' => $this->tariffName,
            'Расстояние, км' => $this->kmNumber,
            'Время, мин.' => $this->minNumber,
            'Возраст водителя, лет' => $this->age,
            'Дополнительные услуги' => $this->addNote(),
            'Стоимость без дополнительных услуг, руб.' => $this->costWoOptions(),
            'Стоимость дополнительных услуг, руб.' => $this->optionsCost(),
            'Общая стоимость, руб.' => $this->cost()
        ];
    }

    public function tariffDescribe($characteristics) {
        echo '
<table>
    <thead>
        <th>Характеристика</th>
        <th>Значение</th>
    </thead>
    <tbody>';
        foreach ($characteristics as $key => $value) {
            echo '<tr><td>' .$key . '</td><td>' . $value . '</td></tr>';
        }
        echo '
    </tbody>
</table>';
    }

    public function cost()
    {
        return $this->costWoOptions() + $this->optionsCost();
    }

    public function costWoOptions()
    {
        return ($this->pricePerKm * $this->kmNumber + $this->pricePerTime * $this->timeNumber) * $this->ageRate();
    }

    public function optionsCost()
    {
        if (empty($this->options)) {
            return 0;
        }

        $cost = 0;

        foreach ($this->options as $option) {
            $cost += $option;
        }
        return $cost;
    }
}
