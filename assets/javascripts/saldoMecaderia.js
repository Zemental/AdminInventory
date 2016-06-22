window.onload = function(){    
    $('#tablaCelularAlicel1').dataTable();
    $('#tablaChipAlicel1').dataTable();
    $('#tablaAcessoriosAlicel1').dataTable();
    $('#tablaProtectoresAlicel1').dataTable();

    $('#tablaCelularAlicel2').dataTable();
    $('#tablaChipAlicel2').dataTable();
    $('#tablaAcessoriosAlicel2').dataTable();
    $('#tablaProtectoresAlicel2').dataTable();

    $('#tablaCelularAlicel3').dataTable();
    $('#tablaChipAlicel3').dataTable();
    $('#tablaAcessoriosAlicel3').dataTable();
    $('#tablaProtectoresAlicel3').dataTable();

    $('#tablaCelularAlicel4').dataTable();
    $('#tablaChipAlicel4').dataTable();
    $('#tablaAcessoriosAlicel4').dataTable();
    $('#tablaProtectoresAlicel4').dataTable();

    $('#tablaCelularAlicel5').dataTable();
    $('#tablaChipAlicel5').dataTable();
    $('#tablaAcessoriosAlicel5').dataTable();
    $('#tablaProtectoresAlicel5').dataTable();

    $('#tablaCelularAlicel6').dataTable();
    $('#tablaChipAlicel6').dataTable();
    $('#tablaAcessoriosAlicel6').dataTable();
    $('#tablaProtectoresAlicel6').dataTable();

    celularesAlicel1(); 
    chipAlicel1(); 
    accesorioAlicel1();
    protectoresAlicel1();

    celularesAlicel2();
    chipAlicel2(); 
    accesorioAlicel2();
    protectoresAlicel2();

    celularesAlicel3();
    chipAlicel3(); 
    accesorioAlicel3();
    protectoresAlicel3();

    celularesAlicel4();
    chipAlicel4(); 
    accesorioAlicel4();
    protectoresAlicel4();

    celularesAlicel5();
    chipAlicel5(); 
    accesorioAlicel5();
    protectoresAlicel5();

    celularesAlicel6();
    chipAlicel6(); 
    accesorioAlicel6();
    protectoresAlicel6();
}

