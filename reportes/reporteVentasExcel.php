 <?php  
 $connect = mysqli_connect("localhost", "root", "", "inventory");  
 $output = '';  
      $sql = "SELECT V.numVenta AS NUMERO,V.tipoDocumento AS DOCUMENTO,S.nombre AS SUCURSAL, CONCAT(R.nombres,' ',R.apellidos) AS RESPONSABLE, V.fechaVenta AS FECHA, V.cantidadTotal AS IMPORTE FROM venta V 
INNER JOIN sucursales S ON S.idSucursal = V.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable";  
      $result = mysqli_query($connect, $sql);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $output .= '  
                <strong style="text-align:center; color:red;">LISTA DE ENVIOS REALIZADOS</strong><br><br>
                <table BORDER CELLSPACING=1 align="center" style="font-size: 9pt; WIDTH: 50%; border-collapse: collapse;" >  
                  <tr>  
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">N° DOCUMENTO</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">DOCUMENTO</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">SUCURSAL</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">RESPONSABLE</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">FECHA</th>
                    <th style="text-align: center; text-align: center;border:0; background-color: #4DBAEF">IMPORTE</th>
                   </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                        <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['NUMERO'].'</td>';
                        if ($row['DOCUMENTO'] == 'B') {
                          $output .= '<td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">BOLETA</td>';
                        } else {
                          $output .= '<td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">FACTURA</td>';
                        }
                        
                $output .= '<td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['SUCURSAL'].'</td>
                        <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['RESPONSABLE'].'</td>
                        <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['FECHA'].'</td>
                        <td style="text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$row['IMPORTE'].'</td>  
                     </tr>';  
           }  
           $output .= '</table>';  
           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=lista_ventas.xls");  
           echo $output;  
      }    
 ?>  