<?php
    session_start();
    if(!isset($_SESSION['usuario']))
    {
        header("Location:../index.php");
    }
    else
    {
        date_default_timezone_set('America/Lima');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ALICEL 1 | SGI Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link rel="icon" href="../assets/images/celular.png" type="images/png"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href="../assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/stylesheets/modulos.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="../assets/javascripts/ie.min.js"></script>
    <![endif]-->   

</head>

<body class="theme-default main-menu-animated">

<script>var init = [];</script>

<div id="main-wrapper">
    <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
        <div class="navbar-inner">
            <div class="navbar-header">
                <div class="navbar-brand" style="font-weight: bold;">
                    <div><img alt="Pixel Admin" src="../assets/images/pixel-admin/main-navbar-logo.png"></div>
                    SGI Admin
                </div>

                <!-- Main navbar toggle -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

            </div> <!-- / .navbar-header -->

            <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                <div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="home.php">Principal</a>
                        </li>                        
                    </ul> <!-- / .navbar-nav -->

                    <div class="right clearfix">
                        <ul class="nav navbar-nav pull-right right-navbar-nav">                   

                            <li>
                                <div class="navbar-form pull-left" style="padding-top:6px;">                                    
                                    <span style="font-weight: bold;"><?php include('../scripts/fecha.php') ?></span>                                    
                                </div>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                    <img src="../assets/demo/avatars/1.jpg" alt="">
                                    <span><?= $_SESSION['nombres'],' ',$_SESSION['apellidos'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><span class="label label-warning pull-right">New</span>Perfil</a></li>                                    
                                    <li class="divider"></li>
                                    <li><a href="../scripts/logout.php"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul> <!-- / .navbar-nav -->
                    </div> <!-- / .right -->
                </div>
            </div> <!-- / #main-navbar-collapse -->
        </div> <!-- / .navbar-inner -->
    </div> <!-- / #main-navbar -->

    <div id="main-menu" role="navigation">
        <div id="main-menu-inner">
            <div class="menu-content top" id="menu-content-demo">                
                <div>
                    <div class="text-bg"><span class="text-slim">Bienvenida,</span> <span class="text-semibold"><?= $_SESSION['nombres'] ?></span></div>

                    <img src="../assets/demo/avatars/1.jpg" alt="" class="">
                    <div class="btn-group">                        
                        <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>                        
                        <a href="../scripts/logout.php" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
                    </div>
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
             <ul class="navigation">
                <li>
                    <a href="home.php"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Principal</span></a>
                </li>
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Gestionar Inventario</span></a>
                    <ul>
                        <li class="active">
                            <a tabindex="-1" href="celulares.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Celulares</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="chips.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Chips</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="protectores.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Protectores</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="accesorios.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Accesorios</span></a>
                        </li>
                    </ul>
                </li>
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-tasks"></i><span class="mm-text">Gestionar Sucursales</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="alicel1.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">ALICEL 1</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="alicel2.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">ALICEL 2</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="entel.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">ENTEL</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="pizarro.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">PIZARRO</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="almagro.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">ALMAGRO</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="asmoviles.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">AS MOVILES</span></a>
                        </li>
                    </ul>
                </li>      
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Gestionar Movimientos</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="envios.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Envíos a Sucursales</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="ventasRealizadas.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Ventas Realizadas</span></a>
                        </li>                        
                    </ul>
                </li>         
                
                <li class="mm-dropdown">
                    <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Gestionar Reportes</span></a>
                    <ul>
                        <li>
                            <a tabindex="-1" href="reporteEnvios.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Envíos de Mercadería</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="reporteVentas.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Mercadería vendida</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="saldoMercaderia.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Saldos de Mercadería</span></a>
                        </li>
                    </ul>
                </li>
            </ul> <!-- / .navigation -->
            <div class="menu-content">
                <a href="#" class="btn btn-primary btn-block btn-outline dark">Gestionar Usuarios</a>
            </div>
        </div> <!-- / #main-menu-inner -->
    </div> <!-- / #main-menu -->
    <!-- /4. $MAIN_MENU -->


    <div id="content-wrapper">
        <div class="page-header">
            <div class="row">
                <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-mobile page-header-icon"></i>&nbsp;&nbsp;Almacén de Productos (ALICEL 1)</h1>
            </div>
        </div>

        <script>
            init.push(function () {
                $('#tablaCelulares').dataTable();
                $('#tablaCelulares_wrapper .table-caption').text('Listado General de Productos');
                $('#tablaCelulares_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
                //mostrarProductos();
                $('#tablaChips').dataTable();
                $('#tablaChips_wrapper .table-caption').text('Listado General de Productos');
                $('#tablaChips_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

                $('#tablaProtectores').dataTable();
                $('#tablaProtectores_wrapper .table-caption').text('Listado General de Productos');
                $('#tablaProtectores_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

                $('#tablaAccesorios').dataTable();
                $('#tablaAccesorios_wrapper .table-caption').text('Listado General de Productos');
                $('#tablaAccesorios_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
               
            });
        </script>
        
     <div class="panel">          
            <div class="panel-body">
                <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    <li class="active">
                        <a href="#uidemo-tabs-default-demo-celulares" data-toggle="tab">CELULARES</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-chips" data-toggle="tab">CHIPS</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-protectores" data-toggle="tab">PROTECTORES</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-accesorios" data-toggle="tab">ACCESORIOS</a>
                    </li>                    
                </ul>

                <div class="tab-content tab-content-bordered">
                    <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares">
                        <div class="panel-body">
                            <div class="table-primary">
                                <table class="table table-striped table-bordered" id="tablaCelulares">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">N°</th>
                                            <th style="width:10%;">IMEI</th>
                                            <th style="width:10%;">SERIE</th>
                                            <th style="width:8%;">MARCA</th>
                                            <th style="width:10%;">MODELO</th>
                                            <th style="width:5%;">PRECIO</th>
                                            <th style="width:5%;">F. REGISTRO</th>
                                            <th style="width:3%;">MOSTRADOR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoCelulares">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                    
                

               
                    <div class="tab-pane fade " id="uidemo-tabs-default-demo-chips">
                        <div class="panel-body">
                            <div class="table-primary">
                                <table class="table table-striped table-bordered" id="tablaChips">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">N°</th>
                                            <th style="width:8%;">ICC</th>
                                            <th style="width:13%;">NUMERO</th>
                                            <th style="width:10%;">OPERADORA</th>
                                            <th style="width:10%;">PRECIO</th>
                                            <th style="width:8%;">MOSTRADOR</th>
                                            <th style="width:9%;">FECHA REGISTRO</th>
                                            <th style="width:8%;">OPERACIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoChips">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                    
                
                    <div class="tab-pane fade " id="uidemo-tabs-default-demo-protectores">
                        <div class="panel-body">
                            <div class="table-primary">
                                <table class="table table-striped table-bordered" id="tablaProtectores">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">N°</th>
                                            <th style="width:8%;">TIPO</th>
                                            <th style="width:13%;">PRODUCTO</th>
                                            <th style="width:10%;">SUCURSAL</th>
                                            <th style="width:8%;">MOSTRADOR</th>
                                            <th style="width:9%;">FECHA REGISTRO</th>
                                            <th style="width:8%;">OPERACIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoProtectores">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                    
               
                    <div class="tab-pane fade " id="uidemo-tabs-default-demo-accesorios">
                        <div class="panel-body">
                            <div class="table-primary">
                                <table class="table table-striped table-bordered" id="tablaAccesorios">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">N°</th>
                                            <th style="width:8%;">TIPO</th>
                                            <th style="width:13%;">PRODUCTO</th>
                                            <th style="width:10%;">SUCURSAL</th>
                                            <th style="width:8%;">MOSTRADOR</th>
                                            <th style="width:9%;">FECHA REGISTRO</th>
                                            <th style="width:8%;">OPERACIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoAccesorios">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                    
                </div> <!-- / .tab-content -->

            </div>
        <!-- AQUI TERMINA EL PANEL -->
        </div>

    <div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="../assets/javascripts/jquery.min.js">'+"<"+"/script>"); </script>


<!-- Pixel Admin's javascripts -->
<script src="../assets/javascripts/bootstrap.min.js"></script>
<script src="../assets/javascripts/pixel-admin.min.js"></script>
<script src="../assets/javascripts/alicel1.js"></script>
<script src="../assets/javascripts/jquery.noty.js"></script>


<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    });
    window.PixelAdmin.start(init);
</script>
 <script type="text/javascript">

        function solonumeros(e) {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            numeros = "0123456789";
            especiales = "8-37-38-46"
            teclado_especial=false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial= true;
                }
            }

            if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
                return false;
            }
        }

        function telefonovalidation(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode
            if (unicode != 45 && unicode != 32) {
                if (unicode < 48 || unicode > 57) //if not a number
                { return false } //disable key press                
            }
        }

        function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

        function validarEmail(field) {
            usuario = field.value.substring(0, field.value.indexOf("@"));
            dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

            if ((usuario.length >=1) &&
                (dominio.length >=3) &&
                (usuario.search("@")==-1) &&
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) &&
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&
                (dominio.indexOf(".") >=1)&&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
                document.getElementById("msgemail").innerHTML="E-mail válido";
                alert("E-mail valido");
            }
            else{
                document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
                alert("E-mail invalido");
            }
        }
       
    </script>
</body>


</html>