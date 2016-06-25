window.onload = function(){    
    $('#tablaProtectores').dataTable();    
    mostrarProtectores();

     $('#cancelarProtector').on('click', function(){        
        $('#modalProtector').modal('hide');
        mostrarProtectores();
        document.getElementById('tipo').value= '';
        document.getElementById('modeloCelular').value= '';
        document.getElementById('precio').value= '';
        document.getElementById('cantidad').value= '';                
    });  
}

$(function() {    
	$('#nuevoProtector').on('click', function(){                   
        $('#cabeceraRegistro').html(".:: Nuevo Protector ::.");
        document.getElementById('tipo').value= '';
        document.getElementById('modeloCelular').value= '';
        document.getElementById('precio').value= '';
        document.getElementById('cantidad').value= '';
        document.getElementById('operacion').value= 'Registrar';        
        $('#modalProtector').modal({
            show:true,
            backdrop:'static'
        });        
    });     

    $('#registrarProtector').on('click', function(){
        event.preventDefault();
        var operacion = document.getElementById('operacion').value;

        if (operacion == 'Registrar') {     
            var opcion = 'registrar_protector';                       
            var tipo = document.getElementById('tipo').value;
            var modeloCelular = document.getElementById('modeloCelular').value;
            var precio = document.getElementById('precio').value;
            var cantidad = document.getElementById('cantidad').value;   

            if(tipo == '' || modeloCelular == '' || cantidad == '' || precio == ''){
                nota("error","Complete los campos obligatorios. (*)",2000);   
                return;                                          
            }
            else
            {
                if (cantidad <= 0){
                    nota("error","La cantidad debe ser mayor a cero (0)",2000);   
                    return;    
                } else {
                    if (precio <= 0) {
                        nota("error","El precio debe ser mayor a cero (0)",2000);   
                        return;
                    } else {
                        $.ajax({
                            type: 'POST',
                            data:'opcion='+opcion+'&tipo='+tipo+'&modeloCelular=' +modeloCelular+
                                '&cantidad=' +cantidad+'&precio=' +precio,
                            url: '../controllers/controlProtector/protectorController.php',
                            success: function(data){
                                nota("success","Protector registrado correctamente.",2000);
                                document.getElementById('tipo').value= '';
                                document.getElementById('modeloCelular').value= '';
                                document.getElementById('precio').value= '';
                                document.getElementById('cantidad').value= '';                                     
                                $('#modalProtector').modal('hide');
                                mostrarProtectores();
                            },
                            error: function(data){
                                nota("error","Ocurrió un error inesperado.",2000);
                            }
                        });     
                    }                    
                }                     
                               
            }           

        } else {
            if (operacion = 'Editar') {                              
                var opcion = 'editar_protector';
                var codigo = document.getElementById('codigo').value;
                var tipo = document.getElementById('tipo').value;
                var modeloCelular = document.getElementById('modeloCelular').value;
                var precio = document.getElementById('precio').value;
                var cantidad = document.getElementById('cantidad').value;     

                if(tipo == '' || modeloCelular == '' || cantidad == '' || precio == ''){
                    nota("error","Complete los campos obligatorios. (*)",2000);   
                    return;                                          
                }

                $.ajax({
                    type: 'POST',
                    data:'opcion='+opcion+'&codigo='+codigo+'&tipo='+tipo+'&modeloCelular=' +modeloCelular+
                            '&cantidad=' +cantidad+'&precio=' +precio,
                    url: '../controllers/controlProtector/protectorController.php',
                    success: function(data){                        
                        nota("success","Protector actualizado correctamente.",2000);
                        document.getElementById('tipo').value= '';
                        document.getElementById('modeloCelular').value= '';
                        document.getElementById('precio').value= '';
                        document.getElementById('cantidad').value= ''; 
                        document.getElementById('operacion').value= ''; 
                        document.getElementById('operacion').value= 'Registrar'; 
                        $('#modalProtector').modal('hide');
                        mostrarProtectores();
                    },
                    error: function(data){
                        nota("error","Ocurrió un error inesperado.",2000);
                    }
                });

               
            }

        }
    });
});



function mostrarProtectores(){
    var opcion = 'mostrar_protectores';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlProtector/protectorController.php',
        success: function(data){
            $('#tablaProtectores').DataTable().destroy();
            $('#cuerpoProtectores').html(data);
            $('#tablaProtectores').DataTable();
            $('#tablaProtectores_wrapper .table-caption').text('Listado General de Protectores');
            $('#tablaProtectores_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function editar(codigo){
    $('#cabeceraRegistro').html(".:: Editar Protector ::.");
    document.getElementById('operacion').value= 'Editar'; 

    $('#modalProtector').modal({
        show:true,
        backdrop:'static'
    });

    var opcion = 'recuperar_datos';
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo='+codigo,
        url: '../controllers/controlProtector/protectorController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#codigo").val(objeto[0]);    
            //$("#tipo").val(objeto[1]);
            document.getElementById("tipo").value = objeto[1];
            $("#modeloCelular").val(objeto[2]);            
            $("#cantidad").val(objeto[3]); 
            $("#precio").val(objeto[4]);
        },
        error: function(data){

        }
    });   

}

function eliminar(codigo, estado){
    if (estado == 0){
        var respuesta = confirm('¿Desea DAR DE BAJA el protector?');
    } else {
        var respuesta = confirm('¿Desea ACTIVAR el protector?');
    }
    
    if (respuesta == true) {
        //alert('Acepto');
        var opcion = 'eliminar_protector';
        $.ajax({
            type: 'POST',
            data:'opcion='+opcion+'&codigo='+codigo+'&estado='+estado,
            url: '../controllers/controlProtector/protectorController.php',
            success: function(data){                
                mostrarProtectores();
            },
            error: function(data){
                $('#cuerpoProtectores').html(respuesta);
            }
        });
    } else {
        if (respuesta == false) {
            mostrarProtectores();
        }

    }

}

function nota(op,msg,time){
    if(time == undefined)time = 2000;
    var n = noty({text:msg,maxVisible: 1,type:op,killer:true,timeout:time,layout: 'top'});
}