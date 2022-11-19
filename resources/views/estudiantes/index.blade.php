@extends('layouts.main')

@section('content')

    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">ESTUDIANTES</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-estudiante" >
                    <i class='bx bx-plus'></i> Agregar estudiante
                </button>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter" id="example">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>                           
                                <th>Nombres y apellidos</th>
                                <th>Género</th>
                                <th>Fecha de nacimiento</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($estudiantes) == 0)
                                <tr>
                                    <td colspan="4">No hay registros</td>
                                </tr>
                            @else
                                
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{$estudiante->id}}</td>
                                        <td>{{$estudiante->dni_estudiante}}</td>
                                        <td>{{$estudiante->nombres_estudiante." ".$estudiante->apellidos_estudiante}}</td>
                                        <td>{{$estudiante->genero}}</td>
                                        <td>{{$estudiante->fecha_nacimiento}}</td>
                                        
                                        <td>                                  
                                            <a href="{{route('estudiantes.edit', $estudiante->id)}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-edit-alt' ></i></a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$estudiante->id}}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            @include('estudiantes.modal-delete')                                            
                                        </td>
                                    </tr>                        
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $estudiantes->links() }}
            </div>
        </div>
    </div>
</div>

@include('estudiantes.modal-create')

@endsection

@section('js')

@if (count($estudiantes) > 0)
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