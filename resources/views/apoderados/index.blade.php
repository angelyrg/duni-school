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
                    <table class="table tablesorter " id="example">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">DNI</th>                           
                                <th class="text-white">Nombres</th>
                                <th class="text-white">Apellidos</th>
                                <th class="text-white">Celular</th>
                                <th class="text-white">Apoderado</th>
                                <th class="text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($apoderados) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                <?php $i=0; ?>
                                @foreach ($apoderados as $apoderado)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$apoderado->dni_apoderado}}</td>
                                        <td>{{$apoderado->nombres_apoderado}}</td>
                                        <td>{{$apoderado->apellidos_apoderado}}</td>
                                        <td>{{$apoderado->celular_apoderado}}</td>
                                        <td>{{count($apoderado->matriculas)}}</td>
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

@section('js')

@if (count($apoderados) > 0)
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