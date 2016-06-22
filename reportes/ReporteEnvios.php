<?php 
	date_default_timezone_set('America/Lima');
	ob_start();
	session_start();

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
		    <strong style="font-size: 14pt">RELACIÓN DE ENVIOS REALIZADOS</strong>
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


            $query = "SELECT M.numMovimiento AS MOVIMIENTO, M.fechaEnvio AS FECHA, S.nombre AS SUCURSAL, CONCAT(R.nombres,' ',R.apellidos) AS RESPONSABLE,M.cantidadTotal AS TOTAL FROM movimiento M 
				 INNER JOIN sucursales S ON S.idSucursal = M.idSucursal
				 INNER JOIN responsables R ON R.idResponsable = S.idResponsable";
            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            echo '<table BORDER CELLSPACING=0 align="center" style="font-size: 9pt;">';
                echo '<thead>
                        <tr>
                            <th style="width: 16%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF
">MOVIMIENTO</th>
			                <th style="width: 16%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">FECHA</th>
			                <th style="width: 17%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">SUCURSAL</th>
			                <th style="width: 26%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">RESPONSABLE</th>
			                <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">TOTAL</th>
                        </tr>
                       </thead>
                    <tbody>';
        	foreach($data as $campo):
            echo '<tr>
                    <td style="width: 16%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['MOVIMIENTO'].'</td>
                    <td style="width: 16%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['FECHA'].'</td>
                    <td style="width: 17%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['SUCURSAL'].'</td>
					<td style="width: 26%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['RESPONSABLE'].'</td>
					<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['TOTAL'].'</td>                    
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
	$pdf->Output('Lista_de_envios.pdf')

?>