function celularesAlicel1(){
    var opcion = 'saldo_celulares_alicel1';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel1').DataTable().destroy();
            $('#cuerpoCelularAlicel1').html(data);
            $('#tablaCelularAlicel1').DataTable();
            $('#tablaCelularAlicel1_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel1(){
    var opcion = 'saldo_chip_alicel1';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel1').DataTable().destroy();
            $('#cuerpoChipAlicel1').html(data);
            $('#tablaChipAlicel1').DataTable();
            $('#tablaChipAlicel1_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel1(){
    var opcion = 'saldo_accesorio_alicel1';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel1').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel1').html(data);
            $('#tablaAcessoriosAlicel1').DataTable();
            $('#tablaAcessoriosAlicel1_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel1(){
    var opcion = 'saldo_protectores_alicel1';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel1').DataTable().destroy();
            $('#cuerpoProtectoresAlicel1').html(data);
            $('#tablaProtectoresAlicel1').DataTable();
            $('#tablaProtectoresAlicel1_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel1_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function celularesAlicel2(){
    var opcion = 'saldo_celulares_alicel2';
    var sucursal = 2;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel2').DataTable().destroy();
            $('#cuerpoCelularAlicel2').html(data);
            $('#tablaCelularAlicel2').DataTable();
            $('#tablaCelularAlicel2_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel2(){
    var opcion = 'saldo_chip_alicel2';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel2').DataTable().destroy();
            $('#cuerpoChipAlicel2').html(data);
            $('#tablaChipAlicel2').DataTable();
            $('#tablaChipAlicel2_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel2(){
    var opcion = 'saldo_accesorio_alicel2';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel2').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel2').html(data);
            $('#tablaAcessoriosAlicel2').DataTable();
            $('#tablaAcessoriosAlicel2_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel2(){
    var opcion = 'saldo_protectores_alicel2';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel2').DataTable().destroy();
            $('#cuerpoProtectoresAlicel2').html(data);
            $('#tablaProtectoresAlicel2').DataTable();
            $('#tablaProtectoresAlicel2_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel2_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}


function celularesAlicel3(){
    var opcion = 'saldo_celulares_alicel3';
    var sucursal = 3;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel3').DataTable().destroy();
            $('#cuerpoCelularAlicel3').html(data);
            $('#tablaCelularAlicel3').DataTable();
            $('#tablaCelularAlicel3_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel3(){
    var opcion = 'saldo_chip_alicel3';
    var sucursal = 3;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel3').DataTable().destroy();
            $('#cuerpoChipAlicel3').html(data);
            $('#tablaChipAlicel3').DataTable();
            $('#tablaChipAlicel3_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel3(){
    var opcion = 'saldo_accesorio_alicel3';
    var sucursal = 3;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel3').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel3').html(data);
            $('#tablaAcessoriosAlicel3').DataTable();
            $('#tablaAcessoriosAlicel3_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel3(){
    var opcion = 'saldo_protectores_alicel3';
    var sucursal = 1;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel3').DataTable().destroy();
            $('#cuerpoProtectoresAlicel3').html(data);
            $('#tablaProtectoresAlicel3').DataTable();
            $('#tablaProtectoresAlicel3_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel3_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function celularesAlicel4(){
    var opcion = 'saldo_celulares_alicel4';
    var sucursal = 4;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel4').DataTable().destroy();
            $('#cuerpoCelularAlicel4').html(data);
            $('#tablaCelularAlicel4').DataTable();
            $('#tablaCelularAlicel4_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel4(){
    var opcion = 'saldo_chip_alicel4';
    var sucursal = 4;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel4').DataTable().destroy();
            $('#cuerpoChipAlicel4').html(data);
            $('#tablaChipAlicel4').DataTable();
            $('#tablaChipAlicel4_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel4(){
    var opcion = 'saldo_accesorio_alicel4';
    var sucursal = 4;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel4').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel4').html(data);
            $('#tablaAcessoriosAlicel4').DataTable();
            $('#tablaAcessoriosAlicel4_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel4(){
    var opcion = 'saldo_protectores_alicel4';
    var sucursal = 4;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel4').DataTable().destroy();
            $('#cuerpoProtectoresAlicel4').html(data);
            $('#tablaProtectoresAlicel4').DataTable();
            $('#tablaProtectoresAlicel4_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel4_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function celularesAlicel5(){
    var opcion = 'saldo_celulares_alicel5';
    var sucursal = 5;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel5').DataTable().destroy();
            $('#cuerpoCelularAlicel5').html(data);
            $('#tablaCelularAlicel5').DataTable();
            $('#tablaCelularAlicel5_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel5(){
    var opcion = 'saldo_chip_alicel5';
    var sucursal = 5;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel5').DataTable().destroy();
            $('#cuerpoChipAlicel5').html(data);
            $('#tablaChipAlicel5').DataTable();
            $('#tablaChipAlicel5_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel5(){
    var opcion = 'saldo_accesorio_alicel5';
    var sucursal = 5;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel5').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel5').html(data);
            $('#tablaAcessoriosAlicel5').DataTable();
            $('#tablaAcessoriosAlicel5_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel5(){
    var opcion = 'saldo_protectores_alicel5';
    var sucursal = 5;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel5').DataTable().destroy();
            $('#cuerpoProtectoresAlicel5').html(data);
            $('#tablaProtectoresAlicel5').DataTable();
            $('#tablaProtectoresAlicel5_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel5_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}




function celularesAlicel6(){
    var opcion = 'saldo_celulares_alicel6';
    var sucursal = 6;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaCelularAlicel6').DataTable().destroy();
            $('#cuerpoCelularAlicel6').html(data);
            $('#tablaCelularAlicel6').DataTable();
            $('#tablaCelularAlicel6_wrapper .table-caption').text('Celulares');
            $('#tablaCelularAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function chipAlicel6(){
    var opcion = 'saldo_chip_alicel6';
    var sucursal = 6;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaChipAlicel6').DataTable().destroy();
            $('#cuerpoChipAlicel6').html(data);
            $('#tablaChipAlicel6').DataTable();
            $('#tablaChipAlicel6_wrapper .table-caption').text('Accesorios');
            $('#tablaChipAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function accesorioAlicel6(){
    var opcion = 'saldo_accesorio_alicel6';
    var sucursal = 6;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaAcessoriosAlicel6').DataTable().destroy();
            $('#cuerpoAcessoriosAlicel6').html(data);
            $('#tablaAcessoriosAlicel6').DataTable();
            $('#tablaAcessoriosAlicel6_wrapper .table-caption').text('Chips');
            $('#tablaAcessoriosAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}

function protectoresAlicel6(){
    var opcion = 'saldo_protectores_alicel6';
    var sucursal = 6;
    $.ajax({
        type: 'POST',
        data:'param_opcion='+opcion+'&param_sucursal=' +sucursal,
        url: '../controllers/controlSaldos/saldosController.php',
        success: function(data){
            $('#tablaProtectoresAlicel6').DataTable().destroy();
            $('#cuerpoProtectoresAlicel6').html(data);
            $('#tablaProtectoresAlicel6').DataTable();
            $('#tablaProtectoresAlicel6_wrapper .table-caption').text('Chips');
            $('#tablaProtectoresAlicel6_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

        },
        error: function(data){

        }
    });
}