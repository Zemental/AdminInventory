<?php
session_start();
include_once '../../models/modelAccesorio/accesorioModel.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['tipo'] = '';
$param['codigoAccesorio'] = '';
$param['descripcion'] = '';
$param['cantidad'] = '';
$param['precio'] = '';
$param['estado'] = '';
$param['mostrar'] = '';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['codigo'])) {
    $param['codigo'] = $_POST['codigo'];
}

if (isset($_POST['tipo'])) {
    $param['tipo'] = $_POST['tipo'];
}

if (isset($_POST['codigoAccesorio'])) {
    $param['codigoAccesorio'] = $_POST['codigoAccesorio'];
}

if (isset($_POST['descripcion'])) {
    $param['descripcion'] = $_POST['descripcion'];
}

if (isset($_POST['cantidad'])) {
    $param['cantidad'] = $_POST['cantidad'];
}

if (isset($_POST['precio'])) {
    $param['precio'] = $_POST['precio'];
}

if (isset($_POST['estado'])) {
    $param['estado'] = $_POST['estado'];
}

if (isset($_POST['mostrar'])) {
    $param['mostrar'] = $_POST['mostrar'];
}

$Accesorio = new AccesorioModel();
echo $Accesorio->gestionar($param);

