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
            case 'listar_envios':
                echo $this->listar_envios();
                break;  
            case 'combo_sucursal':
                echo $this->combo_sucursal();
                break;    
            case 'mostrar_celulares':
                echo $this->mostrar_celulares();
                break; 
            case 'mostrar_chip':
                echo $this->mostrar_chip();
                break; 
            case 'mostrar_protector':
                echo $this->mostrar_protector();
                break; 
            case 'mostrar_accesorio':
                echo $this->mostrar_accesorio();
                break;   
            case 'seleccion_celular':
                echo $this->seleccion_celular();
                break; 
            case 'seleccion_protector':
                echo $this->seleccion_protector();
                break;
            case 'seleccion_chip':
                echo $this->seleccion_chip();
                break;   
            case 'seleccion_accesorio':
                echo $this->seleccion_accesorio();
                break; 
            case 'registro_envio':
                echo $this->registro_envio();
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

    function prepararConsultaSeleccion($opcion) {
        $consultaSql = "call sp_seleccion_productos(";
        $consultaSql.="'".$opcion . "',";        
        $consultaSql.="'".$this->param['param_id'] . "')";        
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    } 

    function prepararConsultaMostrar($opcion) {
        $consultaSql = "call sp_mostrar_productos(";
        $consultaSql.="'".$opcion . "',"; 
        $consultaSql.="'".$this->param['param_sucursal']. "')";        
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }

    function prepararConsultasEnvio($opcion) {
            $consultaSql = "call sp_gestionar_envio(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.="'".$this->param['param_sucursal'] . "',";
            $consultaSql.="'".$this->param['param_total'] . "')";            
            //echo $consultaSql;
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }
        
        function prepararConsultaDetalleEnvio($opcion, $producto, $cantidad) {
            $consultaSql = "call sp_gestion_detalle_envio(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.= "'".$producto."',";
            $consultaSql.= "'".$cantidad."',";
            $consultaSql.= "'".$this->param['param_sucursal']."')";
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

    function listar_envios() {
        $this->prepararConsultaMostrar('opc_mostrar_envios');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[0].'</td>                
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.utf8_encode($row[2]).'</td>   
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.utf8_encode($row[3]).'</td> 
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[4].'</td>                    
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarCelular('.$row[0].');">
                                Detalles</a>
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarCelular('.$row[0].');">Detalles</a>
                                </li>
                                    </ul>
                                </div>
                            </div>
                        </td>';                     
            }
    }

    function mostrar_celulares() {
        $this->prepararConsultaMostrar('opc_mostrar_celulares');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[0].'</td>                
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.utf8_encode($row[1]).'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[2].'</td>   
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[4].'</td>                     
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarCelular('.$row[0].');">
                                Agregar</a>
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarCelular('.$row[0].');">Agregar</a>
                                </li>
                                    </ul>
                                </div>
                            </div>
                        </td>';                     
            }
    }

    function mostrar_chip() {
        $this->prepararConsultaMostrar('opc_mostrar_chip');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
            echo '<tr>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[0].'</td>                
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.utf8_encode($row[1]).'</td>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[2].'</td>   
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[3].'</td>                  
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarChip('.$row[0].');">
                            Agregar</a>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarChip('.$row[0].');">Agregar</a>
                            </li>
                                </ul>
                            </div>
                        </div>
                    </td>';                     
        }
    }

    function mostrar_protector() {
        $this->prepararConsultaMostrar('opc_mostrar_protector');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
            echo '<tr>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[0].'</td>                
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.utf8_encode($row[1]).'</td>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[2].'</td>   
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[3].'</td>                  
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarProtector('.$row[0].');">
                            Agregar</a>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarProtector('.$row[0].');">Agregar</a>
                            </li>
                                </ul>
                            </div>
                        </div>
                    </td>';                     
        }
    }

    function mostrar_accesorio() {
        $this->prepararConsultaMostrar('opc_mostrar_accesorio');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
            echo '<tr>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[0].'</td>                
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.utf8_encode($row[1]).'</td>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[2].'</td>   
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[3].'</td>
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">'.$row[4].'</td>                     
                <td style="text-align: center; font-size: 11px; height: 10px; width: 15%;">
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarAccesorio('.$row[0].');">
                            Agregar</a>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-error btn btn-success btn-xs" data-rel="tooltip" title="View" onclick="agregarAccesorio('.$row[0].');">Agregar</a>
                            </li>
                                </ul>
                            </div>
                        </div>
                    </td>';                     
        }
    }

    function seleccion_celular() {
        $this->prepararConsultaSeleccion('opc_seleccion_celular');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);       
    }

    function seleccion_chip() {
        $this->prepararConsultaSeleccion('opc_seleccion_chip');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);       
    }

    function seleccion_protector() {
        $this->prepararConsultaSeleccion('opc_seleccion_protector');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);       
    }

    function seleccion_accesorio() {
        $this->prepararConsultaSeleccion('opc_seleccion_accesorio');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);       
    }

    function registro_envio() {
        $this->prepararConsultasEnvio('opc_registro_envio');
        for($i=0; $i<count($this->param['param_productos']); $i++) {                        
            $producto                   = $this->param['param_productos'][$i];
            $cantidad                   = $this->param['param_cantidad'][$i];
            $this->prepararConsultaDetalleEnvio('opc_grabar_detalle_envio', $producto, $cantidad);
            $this->prepararConsultaDetalleEnvio('opc_modificar_ubicacion', $producto,'');
            $this->prepararConsultaDetalleEnvio('opc_update_protector', $producto, $cantidad);
            $this->prepararConsultaDetalleEnvio('opc_update_accesorio', $producto, $cantidad);
        }
    }
}




