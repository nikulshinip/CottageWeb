<?php
include_once '../config/bd.php';
include_once '../models/floorModel.php';

function getTemperatur($id){
    return round(get_temperatur($id), 1);
}