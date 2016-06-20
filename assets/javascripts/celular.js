window.onload = function(){    
    $('#tablaCelulares').dataTable();    
    mostrarCelulares();

     $('#cancelarCelular').on('click', function(){        
        $('#modalCelular').modal('hide');
        mostrarCelulares();
        document.getElementById('imei').value= '';
        document.getElementById('serie').value= '';
        document.getElementById('marca').value= '';
        document.getElementById('modelo').value= '';                
    });  
}

$(function() {    
	$('#nuevoCelular').on('click', function(){                   
        $('#cabeceraRegistro').html(".:: Nuevo Celular ::.");
        document.getElementById('imei').value= '';
        document.getElementById('serie').value= '';
        document.getElementById('marca').value= '';
        document.getElementById('modelo').value= '';
        document.getElementById('operacion').value= 'Registrar';        
        $('#modalCelular').modal({
            show:true,
            backdrop:'static'
        });        
    });     

    $('#registrarCelular').on('click', function(){
        event.preventDefault();
        var operacion = document.getElementById('operacion').value;

        if (operacion == 'Registrar') {     
            var opcion = 'registrar_celular';                       
            var imei = document.getElementById('imei').value;
            var serie = document.getElementById('serie').value;
            var marca = document.getElementById('marca').value;
            var modelo = document.getElementById('modelo').value;   

            if(imei == '' || serie == '' || marca == '' || modelo == ''){
                nota("error","Complete los campos obligatorios. (*)",2000);   
                return;                                          
            }
            else
            {
                
                    $.ajax({
                        type: 'POST',
                        data:'opcion='+opcion+'&imei='+imei+'&serie=' +serie+
                            '&marca='+marca+'&modelo=' +modelo,
                        url: '../controllers/controlCelular/celularController.php',
                        success: function(data){
                            nota("success","Celular registrado correctamente.",2000);
                            document.getElementById('imei').value= '';
                            document.getElementById('serie').value= '';
                            document.getElementById('marca').value= '';
                            document.getElementById('modelo').value= '';                                     
                            $('#modalCelular').modal('hide');
                            mostrarCelulares();
                        },
                        error: function(data){
                            nota("error","Ocurrió un error inesperado.",2000);
                        }
                    });  
                               
            }           

        } else {
            if (operacion = 'Editar') {                              
                var opcion = 'editar_celular';
                var codigo = document.getElementById('codigo').value;
                var imei = document.getElementById('imei').value;
                var serie = document.getElementById('serie').value;
                var marca = document.getElementById('marca').value;
                var modelo = document.getElementById('modelo').value;     

                $.ajax({
                    type: 'POST',
                    data:'opcion='+opcion+'&codigo='+codigo+'&imei='+imei+'&serie=' +serie+
                            '&marca='+marca+'&modelo=' +modelo,
                    url: '../controllers/controlCelular/celularController.php',
                    success: function(data){                        
                        nota("success","Celular actualizado correctamente.",2000);
                        document.getElementById('imei').value= '';
                        document.getElementById('serie').value= '';
                        document.getElementById('marca').value= '';
                        document.getElementById('modelo').value= ''; 
                        document.getElementById('operacion').value= 'Registrar'; 
                        $('#modalCelular').modal('hide');
                        mostrarCelulares();
                    },
                    error: function(data){
                        nota("error","Ocurrió un error inesperado.",2000);
                    }
                });
            }

        }
    });
});



function mostrarCelulares(){
    var opcion = 'mostrar_celulares';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlCelular/celularController.php',
        success: function(data){
            $('#tablaCelulares').DataTable().destroy();
            $('#cuerpoCelulares').html(data);
            $('#tablaCelulares').DataTable();
            $('#tablaCelulares_wrapper .table-caption').text('Listado General de Celulares');
            $('#tablaCelulares_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function editar(codigo){
    $('#cabeceraRegistro').html(".:: Editar Celular ::.");
    document.getElementById('operacion').value= 'Editar'; 

    $('#modalCelular').modal({
        show:true,
        backdrop:'static'
    });

    var opcion = 'recuperar_datos';
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo='+codigo,
        url: '../controllers/controlCelular/celularController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#codigo").val(objeto[0]);            
            $("#imei").val(objeto[1]);
            $("#serie").val(objeto[2]);
            $("#marca").val(objeto[3]);
            $("#modelo").val(objeto[4]); 
        },
        error: function(data){

        }
    });   

}

function eliminar(codigo, estado){
    if (estado == 0){
        var respuesta = confirm('¿Desea ELIMINAR el equipo celular?');
    } else {
        var respuesta = confirm('¿Desea ACTIVAR el equipo celular?');
    }
    
    if (respuesta == true) {
        //alert('Acepto');
        var opcion = 'eliminar_celular';
        $.ajax({
            type: 'POST',
            data:'opcion='+opcion+'&codigo='+codigo+'&estado='+estado,
            url: '../controllers/controlCelular/celularController.php',
            success: function(data){                
                mostrarCelulares();
            },
            error: function(data){
                $('#cuerpoCelulares').html(respuesta);
            }
        });
    } else {
        if (respuesta == false) {
            mostrarCelulares();
        }

    }

}

function nota(op,msg,time){
    if(time == undefined)time = 2000;
    var n = noty({text:msg,maxVisible: 1,type:op,killer:true,timeout:time,layout: 'top'});
}