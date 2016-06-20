window.onload = function(){    
    $('#tablaAccesorios').dataTable();    
    mostrarAccesorios();

     $('#cancelarAccesorio').on('click', function(){        
        $('#modalAccesorio').modal('hide');
        mostrarAccesorios();
        document.getElementById('tipo').value= '';
        document.getElementById('codigoAccesorio').value= '';
        document.getElementById('descripcion').value= '';
        document.getElementById('cantidad').value= '';                
    });  
}

$(function() {    
	$('#nuevoAccesorio').on('click', function(){                   
        $('#cabeceraRegistro').html(".:: Nuevo Accesorio ::.");
        document.getElementById('tipo').value= '';
        document.getElementById('codigoAccesorio').value= '';
        document.getElementById('descripcion').value= '';
        document.getElementById('cantidad').value= '';
        document.getElementById('operacion').value= 'Registrar';        
        $('#modalAccesorio').modal({
            show:true,
            backdrop:'static'
        });        
    });     

    $('#registrarAccesorio').on('click', function(){
        event.preventDefault();
        var operacion = document.getElementById('operacion').value;

        if (operacion == 'Registrar') {     
            var opcion = 'registrar_accesorio';                       
            var tipo = document.getElementById('tipo').value;
            var codigoAccesorio = document.getElementById('codigoAccesorio').value;
            var descripcion = document.getElementById('descripcion').value;
            var cantidad = document.getElementById('cantidad').value;   

            if(tipo == '' || codigoAccesorio == '' || descripcion == '' || cantidad == ''){
                nota("error","Complete los campos obligatorios. (*)",2000);   
                return;                                          
            }
            else
            {
                if (cantidad <= 0){
                    nota("error","La cantidad debe ser mayor a cero (0)",2000);   
                    return;    
                } else {
                    $.ajax({
                        type: 'POST',
                        data:'opcion='+opcion+'&tipo='+tipo+'&codigoAccesorio=' +codigoAccesorio+
                            '&descripcion='+descripcion+'&cantidad=' +cantidad,
                        url: '../controllers/controlAccesorio/accesorioController.php',
                        success: function(data){
                            nota("success","Accesorio registrado correctamente.",2000);
                            document.getElementById('tipo').value= '';
                            document.getElementById('codigoAccesorio').value= '';
                            document.getElementById('descripcion').value= '';
                            document.getElementById('cantidad').value= '';                                     
                            $('#modalAccesorio').modal('hide');
                            mostrarAccesorios();
                        },
                        error: function(data){
                            nota("error","Ocurrió un error inesperado.",2000);
                        }
                    });     
                }                     
                               
            }           

        } else {
            if (operacion = 'Editar') {                              
                var opcion = 'editar_accesorio';
                var codigo = document.getElementById('codigo').value;
                var tipo = document.getElementById('tipo').value;
                var codigoAccesorio = document.getElementById('codigoAccesorio').value;
                var descripcion = document.getElementById('descripcion').value;
                var cantidad = document.getElementById('cantidad').value;     

                $.ajax({
                    type: 'POST',
                    data:'opcion='+opcion+'&codigo='+codigo+'&tipo='+tipo+'&codigoAccesorio=' +codigoAccesorio+
                            '&descripcion='+descripcion+'&cantidad=' +cantidad,
                    url: '../controllers/controlAccesorio/AccesorioController.php',
                    success: function(data){                        
                        nota("success","Celular actualizado correctamente.",2000);
                        document.getElementById('tipo').value= '';
                        document.getElementById('codigoAccesorio').value= '';
                        document.getElementById('descripcion').value= '';
                        document.getElementById('cantidad').value= ''; 
                        document.getElementById('operacion').value= 'Registrar'; 
                        $('#modalAccesorio').modal('hide');
                        mostrarAccesorios();
                    },
                    error: function(data){
                        nota("error","Ocurrió un error inesperado.",2000);
                    }
                });
            }

        }
    });
});



function mostrarAccesorios(){
    var opcion = 'mostrar_accesorios';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlAccesorio/accesorioController.php',
        success: function(data){
            $('#tablaAccesorios').DataTable().destroy();
            $('#cuerpoAccesorios').html(data);
            $('#tablaAccesorios').DataTable();
            $('#tablaAccesorios_wrapper .table-caption').text('Listado General de Accesorios');
            $('#tablaAccesorios_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function editar(codigo){
    $('#cabeceraRegistro').html(".:: Editar Accesorio ::.");
    document.getElementById('operacion').value= 'Editar'; 

    $('#modalAccesorio').modal({
        show:true,
        backdrop:'static'
    });

    var opcion = 'recuperar_datos';
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo='+codigo,
        url: '../controllers/controlAccesorio/accesorioController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#codigo").val(objeto[0]);            
            document.getElementById('tipo').value = (objeto[1]);
            $("#codigoAccesorio").val(objeto[2]);
            $("#descripcion").val(objeto[3]);
            $("#cantidad").val(objeto[4]); 
        },
        error: function(data){

        }
    });   

}

function eliminar(codigo, estado){
    if (estado == 0){
        var respuesta = confirm('¿Desea ELIMINAR el accesorio?');
    } else {
        var respuesta = confirm('¿Desea ACTIVAR el accesorio?');
    }
    
    if (respuesta == true) {
        //alert('Acepto');
        var opcion = 'eliminar_accesorio';
        $.ajax({
            type: 'POST',
            data:'opcion='+opcion+'&codigo='+codigo+'&estado='+estado,
            url: '../controllers/controlAccesorio/accesorioController.php',
            success: function(data){                
                mostrarAccesorios();
            },
            error: function(data){
                $('#cuerpoCelulares').html(respuesta);
            }
        });
    } else {
        if (respuesta == false) {
            mostrarAccesorios();
        }

    }

}

function nota(op,msg,time){
    if(time == undefined)time = 2000;
    var n = noty({text:msg,maxVisible: 1,type:op,killer:true,timeout:time,layout: 'top'});
}