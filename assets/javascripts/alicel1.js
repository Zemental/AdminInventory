window.onload = function(){    
    $('#tablaCelulares').dataTable();    
    mostrarCelulares();
    $('#tablaChips').dataTable();    
    mostrarChips();
    $('#tablaProtectores').dataTable();    
    mostrarProtectores();
    $('#tablaAccesorios').dataTable();    
    mostrarAccesorios();
    
}

function mostrarCelulares(){
    var opcion = 'mostrar_celulares';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlAlicel1/alicel1Controller.php',
        success: function(data){
            $('#tablaCelulares').DataTable().destroy();
            $('#cuerpoCelulares').html(data);
            $('#tablaCelulares').DataTable();
            $('#tablaCelulares_wrapper .table-caption').text('Listado General de Productos');
            $('#tablaCelulares_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function estadoCelular(codigo, estado){
    if (estado == 0){
        var respuesta = confirm('¿Desea COLOCAR EN MOSTRADOR el equipo celular?');
    } else {
        var respuesta = confirm('¿Desea COLOCAR EN ALAMACEN el equipo celular?');
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
