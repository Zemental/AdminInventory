<?php
include_once '../../models/conexionModel.php';
class CelularModel {
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
            case 'mostrar_celulares':
                echo $this->mostrarCelulares();
                break;            
            case 'registrar_celular':
                echo $this->registrarCelular();
                break;           
            case 'recuperar_datos':
                echo $this->recuperarDatos();
                break;
            case 'editar_celular':
                echo $this->editarCelular();
                break;
            case 'mostrador_celular':
                echo $this->mostrador();
                break;   
            case 'eliminar_celular':
                echo $this->eliminarCelular();
                break;         
            case "get":break;
        }
    }

   
    function prepararConsultaGestionarCelulares($opcion) {
        $consultaSql = "call sp_control_celular(";
        $consultaSql.="'".$opcion . "',";        
        $consultaSql.="'".$this->param['codigo'] . "',";
        $consultaSql.="'".$this->param['imei'] . "',";
        $consultaSql.="'".$this->param['serie'] . "',";
        $consultaSql.="'".$this->param['marca'] . "',";   
        $consultaSql.="'".$this->param['modelo'] . "',";     
        $consultaSql.="'".$this->param['precio'] . "',"; 
        $consultaSql.="'".$this->param['precio'] . "',"; 
        $consultaSql.="'".$this->param['mostrar'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }    

    function mostrarCelulares() {
        $this->prepararConsultaGestionarCelulares('opc_mostrar_celulares');
        $this->cerrarAbrir();     
        $item = 0;  
        while($row = mysqli_fetch_row($this->result)){            
            $item++;
            if ($row[9] == 1){
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#CCFF99; font-weight:bold;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.utf8_encode($row[5]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 8%;">S/. '.utf8_encode($row[6]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 7%; text-align:center; font-weight:bold;">'.utf8_encode($row[7]).'</td>';      
            } else {
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#FF9999;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.utf8_encode($row[5]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 8%;">S/. '.utf8_encode($row[6]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 7%; text-align:center; font-weight:bold;">'.utf8_encode($row[7]).'</td>';  
                }
                
                if ($row[8] == 'A') {
                   
                    echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                                <div id="estado" class="text-center">
                                    <span class="label label-success">ALMACEN</span>
                                </div>
                            </td>';
                    echo '<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                        <div class="hidden-sm hidden-xs action-buttons">                                
                            <a href="#" style="margin-right:20px;" title="Editar">
                                <span class="green">
                                    <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                                </span>
                            </a>';
                            echo  '<a href="#" style="margin-right:20px;" title="Colocar en mostrador">
                                <span class="green">
                                    <i class="ace-icon fa fa-shopping-cart bigger-120" onclick="mostrador('.$row[0].', 1);"></i>
                                </span>
                            </a>';
                    if ($row[9] == 1){
                        echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Eliminar">
                                    <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-180" onclick="eliminar('.$row[0].',0);"></i>
                                    </span>
                                </a>';
                    } else {
                        echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Activar">
                                    <span class="green">
                                        <i class="ace-icon fa fa-check-square-o bigger-180" onclick="eliminar('.$row[0].',1);"></i>
                                    </span>
                                </a>';
                    }
                                                  
                           
                } else {   
                    if ($row[8] == 'M') {
                      
                        echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                                    <div id="estado" class="text-center">
                                        <span class="label label-warning">MOSTRADOR</span>
                                    </div>
                                </td>';
                        echo '<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                            <div class="hidden-sm hidden-xs action-buttons">                                
                                <a href="#" style="margin-right:20px;" title="Editar">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                                    </span>
                                </a>';
                                echo  '<a href="#" style="margin-right:20px;" title="Regresar a almacen">
                                    <span class="green">
                                        <i class="ace-icon fa fa-archive bigger-120" onclick="mostrador('.$row[0].', 2);"></i>
                                    </span>
                                </a>';
                        if ($row[9] == 1){
                            echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Eliminar">
                                        <span class="red">
                                            <i class="ace-icon fa fa-trash-o bigger-180" onclick="eliminar('.$row[0].',0);"></i>
                                        </span>
                                    </a>';
                        } else {
                            echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Activar">
                                        <span class="green">
                                            <i class="ace-icon fa fa-check-square-o bigger-180" onclick="eliminar('.$row[0].',1);"></i>
                                        </span>
                                    </a>';
                        }
                    } else {
                           echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                            <div id="estado" class="text-center">
                                <span class="label label-danger">VENDIDO</span>
                            </div>
                        </td>';  
                         echo '<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                        <div class="hidden-sm hidden-xs action-buttons">                                
                            <a href="#" style="margin-right:20px;" title="Ver datos">
                                <span class="green">
                                    <i class="ace-icon fa fa-search bigger-120" onclick="verCelular('.$row[0].');"></i>
                                </span>
                            </a>';
                    }
              
                         
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

    function registrarCelular() {
        $this->prepararConsultaGestionarCelulares('opc_registrar_celular');
        $this->cerrarAbrir();
        echo 1;
    }    

    function recuperarDatos() {
        $this->prepararConsultaGestionarCelulares('opc_datos_celular');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);
    }
    

    function editarCelular() {
        $this->prepararConsultaGestionarCelulares('opc_editar_celular');
        $this->cerrarAbrir();
        echo 1;
    }

    function mostrador() {
        $this->prepararConsultaGestionarCelulares('opc_mostrador_celular');
        $this->cerrarAbrir();
        echo 1;
    }

    function eliminarCelular() {
        $this->prepararConsultaGestionarCelulares('opc_eliminar_celular');
        $this->cerrarAbrir();
        echo 1;
    }

}




