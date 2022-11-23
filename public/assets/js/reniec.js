$(document).ready(function(){
     
    $('#btnBuscar').click(function(){

        var numdni = $('#dni_search').val();
        var link_consulta = "https://dniruc.apisperu.com/api/v1/dni/" + numdni +"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFuZ2VsLnlhcmFuZzRAZ21haWwuY29tIn0.QjoAby91BOkxcIkiKEB2-KdFvlNMldOgAlDiLtF_TYA";

        $.ajax({
            url : link_consulta,
            success:function(data){
                $('#btnBuscar').val('Buscar');
                
                if(Object.keys(data).length == 5){
                    $('#nombres').val(data.nombres);
                    $('#apellidos').val(data.apellidoPaterno + " " + data.apellidoMaterno);
                    
                    $('#mensaje_busqueda').text('✅');

                }else{
                    $('#nombres').val('');
                    $('#apellidos').val('');

                    $('#mensaje_busqueda').text('No se hallaron datos');
                }
                
            },
            error : function(e) {           
                console.log(e);
                $('#mensaje_busqueda').text('Ingrese un DNI válido');
                $('#btnBuscar').val('Buscar');
            },
            beforeSend: function( ) {
                $('#btnBuscar').val('Buscando...');
            }

        });
        
    });

});