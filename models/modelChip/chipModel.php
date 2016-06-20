<?php
include_once '../../models/conexionModel.php';
class ChipModel {
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
            case 'mostrar_chips':
                echo $this->mostrarChips();
                break;            
            case 'registrar_chip':
                echo $this->registrarChip();
                break;           
            case 'recuperar_datos':
                echo $this->recuperarDatos();
                break;
            case 'editar_chip':
                echo $this->editarChip();
                break;   
            case 'eliminar_chip':
                echo $this->eliminarChip();
                break;         
            case "get":break;
        }
    }

   
    function prepararConsultaGestionarChips($opcion) {
        $consultaSql = "call sp_control_chip(";
        $consultaSql.="'".$opcion . "',";        
        $consultaSql.="'".$this->param['codigo'] . "',";
        $consultaSql.="'".$this->param['icc'] . "',";
        $consultaSql.="'".$this->param['numero'] . "',";
        $consultaSql.="'".$this->param['operadora'] . "',";             
        $consultaSql.="'".$this->param['estado'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }    

    function mostrarChips() {
        $this->prepararConsultaGestionarChips('opc_mostrar_chips');
        $this->cerrarAbrir();     
        $item = 0;  
        while($row = mysqli_fetch_row($this->result)){            
            $item++;
            if ($row[7] == 1){
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#CCFF99;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>                                     
                    <td style="font-size: 12px; height: 10px; width: 7%;">'.utf8_encode($row[5]).'</td>';      
            } else {
                echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 3%; background:#FF9999;">'.$item.'</td>';
                echo '<td style="font-size: 12px; height: 10px; width: 12%;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 13%;">'.utf8_encode($row[3]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[4]).'</td>                               
                    <td style="font-size: 12px; height: 10px; width: 7%;">'.utf8_encode($row[5]).'</td>';  
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
                        <a href="#" style="margin-right:10px;" title="Editar">
                            <span class="green">
                                <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                            </span>
                        </a>';
            if ($row[7] == 1){
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
                                
            echo    '<a href="#" style="margin-right:10px;" class="tooltip-error" data-rel="tooltip" title="Procesar venta">
                        <span class="black">
                            <i class="ace-icon fa fa-envelope-o bigger-120" onclick="abrirEmail('.$row[0].');"></i>
                        </span>
                    </a>
                                
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
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Email">
                                                <span class="black">
                                                    <i class="ace-icon fa fa-envelope-o bigger-120" onclick="abrirEmail('.$row[0].');"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>';
        }
    }

    function registrarChip() {
        $this->prepararConsultaGestionarChips('opc_registrar_chip');
        $this->cerrarAbrir();
        echo 1;
    }    

    function recuperarDatos() {
        $this->prepararConsultaGestionarChips('opc_datos_chip');
        $row = mysqli_fetch_row($this->result);
        echo json_encode($row);
    }
    

    function editarChip() {
        $this->prepararConsultaGestionarChips('opc_editar_chip');
        $this->cerrarAbrir();
        echo 1;
    }

    function eliminarChip() {
        $this->prepararConsultaGestionarChips('opc_eliminar_chip');
        $this->cerrarAbrir();
        echo 1;
    }

}




