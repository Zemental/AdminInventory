<?php
    include('../scripts/funciones.php');
    session_start();
    if(!isset($_SESSION['usuario']))
    {
        header("Location:../index.php");
    }
    else
    {
        date_default_timezone_set('America/Lima');
        $tipos = getTipoProtectores();
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Protectores | SGI Admin</title>
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
                        <li>
                            <a tabindex="-1" href="celulares.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Celulares</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="chips.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Chips</span></a>
                        </li>
                        <li class="active"> 
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
                            <a tabindex="-1" href="envioSucursales.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Envíos a Sucursales</span></a>
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
                            <a tabindex="-1" href="envioMercaderia.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Envíos de Mercadería</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="mercaderiaVendida.php"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Mercadería vendida</span></a>
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
                <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-mobile page-header-icon"></i>&nbsp;&nbsp;Inventario de Protectores</h1>
            </div>
        </div>

        <script>
            init.push(function () {
                $('#tablaProtectores').dataTable();
                $('#tablaProtectores_wrapper .table-caption').text('Listado General de Protectores');
                $('#tablaProtectores_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
                mostrarProtectores();
            });
        </script>
        
                <!-- Javascript -->
                <script>
                    function movieFormatResult(movie) {
                        var markup = "<table class='movie-result'><tr>";
                        if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
                            markup += "<td class='movie-image' style='vertical-align: top'><img src='" + movie.posters.thumbnail + "' style='max-width: 60px; display: inline-block; margin-right: 10px; margin-left: 10px;' /></td>";
                        }
                        markup += "<td class='movie-info'><div class='movie-title' style='font-weight: 600; color: #000; margin-bottom: 6px;'>" + movie.title + "</div>";
                        if (movie.critics_consensus !== undefined) {
                            markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
                        }
                        else if (movie.synopsis !== undefined) {
                            markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
                        }
                        markup += "</td></tr></table>";
                        return markup;
                    }

                    function movieFormatSelection(movie) {
                        return movie.title;
                    }

                    init.push(function () {
                        // Single select
                        $("#modeloCelular").select2({
                            allowClear: true,
                            placeholder: "Buscar modelo celular..."
                        });

                        // Multiselect
                        $("#jquery-select2-multiple").select2({
                            placeholder: "Select a State"
                        });

                        // External source
                        $("#jquery-select2-external").select2({
                            placeholder: "Search for a movie",
                            minimumInputLength: 1,
                            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                                url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
                                dataType: 'jsonp',
                                data: function (term, page) {
                                    return {
                                        q: term, // search term
                                        page_limit: 10,
                                        apikey: "ju6z9mjyajq2djue3gbvv26t" // please do not use so this example keeps working
                                    };
                                },
                                results: function (data, page) { // parse the results into the format expected by Select2.
                                    // since we are using custom formatting functions we do not need to alter remote JSON data
                                    return {results: data.movies};
                                }
                            },
                            initSelection: function(element, callback) {
                                // the input tag has a value attribute preloaded that points to a preselected movie's id
                                // this function resolves that id attribute to an object that select2 can render
                                // using its formatResult renderer - that way the movie name is shown preselected
                                var id=$(element).val();
                                if (id!=="") {
                                    $.ajax("http://api.rottentomatoes.com/api/public/v1.0/movies/"+id+".json", {
                                        data: {
                                            apikey: "ju6z9mjyajq2djue3gbvv26t"
                                        },
                                        dataType: "jsonp"
                                    }).done(function(data) { callback(data); });
                                }
                            },
                            formatResult: movieFormatResult, // omitted for brevity, see the source of this page
                            formatSelection: movieFormatSelection,  // omitted for brevity, see the source of this page
                            dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
                            escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
                        });

                        // Disabled state
                        $(".select2-disabled-examples select").select2({ placeholder: 'Select option...' });

                        // Colors
                        $(".select2-colors-examples select").select2();
                    });
                </script>
                <!-- / Javascript -->
              
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">                          
                    <a href="#" id="nuevoProtector" class="btn btn-primary btn-labeled" style="width:15%;">
                        <span class="btn-label icon fa fa-plus"></span>
                            Nuevo Protector
                    </a>                           
                </span>
            </div>
            <div class="panel-body">
                <div class="table-primary">
                    <table class="table table-striped table-bordered" id="tablaProtectores">
                        <thead>
                            <tr>
                                <th style="width:3%;">N°</th>
                                <th style="width:10%;">TIPO</th>
                                <th style="width:15%;">MODELO</th>                                  
                                <th style="width:5%;">CANTIDAD</th>                             
                                <th style="width:7%;">UBICACION</th>
                                <th style="width:8%;">OPERACIONES</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpoProtectores">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="modalProtector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="cabeceraRegistro"><b></b></h4>
                    </div>
                    <div class="modal-body">
                        <form action=""  method="POST" class="panel form-horizontal" id="formProtector">                            
                            <div class="panel-body select2-disabled-examples select2-colors-examples">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Tipo protector*</label>
                                            <select id="tipo" name="tipo" class="form-control">
                                                 <option value="">Seleccione...</option>
                                                  <?php foreach ($tipos as $tipo): ?>
                                                      <option value="<?= $tipo[0] ?>"><?= $tipo[1] ?></option>
                                                  <?php endforeach ?> 
                                            </select>
                                        </div>
                                    </div><!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Modelo celular*</label>
                                            <select id="modeloCelular" name="modeloCelular" class="form-control">
                                                 <option></option>
                                                  <?php foreach ($tipos as $tipo): ?>
                                                      <option value="<?= $tipo[0] ?>"><?= $tipo[1] ?></option>
                                                  <?php endforeach ?> 
                                            </select>
                                        </div>
                                    </div><!-- col-sm-6 -->
                                </div><!-- row -->
                                
                                <div class="row">                                    
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Cantidad*</label>
                                            <input type="number" id="cantidad" name="cantidad" class="form-control" autocomplete="off" placeholder="CANTIDAD">
                                        </div>
                                    </div><!-- col-sm-6 -->                                  
                                </div><!-- row -->
                            </div>
                            <input  type="hidden" id="operacion" name="operacion" value="Registrar"/>
                            <input  type="hidden" id="codigo" name="codigo"/>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary" id="registrarProtector">Guardar</button>
                                <button class="btn btn-default" data-dismiss="modal" id="cancelarProtector">Cancelar</button>
                            </div>
                        </form>
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
<script src="../assets/javascripts/protector.js"></script>
<script src="../assets/javascripts/jquery.noty.js"></script>
<script src="../assets/javascripts/jquery.mockjax.js"></script>
<script src="../assets/javascripts/demo-mock.js"></script>


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