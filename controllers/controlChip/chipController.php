<?php
session_start();
include_once '../../models/modelChip/chipModel.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['icc'] = '';
$param['numero'] = '';
$param['operadora'] = '';
$param['precio'] = '';
$param['estado'] = '';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['codigo'])) {
    $param['codigo'] = $_POST['codigo'];
}

if (isset($_POST['icc'])) {
    $param['icc'] = $_POST['icc'];
}

if (isset($_POST['numero'])) {
    $param['numero'] = $_POST['numero'];
}

if (isset($_POST['operadora'])) {
    $param['operadora'] = $_POST['operadora'];
}

if (isset($_POST['precio'])) {
    $param['precio'] = $_POST['precio'];
}

if (isset($_POST['estado'])) {
    $param['estado'] = $_POST['estado'];
}

$Chip = new ChipModel();
echo $Chip->gestionar($param);

