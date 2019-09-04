<?php

function indexAction($smarty){
    $smarty->assign('title', 'cottage-разное');
    $smarty->assign('str', 5);
    $smarty->assign('classLine', 'menu_small_line');
    $smarty->assign('leftLine', '787px');
//    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/varia.css">');
    $smarty->assign('script', '<script type="text/javascript" src="/js/varia.js"></script>');

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'varia');
    loadTemplate($smarty, 'footer');
}

function deviceAction($smarty){
    include_once '../models/variaModel.php';

    $temperatureArray = getAllTemperatureData();
    $ds2408Array = getAllDS2408Data();

    $smarty->assign('title', 'cottage-состояние оборудования 1ware');
    $smarty->assign('str', 0);
    $smarty->assign('leftLine', '-2000px');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/variaDevice.css">');
    $smarty->assign('script', '<script type="text/javascript" src="/js/variaDevice.js"></script>');


    $smarty->assign('temperatureArray', $temperatureArray);
    $smarty->assign('ds2408Array', $ds2408Array);

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'variaDevice');
    loadTemplate($smarty, 'footer');
}

function deviceTemperatureUpdateAction(){
    include_once '../models/variaModel.php';

    $temperatureArray = getTemperatureData();
    $json = json_encode($temperatureArray);
    echo $json;
    return TRUE;
}

function deviceDSUpdateAction(){
    include_once '../models/variaModel.php';

    $ds2408Array = getDS2408Data();
    $json = json_encode($ds2408Array);
    echo $json;
    return TRUE;
}