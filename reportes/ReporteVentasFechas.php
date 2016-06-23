<?php 
	date_default_timezone_set('America/Lima');
	ob_start();
	session_start();

    if (isset($_GET['fechaInicio'])) {
        $Inicio = $_GET['fechaInicio'];
    }

    if (isset($_GET['fechaFin'])) {
        $Fin = $_GET['fechaFin'];
    }

    $fechaInicio=date("Y-m-d",strtotime($Inicio));
    $fechaFin=date("Y-m-d",strtotime($Fin));

?>
<style type="text/css">
<!--
    table.page_header {width: 100%; border: none;  border-bottom: solid 0.8mm; padding: 2mm }
    table.page_footer {width: 100%; border: none;  border-top: solid 0.8mm ; padding: 2mm}
-->
</style>

<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" pagegroup="new" style="font-size: 12pt">
    <page_header> 
		<table class="page_header">
             <tr>
             <td style="width: 8%; text-align: center">
                </td>
                <td style="width: 40%; text-align: left">Impreso por: <?= $_SESSION['nombres'],' ',$_SESSION['apellidos'] ?>
                </td>
                <td style="width: 50%; text-align: right">Fecha de Impresión: <?php echo date("d-m-Y (H:i:s)"); ?>
                </td>
                <td style="width: 2%">
                </td>
            </tr>
        </table> 
        <br><br><br>
        <div align="center">   
		    <strong style="font-size: 14pt">RELACIÓN DE VENTAD REALIZADOS EN GENERAL</strong>
		</div><br><br>
    </page_header>
	
     <page_footer>
     	<table class="page_footer">
            <tr>
                <td style="width: 70%; text-align: left;">LA LIBERTAD - TRUJILLO</td>
                <td style="width: 30%; text-align: right">
                     PÁGINA [[page_cu]]/[[page_nb]] </td>
            </tr>
                <tr>
                <td style="width: 70%; text-align: left;">EMPRESA: "MOVISTAR SERVICIOS"</td>
                <td style="width: 30%; text-align: right"></td>
            </tr>
        </table>
     </page_footer>
	<br><br><br><br><br>
      <?php
            $con = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $query = "SELECT V.numVenta AS NUMERO,V.tipoDocumento AS DOCUMENTO,S.nombre AS SUCURSAL, CONCAT(R.nombres,' ',R.apellidos) AS RESPONSABLE, V.fechaVenta AS FECHA, V.cantidadTotal AS IMPORTE FROM venta V 
INNER JOIN sucursales S ON S.idSucursal = V.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable
WHERE V.fechaVenta BETWEEN '".$fechaInicio."' AND '".$fechaFin."'";
            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            echo '<table BORDER CELLSPACING=0 align="center" style="font-size: 9pt;"">';
                echo '<thead>
                        <tr>
                            <th style="width: 16%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF
">N° DOCUMENTO</th>
			                <th style="width: 16%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">DOCUMENTO</th>
			                <th style="width: 17%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">SUCURSAL</th>
			                <th style="width: 26%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">RESPONSABLE</th>
			                <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">FECHA</th>
                            <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">IMPORTE</th>
                        </tr>
                       </thead>
                    <tbody>';
        	foreach($data as $campo):
            echo '<tr>
                    <td style="width: 16%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['NUMERO'].'</td>';
                    if ($campo['DOCUMENTO'] == 'B') {
                        echo '<td style="width: 16%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">BOLETA</td>';
                    } else {
                        echo '<td style="width: 16%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">FACTURA</td>';
                    }
                    
                    echo '<td style="width: 17%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['SUCURSAL'].'</td>
					<td style="width: 26%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['RESPONSABLE'].'</td>
					<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['FECHA'].'</td> 
                    <td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['IMPORTE'].'</td>                    
        </tr>';
        endforeach;
        echo '</tbody>
        </table>';
        ?>
     <br>
</page>

<?php
	$content = ob_get_clean();
	require('../html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('P','A4','fr','true','UTF-8');
	$pdf->writeHTML($content);
	$pdf->Output('Lista_de_ventas.pdf')

?>