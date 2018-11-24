<?php

require_once "classes/InterfaceCarsharing.php";
require_once "classes/Carsharing.php";
require_once "classes/AddGps.php";
require_once "classes/AddDriver.php";
require_once "classes/TariffBase.php";
require_once "classes/TariffHourly.php";
require_once "classes/TariffDaily.php";
require_once "classes/TariffStudent.php";

if ($_POST['addGps'] == 'on') {
    $addGps = 1;
} else {
    $addGps = 0;
}

if ($_POST['addDriver'] == 'on') {
    $addDriver = 1;
} else {
    $addDriver = 0;
}

switch ($_POST['tariff']) {
    case 'TariffBase':
        $call = new \carsharing\TariffBase();
        $ageComment = $call->ageAnalis($_POST['age']);
        if ($ageComment != 'Возраст водителя соответствует требованиям') {
            echo $ageComment . '<br/><br/><a href="index.html">Вернуться к выбору параметров</a>';
            die();
        }
        $tariffName = 'Тариф базовый';
        $addNote = $call->addNote('TariffBase', $addGps, $addDriver);
        break;
    case 'TariffHourly':
        $call = new \carsharing\TariffHourly($addGps, $addDriver);
        $ageComment = $call->ageAnalis($_POST['age']);
        if ($ageComment != 'Возраст водителя соответствует требованиям') {
            echo $ageComment . '<br/><br/><a href="index.html">Вернуться к выбору параметров</a>';
            die();
        }
        $call->addGps = $addGps;
        $call->addDriver = $addDriver;
        $tariffName = 'Тариф почасовой';
        $addNote = $call->addNote('TariffHourly', $addGps, $addDriver);
        break;
    case 'TariffDaily':
        $call = new \carsharing\tariffDaily($addGps, $addDriver);
        $call->addGps = $addGps;
        $call->addDriver = $addDriver;
        $ageComment = $call->ageAnalis($_POST['age']);
        if ($ageComment != 'Возраст водителя соответствует требованиям') {
            echo $ageComment . '<br/><br/><a href="index.html">Вернуться к выбору параметров</a>';
            die();
        }
        $tariffName = 'Тариф суточный';
        $addNote = $call->addNote('TariffDaily', $addGps, $addDriver);
        break;
    case 'TariffStudent':
        $call = new \carsharing\TariffStudent();
        $ageComment = $call->ageAnalis($_POST['age']);
        if ($ageComment != 'Возраст водителя соответствует требованиям') {
            echo $ageComment . '<br/><br/><a href="index.html">Вернуться к выбору параметров</a>';
            die();
        }
        if ($_POST['age'] > 25) {
            echo 'Возраст водителя для тарифа "Студенческий не должен превышать 25 лет!!!"<br/><br/>';
            echo '<a href="index.html">Вернуться к выбору параметров</a>';
            die();
        }

        $tariffName = 'Тариф студенческий';
        $addNote = $call->addNote('TariffStudent', $addGps, $addDriver);
        break;
}

$cost = $call->cost($_POST['kmNumber'],$_POST['minNumber'], $_POST['age']);
echo $tariffName . ' (' . $_POST['kmNumber'] . ' км, ';
echo $_POST['minNumber'] . ' мин., ' . $_POST['age'] . ' лет, ' . $addNote . ') = ';
echo $cost . ' руб.<br/><br/><br/>';
echo '<a href="index.html">Вернуться к выбору параметров</a>';
