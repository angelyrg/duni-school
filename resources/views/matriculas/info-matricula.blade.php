<!-- End Offcanvas -->
<div class="col-lg-3 col-md-6">
    <div class="mt-3">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd-{{$matricula->id}}" aria-labelledby="offcanvasBoth" >
            <div class="offcanvas-header">
                <h5 id="offcanvasBoth" class="offcanvas-title">Detalles de la matrícula</h5>
                <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                <div class="row">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <td><b>Código</b></td>
                            <td colspan="3"><b>{{$matricula->cod_matricula}}</b></td>
                        </tr>
                        <tr>
                            <td>Estudiante</td>
                            <td colspan="3">{{$matricula->estudiante->nombres_estudiante." ".$matricula->estudiante->apellidos_estudiante}}</td>
                        </tr>
                        <tr>
                            <td>Género</td>
                            <td colspan="3">{{$matricula->estudiante->genero}}</td>
                        </tr>
                        <tr>
                            <td>Fecha Nac</td>
                            <td colspan="3">{{$matricula->estudiante->fecha_nacimiento}}</td>
                        </tr>
                        <tr>
                            <td>Nivel</td>
                            <td colspan="3">{{$matricula->nivel}}</td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td colspan="3">{{$matricula->grado." ".$matricula->seccion}}</td>
                        </tr>
                        <tr>
                            <td>Fecha de matrícula</td>
                            <td colspan="3">{{$matricula->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Situación</td>
                            <td colspan="3">{{$matricula->situacion}}</td>
                        </tr>
                        <tr>
                            <td>Apoderad@</td>
                            <td colspan="3">{{$matricula->apoderado->nombres_apoderado." ".$matricula->apoderado->apellidos_apoderado}}</td>
                        </tr>
                        <tr>
                            <td>Parentesco</td>
                            <td colspan="3">{{$matricula->parentesco}}</td>
                        </tr>
                        <tr>
                            <td>Contacto</td>
                            <td colspan="3">{{$matricula->apoderado->celular_apoderado}}</td>
                        </tr>
                    </table>

                    
                </div>
                <div class="row mb-3 text-end">
                    <dl class="row mt-2 ">
                        <dd class="col-sm-8">Costo de matrícula</dd>
                        <dd class="col-sm-4">S/ {{$matricula->matricula_costo}}</dd>
                        
                        <dd class="col-sm-8">Descuento de mensualidad</dd>
                        <dd class="col-sm-4">{{$matricula->descuento}} %</dd> 

                        <dd class="col-sm-8 text-primary"><b>Mensualidad</b></dd>
                        <dd class="col-sm-4 text-primary"><b>S/ {{$matricula->mensualidad}}</b></dd>

                        <dd class="col-sm-8 text-primary">Total endeudado</dd>
                        <dd class="col-sm-4 text-primary">S/ {{$matricula->total}}</dd>

                        <dd class="col-sm-8 text-success">Total pagado</dd>
                        <dd class="col-sm-4 text-success">S/ {{$matricula->total - $matricula->deuda}}</dd>

                        <dd class="col-sm-8 text-danger">Deuda pendiente</dd>
                        <dd class="col-sm-4 text-danger">S/ {{$matricula->deuda}}</dd>
                    </dl>
                </div>

                <button
                type="button"
                class="btn btn-outline-secondary d-grid w-100"
                data-bs-dismiss="offcanvas"
                >
                Cerrar
                </button>
            </div>
        </div>
    </div>
</div>