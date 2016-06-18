<?php
session_start();
include_once '../../models/modelCelular/celularModel.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['imei'] = '';
$param['serie'] = '';
$param['descripcion'] = '';
$param['cantidad'] = '';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['codigo'])) {
    $param['codigo'] = $_POST['codigo'];
}

if (isset($_POST['imei'])) {
    $param['imei'] = $_POST['imei'];
}

if (isset($_POST['serie'])) {
    $param['serie'] = $_POST['serie'];
}

if (isset($_POST['descripcion'])) {
    $param['descripcion'] = $_POST['descripcion'];
}

if (isset($_POST['cantidad'])) {
    $param['cantidad'] = $_POST['cantidad'];
}

$Celular = new CelularModel();
echo $Celular->gestionar($param);

