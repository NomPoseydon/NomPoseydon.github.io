<?php
$server = 'ec2-54-228-218-84.eu-west-1.compute.amazonaws.com'; // Имя или адрес сервера
$user = 'pfqaukrpwxfxsu'; // Имя пользователя БД
$password = 'b47a2752d7155f53a3755fd0d1a3b1ecbf093430caf4c26622d666f11579b31a'; // Пароль пользователя
$db = 'de79gv4fpuu8oh'; // Название БД
 
$db = mysqli_connect($server, $user, $password, $db); // Подключение
 
// Проверка на подключение
if (!$db) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    echo "Не удается подключиться к серверу базы данных!"; 
    exit;
}