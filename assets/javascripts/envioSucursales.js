
window.productoId = [];
window.cantidadEnvio = [];
var contador = 0


window.onload = function(){ 
    $('#tablaDetalleEnvios').DataTable();  
    agregarDetalleEnvio();
    mostrarSucursal();
    mostrarEnvios();
}

$(function() {    
    $('#buscarCelulares').on('click', function(){                      
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });
        var param_opcion = 'mostrar_celulares';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion,
            url: '../controllers/controlEnvios/enviosController.php',
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
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#modalBuscarChip').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_chip';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion,
            url: '../controllers/controlEnvios/enviosController.php',
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
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#modalBuscarProtector').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_protector';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion,
            url: '../controllers/controlEnvios/enviosController.php',
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
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#modalBuscarAccesorio').modal({
            show:true,
            backdrop:'static'
        });

        var param_opcion = 'mostrar_accesorio';
        $.ajax({
            type: 'POST',        
            data:'param_opcion='+param_opcion,
            url: '../controllers/controlEnvios/enviosController.php',
            success: function(data){
                $('#tablaAccesorio').DataTable().destroy();
                $('#cuerpoAccesorio').html(data);
                $('#tablaAccesorio').DataTable();           
            },
            error: function(data){
                       
            }
        }); 
    });  

    $('#registrarEnvio').on('click', function(){                   
        //alert('Registro Envio');
        var sucursal = document.getElementById('sucursal').value;
        var total = document.getElementById('param_total').value;
        var param_opcion = 'registro_envio';
        if (sucursal == '') {
            alert('Seleccione una Sucursal a donde desea enviar los datos');
        } else {
            if (productoId.length == 0) {
                alert('Seleccione almenos un producto a enviar.')
            } else {
                $.ajax({
                    type: 'POST',        
                    data:'param_opcion='+param_opcion+'&param_sucursal='+sucursal+'&param_total='+total+'&param_productos='+productoId+'&param_cantidad='+cantidadEnvio,
                    url: '../controllers/controlEnvios/enviosController.php',
                    success: function(data){
                       alert('Registro Correcto');
                       location.href='envios.php';         
                    },
                    error: function(data){
                               
                    }
                });
            }
        }
         
    });

    $('#cancelar').on('click', function(){                   
        location.href='envios.php';
    }); 
});

