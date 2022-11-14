@extends('layouts.main')

@section('content')

    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Apoderados</h5>
                <!-- Button trigger modal -->
                <a href="{{route('apoderados.create')}}" class="btn btn-primary btn-sm" >
                    <i class='bx bx-plus'></i> Agregar apoderado
                </a>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="table-datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>                           
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($apoderados) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                @foreach ($apoderados as $apoderado)
                                    <tr>
                                        <td>{{$apoderado->id}}</td>
                                        <td>{{$apoderado->dni_apoderado}}</td>
                                        <td>{{$apoderado->nombres_apoderado}}</td>
                                        <td>{{$apoderado->apellidos_apoderado}}</td>
                                        <td>                                  
                                            <a href="{{route('apoderados.edit', $apoderado->id)}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-edit-alt' ></i></a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$apoderado->id}}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            @include('apoderados.modal-delete')                                            
                                        </td>
                                    </tr>                        
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $apoderados->links() }}
            </div>
        </div>
    </div>
</div>


@endsection