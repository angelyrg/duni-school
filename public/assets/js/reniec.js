$(document).ready(function(){
     
    $('#btnBuscar').click(function(){
        event.preventDefault();
        var numdni = $('#dni_search').val();
        //https://api.apis.net.pe/v1/dni?numero=74418528

        var link_consulta = "https://api.apis.net.pe/v1/dni?numero=" + numdni;
        
        if (numdni!='') {
            $.ajax({
                url : link_consulta,
                success:function(data){
                    alert(data);
                },
                error : function() {           
                    alert('Error');

                    // $('#icono_cargando').hide();
                    // $('#mensaje').show();
                    // $('#mensaje').delay(4000).hide(1000);

                    // $('#nombres').val('');
                    // $('#apellidos').val('');
                    // $('#dni').val('');
                },
                beforeSend: function( ) {
                    $('#icono_cargando').show();
                }

            });
        }else{
            alert('¡Escriba el número de DNI!');
            $('#dni_search').focus();
        }
    });

});