<?php
// возвращает состояние сигнала из таблицы дополнительных настроек
function getBoiler_addOptions($id){
    global $db;
    $sql='SELECT `state` FROM `kotel_addOptions` WHERE `id`=? LIMIT 0, 1';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_bind_result($stmt, $sqlState);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $sqlState;
}
// возвращает состояние сигнала из таблицы входных сигналов
function getBoiler_din($id){
    global $db;
    $sql='SELECT `state` FROM `kotel_din` WHERE `din`=? LIMIT 0, 1';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_bind_result($stmt, $sqlState);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $sqlState;
}
// возвращает состояние сигнала из таблицы выходных сигналов
function getBoiler_dout($id){
    global $db;
    $sql='SELECT `state` FROM `kotel_dout` WHERE `dout`=? LIMIT 0, 1';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_bind_result($stmt, $sqlState);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $sqlState;
}
// возвращает состояние сигнала из таблицы измеренных температур
function getBoiler_temperatur($id){
    global $db;
    $sql='SELECT `temperatur` FROM `temperatur` WHERE `id`=? LIMIT 0, 1';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_bind_result($stmt, $sqlState);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $sqlState;
}
// изменяет состояние сигнала в таблице дополнительных параметров
function setBoiler_addOptions($id, $state){
    global $db;
    $sql='UPDATE `kotel_addOptions` SET `state`=? WHERE `id`=?';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $state = mysqli_real_escape_string($db, $state);
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'ii', $state, $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}
// изменяет состояние сигнала в таблице выходных сигналов
function setBoiler_dout($id, $state){
    global $db;
    $sql='UPDATE `kotel_dout` SET `state`=? WHERE `dout`=?';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $state = mysqli_real_escape_string($db, $state);
    $id = mysqli_real_escape_string($db, $id);
    mysqli_stmt_bind_param($stmt, 'ii', $state, $id);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}
//------------------------------------------------------------------------------
//timeout
function getBoilerTimeout(){
    global $db;
    $sql='SELECT `id`, `from`, `before`, `title` FROM `kotel_timeout` ORDER BY `id` ASC';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_bind_result($stmt, $id, $from, $before, $title);
    $arr = array();
    while (mysqli_stmt_fetch($stmt)){
        $arr[$id]=array('from'=>$from, 'before'=>$before, 'title'=>$title);
    }
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return $arr;
}
function insertBoilerTimeout($arr){     //$arr = array('from'=>'x', 'before'=>'y', 'title'='z')
    global $db;
    $sql='INSERT INTO `kotel_timeout`(`from`, `before`, `title`) VALUES (?, ?, ?)';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $arr['from']=mysqli_real_escape_string($db, $arr['from']);
    $arr['before']=mysqli_real_escape_string($db, $arr['before']);
    $arr['title']=mysqli_real_escape_string($db, $arr['title']);
    mysqli_stmt_bind_param($stmt, 'sss', $arr['from'], $arr['before'], $arr['title']);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}
function deleteBoilerTimeout($id){
    global $db;
    $sql='DELETE FROM `kotel_timeout` WHERE `id`=?';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    mysqli_stmt_bind_param($stmt, 'i', $id) or die(error(104));
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}
function updateBoilerTimeout($arr){     //$arr = array('id'=>'a', 'from'=>'x', 'before'=>'y', 'title'='z')
    global $db;
    $sql='UPDATE `kotel_timeout` SET `from`=?,`before`=?,`title`=? WHERE `id`=?';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $arr['id']=mysqli_real_escape_string($db, $arr['id']);
    $arr['from']=mysqli_real_escape_string($db, $arr['from']);
    $arr['before']=mysqli_real_escape_string($db, $arr['before']);
    $arr['title']=mysqli_real_escape_string($db, $arr['title']);
    mysqli_stmt_bind_param($stmt, 'sssi', $arr['from'], $arr['before'], $arr['title'], $arr['id']);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}
//------------------------------------------------------------------------------
//log
//Возврашает кол-во строк в таблице
function getLogSize(){
  global $db;
  $sql='SELECT `id` FROM `kotel_log`';
  $rs=mysqli_query($db, $sql);
  return mysqli_num_rows($rs);
}
//Возврашает массив строк с указанным лимитом
function getLogLimit($s, $for){
  global $db;
  $sql="SELECT `type`, `date`, `message`, `title`
          FROM `kotel_log`
              ORDER BY `id` DESC
                  LIMIT ?, ?";
  $stmt=mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, 'ii', $s, $for);
  mysqli_execute($stmt);
  $result=array();
  mysqli_stmt_bind_result($stmt, $type, $date, $message, $title);
  while(mysqli_stmt_fetch($stmt)){  
    $result[]=array('type'=>$type, 'date'=>$date, 'message'=>$message, 'title'=>$title);
  }
  mysqli_stmt_close($stmt);
  return $result;
}
function insertLog($message){
    global $db;
    $sql='INSERT INTO `kotel_log` (`type`, `date`, `message`, `title`) VALUES (?, ?, ?, ?)';
    $stmt=mysqli_prepare($db, $sql) or die(error(102));
    $type='INFO';
    $date=date('Y-m-d H:i:s', time());
    $message=mysqli_real_escape_string($db, $message);
    $title='событие сайта';
    mysqli_stmt_bind_param($stmt, 'ssss', $type, $date, $message, $title);
    mysqli_stmt_execute($stmt) or die(error(103));
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    return TRUE;
}