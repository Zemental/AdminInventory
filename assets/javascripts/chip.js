window.onload = function(){    
    $('#tablaChips').dataTable();    
    mostrarChips();

     $('#cancelarChip').on('click', function(){        
        $('#modalChip').modal('hide');
        mostrarChips();
        document.getElementById('icc').value= '';
        document.getElementById('numero').value= '';
        document.getElementById('operadora').value= '';
        //document.getElementById('modelo').value= '';                
    });  
}

$(function() {    
	$('#nuevoChip').on('click', function(){                   
        $('#cabeceraRegistro').html(".:: Nuevo Chip ::.");
        document.getElementById('icc').value= '';
        document.getElementById('numero').value= '';
        document.getElementById('operadora').value= '';
        //document.getElementById('modelo').value= '';
        document.getElementById('operacion').value= 'Registrar';        
        $('#modalChip').modal({
            show:true,
            backdrop:'static'
        });        
    });     

    $('#registrarChip').on('click', function(){
        event.preventDefault();
        var operacion = document.getElementById('operacion').value;

        if (operacion == 'Registrar') {     
            var opcion = 'registrar_chip';                       
            var icc = document.getElementById('icc').value;
            var numero = document.getElementById('numero').value;
            var operadora = document.getElementById('operadora').value;
            //var modelo = document.getElementById('modelo').value;   

            if(icc == '' || numero == '' || operadora == '' ){
                nota("error","Complete los campos obligatorios. (*)",2000);   
                return;                                          
            }
            else
            {
                    $.ajax({
                        type: 'POST',
                        data:'opcion='+opcion+'&icc='+icc+'&numero=' +numero+
                            '&operadora='+operadora,
                        url: '../controllers/controlChip/chipController.php',
                        success: function(data){
                            nota("success","Celular registrado correctamente.",2000);
                            document.getElementById('icc').value= '';
                            document.getElementById('numero').value= '';
                            document.getElementById('operadora').value= '';
                            //document.getElementById('modelo').value= '';                                     
                            $('#modalChip').modal('hide');
                            mostrarChips();
                        },
                        error: function(data){
                            nota("error","Ocurrió un error inesperado.",2000);
                        }
                    });  
                               
            }           

        } else {
            if (operacion = 'Editar') {                              
                var opcion = 'editar_chip';
                var codigo = document.getElementById('codigo').value;
                var icc = document.getElementById('icc').value;
                var numero = document.getElementById('numero').value;
                var operadora = document.getElementById('operadora').value;
                //var modelo = document.getElementById('modelo').value;     

                $.ajax({
                    type: 'POST',
                    data:'opcion='+opcion+'&codigo='+codigo+'&icc='+icc+'&numero=' +numero+
                            '&operadora='+operadora,
                    url: '../controllers/controlChip/chipController.php',
                    success: function(data){                        
                        nota("success","Chip actualizado correctamente.",2000);
                        document.getElementById('icc').value= '';
                        document.getElementById('numero').value= '';
                        document.getElementById('operadora').value= '';
                        //document.getElementById('modelo').value= ''; 
                        document.getElementById('operacion').value= 'Registrar'; 
                        $('#modalChip').modal('hide');
                        mostrarChips();
                    },
                    error: function(data){
                        nota("error","Ocurrió un error inesperado.",2000);
                    }
                });
            }

        }
    });
});



function mostrarChips(){
    var opcion = 'mostrar_chips';
    var codigo = 0;
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo=' +codigo,
        url: '../controllers/controlChip/chipController.php',
        success: function(data){
            $('#tablaChips').DataTable().destroy();
            $('#cuerpoChips').html(data);
            $('#tablaChips').DataTable();
            $('#tablaChips_wrapper .table-caption').text('Listado General de Chips');
            $('#tablaChips_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function editar(codigo){
    $('#cabeceraRegistro').html(".:: Editar Chip ::.");
    document.getElementById('operacion').value= 'Editar'; 

    $('#modalChip').modal({
        show:true,
        backdrop:'static'
    });

    var opcion = 'recuperar_datos';
    $.ajax({
        type: 'POST',
        data:'opcion='+opcion+'&codigo='+codigo,
        url: '../controllers/controlChip/chipController.php',
        success: function(data){
            objeto=JSON.parse(data);
            $("#codigo").val(objeto[0]);            
            $("#icc").val(objeto[1]);
            $("#numero").val(objeto[2]);
            $("#operadora").val(objeto[3]);
            //$("#modelo").val(objeto[4]); 
        },
        error: function(data){

        }
    });   

}

function eliminar(codigo, estado){
    var respuesta = confirm('¿Desea eliminar el equipo celular?');
    if (respuesta == true) {
        //alert('Acepto');
        var opcion = 'eliminar_chip';
        $.ajax({
            type: 'POST',
            data:'opcion='+opcion+'&codigo='+codigo+'&estado='+estado,
            url: '../controllers/controlChip/chipController.php',
            success: function(data){
                alert('Chip fue dado de baja');
                mostrarChips();
            },
            error: function(data){
                $('#cuerpoChip').html(respuesta);
            }
        });
    } else {
        if (respuesta == false) {
            mostrarChips();
        }

    }

}

function nota(op,msg,time){
    if(time == undefined)time = 2000;
    var n = noty({text:msg,maxVisible: 1,type:op,killer:true,timeout:time,layout: 'top'});
}