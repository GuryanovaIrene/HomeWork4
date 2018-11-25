<?php

require_once "classes/InterfaceCarsharing.php";
require_once "classes/Carsharing.php";
require_once "classes/AddGps.php";
require_once "classes/AddDriver.php";
require_once "classes/TariffBase.php";
require_once "classes/TariffHourly.php";
require_once "classes/TariffDaily.php";
require_once "classes/TariffStudent.php";

if (isset($_POST['addGps'])) {
    $addGps = 1;
} else {
    $addGps = 0;
}

if (isset($_POST['addDriver'])) {
    $addDriver = 1;
} else {
    $addDriver = 0;
}

switch ($_POST['tariff']) {
    case 'TariffBase':
        $call = new \carsharing\TariffBase($_POST['kmNumber'], $_POST['minNumber'], $_POST['age']);
        break;
    case 'TariffHourly':
        $call = new \carsharing\TariffHourly($_POST['kmNumber'], $_POST['minNumber'], $_POST['age'], $addGps, $addDriver);
        break;
    case 'TariffDaily':
        $call = new \carsharing\tariffDaily($_POST['kmNumber'], $_POST['minNumber'], $_POST['age'], $addGps, $addDriver);
        break;
    case 'TariffStudent':
        $call = new \carsharing\TariffStudent($_POST['kmNumber'], $_POST['minNumber'], $_POST['age']);
        break;
}
$errors = $call->errors;
if (count($errors) == 0) {
    $cost = $call->cost();
    echo $call->tariffDescribe() . ' = ' . $cost . ' руб.';
} else {
    foreach ($errors as $value) {
        echo $value . '<br/>';
    }
}
echo '<br/><br/><br/><a href="index.html">Вернуться к выбору параметров</a>';
