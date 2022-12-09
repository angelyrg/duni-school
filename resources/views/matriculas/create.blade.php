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
                                            <input type="text" name="dni_estudiante" id="dni_estudiante" class="form-control" maxlength="8" minlength="8" placeholder="DNI del estudiante" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                            <input type="hidden" name="estudiante_id" id="estudiante_id">
                                            <button class="btn btn-outline-primary" type="button" id="btn_search_student"> <i class='bx bx-search-alt-2'></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label p-0" > Fecha de nacimiento</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required disabled/>
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
                                            <input type="text" name="nombres_estudiante" id="nombres_estudiante" class="form-control" placeholder=" Nombres" required disabled/>
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
                                            <input type="text" name="apellidos_estudiante" id="apellidos_estudiante" class="form-control" placeholder=" Apellidos" required disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="detalles-matricula" hidden>

                            <div class="divider ">
                                <div class="divider-text mb-2">
                                    Detalles de matrícula                          
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Nivel</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <select name="nivel" id="nivel_select" class="form-select" required>
                                                <option selected disabled value="">Seleccione...</option>                                                    
                                                <option>Inicial</option>
                                                <option>Primaria</option>
                                                <option>Secundaria</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" >Grado</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <select name="grado" id="grado_select" class="form-select" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label" >Sección</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                            <input type="text" name="seccion" class="form-control" placeholder="A" maxlength="50" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Situación</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-school' ></i></span>
                                            <select name="situacion" class="form-select" required>
                                                <option>Promovido</option>
                                                <option>Ingresante</option>
                                                <option>Repitente</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Procedencia</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-school' ></i></span>
                                            <select name="procedencia" class="form-select" required>
                                                <option>Misma IE</option>
                                                <option>Otra institución</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                </div>    
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">IE de procedencia</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bxs-school'></i></span>
                                            <input type="text" name="ie_procedencia" class="form-control" value="" placeholder="Nombre de la IE de procedencia" />
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Matrícula</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/</span>
                                            <input type="number" name="matricula_costo" class="form-control" placeholder="Costo de matrícula" required step="any" min="0"/>
                                        </div>                                   
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Mensualidad</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/</span>
                                            <input type="number" name="mensualidad" id="mensualidad" class="form-control" placeholder="Mensualidad" required step="any" min="0"/>
                                        </div>                                   
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Descuento</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bx-donate-blood'></i></span>
                                            <input type="number" name="descuento" id="descuento" class="form-control" value="0" placeholder="10" required step="any" min="0" max="100"/>
                                            <span class="input-group-text">%</span>
                                        </div>                                   
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">MENSUALIDAD FINAL</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">S/ </span>
                                            <input type="hidden" name="dia_pago" class="form-control" value="30" min="1" max="30" required/>
                                            <input type="number" name="mensualidad_final" id="mensualidad_final" class="form-control"  step="any" min="0" required/>
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
                                                <input type="text" name="dni_apoderado" id="dni_apoderado" class="form-control" maxlength="8" minlength="8" placeholder="DNI del apoderado" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                                <button class="btn btn-outline-primary" type="button" id="btn_search_apoderado"> <i class='bx bx-search-alt-2'></i> Buscar</button>
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
                                                <select name="parentesco" class="form-select" required>
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
                                                <input type="hidden" hidden name="apoderado_id" id="apoderado_id" class="form-control" />
                                                <input type="text" name="nombres_apoderado" id="nombres_apoderado" class="form-control" disabled placeholder=" Nombres del apoderado" required />
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
                                                <input type="text" name="apellidos_apoderado" id="apellidos_apoderado" class="form-control" disabled placeholder=" Apellidos del apoderado" required />
                                            </div>
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
                        <button type="submit" class="btn btn-success" id="btn-matricular" hidden disabled><i class="bx bx-save"></i> Guardar</button>
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
    
    {{-- API reniec --}}
    <script src="{{ asset("assets/js/reniec.js") }}"></script>

    <script src="{{ asset("assets/js/search-student.js") }}"></script>
    <script src="{{ asset("assets/js/search-apoderado.js") }}"></script>


    <script>
        inicial = ['3 Años', '4 Años', '5 Años']
        primaria = ['1°','2°','3°','4°','5°','6°']
        secundaria = ['1°','2°','3°','4°','5°']
        
        $(document).on('change','#nivel_select', function(){
            result = "";
            switch($('#nivel_select').val()){
                case 'Inicial':
                    inicial.forEach(element => {
                        result+="<option>"+element+"</option>";
                    });
                    break;
                case 'Primaria':
                    primaria.forEach(element => {
                        result+="<option value="+element+">"+element+"</option>";
                    });
                    break;
                case 'Secundaria':
                    secundaria.forEach(element => {
                        result+="<option value="+element+">"+element+"</option>";
                    });
                    break;
            }
            $("#grado_select").html(result);
        });

        $(document).on('change', '#descuento', function(){
            let mensualidad_input = $("#mensualidad").val();
            let descuento_input = $("#descuento").val();
            let monto_final = mensualidad_input - mensualidad_input*(descuento_input/100);
            
            $("#mensualidad_final").val(monto_final);

            console.log( monto_final );

        });

        $(document).on('change', '#mensualidad', function(){
            console.log("Mensualidad")
            let mensualidad_input = $("#mensualidad").val();
            let descuento_input = $("#descuento").val();
            let monto_final = mensualidad_input - mensualidad_input*(descuento_input/100);
            
            $("#mensualidad_final").val(monto_final);

        });
    
    </script>


@endsection