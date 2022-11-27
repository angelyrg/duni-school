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
                <h5 class="card-title m-0 me-2">BANCOS</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-user" >
                    <i class='bx bx-plus'></i> Agregar Banco
                </button>
            </div>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table tablesorter " id="example">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Banco</th>
                                <th class="text-white">Dirección</th>
                                <th class="text-white">Código</th>
                                <th class="text-white">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bancos as $banco)
                                <tr>
                                    <td>{{$banco->id}}</td>
                                    <td>{{$banco->banco}}</td>
                                    <td>{{$banco->direccion}}</td>
                                    <td>{{$banco->codigo}}</td>
                                    <td>                                  
                                        <a href="{{route('bancos.edit', $banco->id)}}" class="btn btn-sm btn-outline-warning"><i class='bx bx-edit-alt' ></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$banco->id}}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                        @include('bancos.modal-delete')                                            
                                    </td>
                                </tr>                        
                                {{-- @include('responsable.bancos.modal-delete') --}}
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card-footer">
                {{ $bancos->links() }}
            </div> --}}

        </div>

        
    </div>
</div>

@include('bancos.modal-create')

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