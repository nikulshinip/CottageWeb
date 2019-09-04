<?php

function indexAction(){
    return FALSE;
}

//проверка соединения
function checkconnectAction(){
    $json = array('connect'=>'ok');
    $json = json_encode($json);
    echo $json;
    return TRUE;
}

//взять все температуры
function getTemperatureAction(){
    include_once '../models/androidModel.php';
    $temperatureArray = getFullTemperature();
    $json = json_encode($temperatureArray, JSON_UNESCAPED_UNICODE);
    echo $json;
    return TRUE;
}

//взять информацию об оборудовании 1ware
function getOneWareDataAction(){
    include_once '../models/androidModel.php';
    $fullArray = array('temperature'=>getAllTemperatureData(),
                       'ds2408'=>  getAllDS2408Data());
    $json = json_encode($fullArray, JSON_UNESCAPED_UNICODE);
    echo $json;
    return TRUE;
}