<?php
include_once '../../models/conexionModel.php';
class ProtectorModel {
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
        switch ($this->param['opcion']) {
            case 'mostrar_protectores':
                echo $this->mostrarProtectores();
                break;            
            case 'registrar_protector':
                echo $this->registrarProtector();
                break;           
            case 'recuperar_datos':
                echo $this->recuperarDatos();
                break;
            case 'editar_protector':
                echo $this->editarProtector();
                break;   
            case 'eliminar_protector':
                echo $this->eliminarProtector();
                break;         
            case "get":break;
        }
    }

   
    function prepararConsultaGestionarProtectores($opcion) {
        $consultaSql = "call sp_control_protector(";
        $consultaSql.="'".$opcion . "',";        
        $consultaSql.="'".$this->param['codigo'] . "',";
        $consultaSql.="'".$this->param['tipo'] . "',";
        $consultaSql.="'".$this->param['modeloCelular'] . "',";           
        $consultaSql.="'".$this->param['cantidad'] . "',";
        $consultaSql.="'".$this->param['precio'] . "',";      
        $consultaSql.="'".$this->param['estado'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }    

    function mostrarProtectores() {
        $this->prepararConsultaGestionarProtectores('opc_mostrar_protectores');
        $this->cerrarAbrir();     
        $item = 0;  
        while($row = mysqli_fetch_row($this->result)){            
            $item++;
            if ($row[8] == 1){
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#CCFF99;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 8%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 5%;">'.utf8_encode($row[4]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 8%;">S/. '.utf8_encode($row[5]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 7%; text-align:center;">'.utf8_encode($row[6]).'</td>';      
            } else {
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#FF9999;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 8%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 5%;">'.utf8_encode($row[4]).'</td>   
                    <td style="font-size: 12px; height: 10px; width: 8%;">S/. '.utf8_encode($row[5]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 7%; text-align:center;">'.utf8_encode($row[6]).'</td>';  
            }           

            echo '<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                    <div class="hidden-sm hidden-xs action-buttons">                                
                        <a href="#" style="margin-right:20px;" title="Editar">
                            <span class="green">
                                <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                            </span>
                        </a>';
            if ($row[8] == 1){
                echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Eliminar">
                            <span class="red">
                                <i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[0].',0);"></i>
                            </span>
                        </a>';
            } else {
                echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Activar">
                            <span class="green">
                                <i class="ace-icon fa fa-check-square-o bigger-130" onclick="eliminar('.$row[0].',1);"></i>
                            </span>
                        </a>';
            }
                                
            echo    '                                
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>                                            
                                            <a class="tooltip-error" data-rel="tooltip" title="Edit" >
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[0].');"></i>
                                                </span>
                                            </a>
                                           
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>';
        }
    }

    function registrarProtector() {
        $this->prepararConsultaGestionarProtectores('opc_registrar_protector');
        $this->cerrarAbrir();
        echo 1;
    }    

    function recuperarDatos() {
        $this->prepararConsultaGestionarProtectores('opc_datos_protector');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);
    }
    

    function editarProtector() {
        $this->prepararConsultaGestionarProtectores('opc_editar_protector');
        $this->cerrarAbrir();
        echo 1;
    }

    function eliminarProtector() {
        $this->prepararConsultaGestionarProtectores('opc_eliminar_protector');
        $this->cerrarAbrir();
        echo 1;
    }

}




