window.onload = function(){       
    mostrarSucursal();
}

$(function() {    
    $('#buscarCelulares').on('click', function(){                   
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });

    }); 

    $('#buscarChip').on('click', function(){                   
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });

    }); 

    $('#buscarProtector').on('click', function(){                   
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });

    }); 

    $('#buscarAccesorio').on('click', function(){                   
        //alert('bucar producto');
        //var sucursal = document.getElementById('sucursal').value;
        //alert(sucursal);
        document.getElementById('sucursal').disabled=true;
        $('#cabeceraRegistro').html(".:: Seleccionar Productos ::.");
        $('#modalBuscarProductos').modal({
            show:true,
            backdrop:'static'
        });

    });     
});

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


