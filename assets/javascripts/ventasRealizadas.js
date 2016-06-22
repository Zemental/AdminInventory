
window.productoId = [];
window.cantidadVenta = [];
window.precioVenta = [];
window.importeVenta = [];

var contador = 0;
var importe = 0;
var montoTotal = 0;
var montoParcial = 0;
var montoNeto = 0;


window.onload = function(){ 
    $('#tablaDetalleVentas').DataTable();  
    agregarDetalleEnvio();
    mostrarSucursal();
    mostrarVentas();
}

$(function() {    
    $('#buscarCelulares').on('click', function(){  
        //lert('fdfdsg');
        var sucursal = document.getElementById('sucursal').value;    
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });
        var param_opcion = 'mostrar_celulares';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal,
            url: '../controllers/controlVentas/ventasController.php',
            success: function(data){
                $('#tablaCelulares').DataTable().destroy();
                $('#cuerpoCelulares').html(data);
                $('#tablaCelulares').DataTable();           
            },
            error: function(data){
                       
            }
        }); 
    }); 

    $('#buscarChip').on('click', function(){                   
        var sucursal = document.getElementById('sucursal').value;
        $('#modalBuscarChip').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_chip';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal,
            url: '../controllers/controlVentas/ventasController.php',
            success: function(data){
                $('#tablaChip').DataTable().destroy();
                $('#cuerpoChip').html(data);
                $('#tablaChip').DataTable();           
            },
            error: function(data){
                       
            }
        }); 
    }); 

    $('#buscarProtector').on('click', function(){                   
        var sucursal = document.getElementById('sucursal').value;
        $('#modalBuscarProtector').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_protector';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal,
            url: '../controllers/controlVentas/ventasController.php',
            success: function(data){
                $('#tablaProtector').DataTable().destroy();
                $('#cuerpoProtector').html(data);
                $('#tablaProtector').DataTable();           
            },
            error: function(data){
                       
            }
        }); 
    });

    $('#buscarAccesorio').on('click', function(){                   
        var sucursal = document.getElementById('sucursal').value;
        $('#modalBuscarAccesorio').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_accesorio';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal,
            url: '../controllers/controlVentas/ventasController.php',
            success: function(data){
                $('#tablaAccesorio').DataTable().destroy();
                $('#cuerpoAccesorio').html(data);
                $('#tablaAccesorio').DataTable();           
            },
            error: function(data){
                       
            }
        }); 
    });  


    $('#registrarVentas').on('click', function(){                   
        var sucursal = document.getElementById('sucursal').value;
        var tipodocumento = document.getElementById('param_documento').value;
        var numeroDocumento = document.getElementById('param_numeroDoc').value;
        var total = document.getElementById('param_total').value;
        var param_opcion = 'registro_venta';
        if (sucursal == '') {
            alert('Seleccione una Sucursal a donde desea enviar los datos');
        } else {
            if (productoId.length == 0) {
                alert('Seleccione almenos un producto para registrar ventas.')
            } else {
                $.ajax({
                    type: 'POST',        
                    data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal+'&param_tipodoc='+tipodocumento+'&param_numerodoc='+numeroDocumento+'&param_total='+total+'&param_productos='+productoId+'&param_cantidad='+cantidadVenta+'&param_precio='+precioVenta+'&param_importe='+importeVenta,
                    url: '../controllers/controlVentas/ventasController.php',
                    success: function(data){
                       alert('Registro Correcto');
                       location.href='ventas.php';         
                    },
                    error: function(data){
                               
                    }
                });
            }
        }
         
    });

    $('#cancelar').on('click', function(){                   
        location.href='ventas.php';
    });

    $('#reporteVentas').on('click', function(){                   
       open("../reportes/ReporteVentas.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes, top=100,left=300, width: 1000,height: 400");
    }); 

    $('#reporteVentasExcel').on('click', function(){ 
        //alert('dgfdg');
        location.href = '../reportes/reporteVentasExcel.php';
       //open("../reportes/ReporteEnvios.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes, top=100,left=300, width: 1000,height: 400");
    }); 

});

