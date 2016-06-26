<?php 
	date_default_timezone_set('America/Lima');
	ob_start();
	session_start();

    if (isset($_GET['numeroVenta'])) {
        $venta = $_GET['numeroVenta'];
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
        <?php
            $con = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $query = "SELECT numVenta FROM venta WHERE ventaID = '".$venta."'";

            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $campo):
                $numeroVenta = $campo['numVenta'];
          
        endforeach;
        ?>
        <div align="center">   
		    <strong style="font-size: 12pt">DETALLES DE LA VENTA N° <?php echo $numeroVenta ?></strong>
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


            $query = "SELECT V.numVenta, V.tipoDocumento,S.nombre, S.direccion, S.telefono, V.fechaVenta, CONCAT(R.nombres,' ',R.apellidos) as Responsable, R.dni FROM venta V
    INNER JOIN sucursales S ON S.idSucursal = V.idSUcursal
    INNER JOIN responsables R ON R.idResponsable = S.idResponsable
WHERE ventaID = '".$venta."'";

            $result = $con->query($query);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

        	foreach($data as $campo):
                $numeroVenta = $campo['numVenta'];
                $tipoDocumento = $campo['tipoDocumento'];
                $sucursal = $campo['nombre'];
                $direccion = $campo['direccion'];
                $telefono = $campo['telefono'];
                $fecha = $campo['fechaVenta'];
                $responsable = $campo['Responsable'];
                $dni = $campo['dni'];
          
        endforeach;
        if ($tipoDocumento == 'B') {
            $documento = 'BOLETA';
        } else {
            $documento = 'FACTURA';
        }
        /*echo '</tbody>
        </table>';*/
        ?>
        <table BORDER CELLSPACING=0 style="font-size: 10pt;"">
            <tbody>
                <tr>   
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    FECHA:</span>&nbsp;<?php echo $fecha; ?>
                    </td>                  
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    DOCUMENTO:</span>&nbsp;<?php echo $documento; ?>
                    </td>                         
                </tr>

                <tr>                   
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    SUCURSAL:</span>&nbsp;<?php echo $sucursal; ?>
                    </td> 
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    DIRECCION:</span>&nbsp;<?php echo $direccion; ?>
                    </td>                   
                </tr>
                <tr>                   
                    <td style="width: 50%; height: 40px; text-align: left"><span style="font-size: 10pt;
                    font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            $query2 = "SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('IMEI: ',C.imei,' /  SERIE: ',C.serie,' / MODELO: ', C.modelo) AS DESCRIPCION, DM.cantidad AS CANTIDAD, DM.precio AS PRECIO, DM.importe AS IMPORTE FROM detalleventa DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN celulares C ON C.idProducto = P.idProducto
WHERE DM.ventaID = '".$venta."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('ICC: ',C.iCC,' /  NUMERO: ',C.numero,' /  OPERADORA: ', C.operadora) AS DESCRIPCION, DM.cantidad AS CANTIDAD, DM.precio AS PRECIO, DM.importe AS IMPORTE FROM detalleventa DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN chips C ON C.idProducto = P.idProducto
WHERE DM.ventaID = '".$venta."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('CODIGO: ',A.codigo,' /  DESCRIPCION: ',A.descripcion) AS DESCRIPCION, DM.cantidad AS CANTIDAD, DM.precio AS PRECIO, DM.importe AS IMPORTE FROM detalleventa DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN accesorios A ON A.idProducto = P.idProducto
WHERE DM.ventaID = '".$venta."'
UNION
SELECT P.idProducto AS CODIGO, TP.nombre AS TIPO, concat('TIPO DE PROTECCTOR: ',T.nombre,' /  MODELO DE CELULAR: ',PR.modeloCelular) AS DESCRIPCION, DM.cantidad AS CANTIDAD, DM.precio AS PRECIO, DM.importe AS IMPORTE FROM detalleventa DM 
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN protectores PR ON PR.idProducto = P.idProducto
    INNER JOIN tipoprotector T ON T.idTipoProtector = PR.idTipoProtector
