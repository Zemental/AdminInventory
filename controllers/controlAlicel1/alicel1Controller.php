<?php
session_start();
include_once '../../models/modelAlicel1/alicel1Model.php';

$param = array();
$param['opcion'] = '';
$param['codigo'] = '';
$param['estado'] = '';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['codigo'])) {
    $param['codigo'] = $_POST['codigo'];
}

if (isset($_POST['estado'])) {
    $param['estado'] = $_POST['estado'];


$Alicel1 = new Alicel1Model();
echo $Alicel1->gestionar($param);

