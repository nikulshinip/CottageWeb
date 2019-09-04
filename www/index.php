<?php
include_once '../config/config.php';
include_once '../library/generalFunction.php';

//Определяем рабочий controller
$controllerName=isset($_GET['controller']) ? clearStr($_GET['controller']) : 'index';

//определяем рабочую функцию
$actionName=isset($_GET['action']) ? clearStr($_GET['action']) : 'index';

loadPage($smarty, $controllerName, $actionName);