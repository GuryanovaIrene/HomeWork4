<?php
require_once "classes/InterfaceCarsharing.php";
require_once "classes/Carsharing.php";
require_once "classes/TariffBase.php";
require_once "classes/TariffHourly.php";
require_once "classes/TariffDaily.php";
require_once "classes/TariffStudent.php";
switch ($_POST['tariff']) {
    case 'TariffBase':
        $call = new \carcharing\TariffBase();
        $tariffName = 'Тариф базовый';
        break;
    case 'TariffHourly':
        $call = new \carcharing\TariffHourly();
        $tariffName = 'Тариф почасовой';
        break;
    case 'TariffDaily':
        $call = new \carcharing\tariffDaily();
        $tariffName = 'Тариф суточный';
        break;
    case 'TariffStudent':
        $call = new \carcharing\TariffStudent();
        $tariffName = 'Тариф студенческий';
        break;
}

$cost = $call->cost($_POST['kmNumber'],$_POST['minNumber'], $_POST['age']);
echo $tariffName . ' (' . $_POST['kmNumber'] . 'км, ';
echo $_POST['minNumber'] . ' мин., ' . $_POST['age'] . ' лет, без доп.услуг) = ';
echo $cost . ' руб.<br/>';
echo '<a href="index.html">Вернуться к выбору параметров</a>';
