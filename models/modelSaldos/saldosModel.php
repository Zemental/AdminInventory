<?php
include_once '../../models/conexionModel.php';
class SaldosModel {
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
            case 'saldo_celulares_alicel1':
                echo $this->saldo_celulares_alicel1();
                break; 
            case 'saldo_chip_alicel1':
                echo $this->saldo_chip_alicel1();
                break;  
            case 'saldo_accesorio_alicel1':
                echo $this->saldo_accesorio_alicel1();
                break; 
            case 'saldo_protectores_alicel1':
                echo $this->saldo_protectores_alicel1();
                break;  
            case 'saldo_celulares_alicel2':
                echo $this->saldo_celulares_alicel2();
                break; 
            case 'saldo_chip_alicel2':
                echo $this->saldo_chip_alicel2();
                break;  
            case 'saldo_accesorio_alicel2':
                echo $this->saldo_accesorio_alicel2();
                break; 
            case 'saldo_protectores_alicel2':
                echo $this->saldo_protectores_alicel2();
                break; 
            case 'saldo_celulares_alicel3':
                echo $this->saldo_celulares_alicel3();
                break; 
            case 'saldo_chip_alicel3':
                echo $this->saldo_chip_alicel3();
                break;  
            case 'saldo_accesorio_alicel3':
                echo $this->saldo_accesorio_alicel3();
                break; 
            case 'saldo_protectores_alicel3':
                echo $this->saldo_protectores_alicel3();
                break;                      
            case 'saldo_celulares_alicel4':
                echo $this->saldo_celulares_alicel4();
                break; 
            case 'saldo_chip_alicel4':
                echo $this->saldo_chip_alicel4();
                break;  
            case 'saldo_accesorio_alicel4':
                echo $this->saldo_accesorio_alicel4();
                break; 
            case 'saldo_protectores_alicel4':
                echo $this->saldo_protectores_alicel4();
                break;       
            case 'saldo_celulares_alicel5':
                echo $this->saldo_celulares_alicel5();
                break; 
            case 'saldo_chip_alicel5':
                echo $this->saldo_chip_alicel5();
                break;  
            case 'saldo_accesorio_alicel5':
                echo $this->saldo_accesorio_alicel5();
                break; 
            case 'saldo_protectores_alicel5':
                echo $this->saldo_protectores_alicel5();
                break;
            case 'saldo_celulares_alicel6':
                echo $this->saldo_celulares_alicel6();
                break; 
            case 'saldo_chip_alicel6':
                echo $this->saldo_chip_alicel6();
                break;  
            case 'saldo_accesorio_alicel6':
                echo $this->saldo_accesorio_alicel6();
                break; 
            case 'saldo_protectores_alicel6':
                echo $this->saldo_protectores_alicel6();
                break;       
            case "get":break;   
        }
    }

   

    function prepararConsultaSaldos($opcion, $sucursal) {
        $consultaSql = "call sp_saldos_sucursales(";
        $consultaSql.="'".$opcion . "',"; 
        $consultaSql.="'".$sucursal. "')";        
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    } 

    
    function saldo_celulares_alicel1() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 1);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }


    function saldo_chip_alicel1() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 1);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel1() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 1);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel1() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 1);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }


    function saldo_celulares_alicel2() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 2);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_chip_alicel2() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 2);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel2() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 2);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel2() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 2);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_celulares_alicel3() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 3);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_chip_alicel3() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 3);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel3() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 3);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel3() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 3);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_celulares_alicel4() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 4);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }


    function saldo_chip_alicel4() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 4);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel4() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 4);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel4() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 4);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_celulares_alicel5() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 5);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }


    function saldo_chip_alicel5() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 5);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel5() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 5);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel5() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 5);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }



    function saldo_celulares_alicel6() {
        $this->prepararConsultaSaldos('opc_saldo_celulares', 6);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: left; font-size: 11px; height: 10px; width: 18%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }


    function saldo_chip_alicel6() {
        $this->prepararConsultaSaldos('opc_saldo_chips', 6);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_accesorio_alicel6() {
        $this->prepararConsultaSaldos('opc_saldo_accesorio', 6);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 10%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[5].'</td>';  
                    
                    $stock =  $row[4];
                    $vendido = $row[5];
                    $saldo = $row[4] - $row[5];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }

    function saldo_protectores_alicel6() {
        $this->prepararConsultaSaldos('opc_saldo_protectores', 6);
        $this->cerrarAbrir();
        while($row = mysqli_fetch_row($this->result)){                      
                echo '<tr>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%; background:#CCFF99;">'.$row[0].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[1].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 8%;">'.$row[2].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[3].'</td>
                    <td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$row[4].'</td>';  
                    
                    $stock =  $row[3];
                    $vendido = $row[4];
                    $saldo = $row[3] - $row[4];
                    
                    echo '<td style="text-align: center; font-size: 11px; height: 10px; width: 5%;">'.$saldo.'</td>   
                </tr>';                     
            }
    }
    
}


