<?php
/*подключение к базе данных*/

$host = "sql4.freemysqlhosting.net"; // в 90% случаев это менять не надо

$password = "iKwBXCTZfz";

$username = "sql4479512";

$databasename = "sql4479512";


global $db;

setlocale(LC_ALL,"ru_RU.UTF8");


$db = new mysqli($host, $username, $password, $databasename, 3306);

if ($db->connect_errno) {

    echo "Не удалось подключиться к MySQL: (" . $db->connect_errno . ") " . $db->connect_error;

    exit;

}