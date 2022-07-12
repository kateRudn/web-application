<?php
if(!defined('myConst')) {
   die('Доступ к странице запрещен!');
}

function connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlDatabase) {
    $mysqlConnect = mysqli_connect($mysqlHost, $mysqlUser, $mysqlPassword);
    if (!$mysqlConnect) {
        die ("База данных не доступна :(");
    }
    mysqli_select_db($mysqlConnect, $mysqlDatabase);
    mysqli_set_charset($mysqlConnect, 'utf8');
    return $mysqlConnect;
}

function query($mysqlConnect, $queryStr) {
    $resultStr = mysqli_query($mysqlConnect, $queryStr);
    if (mysqli_error($mysqlConnect)) {
        die ("При запросе что-то пошло не так :(");
    }
    return $resultStr;
}
    
function close($mysqlConnect) {
    if (!mysqli_close($mysqlConnect)) {
        die ("Что-то пошло не так :(");
    }
}