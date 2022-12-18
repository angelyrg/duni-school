<!-- Modal -->
<div class="modal fade" id="modal-edit-{{$pago->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Editar pago</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

            
            <div class="modal-body">

                <form action="{{route('pagos.update', $pago->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label class="col-form-label" >Código de matrícula</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-id-card' ></i></span>
                                <input type="number" value="{{$pago->matricula->cod_matricula}}" disabled class="form-control" placeholder="Código de matrícula" required />
                            </div>                                   
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label class="col-form-label" >Estudiante</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i> </span>
                                <input type="text" value="{{$pago->matricula->estudiante->nombres_estudiante." ".$pago->matricula->estudiante->apellidos_estudiante}}" disabled class="form-control" placeholder="Nombres y apellidos" required />
                            </div>                                   
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label class="col-form-label" >Monto</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">S/</span>
                                <input type="number" name="monto" id="monto" value="{{$pago->monto}}" class="form-control" placeholder="Monto" required step="any" min="0"/>
                            </div>                                   
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

