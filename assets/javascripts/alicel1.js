window.onload = function(){    
    $('#tablaAlicel1').dataTable();    
    mostrarProductos();
    
}

function mostrarProductos(){
    var opcion = 'mostrar_productos';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlAlicel1/alicel1Controller.php',
        success: function(data){
            $('#tablaAlicel1').DataTable().destroy();
            $('#cuerpoAlicel1').html(data);
            $('#tablaAlicel1').DataTable();
            $('#tablaAlicel1_wrapper .table-caption').text('Listado General de Productos');
            $('#tablaAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

/*function eliminar(codigo, estado){
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

}*/
