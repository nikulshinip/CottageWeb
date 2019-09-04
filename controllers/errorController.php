<?php
function indexAction($smarty){
    $errorCode=isset($_GET['code']) ? clearStr($_GET['code']) : '000';
    
    switch ($errorCode){
      //MySQL error
        case 101 : $message='Ошибка соединения с базой данных!!!'; break;
        case 102 : $message='Ошибка подготовки запроса к базе данных!!!'; break;
        case 103 : $message='Ошибка выполнения запроса!!!'; break;
        case 104 : $message='Ошибка операции!!!'; break;
      //------------------------------------------------------------------------
        case 201 : $message='Ошибка применения настроек на сервере!!!'; break;
        case 202 : $message='Ошибка автоматического формирования переменных!!!'; break;
        
        default : $message='Возникла неизвестная ошибка!!!';
    }
    
    $smarty->assign('title', 'cottage-ERROR');
    $smarty->assign('message', $message);
    
    loadTemplate($smarty, 'head');    
    loadTemplate($smarty, 'error');
    loadTemplate($smarty, 'footer');
}