function agregarDetalleEnvio() {
    var t = $('#tablaDetalleEnvios').DataTable();
    $('#addRowCelular').on( 'click', function () {
        //alert('agregar celular')
        var codigoCelular       = document.getElementById('param_codigocelular').value;
        var celular             = document.getElementById('param_celulares').value;
        var imei                = document.getElementById('param_imei').value;
        var serie               = document.getElementById('param_serie').value;        
        t.row.add( [
            '<center>'+1+'</center>',
            '<strong>IMEI: </strong>'+imei+' / <strong>SERIE: </strong>'+serie+' / <strong>MODELO: </strong>'+celular,           
            '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+codigoCelular+"'"+',1)">Eliminar</button>',
        ] ).draw( false );
        productoId.push(codigoCelular);
        cantidadEnvio.push(1);
        contador++;
        document.getElementById('param_total').value=contador;
        document.getElementById('param_codigocelular').value="";
        document.getElementById('param_celulares').value="";
        document.getElementById('param_imei').value="";
        document.getElementById('param_serie').value=""; 
        document.getElementById('addRowCelular').disabled=true;
        // para el descuento normal
    } );

    $('#addRowChips').on( 'click', function () {
        //alert('agregar chips')
        var chip            = document.getElementById('param_chip').value;
        var icc             = document.getElementById('param_icc').value;
        var numero          = document.getElementById('param_numero').value;
        var idChip          = document.getElementById('param_codigoChip').value;        
        t.row.add( [
            '<center>'+1+'</center>',
            '<strong>ICC: </strong>'+icc+' / <strong>NUMERO: </strong>'+numero+' / <strong>OPERADOR: </strong>'+chip,           
            '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idChip+"'"+',1)">Eliminar</button>',
        ] ).draw(false);
        productoId.push(idChip);
        cantidadEnvio.push(1);
        contador = contador + 1;
        document.getElementById('param_total').value=contador;
        document.getElementById('param_chip').value="";
        document.getElementById('param_icc').value="";
        document.getElementById('param_numero').value="";
        document.getElementById('param_codigoChip').value=""; 
        document.getElementById('addRowChips').disabled=true;
        // para el descuento normal
    } );  

    $('#addRowProtector').on( 'click', function () {
        //alert('agregar protector')
        var modelo           = document.getElementById('param_protector').value;
        var tipo             = document.getElementById('param_tipoProtector').value;
        var cantidad         = document.getElementById('param_cantidadProtec').value;
        var idProtector      = document.getElementById('param_codigoProtector').value;        
        t.row.add( [
            '<center>'+cantidad+'</center>',
            '<strong>TIPO: </strong>'+tipo+' / <strong>MODELO: </strong>'+modelo,           
            '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idProtector+"'"+','+"'"+cantidad+"'"+')">Eliminar</button>',
        ] ).draw( false );
        productoId.push(idProtector);
        cantidadEnvio.push(cantidad);
        contador = contador + parseFloat(cantidad);
        document.getElementById('param_total').value=contador;
        document.getElementById('param_protector').value="";
        document.getElementById('param_tipoProtector').value="";
        document.getElementById('param_cantidadProtec').value="1";
        document.getElementById('param_codigoProtector').value=""; 
        document.getElementById('addRowProtector').disabled=true;
        document.getElementById('param_cantidadProtec').disabled=true;
        // para el descuento normal
    } );

    $('#addRowAccesorios').on( 'click', function () {
        //alert('agregar accesorio')
        var accesorio    = document.getElementById('param_accesorio').value;
        var codigo       = document.getElementById('param_codAccesorio').value;
        var cantidad     = document.getElementById('param_cantidadAcce').value;
        var idAcesorio   = document.getElementById('param_idAccesorio').value;        
        t.row.add( [
            '<center>'+cantidad+'</center>',
            '<strong>CODIGO: </strong>'+codigo+' / <strong>MODELO: </strong>'+accesorio,           
            '<button class="btn btn-danger btn-xs center deleteValid col-md-offset-4" onclick="Eliminar('+"'"+idAcesorio+"'"+','+"'"+cantidad+"'"+')">Eliminar</button>',
        ] ).draw( false );
        productoId.push(idAcesorio);
        cantidadEnvio.push(cantidad);
        contador = contador + parseFloat(cantidad);
        document.getElementById('param_total').value=contador;
        document.getElementById('param_accesorio').value="";
        document.getElementById('param_codAccesorio').value="";
        document.getElementById('param_cantidadAcce').value="1";
        document.getElementById('param_codigoProtector').value=""; 
        document.getElementById('addRowAccesorios').disabled=true;
        document.getElementById('param_cantidadAcce').disabled=true;
        // para el descuento normal
    } ); 

    $('#tablaDetalleEnvios tbody').on( 'click', 'button', function () {
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
        url: '../controllers/controlEnvios/enviosController.php',
        success: function(data){
            $('#sucursal').html(data);            
        },
        error: function(data){
                   
        }
    });    
}

function mostrarEnvios(){ 
    var param_opcion = 'listar_envios';
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion,
        url: '../controllers/controlEnvios/enviosController.php',
        success: function(data){
            $('#tablaEnvios').DataTable().destroy();
            $('#cuerpoEnvios').html(data);
            $('#tablaEnvios').DataTable();              
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
        url: '../controllers/controlEnvios/enviosController.php',
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
}

function agregarChip(id){ 
    var param_opcion = 'seleccion_chip';
    $('#modalBuscarChip').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlEnvios/enviosController.php',
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
}

function agregarProtector(id){ 
    var param_opcion = 'seleccion_protector';
    $('#modalBuscarProtector').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlEnvios/enviosController.php',
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
}


function agregarAccesorio(id){ 
    var param_opcion = 'seleccion_accesorio';
    $('#modalBuscarAccesorio').modal('hide');
    //alert(id);
    $.ajax({
        type: 'POST',        
        data:'param_opcion='+param_opcion+'&param_id='+id,
        url: '../controllers/controlEnvios/enviosController.php',
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
}

function Eliminar(producto, cantidad) {  
    var pos = productoId.indexOf(producto);
    productoId.splice(pos, 1);
    cantidadEnvio.splice(pos, 1);
    contador = contador - parseFloat(cantidad);
    document.getElementById('param_total').value=contador;
}


function mostrar() {
    //alert('sfgdg');
    console.log(productoId.toString());
    console.log(cantidadEnvio.toString());
    alert(contador);
}






