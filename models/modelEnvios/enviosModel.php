<?php
include_once '../../models/conexionModel.php';
class EnviosModel {
    public $param = array();
    function __construct() {
        $this->conexion = ConexionModel::getConexion();
    }

    function cerrarAbrir(){
        mysqli_close($this->conexion);
        $this->conexion = ConexionModel::getConexion();
    }

    function gestionar($param) {
        $this->param = $param;
        switch ($this->param['param_opcion']) {
            case 'combo_sucursal':
                echo $this->combo_sucursal();
                break;                                
            case "get":break;
        }
    }

   
    function prepararConsultaCombos($opcion) {
        $consultaSql = "call sp_combos(";
        $consultaSql.="'".$opcion . "')";        
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }    

    function combo_sucursal() {
        $this->prepararConsultaCombos('opc_combo_sucursal');
        $this->cerrarAbrir();
        echo '
            
            <select class="form-control" id="sucursal" name="sucursal">
                <option value="" disabled selected style="display: none;">Seleccione Sucursal</option>';
         while ($fila = mysqli_fetch_row($this->result)) {
            echo'<option value="'.$fila[0].'">'.utf8_encode($fila[1]).'</option>';
        }
        echo '</select>';
    }

}




