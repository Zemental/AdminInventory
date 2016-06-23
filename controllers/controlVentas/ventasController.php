<?php
session_start();
include_once '../../models/modelVentas/ventasModel.php';

$param = array();
$param['param_opcion'] = '';  
$param['param_id'] = '';
$param['param_sucursal'] = '';
$param['param_tipodoc'] = '';
$param['param_numerodoc'] = '';
$param['param_total'] = '';
$param['param_productos'] = '';
$param['param_cantidad'] = '';
$param['param_precio'] = '';
$param['param_importe'] = '';
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

if (isset($_POST['param_fechaInicio'])) {
    $param['param_fechaInicio'] = $_POST['param_fechaInicio'];
}

if (isset($_POST['param_fechaFin'])) {
    $param['param_fechaFin'] = $_POST['param_fechaFin'];
}

if (isset($_POST['param_tipodoc'])) {
    $param['param_tipodoc'] = $_POST['param_tipodoc'];
}

if (isset($_POST['param_numerodoc'])) {
    $param['param_numerodoc'] = $_POST['param_numerodoc'];
}

if (isset($_POST['param_total'])) {
    $param['param_total'] = $_POST['param_total'];
}

if (isset($_POST['param_productos'])) {
    $param['param_productos'] = explode(",",$_POST['param_productos']);
}

if (isset($_POST['param_cantidad'])) {
    $param['param_cantidad'] = explode(",",$_POST['param_cantidad']);
}

if (isset($_POST['param_precio'])) {
    $param['param_precio'] = explode(",",$_POST['param_precio']);
}

if (isset($_POST['param_importe'])) {
    $param['param_importe'] = explode(",",$_POST['param_importe']);
}


$Ventas = new VentasModel();
echo $Ventas->gestionar($param);

