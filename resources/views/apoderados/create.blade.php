@extends('layouts.main')

@section('content')
 
    
<div class="row">

    <div class="col-md-8 offset-md-2">
        @include('layouts.alerts')

        <div class="card ">

            <div class="modal-content">
                <div class="card-header">
                    <h5 class="modal-title">Agregar apoderado</h5>
                </div>
                <form action="{{route('apoderados.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="card-body">
    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">DNI</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                    <input type="text" name="dni_apoderado" id="dni_search" class="form-control" maxlength="8" minlength="8" placeholder="DNI del apoderado" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                    {{-- <button class="btn btn-outline-primary" type="button" id="btn_search_student"> <i class='bx bx-search-alt-2'></i> Buscar</button> --}}
                                    <input id="btnBuscar" type="button" value="Buscar" class="btn btn-outline-primary" >

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p class="text-info" id="mensaje_busqueda" ></p>
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombres</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="nombres_apoderado" id="nombres" class="form-control" placeholder="Nombres" required/>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Apellidos</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                    <input type="text" name="apellidos_apoderado" id="apellidos" class="form-control" placeholder="Apellidos" required/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Celular</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-phone' ></i></span>
                                    <input type="text" name="celular_apoderado" class="form-control phone-mask" required maxlength="9" minlength="9" placeholder="Número de celular" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-secondary" href="{{route('apoderados.index')}}" ><i class='bx bx-x'></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class='bx bxs-save' ></i> Guardar</button>
                    </div>
                </form>
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
<script src="{{ asset("assets/js/reniec.js") }}"></script>
@endsection