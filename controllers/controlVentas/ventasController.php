<?php
session_start();
include_once '../../models/modelVentas/ventasModel.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['imei'] = '';
$param['serie'] = '';
$param['marca'] = '';
$param['modelo'] = '';

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

if (isset($_POST['marca'])) {
    $param['marca'] = $_POST['marca'];
}

if (isset($_POST['modelo'])) {
    $param['modelo'] = $_POST['modelo'];
}

$Celular = new CelularModel();
echo $Celular->gestionar($param);