function agregarDetalleEnvio() {
    var t = $('#tablaDetalleVentas').DataTable();
    $('#addRowCelular').on( 'click', function () {
        //alert('agregar celular')
        var codigoCelular       = document.getElementById('param_codigocelular').value;
        var celular             = document.getElementById('param_celulares').value;
        var imei                = document.getElementById('param_imei').value;
        var serie               = document.getElementById('param_serie').value; 
        var precioUnitario      = document.getElementById('param_precioCelular').value;

        if (precioUnitario == '') {
            alert('Ingrese el Precio Unitario')
        } else {
            importe = 1 * parseFloat(precioUnitario);        
            t.row.add( [
                '<center>'+1+'</center>',
                '<strong>IMEI: </strong>'+imei+' / <strong>SERIE: </strong>'+serie+' / <strong>MODELO: </strong>'+celular, 
                '<center>'+precioUnitario+'</center>',
                '<center>'+parseFloat(importe)+'</center>',          
                '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+codigoCelular+"'"+',1,'+"'"+importe+"'"+')">Eliminar</button>',
            ] ).draw( false );
            productoId.push(codigoCelular);
            cantidadVenta.push(1);
            precioVenta.push(precioUnitario);
            importeVenta.push(importe);
            contador++;
            montoTotal = montoTotal + importe;
            montoParcial = 0.18*(montoTotal);
            montoNeto = montoTotal + montoParcial;

            var documento = document.getElementById('param_documento').value;
            if (documento == 'B') {            
                document.getElementById('param_total').value=montoTotal;
                //alert('BOleta');
            } else {            
                document.getElementById('param_total').value=montoNeto;
                //alert('Factura');
            }

            document.getElementById('param_codigocelular').value="";
            document.getElementById('param_celulares').value="";
            document.getElementById('param_imei').value="";
            document.getElementById('param_serie').value=""; 
            document.getElementById('param_precioCelular').value=""; 
            document.getElementById('addRowCelular').disabled=true;
            document.getElementById('param_precioCelular').disabled=true;
        }
        // para el descuento normal
    } );

    $('#addRowChips').on( 'click', function () {
        //alert('agregar chips')
        var chip            = document.getElementById('param_chip').value;
        var icc             = document.getElementById('param_icc').value;
        var numero          = document.getElementById('param_numero').value;
        var idChip          = document.getElementById('param_codigoChip').value; 
        var precioUnitario  = document.getElementById('param_precioChips').value;

        if (precioUnitario == '') {
            alert('Ingrese el Precio Unitario')
        } else {
            var importe = 1 * parseFloat(precioUnitario);       
            t.row.add( [
                '<center>'+1+'</center>',
                '<strong>ICC: </strong>'+icc+' / <strong>NUMERO: </strong>'+numero+' / <strong>OPERADOR: </strong>'+chip,
                '<center>'+precioUnitario+'</center>',
                '<center>'+parseFloat(importe)+'</center>',              
                '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idChip+"'"+',1,'+"'"+importe+"'"+')">Eliminar</button>',
            ] ).draw(false);
            productoId.push(idChip);
            cantidadVenta.push(1);
            precioVenta.push(precioUnitario);
            importeVenta.push(importe);
            contador = contador + 1;
            montoTotal = montoTotal + importe;
            montoParcial = 0.18*(montoTotal);
            montoNeto = montoTotal + montoParcial;

            var documento = document.getElementById('param_documento').value;
            if (documento == 'B') {            
                document.getElementById('param_total').value=montoTotal;
                //alert('BOleta');
            } else {            
                document.getElementById('param_total').value=montoNeto;
                //alert('Factura');
            }
            document.getElementById('param_chip').value="";
            document.getElementById('param_icc').value="";
            document.getElementById('param_numero').value="";
            document.getElementById('param_codigoChip').value=""; 
            document.getElementById('param_precioChips').value=""; 
            document.getElementById('addRowChips').disabled=true;
            document.getElementById('param_precioChips').disabled=true;
        }
        
        // para el descuento normal
    } );  

    $('#addRowProtector').on( 'click', function () {
        //alert('agregar protector')
        var modelo           = document.getElementById('param_protector').value;
        var tipo             = document.getElementById('param_tipoProtector').value;
        var cantidad         = document.getElementById('param_cantidadProtec').value;
        var idProtector      = document.getElementById('param_codigoProtector').value;
        var precioUnitario   = document.getElementById('param_precioProtector').value;

        if (precioUnitario == '') {
            alert('Ingrese el Precio Unitario')
        } else {
            var importe = parseFloat(cantidad) * parseFloat(precioUnitario);      
            t.row.add( [
                '<center>'+cantidad+'</center>',
                '<strong>TIPO: </strong>'+tipo+' / <strong>MODELO: </strong>'+modelo,   
                '<center>'+precioUnitario+'</center>',
                '<center>'+parseFloat(importe)+'</center>',          
                '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idProtector+"'"+','+"'"+cantidad+"'"+','+"'"+importe+"'"+')">Eliminar</button>',
            ] ).draw( false );
            productoId.push(idProtector);
            cantidadVenta.push(cantidad);
            precioVenta.push(precioUnitario);
            importeVenta.push(importe);
            contador = contador + parseFloat(cantidad);

            montoTotal = montoTotal + importe;
            montoParcial = 0.18*(montoTotal);
            montoNeto = montoTotal + montoParcial;

            var documento = document.getElementById('param_documento').value;
            if (documento == 'B') {            
                document.getElementById('param_total').value=montoTotal;
                //alert('BOleta');
            } else {            
                document.getElementById('param_total').value=montoNeto;
                //alert('Factura');
            }
            document.getElementById('param_protector').value="";
            document.getElementById('param_tipoProtector').value="";
            document.getElementById('param_cantidadProtec').value="1";
            document.getElementById('param_codigoProtector').value=""; 
            document.getElementById('param_precioProtector').value="";
            document.getElementById('addRowProtector').disabled=true;
            document.getElementById('param_cantidadProtec').disabled=true;
            document.getElementById('param_precioProtector').disabled=true;
        }
        // para el descuento normal
    } );

    $('#addRowAccesorios').on( 'click', function () {
        //alert('agregar accesorio')
        var accesorio    = document.getElementById('param_accesorio').value;
        var codigo       = document.getElementById('param_codAccesorio').value;
        var cantidad     = document.getElementById('param_cantidadAcce').value;
        var idAcesorio   = document.getElementById('param_idAccesorio').value;  
        var precioUnitario   = document.getElementById('param_precioAccesorio').value;

        if (precioUnitario == '') {
            alert('Ingrese el Precio Unitario')
        } else {
           var importe = parseFloat(cantidad) * parseFloat(precioUnitario);      
            t.row.add( [
                '<center>'+cantidad+'</center>',
                '<strong>CODIGO: </strong>'+codigo+' / <strong>MODELO: </strong>'+accesorio, 
                '<center>'+precioUnitario+'</center>',
                '<center>'+parseFloat(importe)+'</center>',            
                '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idAcesorio+"'"+','+"'"+cantidad+"'"+','+"'"+importe+"'"+')">Eliminar</button>',
            ] ).draw( false );
            productoId.push(idAcesorio);
            cantidadVenta.push(cantidad);
            precioVenta.push(precioUnitario);
            importeVenta.push(importe);
            contador = contador + parseFloat(cantidad);

            montoTotal = montoTotal + importe;
            montoParcial = 0.18*(montoTotal);
            montoNeto = montoTotal + montoParcial;

            var documento = document.getElementById('param_documento').value;
            if (documento == 'B') {            
                document.getElementById('param_total').value=montoTotal;
                //alert('BOleta');
            } else {            
                document.getElementById('param_total').value=montoNeto;
                //alert('Factura');
            }
            document.getElementById('param_accesorio').value="";
            document.getElementById('param_codAccesorio').value="";
            document.getElementById('param_cantidadAcce').value="1";
            document.getElementById('param_codigoProtector').value="";
            document.getElementById('param_precioAccesorio').value=""; 
            document.getElementById('addRowAccesorios').disabled=true;
            document.getElementById('param_cantidadAcce').disabled=true;
            document.getElementById('param_precioAccesorio').disabled=true; 
        }
        // para el descuento normal
    } ); 

    $('#tablaDetalleVentas tbody').on( 'click', 'button', function () {
        t
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    }); 
}

