<?php

define('myConst', TRUE);

require $_SERVER[DOCUMENT_ROOT]."/cfg/info-db.php";
require_once $_SERVER[DOCUMENT_ROOT]."/cfg/utils.php";

$regexStr = "^[a-zA-Zа-яА-Я]+([\s-]?[a-zA-Zа-яА-Я]+)*$^";

$mysqlConnect = connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlDatabase);

if (isset($_GET)) { 
    $cityName = null;
}
if (isset($_POST['city'])) {
    $cityName = $_POST['city'];
    if (!preg_match($regexStr, $cityName)) {
        die ("Выполнен некорректный запрос");
        exit();
    }
}

if ($cityName == null) {
    $citiesList = query($mysqlConnect, "SELECT * FROM cities");
}
else if ($cityName != null) {
    query($mysqlConnect, "INSERT INTO `cities`(`city_name`) VALUES ('$cityName')");
}

close($mysqlConnect);