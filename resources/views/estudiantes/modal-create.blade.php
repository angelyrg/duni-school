<!-- Modal -->
<div class="modal fade" id="modal-create-estudiante" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('estudiantes.store')}}" method="post">
                @csrf
                @method('post')
                <div class="modal-body">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">DNI</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                <input type="text" name="dni_estudiante" class="form-control" maxlength="8" minlength="8" placeholder="Número de DNI" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombres</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="nombres_estudiante" class="form-control" placeholder="Nombres" required/>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Apellidos</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                                <input type="text" name="apellidos_estudiante" class="form-control" placeholder="Apellidos" required/>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Banco</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-bank' ></i></span>
                                <select name="ciclo" class="form-select" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option>Caja Huancayo</option>
                                    <option>Tesorería Colegio</option>                                    
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Código</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-credit-card-front' ></i></span>
                                <input type="text" name="codigo_matricula" class="form-control" maxlength="10" placeholder="Código de matrícula" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                            </div>
                        </div>
                    </div> --}}
                    
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Celular</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-phone' ></i></span>
                                <input type="text" name="celular" class="form-control phone-mask" maxlength="9" minlength="9" placeholder="Número de celular" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Correo</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" name="correo_institucional" class="form-control" placeholder="Correo institucional" />                                       
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Motivo</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-align-left'></i></span>
                                <textarea name="motivo"  cols="30" rows="2" class="form-control" placeholder="Motivo de la tutoría" required></textarea>                                                                       
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-x'></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bxs-save' ></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>