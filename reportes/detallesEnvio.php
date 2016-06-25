<?php 
	date_default_timezone_set('America/Lima');
	ob_start();
	session_start();

    if (isset($_GET['numeroEnvio'])) {
        $pedido = $_GET['numeroEnvio'];
    }

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
		    <strong style="font-size: 12pt">FICHA DE REMISION N° <?php echo $pedido ?></strong>
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
	<br><br><br><br>
      <?php
            $con = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $query = "SELECT M.numMovimiento, S.nombre, S.direccion, S.telefono, CONCAT(R.nombres,' ',R.apellidos) as Responsable, R.dni FROM movimiento M 
    INNER JOIN sucursales S ON S.idSucursal = M.idSUcursal
    INNER JOIN responsables R ON R.idResponsable = S.idResponsable
WHERE M.numMovimiento = '".$pedido."'";

            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

        	foreach($data as $campo):
                $numeroMovimiento = $campo['numMovimiento'];
                $sucursal = $campo['nombre'];
                $direccion = $campo['direccion'];
                $telefono = $campo['telefono'];
                $responsable = $campo['Responsable'];
                $dni = $campo['dni'];
            /*echo '<tr>
                    <td style="width: 10%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['idProducto'].'</td>
                    <td style="width: 14%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['nombre'].'</td>
                    <td style="width: 14%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['codigo'].'</td>
					<td style="width: 28%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['descripcion'].'</td>
					<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['cantidad'].'</td>
                    <td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['cantidadvendida'].'</td>';
                        $saldo = $campo['cantidad'] - $campo['cantidadvendida'];

                    echo '<td style="width: 12%; height: 14px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$saldo.'</td>                    
        </tr>';*/
        endforeach;
        /*echo '</tbody>
        </table>';*/
        ?>
        <table BORDER CELLSPACING=0 style="font-size: 10pt;"">
            <tbody>
                <tr>                   
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    SUCURSAL:</span>&nbsp;<?php echo $sucursal; ?>
                    </td> 
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    DIRECCION:</span>&nbsp;<?php echo $direccion; ?>
                    </td>                   
                </tr>

                <tr>                   
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    RESPONSABLE:</span>&nbsp;<?php echo $responsable; ?>
                    </td> 
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    TELEFONO:</span>&nbsp;<?php echo $telefono; ?>
                    </td>                   
                </tr>            
            </tbody>
        </table><br>
        <div align="left">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 10pt">DETALLE DE PRODUCTOS ENVIADOS</strong>
        </div><br>
        <?php 
            $query2 = "SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('IMEI: ',C.imei,' /  SERIE: ',C.serie,' / MODELO: ', C.modelo) AS DESCRIPCION, DM.cantidad AS CANTIDAD FROM detallemovimiento DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN celulares C ON C.idProducto = P.idProducto
WHERE DM.numMovimiento = '".$pedido."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('ICC: ',C.iCC,' /  NUMERO: ',C.numero,' /  OPERADORA: ', C.operadora) AS DESCRIPCION, DM.cantidad AS CANTIDAD FROM detallemovimiento DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN chips C ON C.idProducto = P.idProducto
WHERE DM.numMovimiento = '".$pedido."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('CODIGO: ',A.codigo,' /  DESCRIPCION: ',A.descripcion) AS DESCRIPCION, DM.cantidad AS CANTIDAD FROM detallemovimiento DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN accesorios A ON A.idProducto = P.idProducto
WHERE DM.numMovimiento = '".$pedido."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('TIPO DE PROTECCTOR: ',T.nombre,' /  MODELO DE CELULAR: ',PR.modeloCelular) AS DESCRIPCION, DM.cantidad AS CANTIDAD FROM detallemovimiento DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN protectores PR ON PR.idProducto = P.idProducto
    INNER JOIN tipoprotector T ON T.idTipoProtector = PR.idTipoProtector
WHERE DM.numMovimiento = '".$pedido."'";

            $result = $con->query($query2);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            echo '<table BORDER CELLSPACING=0 align="center" style="font-size: 9pt;">';
                echo '<thead>
                        <tr>
                            <th style="width: 10%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF
">CODIGO</th>
                            <th style="width: 16%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">TIPO</th>
                            <th style="width: 60%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">DESCRIPCION</th>
                            <th style="width: 10%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">CANTIDAD</th>                           
                        </tr>
                       </thead>
                    <tbody>';
            foreach($data as $campo):
            echo '<tr>
                    <td style="width: 10%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['CODIGO'].'</td>
                    <td style="width: 16%; height: 16px; text-align: left ;border-bottom:0; border-right:0; border-left:0">&nbsp;'.$campo['TIPO'].'</td>
                    <td style="width: 60%; height: 16px; text-align: left ;border-bottom:0; border-right:0; border-left:0">&nbsp;'.$campo['DESCRIPCION'].'</td>
                    <td style="width: 10%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['CANTIDAD'].'</td>
        </tr>';
        endforeach;
        echo '</tbody>
        </table>';
        $query3 = "SELECT sum(cantidad) AS CANTIDADTOTAL FROM detallemovimiento WHERE numMovimiento = '".$pedido."'";

            $result = $con->query($query3);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $campo):
                $cantidadTotal = $campo['CANTIDADTOTAL'];                         
        endforeach;
        ?>
        <br>
        <div align="center">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 10pt">TOTAL:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cantidadTotal; ?>
        </div><br><br><br><br><br><br>
    
        <table>
            <tr>
                <td>
                    <div style="width: 60px; font-size: 9pt;"" align="center">   
                        
                    </div>
                </td>
                <td>
                    <div style="width: 250px; font-size: 9pt;"" align="center">   
                        <HR><strong align="center">RESPONSABLE SUCURSAL:</strong>&nbsp;<?php echo $responsable; ?><<br><strong align="center">DNI:</strong>&nbsp;<?php echo $dni; ?>
                    </div>
                </td>
                <td>
                    <div style="width: 50px; font-size: 9pt;"" align="center">   
                        
                    </div>
                </td>
                <td>
                    <div style="width: 250px; font-size: 9pt;"" align="center">   
                        <HR><strong align="center">RESPONSABLE ENVÍO:</strong>&nbsp;<?= $_SESSION['nombres'],' ',$_SESSION['apellidos'] ?><<br><strong align="center">DNI:</strong>&nbsp;<?php echo $dni; ?>
                    </div>                    
                </td>
            </tr>
        </table>
</page>

<?php
	$content = ob_get_clean();
	require('../html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('4','A4','fr','true','UTF-8');
	$pdf->writeHTML($content);
	$pdf->Output('Lista_de_Saldos_Accesorios_Alicel1.pdf')

?>