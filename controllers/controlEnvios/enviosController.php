<?php
session_start();
include_once '../../models/modelEnvios/enviosModel.php';

$param = array();
$param['param_opcion'] = '';  
$param['param_id'] = '';
$param['param_sucursal'] = '';
$param['param_total'] = '';
$param['param_productos'] = '';
$param['param_cantidad'] = '';
$param['param_fechaInicio'] = '';
$param['param_fechaFin'] = '';

if (isset($_POST['param_opcion'])) {
    $param['param_opcion'] = $_POST['param_opcion'];
}

if (isset($_POST['param_id'])) {
    $param['param_id'] = $_POST['param_id'];
}


if (isset($_POST['param_sucursal'])) {
    $param['param_sucursal'] = $_POST['param_sucursal'];
}

if (isset($_POST['param_total'])) {
    $param['param_total'] = $_POST['param_total'];
}

if (isset($_POST['param_fechaInicio'])) {
    $param['param_fechaInicio'] = $_POST['param_fechaInicio'];
}

if (isset($_POST['param_fechaFin'])) {
    $param['param_fechaFin'] = $_POST['param_fechaFin'];
}

if (isset($_POST['param_productos'])) {
    $param['param_productos'] = explode(",",$_POST['param_productos']);
}

if (isset($_POST['param_cantidad'])) {
    $param['param_cantidad'] = explode(",",$_POST['param_cantidad']);
}


$Envios = new EnviosModel();
echo $Envios->gestionar($param);

