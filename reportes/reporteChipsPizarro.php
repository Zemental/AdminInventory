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
		    <strong style="font-size: 14pt">SALDOS DE CHIPS DE "PIZARRO"</strong>
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


            $query = "SELECT DM.idProducto, C.icc, C.numero, C.operadora, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
  INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN chips C ON C.idProducto = P.idProducto
WHERE M.idSucursal = 4 AND P.idTipoProducto = 2";

            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            echo '<table BORDER CELLSPACING=0 align="center" style="font-size: 9pt;">';
                echo '<thead>
                        <tr>
                            <th style="width: 10%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF
">CODIGO</th>
			                <th style="width: 14%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">ICC</th>
			                <th style="width: 14%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">NUMERO</th>
			                <th style="width: 28%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">OPERADORA</th>
			                <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">STOCK</th>
                            <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">VENDIDAS</th>
                            <th style="width: 12%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">SALDO</th>
                        </tr>
                       </thead>
                    <tbody>';
        	foreach($data as $campo):
            echo '<tr>
                    <td style="width: 10%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['idProducto'].'</td>
                    <td style="width: 14%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['icc'].'</td>
                    <td style="width: 14%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['numero'].'</td>
					<td style="width: 28%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['operadora'].'</td>
					<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['cantidad'].'</td>
                    <td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['cantidadvendida'].'</td>';
                        $saldo = $campo['cantidad'] - $campo['cantidadvendida'];

                    echo '<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$saldo.'</td>                    
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
	$pdf = new HTML2PDF('4','A4','fr','true','UTF-8');
	$pdf->writeHTML($content);
	$pdf->Output('Lista_de_Saldos_chips_Pizarro.pdf')

?>