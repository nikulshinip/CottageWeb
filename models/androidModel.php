<?php
include_once '../config/bd.php';

//возвращает готовый к отправке масив температур
function getFullTemperature(){
    global $db;
    $sql="SELECT `id`, `temperatur`, `title`
            FROM `temperatur`
                ORDER BY `id` DESC";
    $stmt=mysqli_prepare($db, $sql) or die(exit());
    mysqli_stmt_execute($stmt) or die(exit());
    mysqli_stmt_bind_result($stmt, $id, $temperatur, $title);
    $arr = array();
    while (mysqli_stmt_fetch($stmt)){
        $arr[$id]=array('temperatur'=>round($temperatur, 1), 'title'=>$title);
    }
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $arr;
}

//возврашает массив полной информации о датчиках температуры
function getAllTemperatureData(){
    global $db;
    $sql="SELECT `id`, `address`, `temperatur`, `title`
            FROM `temperatur`
                ORDER BY `id` DESC";
    $stmt=  mysqli_prepare($db, $sql) or die(exit());
    mysqli_execute($stmt) or die(exit());
    mysqli_stmt_bind_result($stmt, $id, $address, $temperatur, $title);
    $arr = array();
    while (mysqli_stmt_fetch($stmt)){
        $arr[$id]=array('address'=>$address, 'temperatur'=>round($temperatur, 1), 'title'=>$title);
    }
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $arr;
}

//возврашает массив полной информации о устройсвах на базе ds2408
function getAllDS2408Data(){
    global $db;
    $sql="SELECT `id`, `address`, `title`, `connect`, `din1`, `din2`, `din3`, `din4`, `dout1`, `dout2`, `dout3`
            FROM `ds2408`
                ORDER BY `id` DESC";
    $stmt=  mysqli_prepare($db, $sql) or die(exit());
    mysqli_execute($stmt) or die(exit());
    mysqli_stmt_bind_result($stmt, $id, $address, $title, $connect, $din1, $din2, $din3, $din4, $dout1, $dout2, $dout3);
    $arr = array();
    while (mysqli_stmt_fetch($stmt)){
        $arr[$id]=array('address'=>$address,
                        'title'=>$title,
                        'connect'=>$connect,
                        'din1'=>$din1,
                        'din2'=>$din2,
                        'din3'=>$din3,
                        'din4'=>$din4,
                        'dout1'=>$dout1,
                        'dout2'=>$dout2,
                        'dout3'=>$dout3);
    }
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $arr;
}