WHERE DM.ventaID = '".$venta."'";

            $result = $con->query($query2);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            echo '<table BORDER CELLSPACING=0 align="center" style="font-size: 9pt;">';
                echo '<thead>
                        <tr>
                            <th style="width: 7%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF
">CODIGO</th>
                            <th style="width: 13%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">TIPO</th>
                            <th style="width: 50%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">DESCRIPCION</th>
                            <th style="width: 9%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">CANTIDAD</th> 
                            <th style="width: 9%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">PRECIO</th> 
                            <th style="width: 9%; text-align: center; height: 16px; text-align: center;border:0; background-color: #4DBAEF">IMPORTE</th> 
                        </tr>
                       </thead>
                    <tbody>';
            foreach($data as $campo):
            echo '<tr>
                    <td style="width: 7%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['CODIGO'].'</td>
                    <td style="width: 13%; height: 16px; text-align: left ;border-bottom:0; border-right:0; border-left:0">&nbsp;'.$campo['TIPO'].'</td>
                    <td style="width: 50%; height: 16px; text-align: left ;border-bottom:0; border-right:0; border-left:0">&nbsp;'.$campo['DESCRIPCION'].'</td>
                    <td style="width: 9%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['CANTIDAD'].'</td>
                    <td style="width: 9%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['PRECIO'].'</td>
                    <td style="width: 9%; height: 16px; text-align: center ;border-bottom:0; border-right:0; border-left:0">'.$campo['IMPORTE'].'</td>
        </tr>';
        endforeach;
        echo '</tbody>
        </table>';
        $query3 = "SELECT sum(cantidadTotal) AS CANTIDADTOTAL FROM venta WHERE ventaID = '".$venta."'";

            $result = $con->query($query3);

            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $campo):
                $cantidadTotal = $campo['CANTIDADTOTAL'];                       
                $subtotal = round($cantidadTotal/1.18, 2);
                $igv = round($subtotal*0.18, 2);
                $total = round($subtotal+$igv,2);
        endforeach;

        if ($tipoDocumento == 'B') {
            echo '<br><div align="center">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 12pt">TOTAL:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$cantidadTotal.'
        </div>';
        } else {
            echo '<br><div align="center">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 12pt">SUBTOTAL:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$subtotal.'
        </div>
        <br><div align="center">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 12pt">IGV:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$igv.'
        </div>
        <br><div align="center">   
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size: 12pt">TOTAL:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$total.'
        </div>';
        }

        ?>
        <br><br><br><br><br><br>
        <table>
            <tr>
                <td>
                    <div style="width: 200px; font-size: 9pt;"" align="center">   
                        
                    </div>
                </td>
                <td>
                    <div style="width: 250px; font-size: 9pt;"" align="center">   
                        <HR><strong align="center">RESPONSABLE:</strong>&nbsp;<?php echo $responsable; ?><<br><strong align="center">DNI:</strong>&nbsp;<?php echo $dni; ?>
                    </div>
                </td>
                <td>
                    <div style="width: 100px; font-size: 9pt;"" align="center">   
                        
                    </div>
                </td>
                <td>
                    <div style="width: 250px; font-size: 9pt;"" align="center">   
                        <HR><strong align="center">RESPONSABLE:</strong>&nbsp;<?= $_SESSION['nombres'],' ',$_SESSION['apellidos'] ?><br><strong align="center">FIRMA</strong>
                    </div>                    
                </td>
            </tr>
        </table><br><br><br>

</page>

<?php
	$content = ob_get_clean();
	require('../html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('L','A4','fr','true','UTF-8');
	$pdf->writeHTML($content);
	$pdf->Output('Lista_de_Saldos_Accesorios_Alicel1.pdf')

?>