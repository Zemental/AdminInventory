 <?php  
 $connect = mysqli_connect("localhost", "root", "", "inventory");  

 $output = '';  
      $sql = "SELECT DM.idProducto, TR.nombre, C.modeloCelular, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
  INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN protectores C ON C.idProducto = P.idProducto
    INNER JOIN tipoprotector TR ON TR.idTipoProtector = C.idTipoProtector
WHERE M.idSucursal = 4 AND P.idTipoProducto = 3";  
      $result = mysqli_query($connect, $sql);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $output .= '  
                <strong style="text-align:center; color:red;">SALDOS DE PROTECTORES DE "PIZARRO"</strong><br><br>
                <table BORDER CELLSPACING=1 align="center" style="font-size: 9pt; WIDTH: 50%; border-collapse: collapse;" > 
                  <tr>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">COD PRODUCTO</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">TIPO</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">DESCRIPCION</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">STOCK</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">VENDIDAS</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">SALDO</th>
                  </tr>                 
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                  <tr>
                    <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['idProducto'].'</td>
                    <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['nombre'].'</td>
                    <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['modeloCelular'].'</td>
                    <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['cantidad'].'</td>
                    <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['cantidadvendida'].'</td>';
                        $saldo = $row['cantidad'] - $row['cantidadvendida'];
               $output.='<td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$saldo.'</td>                    
                  </tr> 
                ';  
           }  
           $output .= '</table>';  
           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=Lista_de_Saldos_Protectores_Pizarro.xls");  
           echo $output;  
      }    
 ?>  