function mostrarSucursal(){ 
    var param_opcion = 'combo_sucursal';
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            $('#sucursal').html(data);            
        },
        error: function(data){
                   
        }
    });    
}

function mostrarVentas(){ 
    var param_opcion = 'listar_ventas';
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            $('#tablaVentas').DataTable().destroy();
            $('#cuerpoVentas').html(data);
            $('#tablaVentas').DataTable();              
        },
        error: function(data){
                   
        }
    });    
}

function agregarCelular(id){ 
    var param_opcion = 'seleccion_celular';
    $('#modalBuscarProductos').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#param_celulares").val(objeto[1]);
            $("#param_imei").val(objeto[2]);
            $("#param_serie").val(objeto[3]);
            $("#param_codigocelular").val(objeto[0]);        
        },
        error: function(data){
                   
        }
    }); 
    document.getElementById('addRowCelular').disabled = false; 
    document.getElementById('param_precioCelular').disabled=false;  
    document.getElementById('sucursal').disabled=true;
    document.getElementById('param_documento').disabled=true;
}

function agregarChip(id){ 
    var param_opcion = 'seleccion_chip';
    $('#modalBuscarChip').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#param_chip").val(objeto[3]);
            $("#param_icc").val(objeto[1]);
            $("#param_numero").val(objeto[2]);
            $("#param_codigoChip").val(objeto[0]);        
        },
        error: function(data){
                   
        }
    }); 
    document.getElementById('addRowChips').disabled = false;
    document.getElementById('param_precioChips').disabled=false;  
}

