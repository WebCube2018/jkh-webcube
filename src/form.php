<?php

require_once "function.php";

$polTime = $_GET["pas"];
$getSecurity = md5($polTime . "ivan");
$polSecurity = $_POST["security"];


if ($getSecurity == $polSecurity) {
    $name = xssSecurity($_POST["name"]);
    $city = xssSecurity($_POST["city"]);
    $formManagement = xssSecurity($_POST["castom-select"]);

    switch ($formManagement) {
        case 1:
            $valueManagement = "УК";
            break;
        case 2:
            $valueManagement = "ТСЖ";
            break;
        case 3:
            $valueManagement = "РСО";
            break;
        default:
            $valueManagement = "Значение не выбрано";
    }
    
    $message = [
        "name" => $name,
        "city" => $city,
        "management" => $valueManagement,
    ];

    if (email($message)) {
        echo "заявку отправлена вернуться <a href='/'>на главную</a>";
    } else {
        echo "заявка <b>не отправлена</b> вернуться <a href='/'>на главную</a>";
    }

} else {
    echo "Не нужно здесь спамить от Вас поступил спам";
}
