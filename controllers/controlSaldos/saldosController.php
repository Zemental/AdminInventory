<?php
session_start();
include_once '../../models/modelSaldos/saldosModel.php';

$param = array();
$param['param_opcion'] = '';  
$param['param_sucursal'] = '';

if (isset($_POST['param_opcion'])) {
    $param['param_opcion'] = $_POST['param_opcion'];
}

if (isset($_POST['param_sucursal'])) {
    $param['param_sucursal'] = $_POST['param_sucursal'];
}



$Saldos = new SaldosModel();
echo $Saldos->gestionar($param);

