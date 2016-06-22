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
    <title>Principal | SGI Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
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
                <!-- Menu custom content demo
                     CSS:        styles/pixel-admin-less/demo.less or styles/pixel-admin-scss/_demo.scss
                     Javascript: html/assets/demo/demo.js
                 -->
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
                        <li >
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

        <div class="row">
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/clientes.jpg">
                        <div class="mask">
                            <p style="margin-top: 30px;">CLIENTES</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/pacientes.jpg">
                        <div class="mask">
                            <p style="margin-top: 30px;">PACIENTES</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/atenciones.jpg">
                        <div class="mask">
                            <p style="margin-top: 30px;">ATENCIONES</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/facturacion.png">
                        <div class="mask">
                            <p style="margin-top: 30px;">FACTURACIÓN</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">                
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/almacen.jpg">
                        <div class="mask">
                            <p style="margin-top: 30px;">ALMACÉN</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view">
                        <img class="img-responsive" src="../assets/images/reportes.png">
                        <div class="mask">
                            <p style="margin-top: 30px;">REPORTES</p>
                            <a href="#" class="info">INGRESAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="../assets/javascripts/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- Pixel Admin's javascripts -->
<script src="../assets/javascripts/bootstrap.min.js"></script>
<script src="../assets/javascripts/pixel-admin.min.js"></script>

<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    });
    window.PixelAdmin.start(init);
</script>

</body>

<!-- Mirrored from infinite-woodland-5276.herokuapp.com/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 May 2016 05:21:23 GMT -->
</html>