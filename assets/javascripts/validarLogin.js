/**
 * Created by GEANPIER ALFARO on 23/04/2016.
 */
$(document).ready(function() {
    //Validacion con BootstrapValidator
    fl = $('#form-login');
    fl.bootstrapValidator({
        message: 'El valor no es válido.',       
        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido.'
                    },
                    emailAddress:{
                        message: 'El email no es válido.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido.'
                    }
                }
            }

        },
        submitHandler: function(validator, form, submitButton) {

            usuario = $('#usuario').val();
            password = $('#password').val();
            //location.href = "views/home.php"
            
            $.ajax({
                type: 'POST',
                url: 'scripts/login.php',
                data: 'usuario='+usuario+'&password='+password,
                dataType : 'json',
                encode : true,
                success: function(data){
                    if (data.error)
                    {
                        nota("error","Los Datos Son Incorrectos.",2000);
                        $('#usuario').val('');
                        $('#password').val('');
                    }
                    else
                    {
                        location.href = "views/home.php"

                    }
                }
            });

        }
    });
});


//funcion para enviar notificaciones al usuario la libreria la descargas de http://ned.im/noty/
//op: "error", "info" ,"success"
function nota(op,msg,time){
    if(time == undefined)time = 2000;
    var n = noty({text:msg,maxVisible: 1,type:op,killer:true,timeout:time,layout: 'top'});
}