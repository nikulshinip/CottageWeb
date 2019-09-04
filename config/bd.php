<?php
$dbAdres='localhost';
$dbName='cottage';
$dbUser='youDbUser';
$dbPass='youDbPassword';

//конектимся
global $db;
$db=mysqli_connect($dbAdres, $dbUser, $dbPass, $dbName) or die(error(101));
//устанавливаем кодировку
mysqli_set_charset($db, 'utf8');
