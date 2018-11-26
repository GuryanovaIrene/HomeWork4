<?php

require_once "classes/InterfaceCarsharing.php";
require_once "classes/Carsharing.php";
require_once "classes/AddGps.php";
require_once "classes/AddDriver.php";
require_once "classes/TariffBase.php";
require_once "classes/TariffHourly.php";
require_once "classes/TariffDaily.php";
require_once "classes/TariffStudent.php";

$tariffs = [];

$tariffs[] = new \carsharing\TariffBase(15, 50, 48);
$tariffs[] = new \carsharing\TariffHourly(15, 50, 48, true, true);
$tariffs[] = new \carsharing\tariffDaily(15, 50, 48, true, true);
$tariffs[] = new \carsharing\TariffStudent(15, 50, 48);
foreach ($tariffs as $call) {
    $errors = $call->errors;
    if (count($errors) == 0) {
        $cost = $call->cost();
        echo $call->tariffDescribe() . ' = ' . $cost . ' руб.';
    } else {
        foreach ($errors as $value) {
            echo $value . '<br/>';
        }
    }
}


