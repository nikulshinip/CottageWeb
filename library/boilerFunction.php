<?php
include_once '../config/bd.php';
include_once '../models/boilerModel.php';

function getAddOptions($id){
    return getBoiler_addOptions($id);
}
function getDin($id){
    return getBoiler_din($id);
}
function getPower_dout(){
    $state = 0;
    for ($i=3; $i<=8; $i++){
        if (getBoiler_dout($i)){
            $state++;
        }
    }
    return $state*2.5;
}
function getTemperatur($id){
    return round(getBoiler_temperatur($id), 1);
}
function setAddOptions($id, $state){
    return setBoiler_addOptions($id, $state);
}
function setDout($id, $state){
    return setBoiler_dout($id, $state);
}
function setPower($kv){
    $rang = $kv/2.5;
    for($i=3; $i<=8; $i++){
        if($rang>0){
            setBoiler_dout($i, 1);
        } else {
            setBoiler_dout($i, 0);
        }
        $rang--;
    }
    return TRUE;
}
function clearInputSetting($str){
    if(empty($str) || $str==''){
        return FALSE;
    } else {
        return intval($str);
    }
}
function clearInputDout($str){
    if(empty($str)){
        return FALSE;
    } elseif(!($str==1 || $str==0)){
        return FALSE;
    } else {
        return intval($str);
    }
}
function clearInputPower($str){
    if(empty($str) || $str==''){
        return FALSE;
    } else {
        return floatval($str);
    }
}
//------------------------------------------------------------------------------
//timeout
function getTimeout(){
    $arr = getBoilerTimeout();
    foreach ($arr as &$val){
        foreach ($val as $key => &$value){
            if($key=='from' || $key=='before'){
                $value = substr($value, 0, -3);
            }
        }
//        unset($value);
    }
//    unset($val);
    return $arr;
}
function insertTimeout($arr){       //$arr = array('from'=>'x', 'before'=>'y', 'title'='z')
    foreach ($arr as $key => &$value){
        if($key=='from' || $key=='before'){
            if(preg_match('^[0-9]{2}:[0-9]{2}$', $value)){
                $value = $value.':00';
            }
        }
    }
    return insertBoilerTimeout($arr);
}
function delTimeout($id){
    return deleteBoilerTimeout($id);
}
function editTimeout($arr){         //$arr = array('id'=>'a', 'from'=>'x', 'before'=>'y', 'title'='z')
    foreach ($arr as $key => &$value){
        if($key=='from' || $key=='before'){
            if(preg_match('^[0-9]{2}:[0-9]{2}$', $value)){
                $value = $value.':00';
            }
        }
    }
    return updateBoilerTimeout($arr);
}

function testTime($time){
    $str1='/^[0-2][0-9]:[0-5][0-9]$/';
    $str2='/^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/';
    $str3='/^[0-2][0-9][0-5][0-9]$/';

    if(preg_match($str3, $time)){
        $time = substr($time, 0, 2).':'.substr($time, 2);
    }
    if(!(preg_match($str1, $time) || preg_match($str2, $time))){
        return FALSE;
    }
    $ch1=(int)substr($time, 0, 1);
    $ch2=(int)substr($time, 1, 1);
    if($ch2>3 and $ch1>=2){
        return FALSE;
    }
    return $time;
}

//------------------------------------------------------------------------------
//log
function addLog($message){
    return insertLog($message);
}