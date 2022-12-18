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
                <h5 class="card-title m-0 me-2">Reporte Pagos: @if(isset($fecha_selected)){{ $meses[$fecha_selected-1] }} @else {{ $meses[date('m')-1]}}@endif</h5>
                <div>
                    <a type="button" class="btn btn-outline-dark btn-sm" onclick="PrintDiv();">
                        <i class='bx bxs-file-pdf'></i> Descargar
                    </a>
                </div>
            </div>


            <div class="card-body">
                <div class="row col d-flex" id="filtrar_pagos">

                    <form action="{{route('filtermonth')}}" method="post" class="d-flex flex-row align-items-center flex-wrap">
                        @csrf
                        <div class="col-md-3">
                            <div class="row mb-3">
                                <label class="col-form-label" for="basic-icon-default-fullname">Mes</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <select name="selected_month" id="selected_month" class="form-select form-select-sm" required>
                                        @for ($i = 0; $i < count($meses); $i++)
                                            @if (isset($fecha_selected))
                                                <option @if( $fecha_selected== $i+1) {{'selected'}}@endif value="{{$i+1}}">{{$meses[$i]}}</option>
                                            @else
                                                <option @if(date("m") == $i+1 ){{"selected"}}@endif value="{{$i+1}}">{{$meses[$i]}}</option>
                                            @endif
                                        @endfor
                                        
                                    </select>
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
                



                <div class="table table-responsive" id="table_to_print">
                    <table class="table tablesorter " id="example">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-white">Cod Matrícula</th>
                                <th class="text-white">Grado</th>
                                <th class="text-white">Nombre</th>
                                <th class="text-white">Mensualidad</th>
                                <th class="text-white">Monto pagado</th>
                                <th class="text-white">Deuda del mes</th>
                                <th class="text-white">Vencimiento</th>
                                <th class="text-white">Mora</th>
                                <th class="text-white" id="hide_in_print">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriculas as $matricula)
                                <tr>
                                    <td>{{$matricula->cod_matricula}}</td>
                                    <td>{{$matricula->grado." ".$matricula->nivel}}</td>
                                    <td>{{$matricula->estudiante->nombres_estudiante." ".$matricula->estudiante->apellidos_estudiante}}</td>
                                    <td>{{"S/ ".$matricula->mensualidad}}</td>
                                    <td>
                                        <?php 

                                        $pagado_del_mes = 0;
                                        if (!isset($fecha_selected)){ $fecha_selected = date('m'); }
                                        ?>
                                        {{-- Se obtiene lo pagado en el mes correspondiente --}}
                                        @foreach ($matricula->pagos as $pago)
                                            @if ( $pago->mes_pago == $fecha_selected )
                                                <?php $pagado_del_mes = $pagado_del_mes + $pago->monto; ?>

                                            @endif
                                        @endforeach

                                        <span class="badge bg-label-info me-1">
                                            {{ "S/ ".$pagado_del_mes }}
                                        </span>
                                        
                                    </td>
                                    <?php 

                                        $dias_mora = 0; 
                                        $now = time(); // or your date as well
                                        $vencimiento = strtotime("2022-".($fecha_selected+1)."-1");
                                        $dias_mora = round( ($now - $vencimiento ) / (60 * 60 * 24)) ;
                                        if ($dias_mora > 356){
                                            $dias_mora = 0;
                                        }
                                    ?>

                                    <td>
                                        <?php  $total_deuda_mora = 0;  ?>
                                        @if ($matricula->mensualidad > $pagado_del_mes )
                                            <span class="badge bg-label-warning me-1">
                                                {{ "S/ ".($matricula->mensualidad - $pagado_del_mes) }}
                                                <?php $total_deuda_mora = $dias_mora * 0.5 ?>
                                            </span>
                                        @else
                                            <span class="badge bg-label-success me-1">
                                                {{ "S/ ".($matricula->mensualidad - $pagado_del_mes) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( !isset($fecha_selected) )
                                            {{date('t/m/y')}}
                                        @else
                                            {{ date('t/m/y', $vencimiento) }}
                                        @endif
                                        
                                    </td>
                                    <td>
                                        {{ "S/ ".($total_deuda_mora) }}
                                    </td>
                                    
                                    <td id="hide_in_print">
                                        @if (count($matricula->pagos) >0 )
                                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-info-{{$matricula->id}}">
                                                <i class='bx bx-list-ul'></i> Todos los pagos
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

        let mes = $("#selected_month").val();

    });

    $("#selected_month").on("change", function (){
        let mes = $("#selected_month").val();

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
        let mes = $("#selected_month").val();
        h1 = "<h4>Pagos correspondiente al mes: " + mes + "</h4>";
        popupWin.document.write('<html><body onload="window.print()">' + h1 + divToPrint.innerHTML + '</html>');
            
            
        $('*[id*=hide_in_print]:hidden').each(function() {
            $(this).attr("hidden",false);
        });
        
        $('#example').DataTable();

        popupWin.document.close();

    }
</script>
@endsection