function agregarProtector(id){ 
    var param_opcion = 'seleccion_protector';
    $('#modalBuscarProtector').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#param_protector").val(objeto[2]);
            $("#param_tipoProtector").val(objeto[1]);
            $("#param_codigoProtector").val(objeto[0]);        
        },
        error: function(data){
                   
        }
    });  
    document.getElementById('addRowProtector').disabled = false;
    document.getElementById('param_cantidadProtec').disabled=false; 
    document.getElementById('param_precioProtector').disabled=false;   
}


function agregarAccesorio(id){ 
    var param_opcion = 'seleccion_accesorio';
    $('#modalBuscarAccesorio').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlVentas/ventasController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#param_accesorio").val(objeto[1]);
            $("#param_codAccesorio").val(objeto[2]);
            $("#param_idAccesorio").val(objeto[0]);        
        },
        error: function(data){
                   
        }
    });   
    document.getElementById('addRowAccesorios').disabled = false;
    document.getElementById('param_cantidadAcce').disabled=false;   
    document.getElementById('param_precioAccesorio').disabled=false; 
}

function Eliminar(producto, cantidad, importe) {  
    var pos = productoId.indexOf(producto);
    productoId.splice(pos, 1);
    cantidadVenta.splice(pos, 1);
    precioVenta.splice(pos, 1);
    importeVenta.splice(pos, 1);
    contador = contador - parseFloat(cantidad);
    var documento = document.getElementById('param_documento').value;
    if (documento == 'B') {
        montoTotal = montoTotal-importe;            
        document.getElementById('param_total').value=montoTotal;
        //alert('BOleta');
    } else {  
        montoTotal = montoTotal - importe;
        montoParcial = 0.18*(montoTotal);
        montoNeto = montoTotal + montoParcial;          
        document.getElementById('param_total').value=montoNeto;
        //alert('Factura');
    }
    //document.getElementById('param_total').value=contador;
}


function mostrar() {
    //alert('sfgdg');
    console.log(productoId.toString());
    console.log(cantidadVenta.toString());
    console.log(precioVenta.toString());
    console.log(importeVenta.toString());
    //alert(contador);
}






