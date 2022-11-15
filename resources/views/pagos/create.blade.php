@extends('layouts.main')

@section('content')

<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <form action="{{route('pagos.store')}}" method="post">
                        @csrf

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Registrar pago</h5>
                        {{-- <small class="text-muted float-end"><i class="bx bx-star"></i></small> --}}
                    </div>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="divider">
                            <div class="divider-text"> Datos del estudiante </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Código de matrícula</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                            <input type="text" name="cod_matricula" id="cod_matricula" class="form-control" required/>
                                            <input type="hidden" name="matricula_id" id="matricula_id" >
                                            <button class="btn btn-outline-primary" type="button" id="btn_search_matricula"> <i class='bx bx-search-alt-2'></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" >Alumno</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" name="alumno" id="alumno" class="form-control" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Aula</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bxs-school"></i></span>
                                            <input type="text" name="nivel" id="nivel" class="form-control" placeholder="" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Matrícula</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/</span>
                                            <input type="text" name="matricula_costo" id="matricula_costo" class="form-control" placeholder="" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" >Mensualidad</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/</span>
                                            <input type="text" name="mensualidad" id="mensualidad" class="form-control" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sin-deuda" hidden >
                            <div class="row">
                                <div class="alert alert-info" role="alert">
                                    <i class='bx bxs-calendar-check'></i>
                                    <b>¡Al día!</b> Este estudiante no tiene deudas.
                                </div>
                            </div>
                        </div>



                        <div id="detalles-pago" hidden >
                            <div class="divider divider-info">
                                <div class="divider-text mb-2 text-info" >
                                    Detalles del pago
                                </div>
                            </div>

    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" >Concepto</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <select name="concepto" id="concepto" class="form-select" required>
                                                <option selected disabled value="">Seleccione...</option>                                                    
                                                <option>Matrícula</option>
                                                <option>Mensualidad</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" >Canal de pago</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <select name="medio_pago" id="medio_pago" class="form-select" required>
                                                {{-- <option selected disabled value="">Seleccione...</option>                                                     --}}
                                                <option>Caja de la IE</option>
                                                @foreach ($bancos as $banco)
                                                    <option>{{$banco->banco}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" >Monto</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/</span>
                                            <input type="number" name="monto" id="monto" class="form-control" placeholder="Monto" required step="any" min="0"/>
                                        </div>                                   
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div>

                    <div class="card-footer text-center">
                        <a href="{{ route('pagos.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-x"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success" id="btn-pago" ><i class="bx bx-save"></i> Guardar</button>
                    </div>

                    </form>

                </div>

            </div>
        </div>
        
    </div>
</div>

@if ($errors->any())
    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning bottom-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <i class='bx bx-error'></i>
            <div class="me-auto fw-semibold">Alerta</div>
            <small>Ahora</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Complete los siguientes campos
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif



@endsection


@section('js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
    <script src="{{ asset("assets/js/search-matricula.js") }}"></script>


@endsection