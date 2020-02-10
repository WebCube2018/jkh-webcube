<?php

require_once "config.php";

function xssSecurity($var)
{
    return htmlspecialchars($var);
}

function email(array $mes)
{
    $to  = MAIL_TO;
    $subject = SUBJECT;

    $message =  "<p>" . $mes["name"] . "</p> </br> <b> " . $mes["city"]
        ."</b> </br><i> ". $mes["management"] . " </i> </br>";

    $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
    $headers .= "From: От кого письмо <site@jkh-volga.ru>\r\n";
    $headers .= "Reply-To: reply-to@example.com\r\n";
    
    #---------------------------НАЧАЛО ОТЛАДКА---------------------------#
    echo "<pre>";
    print_r($message);
    echo "</pre>";
    #---------------------------КОНЕЦ ОТЛАДКА----------------------------#

    return mail($to, $subject, $message, $headers);
}
