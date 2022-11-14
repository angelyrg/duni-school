@extends('layouts.main')



@section('content')

<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <form action="{{route('matriculas.store')}}" method="post">
                        @csrf

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">REGISTRAR MATRÍCULA</h5>
                        {{-- <small class="text-muted float-end"><i class="bx bx-star"></i></small> --}}
                    </div>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="divider">
                            <div class="divider-text"> Datos personales </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">DNI</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                            <input type="text" name="dni_estudiante" id="dni_estudiante" value="{{$matricula->estudiante->dni_estudiante}}" class="form-control"  maxlength="8" minlength="8" placeholder="DNI del estudiante" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                            <input type="hidden" name="estudiante_id" id="estudiante_id" value="{{$matricula->estudiante->id}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombres</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" name="nombres_estudiante" value="@if(!old('nombres_estudiante')){{$matricula->estudiante->nombres_estudiante}}@else{{old('nombres_estudiante')}}@endif" class="form-control" placeholder=" Nombres" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Apellidos</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <input type="text" name="apellidos_estudiante" value="@if(!old('apellidos_estudiante')){{$matricula->estudiante->apellidos_estudiante}}@else{{old('apellidos_estudiante')}}@endif" class="form-control" placeholder=" Apellidos" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider ">
                            <div class="divider-text mb-2">
                                Detalles de matrícula                          
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Nivel</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <select name="nivel" class="form-select">
                                                <option selected disabled value="">Seleccione...</option>
                                                <option @if($matricula->nivel=="Inicial"){{'selected'}}@endif >Inicial</option>                                        
                                                <option @if($matricula->nivel=="Primaria"){{'selected'}}@endif>Primaria</option>
                                                <option @if($matricula->nivel=="Secundaria"){{'selected'}}@endif>Secundaria</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Grado</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <select name="grado" class="form-select">
                                                <option selected disabled value="">Seleccione...</option>
                                                @foreach ($grados[1] as $grado)
                                                    <option @if($matricula->grado==$grado){{'selected'}}@endif >{{$grado}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Sección</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <input type="text" name="seccion" value="@if(!old('seccion')){{$matricula->seccion}}@else{{old('seccion')}}@endif" class="form-control" placeholder="A" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Monto</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-money"></i></span>
                                        <input type="text" name="monto" value="@if(!old('monto')){{$matricula->monto}}@else{{old('monto')}}@endif" class="form-control" placeholder="Total adeudado" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                    </div>                                   
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Banco</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bxs-bank'></i></span>
                                        <select name="banco" class="form-select">
                                            <option selected disabled value="">Seleccione...</option>
                                            @foreach ($bancos as $banco)
                                                <option @if($matricula->banco==$banco->banco){{'selected'}}@endif >{{$banco->banco}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="divider">                            
                            <div class="divider-text mb-2"> Datos del apoderado  </div>
                        </div>

                        <div class="row">
    
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">DNI</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                            <input type="text" name="dni_apoderado" class="form-control" maxlength="8" minlength="8" placeholder="DNI del apoderado" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                            {{-- <button class="btn btn-outline-primary" type="button" id="button-addon2"> <i class='bx bx-search-alt-2'></i> Buscar</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label px-0 " for="basic-icon-default-fullname"> Parentesco</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <select name="nivel" class="form-select">
                                                <option selected disabled value="">Seleccione...</option>
                                                <option>Padre</option>
                                                <option>Madre</option>
                                                <option>Hermano(a)</option>
                                                <option>Tío(a)</option>
                                                <option>Abuelo(a)</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombres</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" name="nombres_apoderado" class="form-control" placeholder=" Nombres del apoderado" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Apellidos</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <input type="text" name="apellidos_apoderado" class="form-control" placeholder=" Apellidos del apoderado" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  

                    </div>

                    <div class="card-footer text-center">
                        <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-x"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success" id="btn-matricular"><i class="bx bx-save"></i> Guardar cambios</button>
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
