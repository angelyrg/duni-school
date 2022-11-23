@extends('layouts.main')

@section('content')

    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">MATRÍCULAS</h5>
                <a href="{{route('matriculas.create')}}" class="btn btn-primary btn-sm" ><i class='bx bx-plus'></i> Realizar matricula</a>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="example">
                        <thead class="table-dark">
                            <tr >
                                <th class="text-white">#</th>
                                <th class="text-white">Cod Matrícula</th>
                                <th class="text-white">Estudiante</th>                           
                                <th class="text-white">Nivel</th>
                                <th class="text-white">Aula</th>
                                <th class="text-white">Situación</th>
                                <th class="text-white">Apoderado</th>
                                {{-- <th class="text-white">Mensualidad</th>
                                <th class="text-white">Total</th> --}}
                                <th class="text-white">Balance</th>
                                <th class="text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($matriculas) == 0)
                                <tr>
                                    <td colspan="10">No hay registros</td>
                                </tr>
                            @else
                                <?php $i=0; ?>
                                @foreach ($matriculas as $matricula)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        {{-- <td><a href="#">{{$matricula->cod_matricula}}</a></td> --}}
                                        <td>
                                            <a href="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd-{{$matricula->id}}" aria-controls="offcanvasEnd">
                                                {{$matricula->cod_matricula}}
                                            </a>
                                        </td>
                                        <td>{{$matricula->estudiante->nombres_estudiante.' '.$matricula->estudiante->apellidos_estudiante}}</td>
                                        <td>{{$matricula->nivel}}</td>
                                        <td>{{$matricula->grado.' '.$matricula->seccion}}</td>
                                        <td>{{$matricula->situacion}}</td>
                                        <td>{{$matricula->apoderado->nombres_apoderado}}</td>

                                        <td>
                                            <span class="badge bg-label-@if($matricula->deuda > 0){{'danger'}}@else{{'success'}}@endif me-1">
                                                @if($matricula->deuda > 0)
                                                    <i class='bx bxs-info-circle'></i>
                                                @else
                                                    <i class='bx bxs-check-circle'></i>
                                                @endif
                                                
                                                {{"S/ ".$matricula->deuda}}
                                            </span>
                                        </td>

                                        <td>                                  
                                            <a href="{{route('pagos.create')}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-money'></i></a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$matricula->id}}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            @include('matriculas.modal-delete')
                                            @include('matriculas.info-matricula')
                                        </td>
                                    </tr>                        
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $matriculas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@if (count($matriculas)>0)
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#example').DataTable();
        $('#table-datatable').DataTable();
    });
</script>
@endif
    
@endsection