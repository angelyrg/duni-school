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
                <h5 class="card-title m-0 me-2">Reporte Pagos</h5>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="example">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-white">Cod Matrícula</th>
                                <th class="text-white">Nombre</th>
                                <th class="text-white">Pagos</th>
                                <th class="text-white">Deuda</th>
                                <th class="text-white">Fecha de matrícula</th>
                                <th class="text-white">Balance</th>
                                <th class="text-white">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriculas as $matricula)
                                <tr>
                                    <td>{{$matricula->cod_matricula}}</td>
                                    <td>{{$matricula->estudiante->nombres_estudiante." ".$matricula->estudiante->apellidos_estudiante}}</td>
                                    <td>{{"S/ ".($matricula->total - $matricula->deuda).".00"}}</td>
                                    <td>{{"S/ ".$matricula->deuda}}</td>
                                    <td>{{ date('d/m/Y', strtotime($matricula->created_at)) }} </td>
                                    <td>
                                        <span class="badge bg-label-@if($matricula->deuda > 0){{'danger'}}@else{{'success'}}@endif me-1">
                                            @if($matricula->deuda > 0)
                                                DEUDA
                                            @else
                                                AL DÍA
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if (count($matricula->pagos) >0 )
                                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-info-{{$matricula->id}}">
                                                <i class='bx bx-list-ul'></i> Detalles de pago
                                            </button>
                                            @include('reportes.modal-info')
                                        @else
                                            <span class="badge bg-label-info me-1"><i class="bx bx-info"></i> Aún no hay pagos</span>
                                        @endif                                            
                                    </td>
                                </tr>                        
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#example').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection