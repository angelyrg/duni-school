$(document).ready(function(){
     
    $('#btn_search_matricula').click(function(){

        var cod_matricula = $('#cod_matricula').val();

        $.post("/matriculas/getMatricula",{code:cod_matricula, _token : $('input[name="_token"]').val()},function(res){
            if(res.length>0){
                $('#matricula_id').val(res[0]['id'])
                $('#alumno').val(res[0]['nombres_estudiante']+" "+res[0]['apellidos_estudiante'])
                $('#nivel').val(res[0]['nivel']+" - "+res[0]['grado']+" "+res[0]['seccion'])
                $('#matricula_costo').val(res[0]['matricula_costo'])
                $('#mensualidad').val(res[0]['mensualidad'])

                let deuda = parseInt(res[0]['deuda']);

                if (deuda > 0){
                    $('#detalles-pago').attr("hidden",false);
                    $('#sin-deuda').attr("hidden",true);
                    $('#btn-pago').attr("disabled",false);
                }else{
                    $('#detalles-pago').attr("hidden",true);
                    $('#sin-deuda').attr("hidden",false);
                    $('#btn-pago').attr("disabled",true);
                }
            }else{
                $('#alumno').val('')
                $('#matricula_id').val('')
                $('#detalles-pago').attr("hidden",true);
                $('#sin-deuda').attr("hidden",true);
            }
        });

    });

});