@extends('layouts.main')

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
                        <thead class="text-primary">
                            <tr>
                                <th>#</th>
                                <th>Banco</th>
                                <th>Dirección</th>
                                <th>Código</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($bancos) == 0)
                                <tr>
                                    <td colspan="5">No hay registros</td>
                                </tr>
                            @else
                                
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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $bancos->links() }}
            </div>

        </div>

        
    </div>
</div>

@include('bancos.modal-create')

@endsection


@section('js')

@if (count($bancos)>0)
    
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#example').DataTable();
    });
</script>
    
@endif
@endsection