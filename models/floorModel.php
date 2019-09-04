<?php

// возвращает состояние сигнала из таблицы измеренных температур
function get_temperatur($id){
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