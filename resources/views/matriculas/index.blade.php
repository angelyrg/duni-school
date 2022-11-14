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
                    <table class="table tablesorter " id="table-datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Estudiante</th>                           
                                <th>Nivel</th>
                                <th>Aula</th>
                                <th>Apoderado</th>
                                <th>Mensualidad</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($matriculas) == 0)
                                <tr>
                                    <td colspan="8">No hay registros</td>
                                </tr>
                            @else
                                @foreach ($matriculas as $matricula)
                                    <tr>
                                        <td>{{$matricula->id}}</td>
                                        <td>{{$matricula->estudiante->nombres_estudiante.' '.$matricula->estudiante->apellidos_estudiante}}</td>
                                        <td>{{$matricula->nivel}}</td>
                                        <td>{{$matricula->grado.' '.$matricula->seccion}}</td>
                                        <td>{{$matricula->apoderado->nombres_apoderado}}</td>
                                        <td>{{$matricula->mensualidad}}</td>
                                        <td>{{$matricula->total}}</td>
                                        
                                        <td>                                  
                                            {{-- <a href="{{route('matriculas.edit', $matricula->id)}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-edit-alt' ></i></a> --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$matricula->id}}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            @include('matriculas.modal-delete')
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