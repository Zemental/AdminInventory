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
    <title>Envíos | SGI Admin</title>
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
                        <li>
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
                    <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Gestionar Movimientos</span></a>
                    <ul>
                        <li class="active">
                            <a tabindex="-1" href="envios.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Envíos a Sucursales</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="ventas.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Ventas Realizadas</span></a>
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
                <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-mobile page-header-icon"></i>&nbsp;&nbsp;Saldo de Mercadería Por Sucursal</h1>
            </div>
        </div>
    
        <div class="panel">          
            <div class="panel-body">
                <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    <li class="active">
                        <a href="#uidemo-tabs-default-demo-sucursal1" data-toggle="tab">ALICEL 1</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-sucursal2" data-toggle="tab">ALICEL 2</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-sucursal3" data-toggle="tab">ENTEL</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-sucursal4" data-toggle="tab">PIZARRO</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-sucursal5" data-toggle="tab">ALMAGRO</a>
                    </li>
                    <li class="">
                        <a href="#uidemo-tabs-default-demo-sucursal6" data-toggle="tab">AS MOVILES</a>
                    </li>
                </ul>

                <div class="tab-content tab-content-bordered">
                    <!-- SUCURSAL 1 -->
                    <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-sucursal1">
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularAlicel1PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularAlicel1Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel1">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel1">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsAlicel1PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsAlicel1Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel1">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">ICC</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel1">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosAlicel1PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosAlicel1Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel1">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel1">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresAlicel1PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresAlicel1Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                        
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel1">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel1">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->

                        </div>
                    </div>
                    <!-- SUCURSAL 2 -->
                    <div class="tab-pane fade" id="uidemo-tabs-default-demo-sucursal2">                        
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares2" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips2" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios2" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores2" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares2">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularAlicel2PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularAlicel2Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel2">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel2">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips2">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsAlicel2PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsAlicel2Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                         
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel2">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel2">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios2">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosAlicel2PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosAlicel2Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel2">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel2">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores2">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresAlicel2PDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresAlicel2Excel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel2">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel2">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->
                        </div>
                    </div>
                    <!-- SUCURSAL 3 -->
                    <div class="tab-pane fade" id="uidemo-tabs-default-demo-sucursal3">
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares3" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips3" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios3" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores3" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares3">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularEntelPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularEntelExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                  
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel3">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel3">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips3">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsEntelPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsEntelExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                           
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel3">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel3">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios3">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosEntelPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosEntelExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel3">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel3">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores3">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresEntelPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresEntelExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                    
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel3">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel3">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->
                        </div>
                    </div>
                    <!-- SUCURSAL 4 -->
                    <div class="tab-pane fade" id="uidemo-tabs-default-demo-sucursal4">
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares4" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips4" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios4" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores4" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares4">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularPizarroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularPizarroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel4">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel4">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips4">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsPizarroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsPizarroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                         
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel4">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel4">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios4">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosPizarroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosPizarroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                       
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel4">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel4">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores4">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresPizarroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresPizarroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel4">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel4">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->
                        </div>
                    </div>
                    <!-- SUCURSAL 5 ME KEDE -->
                    <div class="tab-pane fade" id="uidemo-tabs-default-demo-sucursal5">
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares5" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips5" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios5" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores5" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares5">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularAlmagroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularAlmagroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                        
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel5">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel5">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips5">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsAlmagroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsAlmagroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                    
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel5">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel5">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios5">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosAlmagroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosAlmagroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                    
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel5">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel5">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores5">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresAlmagroPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresAlmagroExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                      
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel5">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel5">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->
                        </div>
                    </div>
                    <!-- SUCURSAL 6 -->
                    <div class="tab-pane fade" id="uidemo-tabs-default-demo-sucursal6">
                        <div class="panel-body">
                            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#uidemo-tabs-default-demo-celulares6" data-toggle="tab">CELULARES</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-chips6" data-toggle="tab">CHIPS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-accesorios6" data-toggle="tab">ACCESORIOS</a>
                                </li>
                                <li class="">
                                    <a href="#uidemo-tabs-default-demo-protectores6" data-toggle="tab">PROTECTORES</a>
                                </li>                                
                            </ul>
                            <div class="tab-content tab-content-bordered">
                                <div class="tab-pane fade active in" id="uidemo-tabs-default-demo-celulares6">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteCelularMovilesPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteCelularMovilesExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                         
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaCelularAlicel6">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">MODELO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoCelularAlicel6">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-chips6">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteChipsMovilesPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteChipsMovilesExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                          
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaChipAlicel6">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">IMEI</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">SERIE</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERADORA</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoChipAlicel6">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-accesorios6">                                    
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteAccesoriosMovilesPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteAccesoriosMovilesExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>                       
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaAcessoriosAlicel6">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CODIGO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoAcessoriosAlicel6">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="uidemo-tabs-default-demo-protectores6">
                                    <div class="panel-heading">
                                        <span class="panel-title">                                              
                                            <button class="btn btn-md btn-labeled btn-danger col-md-offset-8" id="reporteProtectoresMovilesPDF"><span class="btn-label icon fa fa-file-text"></span>Exportar PDF</button> 
                                            <button class="btn btn-md btn-labeled btn-success" id="reporteProtectoresMovilesExcel"><span class="btn-label icon fa fa-file-text"></span>Exportar EXCEL</button>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-primary">
                                            <table class="table table-striped table-bordered" id="tablaProtectoresAlicel6">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">COD PRODUCTO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">TIPO</th>                                                    
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">DESCRIPCION</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">STOCK</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">VENDIDAS</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">SALDO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpoProtectoresAlicel6">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- / .tab-content -->
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
<script src="../assets/javascripts/saldoMecaderia.js"></script>
<script src="../assets/javascripts/jquery.noty.js"></script>

