$(document).ready(function(){
     
    $('#btn_search_apoderado').click(function(){

        var dni_apoderado = $('#dni_apoderado').val();

        $.post("/apoderados/getApoderado",{dni:dni_apoderado, _token : $('input[name="_token"]').val()},function(res){

            console.log(res)

            if(res.length>0){
                $('#nombres_apoderado').val(res[0]['nombres_apoderado'])
                $('#apellidos_apoderado').val(res[0]['apellidos_apoderado'])
                $('#apoderado_id').val(res[0]['id'])

                $('#detalles-matricula').attr("hidden",false);
                $('#btn-matricular').attr("disabled",false);

            }else{
                $('#dni_apoderado').val('')
                $('#nombres_apoderado').val('')
                $('#apellidos_apoderado').val('')
                $('#apoderado_id').val('')
                $('#btn-matricular').attr("disabled",true);
            }
        });

    });

});