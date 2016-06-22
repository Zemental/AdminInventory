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
                <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-mobile page-header-icon"></i>&nbsp;&nbsp;Inventario de Celulares</h1>
            </div>
        </div>
   
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="form-group">                                                              
                        <div class="col-md-3 col-md-offset-1">                                     
                            <label for="">TIPO DOCUMENTO</label>                        
                            <select class="form-control form-group-margin" id="param_documento" name="param_documento" >
                                <option value="" disabled selected style="display: none;">Seleccione Documento</option>
                                <option value="B"> BOLETA</option>';
                                <option value="F"> FACTURA</option>';
                            </select> 
                        </div> 
                        <div class="col-md-3 col-md-offset-1">                                     
                            <label for="">NUMERO</label>
                            <div class="input-group">
                                <input class="form-control col-md-12 " type="text" name="param_numeroDoc" id="param_numeroDoc" placeholder="N° DOCUMENTO" />                                           
                            </div>  
                        </div>
                        <div class="col-md-3">                                     
                            <label for="">Sucursal</label>                        
                            <select class="form-control form-group-margin" id="sucursal">
                                
                            </select> 
                        </div>                                           
                    </div>   
                    <div class="form-group">    
                        <!-- / CELULARES -->                                                                              
                        <div class="col-md-3 col-md-offset-1">                                     
                            <label for="">Celulares</label>                        
                             <div class="input-group">
                                <input type="text" class="form-control" id="param_celulares" name="param_celulares" placeholder="Buscar Celulares">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" id="buscarCelulares"><i class="fa fa-search"></i></button>
                                </span>
                            </div> <!-- / .input-group -->
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">IMEI</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-12 " type="text" name="param_imei" id="param_imei"/>                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">SERIE</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-12 " type="text" name="param_serie" id="param_serie">                            
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">P. UNITARIO</label>
                            <div class="input-group col-md-7">
                                <input disabled class="form-control col-md-6" type="text" name="param_precioCelular" id="param_precioCelular" placeholder="0.00">                            
                            </div>                                                                        
                        </div>                        
                        <input class="form-control col-md-12 " type="hidden" name="param_codigocelular" id="param_codigocelular">
                        <div class="col-md-1">                                     
                            <label for="">.</label>
                            <div class="input-group">
                                <button disabled type="button" class="btn btn-success btn-md ace-icon fa fa-plus" id="addRowCelular">
                                </button>                                           
                            </div>                                                                        
                        </div>                      
                    </div> 
                    <!-- / CHIPS -->    
                    <div class="form-group">                                                              
                        <div class="col-md-3 col-md-offset-1">                                     
                            <label for="">CHIP</label>                        
                             <div class="input-group">
                                <input type="text" class="form-control" id="param_chip" name="param_chip" placeholder="Buscar Chip">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" id="buscarChip"><i class="fa fa-search"></i></button>
                                </span>
                            </div> <!-- / .input-group -->
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">ICC</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-12 " type="text" name="param_icc" id="param_icc"/>                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">NUMERO</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-12 " type="text" name="param_numero" id="param_numero">                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">P. UNITARIO</label>
                            <div class="input-group col-md-7">
                                <input disabled class="form-control col-md-6" type="text" name="param_precioChips" id="param_precioChips" placeholder="0.00">                            
                            </div>                                                                        
                        </div>
                        <input class="form-control col-md-12 " type="hidden" name="param_codigoChip" id="param_codigoChip">
                        <div class="col-md-1">                                     
                            <label for="">.</label>
                            <div class="input-group">
                                <button disabled type="button" class="btn btn-success btn-md ace-icon fa fa-plus" id="addRowChips">
                                </button>                                           
                            </div>                                                                        
                        </div>                        
                    </div>   
                    <!-- / PROTECCTORES -->    
                    <div class="form-group">                                                              
                        <div class="col-md-4 col-md-offset-1">                                     
                            <label for="">PROTECTOR</label>                        
                             <div class="input-group">
                                <input type="text" class="form-control" id="param_protector" name="param_protector" placeholder="Buscar Protector">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" id="buscarProtector"><i class="fa fa-search"></i></button>
                                </span>
                            </div> <!-- / .input-group -->
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">TIPO</label>
                            <div class="input-group">
                                <input disabled="" class="form-control col-md-12 " type="text" name="param_tipoProtector" id="param_tipoProtector"/>                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-1">                                     
                            <label for="">CANTIDAD</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-6 " type="text" name="param_cantidadProtec" id="param_cantidadProtec" value="1" />                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">P. UNITARIO</label>
                            <div class="input-group col-md-7">
                                <input disabled class="form-control col-md-6" type="text" name="param_precioProtector" id="param_precioProtector" placeholder="0.00">                            
                            </div>                                                                        
                        </div>
                        <input  class="form-control col-md-12 " type="hidden" name="param_codigoProtector" id="param_codigoProtector"/>
                        <div class="col-md-1">                                     
                            <label for="">.</label>
                            <div class="input-group">
                                <button disabled type="button" class="btn btn-success btn-md ace-icon fa fa-plus" id="addRowProtector">
                                </button>                                           
                            </div>                                                                        
                        </div>                        
                    </div> 
                    <!-- / ACCESORIOS -->    
                    <div class="form-group">                                                              
                        <div class="col-md-4 col-md-offset-1">                                     
                            <label for="">ACCESORIO</label>                        
                             <div class="input-group">
                                <input type="text" class="form-control" id="param_accesorio" name="param_accesorio" placeholder="Buscar Accesorio">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" id="buscarAccesorio"><i class="fa fa-search"></i></button>
                                </span>
                            </div> <!-- / .input-group -->
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">CODIGO</label>
                            <div class="input-group">
                                <input disabled="" class="form-control col-md-12 " type="text" name="param_codAccesorio" id="param_codAccesorio"/>                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-1">                                     
                            <label for="">CANTIDAD</label>
                            <div class="input-group">
                                <input disabled class="form-control col-md-12 " type="text" name="param_cantidadAcce" id="param_cantidadAcce" value="1" />                                           
                            </div>                                                                        
                        </div>
                        <div class="col-md-2">                                     
                            <label for="">P. UNITARIO</label>
                            <div class="input-group col-md-7">
                                <input disabled class="form-control col-md-6" type="text" name="param_precioAccesorio" id="param_precioAccesorio" placeholder="0.00">                            
                            </div>                                                                        
                        </div>
                        <input disabled="" class="form-control col-md-12 " type="hidden" name="param_idAccesorio" id="param_idAccesorio"/>
                        <div class="col-md-1">                                     
                            <label for="">.</label>
                            <div class="input-group">
                                <button disabled type="button" class="btn btn-success btn-md ace-icon fa fa-plus" id="addRowAccesorios">
                                </button>                                           
                            </div>                                                                        
                        </div>                        
                    </div> 
                </div>
                <div class="panel-body">
                    <div class="table-primary">
                        <table class="table table-striped table-bordered" id="tablaDetalleVentas">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">CANTIDAD</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 25%;">DESCRIPCION</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">P. UNIT</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">IMPORTE</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">OPERACIONES</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoDetalleVentas">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">                    
                    <div class="form-group">    
                        <!-- / CELULARES -->                                                                              
                        <div class="col-sm-7 col-md-offset-9">                                     
                            <label class="col-sm-2 control-label" style="color:red">TOTAL S/.</label>
                                <div class="col-sm-2">
                                    <input type="text" name="param_total" id="param_total" class="form-control" disabled value="0">
                                </div>
                        </div>                                        
                    </div>
                </div>
                <!--button type="button" class="btn btn-danger btn-md ace-icon fa fa-plus" onclick="mostrar();">
                </button--> 
                <button type="button" class="btn btn-primary btn-md ace-icon fa fa-plus col-md-offset-5" id="registrarVentas"> REGISTRAR
                </button>
                <button type="button" class="btn btn-danger btn-md ace-icon fa fa-plus" id="cancelar"> CANCELAR
                </button>
            </div>
    </div>

    <div class="modal fade" id="modalBuscarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="cabeceraRegistro"><b></b></h4>
                </div>
                <div class="modal-body">
                    <div class="table-primary">
                        <table class="table table-striped table-bordered" id="tablaCelulares">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">CODIGO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">IMEI</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">SERIE</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">MARCA</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">MODELO</th>                    
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoCelulares">

                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBuscarChip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="cabeceraRegistro"><b>.:: Seleccionar Chip ::.</b></h4>
                </div>
                <div class="modal-body">
                    <div class="table-primary">
                        <table class="table table-striped table-bordered" id="tablaChip">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">CODIGO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">ICC</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">NUMERO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">DESCRIPCION</th>                             
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoChip">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBuscarProtector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="cabeceraRegistro"><b>.:: Seleccionar Protector ::.</b></h4>
                </div>
                <div class="modal-body">
                    <div class="table-primary">
                        <table class="table table-striped table-bordered" id="tablaProtector">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">CODIGO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">TIPO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">MODELO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">CANTIDAD</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoProtector">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBuscarAccesorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="cabeceraRegistro"><b>.:: Seleccionar Accesorio ::.</b></h4>
                </div>
                <div class="modal-body">
                    <div class="table-primary">
                        <table class="table table-striped table-bordered" id="tablaAccesorio">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">CODIGO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">TIPO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">CODIGO</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">DESCRIPCION</th>
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">CANTIDAD</th>                    
                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoAccesorio">

                            </tbody>
                        </table>
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


<!-- Pixel Admin's javascripts -->
<script src="../assets/javascripts/bootstrap.min.js"></script>
<script src="../assets/javascripts/pixel-admin.min.js"></script>
<script src="../assets/javascripts/ventasRealizadas.js"></script>
<script src="../assets/javascripts/jquery.noty.js"></script>

<script type="text/javascript">
    init.push(function () {        
        $('#tablaDetalleVentas').DataTable({
            "bPaginate": false,
            "bFilter": false,
            "bInfo": false
        }); 
        $('#tablaDetalleVentas_wrapper .table-caption').text('Detalle de Envio');
        mostrarSucursal();
        agregarDetalleEnvio();
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