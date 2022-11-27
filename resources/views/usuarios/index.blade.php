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
                <h5 class="card-title m-0 me-2">Lista de usuarios</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-user" >
                    <i class='bx bx-plus'></i> Nuevo
                </button>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="example">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Nombre</th>
                                <th class="text-white">usuario</th>
                                <th class="text-white">Rol</th>
                                {{-- <th>Estado</th> --}}
                                <th class="text-white">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->username}}</td>
                                    <td>{{$usuario->rol}}</td>
                                    {{-- <td><span class="badge bg-label-danger me-1"></span></td> --}}
                                    <td>
                                        <a href="{{route('users.edit', $usuario->id)}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-edit-alt' ></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$usuario->id}}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                        @include('usuarios.modal-delete')                                            
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


<!-- Modal -->
<div class="modal fade" id="modal-create-user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Nuevo usuario</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
            </div>
            <form action="{{route('users.store')}}" method="POST">
              @csrf
              @method('post')
              
              <div class="modal-body">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nombre</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                        <input type="text" class="form-control" name="nombre_usuario" id="basic-icon-default-fullname" required placeholder="Nombre del usuario" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Username</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bxs-user-circle' ></i></span>
                        <input type="text" class="form-control" name="username" id="basic-icon-default-fullname" required placeholder="Username" aria-describedby="basic-icon-default-fullname2">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Contraseña</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-lock-alt'></i></span> 
                        <input type="password" class="form-control" name="password" id="basic-icon-default-fullname" required  placeholder="********" aria-describedby="basic-icon-default-fullname2">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Rol</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-checkbox-checked'></i></span>
                            <select name="user_rol" class="form-select">
                                <option selected disabled value="">Seleccione...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Secretaría">Secretaría</option>
                            </select>
                        </div>
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
    });
</script>
@endsection