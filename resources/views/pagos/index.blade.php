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
                <h5 class="card-title m-0 me-2">PAGOS</h5>
                <!-- Button trigger modal -->
                <a href="{{route('pagos.create')}}" class="btn btn-primary" >
                    <i class='bx bx-plus'></i> Pago
                </a>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter" id="example">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Recibo</th>
                                <th class="text-white">Fecha</th>
                                <th class="text-white">Cod Matrícula</th>
                                <th class="text-white">Estudiante</th>
                                <th class="text-white">Concepto</th>
                                <th class="text-white">Medio de pago</th>
                                <th class="text-white">Monto</th>
                                @if (Auth::user()->rol == "Administrador")
                                    <th class="text-white">Opciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach ($pagos as $pago)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <a href="{{route('pagos.invoice', $pago->id)}}" target="_blank" class="btn btn-sm rounded-pill btn-outline-dark">
                                            <i class='bx bxs-download'></i> {{$pago->id}}
                                        </a>
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($pago->created_at)) }} </td>
                                    <td>{{$pago->matricula->cod_matricula}}</td>
                                    <td>{{$pago->matricula->estudiante->nombres_estudiante." ".$pago->matricula->estudiante->apellidos_estudiante}}</td>
                                    <td>
                                        @if ($pago->mes_pago == 0)
                                            {{"Matrícula"}}

                                        @elseif($pago->mes_pago >= 1 && $pago->mes_pago <= 12)
                                            {{"Mensualidad (".substr($meses[$pago->mes_pago-1], 0, 3).")"}}

                                        @elseif($pago->mes_pago > 12)
                                            {{"Otro"}}
                                        @endif
                                    </td>
                                    <td>{{$pago->medio_pago}}</td>
                                    <td>{{"S/ ".$pago->monto}}</td>
                                    @if (Auth::user()->rol == "Administrador")
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$pago->id}}">
                                                <i class='bx bx-edit-alt'></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$pago->id}}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            @include('pagos.modal-edit')
                                            @include('pagos.modal-delete')
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card-footer">
                {{ $pagos->links() }}
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
    $(document).ready( function () {
        $('#example').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
{{-- @if (count($pagos) > 0)
@endif --}}

@endsection