<script type="text/javascript">
    init.push(function () {        
        $('#tablaCelularAlicel1').DataTable(); 
        $('#tablaCelularAlicel1_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel1').DataTable(); 
        $('#tablaChipAlicel1_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel1').DataTable(); 
        $('#tablaAcessoriosAlicel1_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel1').DataTable(); 
        $('#tablaProtectoresAlicel1_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel1(); 
        chipAlicel1();
        accesorioAlicel1();
        protectoresAlicel1();      
        $('#tablaCelularAlicel2').DataTable(); 
        $('#tablaCelularAlicel2_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel2').DataTable(); 
        $('#tablaChipAlicel2_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel2').DataTable(); 
        $('#tablaAcessoriosAlicel2_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel2').DataTable(); 
        $('#tablaProtectoresAlicel2_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel2(); 
        chipAlicel2();
        accesorioAlicel2();
        protectoresAlicel2(); 
        $('#tablaCelularAlicel3').DataTable(); 
        $('#tablaCelularAlicel3_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel3').DataTable(); 
        $('#tablaChipAlicel3_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel3').DataTable(); 
        $('#tablaAcessoriosAlicel3_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel3').DataTable(); 
        $('#tablaProtectoresAlicel3_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel3(); 
        chipAlicel3();
        accesorioAlicel3();
        protectoresAlicel3();
        $('#tablaCelularAlicel4').DataTable(); 
        $('#tablaCelularAlicel4_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel4').DataTable(); 
        $('#tablaChipAlicel4_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel4').DataTable(); 
        $('#tablaAcessoriosAlicel4_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel4').DataTable(); 
        $('#tablaProtectoresAlicel4_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel4(); 
        chipAlicel4();
        accesorioAlicel4();
        protectoresAlicel4(); 
        $('#tablaCelularAlicel5').DataTable(); 
        $('#tablaCelularAlicel5_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel5').DataTable(); 
        $('#tablaChipAlicel5_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel5').DataTable(); 
        $('#tablaAcessoriosAlicel5_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel5').DataTable(); 
        $('#tablaProtectoresAlicel5_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel5(); 
        chipAlicel5();
        accesorioAlicel5();
        protectoresAlicel5();
        $('#tablaCelularAlicel6').DataTable(); 
        $('#tablaCelularAlicel6_wrapper .table-caption').text('Celulares');
        $('#tablaCelularAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaChipAlicel6').DataTable(); 
        $('#tablaChipAlicel6_wrapper .table-caption').text('Chips');
        $('#tablaChipAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaAcessoriosAlicel6').DataTable(); 
        $('#tablaAcessoriosAlicel6_wrapper .table-caption').text('Accesorios');
        $('#tablaAcessoriosAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        $('#tablaProtectoresAlicel6').DataTable(); 
        $('#tablaProtectoresAlicel6_wrapper .table-caption').text('Protectores');
        $('#tablaProtectoresAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
        celularesAlicel6(); 
        chipAlicel6();
        accesorioAlicel6();
        protectoresAlicel6(); 


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