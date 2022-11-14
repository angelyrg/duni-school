@extends('layouts.main')

@section('content')
 
    
<div class="row">

    <div class="col-md-12">
                
        @include('layouts.alerts')

        <div class="card ">

            <div class="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Editar banco</h5>
                </div>
                <form action="{{route('bancos.update', $banco->id)}}" method="POST">
                  @csrf
                  @method('put')
                  
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Banco</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bxs-bank'></i></span>
                            <input type="text" class="form-control" name="banco" value="@if(!old('banco')){{$banco->banco}}@else{{old('banco')}}@endif"  id="basic-icon-default-fullname" required placeholder="Nombre del banco" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                          </div>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Dirección</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-map-alt'></i></span>
                            <input type="text" class="form-control" name="direccion" value="@if(!old('banco')){{$banco->direccion}}@else{{old('banco')}}@endif"  required placeholder="Dirección del banco" aria-describedby="basic-icon-default-fullname2">
                          </div>
                        </div>
                      </div>
    
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Código</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-label'></i></span>
                            <input type="text" class="form-control" name="codigo_banco" value="@if(!old('codigo_banco')){{$banco->codigo}}@else{{old('codigo_banco')}}@endif"  required placeholder="Código" aria-describedby="basic-icon-default-fullname2">
                          </div>
                        </div>
                      </div>    
                      
                  </div>
                  <div class="modal-footer">
                      <a href="{{ route('bancos.index') }}" class="btn btn-outline-secondary">
                          Cancelar
                      </a>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
            </div>
            

        </div>

        
    </div>
</div>


@endsection