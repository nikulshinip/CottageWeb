<?php
//функция очистки строки полученной через запрос
function clearStr($str){
    return quotemeta(strtolower(trim(strip_tags($str))));
}
function clearStrMail($str, $length=100){
    return htmlentities(trim(strip_tags(substr($str, 0, $length))));
}

//функция debug
function d($value=NULL, $die=1){
    echo 'DEBUG:<br><pre>';
    print_r($value);
    echo '</pre>';
    if($die)
        die();
}

//формирование главной страницы
function loadPage($smarty, $controllerName, $actionName='index'){
    include_once CONTROLLER_PATH_PREFIX.$controllerName.CONTROLLER_PATH_POSTFIX;
    $function=$actionName.'Action';
    $function($smarty);
}

//Загрузка шаблона
function loadTemplate($smarty, $templateName){
    $smarty->display($templateName.TEMPLATE_PATH_POSTFIX);
}

//сообщение об ошибке
function error($code){
    $location='location: http://'.$_SERVER['SERVER_NAME'].'/error/'.$code.'/';
    header($location); return TRUE;
}