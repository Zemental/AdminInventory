<?php
include_once '../../models/conexionModel.php';
class VentasModel {
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
            case 'listar_ventas':
                echo $this->listar_ventas();
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
            case 'registro_venta':
                echo $this->registro_venta();
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

    function prepararConsultasVenta($opcion) {
        $consultaSql = "call sp_gestionar_venta(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.="'".$this->param['param_numerodoc'] . "',";
        $consultaSql.="'".$this->param['param_tipodoc'] . "',";
        $consultaSql.="'".$this->param['param_sucursal'] . "',";
        $consultaSql.="'".$this->param['param_total'] . "')";            
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);    
    }
    
    function prepararConsultaDetalleVenta($opcion, $producto, $cantidad, $precio, $importe) {
        $consultaSql = "call sp_gestion_detalle_venta(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.= "'".$producto."',";
        $consultaSql.= "'".$cantidad."',";
        $consultaSql.= "'".$precio."',";
        $consultaSql.= "'".$importe."')";
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

    function listar_ventas() {
        $this->prepararConsultaMostrar('opc_mostrar_ventas');
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[0].'</td>';  
                    if ($row[1] == 'B') {
                        echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">BOLETA</td>';
                    } else {
                        echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">FACTURA</td>';
                    }             
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.utf8_encode($row[2]).'</td>   
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.utf8_encode($row[3]).'</td> 
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[4].'</td>  
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[5].'</td>                    
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
        $this->prepararConsultaMostrar('opc_mostrar_celulares_ventas');
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
        $this->prepararConsultaMostrar('opc_mostrar_chip_ventas');
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
        $this->prepararConsultaMostrar('opc_mostrar_protector_ventas');
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
        $this->prepararConsultaMostrar('opc_mostrar_accesorio_ventas');
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

    function registro_venta() {
        $this->prepararConsultasVenta('opc_registro_venta');
        for($i=0; $i<count($this->param['param_productos']); $i++) {                        
            $producto                   = $this->param['param_productos'][$i];
            $cantidad                   = $this->param['param_cantidad'][$i];
            $precio                     = $this->param['param_precio'][$i];
            $importe                    = $this->param['param_importe'][$i];
            $this->prepararConsultaDetalleVenta('opc_grabar_detalle_venta', $producto, $cantidad, $precio, $importe);
            $this->prepararConsultaDetalleVenta('opc_modificar_estado_producto', $producto,'','','');
        }
    }
}
