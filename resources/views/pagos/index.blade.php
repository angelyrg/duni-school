@extends('layouts.main')

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
                    <table class="table tablesorter " id="example">
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
                                <th class="text-white"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($pagos) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                <?php $i=0; ?>
                                @foreach ($pagos as $pago)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="#">{{"R-000".$pago->id}}</a></td>
                                        <td>{{ date('d/m/Y', strtotime($pago->created_at)) }} </td>
                                        <td>{{$pago->matricula->cod_matricula}}</td>
                                        <td>{{$pago->matricula->estudiante->nombres_estudiante." ".$pago->matricula->estudiante->apellidos_estudiante}}</td>
                                        <td>{{$pago->concepto}}</td>
                                        <td>{{$pago->medio_pago}}</td>
                                        <td>{{"S/ ".$pago->monto}}</td>
                                    </tr>                        
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $pagos->links() }}
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

@if (count($pagos) > 0)
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> --}}
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#example').DataTable();
    });
</script>
@endif
    
@endsection