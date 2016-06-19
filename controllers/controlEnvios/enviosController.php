<?php
session_start();
include_once '../../models/modelEnvios/enviosModel.php';

$param = array();
$param['param_opcion'] = '';



if (isset($_POST['param_opcion'])) {
    $param['param_opcion'] = $_POST['param_opcion'];
}


$Envios = new EnviosModel();
echo $Envios->gestionar($param);

