<!-- Modal -->
<div class="modal fade" id="modal-info-{{$matricula->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Historial de Pagos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="divider text-start divider-dashed divider-info">
                    <div class="divider-text text-info">Información del estudiante</div>
                </div>
                <div class="row mb-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-sm">

                            <tbody>
                                <tr>
                                    <td>
                                        {{-- <i class="bx bx-user"></i> --}}
                                         <strong>Estudiante</strong>
                                    </td>
                                    <td>{{$matricula->estudiante->nombres_estudiante." ".$matricula->estudiante->apellidos_estudiante}}</td>
                                    <td>
                                         <strong>Sección</strong>
                                    </td>
                                    <td>{{ $matricula->nivel." ".$matricula->grado." ".$matricula->seccion }}</td>
                                </tr>                               
                                <tr>
                                    <td>
                                        {{-- <i class="bx bx-user"></i> --}}
                                         <strong>Apoderado</strong>
                                    </td>
                                    <td>{{$matricula->apoderado->nombres_apoderado." ".$matricula->apoderado->apellidos_apoderado}}</td>
                                    <td>
                                        {{-- <i class="bx bx-user"></i> --}}
                                         <strong>Celular</strong>
                                    </td>
                                    <td>{{$matricula->apoderado->celular_apoderado}}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="divider text-center divider-dashed divider-info">
                    <div class="divider-text text-info">Historial de pagos</div>
                </div>
                <div class="row mb-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-sm">

                            <thead>
                                <tr class="table-active">
                                  <th>NUM RECIBO</th>
                                  <th>FECHA</th>
                                  <th>Monto</th>
                                  <th>Concepto</th>
                                  <th>Medio de pago</th>
                                </tr>
                              </thead>

                            <tbody>
                                @foreach ($matricula->pagos as $pago)
                                    <tr>
                                        <td>{{$pago->num_recibo}}</td>
                                        <td>{{ date('d/m/Y', strtotime($pago->created_at)) }} </td>
                                        <td>{{"S/ ".$pago->monto}}</td>
                                        <td>
                                            @if ($pago->concepto == 0) 
                                                {{"Matrícula"}}

                                            @elseif ($pago->concepto >= 1 && $pago->concepto <= 12 )
                                                {{ $meses[$pago->concepto - 1 ] }}

                                            @else
                                                {{ "Otro" }}

                                            @endif
                                        </td>
                                        <td>{{$pago->medio_pago}}</td>
                                    </tr>                                     
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="divider text-end divider-dashed divider-info">
                    <div class="divider-text text-info">Historial de pagos</div>
                </div>
                <div class="row mb-3 text-end">
                    <dl class="row mt-2 ">
                        <dd class="col-sm-10">Total deuda</dd>
                        <dd class="col-sm-2">S/ {{$matricula->total}}</dd>
                        
                        <dd class="col-sm-10">Total pagado</dd>
                        <dd class="col-sm-2">S/ {{$matricula->deuda}}</dd>

                        <dd class="col-sm-10">Balance</dd>
                        <dd class="col-sm-2">S/ {{$matricula->total - $matricula->deuda}}</dd>

                    </dl>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    Aceptar
                </button>
            </div>
            
        </div>
    </div>
</div>