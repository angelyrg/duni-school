@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">MATRÍCULAS</h5>

                @if (isset($nivel) && isset($grado) && isset($seccion))
                    <small>{{$nivel." ".$grado." ".$seccion}}</small>
                
                @elseif(isset($nivel) && isset($grado))
                    <small>{{$nivel." ".$grado}}</small>
                
                @elseif(isset($nivel))
                    <small>{{$nivel}}</small>

                @endif

                <a href="{{route('matriculas.create')}}" class="btn btn-primary btn-sm" ><i class='bx bx-plus'></i> Realizar matricula</a>
            </div>
            
            <div class="card-body">
                <div class="row" id="filtrar_matriculas">
                    <form action="{{route('filter')}}" method="post" class="d-flex flex-row align-items-center flex-wrap">
                        @csrf
                        <div class="col-md-3">
                            <div class="row mb-3">
                                <label class="col-form-label" for="basic-icon-default-fullname">Nivel</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <select name="nivel" id="nivel" class="form-select form-select-sm" required>
                                        <option selected value="">Todos...</option>                                                    
                                        <option @if(isset($nivel) && $nivel=="Inicial"){{"selected"}}@endif>Inicial</option>
                                        <option @if(isset($nivel) && $nivel=="Primaria"){{"selected"}}@endif>Primaria</option>
                                        <option @if(isset($nivel) && $nivel=="Secundaria"){{"selected"}}@endif>Secundaria</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row mb-3">
                                <label class="col-form-label" >Grado</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                    @if (isset($grado))
                                    <input type="hidden" id="grado_selected" value="{{$grado}}">
                                    @endif
                                    <select  name="grado" id="grado" class="form-select form-select-sm" >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row mb-3">
                                <label class="col-form-label" >Sección</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                    <input type="text" name="seccion" id="seccion" class="form-control form-control-sm"  placeholder="P.e. A"
                                    @if(isset($seccion)) value="{{$seccion}}" @endif />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row mb-3">
                                <label class="col-form-label" >Opción</label>
                                <div class="input-group input-group-merge">
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class='bx bx-filter-alt'></i> Filtrar
                                    </button>
                                    @if (isset($nivel))
                                        <a href="{{route('matriculas.index')}}" class="btn btn-sm btn-outline-warning">
                                            <i class='bx bx-x'></i>
                                            Quitar filtro
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <a type="button" class="btn btn-outline-dark btn-sm" onclick="PrintDiv();">
                    <i class='bx bxs-file-pdf'></i> Descargar
                </a>

                <div class="table table-responsive" id="table_to_print">
                    <table class="table tablesorter " id="example">
                        <thead class="table-dark">
                            <tr >
                                <th class="text-white">#</th>
                                <th class="text-white">Cod Matrícula</th>
                                <th class="text-white">Estudiante</th>                           
                                <th class="text-white">Nivel</th>
                                <th class="text-white">Grado</th>
                                <th class="text-white">Sección</th>
                                <th class="text-white">Situación</th>
                                <th class="text-white" id="hide_in_print">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach ($matriculas as $matricula)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <a href="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd-{{$matricula->id}}" aria-controls="offcanvasEnd">
                                            {{$matricula->cod_matricula}}
                                        </a>
                                    </td>
                                    <td>{{$matricula->estudiante->nombres_estudiante.' '.$matricula->estudiante->apellidos_estudiante}}</td>
                                    <td>{{$matricula->nivel}}</td>
                                    <td>{{$matricula->grado}}</td>
                                    <td>{{$matricula->seccion}}</td>
                                    <td>{{$matricula->situacion}}</td>

                                    <td id="hide_in_print">                                  
                                        <a href="{{route('pagos.create')}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-money'></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$matricula->id}}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                        @include('matriculas.modal-delete')
                                        @include('matriculas.info-matricula')
                                    </td>
                                </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card-footer">
                {{ $matriculas->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

<script>

    inicial = ['3 Años', '4 Años', '5 Años']
    primaria = ['1°','2°','3°','4°','5°','6°']
    secundaria = ['1°','2°','3°','4°','5°']

    $(document).ready( function () {
        $('#example').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

        //Cargar los grados después de un filtro
        if( $("#nivel").val() == "Inicial" || $("#nivel").val() == "Primaria" ||  $("#nivel").val() == "Secundaria" ){
            grado = $("#grado_selected").val();

            result = "<option value=''>Todos</option>";
            switch($('#nivel').val()){
                case 'Inicial':
                    inicial.forEach(element => {
                        if(grado==element){
                            result+="<option selected>"+element+"</option>";
                        }else{
                            result+="<option>"+element+"</option>";
                        }
                    });
                    break;
                case 'Primaria':
                    primaria.forEach(element => {
                        if(grado==element){
                            result+="<option selected>"+element+"</option>";
                        }else{
                            result+="<option>"+element+"</option>";
                        }
                    });
                    break;
                case 'Secundaria':
                    secundaria.forEach(element => {
                        if(grado==element){
                            result+="<option selected>"+element+"</option>";
                        }else{
                            result+="<option>"+element+"</option>";
                        }
                    });
                    break;
            }
            $("#grado").html(result);

        }

        //Cargar el select de grados dependiendo del nivel seleccionado
        $(document).on('change','#nivel', function(){
            result = "<option value=''>Todos</option>";
            switch($('#nivel').val()){
                case 'Inicial':
                    inicial.forEach(element => {
                        result+="<option>"+element+"</option>";
                    });
                    break;
                case 'Primaria':
                    primaria.forEach(element => {
                        result+="<option>"+element+"</option>";
                    });
                    break;
                case 'Secundaria':
                    secundaria.forEach(element => {
                        result+="<option>"+element+"</option>";
                    });
                    break;
            }
            $("#grado").html(result);
        });

    });

    

</script>

<script type="text/javascript">     
    function PrintDiv() {    

        
        var table = $('#example').DataTable();
        table.destroy();
        
        var divToPrint = document.getElementById('table_to_print');
        
        $('*[id*=hide_in_print]:visible').each(function() {
            $(this).attr("hidden",true);
        });
        
        
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        
        h1 = "<h4>Matrículas</h4>";
        popupWin.document.write('<html><body onload="window.print()">' + h1 + divToPrint.innerHTML + '</html>');
            
            
        $('*[id*=hide_in_print]:hidden').each(function() {
            $(this).attr("hidden",false);
        });
        
        $('#example').DataTable();

        popupWin.document.close();

    }
</script>
    
@endsection