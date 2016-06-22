<?php
session_start();
include_once '../../models/modelProtector/protectorModel.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['tipo'] = '';
$param['modeloCelular'] = '';
$param['cantidad'] = '';
$param['estado'] = '';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['codigo'])) {
    $param['codigo'] = $_POST['codigo'];
}

if (isset($_POST['tipo'])) {
    $param['tipo'] = $_POST['tipo'];
}

if (isset($_POST['modeloCelular'])) {
    $param['modeloCelular'] = $_POST['modeloCelular'];
}

if (isset($_POST['cantidad'])) {
    $param['cantidad'] = $_POST['cantidad'];
}

if (isset($_POST['estado'])) {
    $param['estado'] = $_POST['estado'];
}

$Protector = new ProtectorModel();
echo $Protector->gestionar($param);

