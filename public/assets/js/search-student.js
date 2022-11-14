$(document).ready(function(){
     
    $('#btn_search_student').click(function(){

        var dni_estudiante = $('#dni_estudiante').val();

        $.post("/estudiantes/getStudent",{dni:dni_estudiante, _token : $('input[name="_token"]').val()},function(res){

            if(res.length>0){
                $('#nombres_estudiante').val(res[0]['nombres_estudiante'])
                $('#apellidos_estudiante').val(res[0]['apellidos_estudiante'])
                $('#estudiante_id').val(res[0]['id'])

                $('#detalles-matricula').attr("hidden",false);
                $('#btn-matricular').attr("hidden",false);

            }else{
                $('#nombres_estudiante').val('')
                $('#apellidos_estudiante').val('')
                $('#estudiante_id').val('')
                $('#detalles-matricula').attr("hidden",true);
                $('#btn-matricular').attr("hidden",true);
            }
        });

    });

});