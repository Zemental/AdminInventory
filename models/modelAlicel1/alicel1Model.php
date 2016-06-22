<?php
include_once '../../models/conexionModel.php';
class Alicel1Model {
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
            case 'mostrar_producto':
                echo $this->mostrarProductos();
                break;        
            case "get":break;
        }
    }

   
    function prepararConsultaGestionarProducto($opcion) {
        $consultaSql = "call sp_control_alicel1(";
        $consultaSql.="'".$opcion . "',";        
        $consultaSql.="'".$this->param['codigo'] . "',";            
        //$consultaSql.="'".$this->param['estado'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }    

    function mostrarProductos() {
        $this->prepararConsultaGestionarCelulares('opc_mostrar_productos');
        $this->cerrarAbrir();     
        $item = 0;  
        while($row = mysqli_fetch_row($this->result)){            
            $item++;
            if ($row[8] == 1){
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#CCFF99;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.utf8_encode($row[5]).'</td>                  
                    <td style="font-size: 12px; height: 10px; width: 7%;">'.utf8_encode($row[6]).'</td>';      
            } else {
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#FF9999;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>  
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.utf8_encode($row[5]).'</td>                  
                    <td style="font-size: 12px; height: 10px; width: 7%;">'.utf8_encode($row[6]).'</td>';  
            }
            
            /*if ($row[7] == 'A') {
                echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                            <div id="estado" class="text-center">
                                <span class="label label-success">ALMACEN</span>
                            </div>
                        </td>';
            } 
            else 
            {
                if ($row[5] == 'M'){
                    echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                            <div id="estado" class="text-center">
                                <span class="label label-primary">VITRINA</span>
                            </div>
                        </td>';
                    } 
                    else
                    {
                        echo '<td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">
                            <div id="estado" class="text-center">
                                <span class="label label-danger">VENDIDO</span>
                            </div>
                        </td>';    
                    }
            }*/            

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

}




