<?php

require_once "classes/InterfaceCarsharing.php";
require_once "classes/Carsharing.php";
require_once "classes/AddGps.php";
require_once "classes/AddDriver.php";
require_once "classes/TariffBase.php";
require_once "classes/TariffHourly.php";
require_once "classes/TariffDaily.php";
require_once "classes/TariffStudent.php";
require_once "classes/AddGps.php";
require_once "classes/AddDriver.php";

if ($_POST['addGps'] == 'on') {
    $addGps = 1;
} else {
    $addGps = 0;
}

if ($_POST['$addDriver'] == 'on') {
    $addDriver = 1;
} else {
    $addDriver = 0;
}

switch ($_POST['tariff']) {
    case 'TariffBase':
        $call = new \carsharing\TariffBase();
        $tariffName = 'Тариф базовый';
        break;
    case 'TariffHourly':
        $call = new \carsharing\TariffHourly($addGps, $addDriver);
        $call->addGps = $addGps;
        $call->addDriver = $addDriver;
        $tariffName = 'Тариф почасовой';
        break;
    case 'TariffDaily':
        $call = new \carsharing\tariffDaily($addGps, $addDriver);
        $call->addGps = $addGps;
        $call->addDriver = $addDriver;
        $tariffName = 'Тариф суточный';
        break;
    case 'TariffStudent':
        $call = new \carsharing\TariffStudent();
        $tariffName = 'Тариф студенческий';
        break;
}

$cost = $call->cost($_POST['kmNumber'],$_POST['minNumber'], $_POST['age']);
echo $tariffName . ' (' . $_POST['kmNumber'] . 'км, ';
echo $_POST['minNumber'] . ' мин., ' . $_POST['age'] . ' лет, без доп.услуг) = ';
echo $cost . ' руб.<br/><br/><br/>';
echo '<a href="index.html">Вернуться к выбору параметров</a>';
