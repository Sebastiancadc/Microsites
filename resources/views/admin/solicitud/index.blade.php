@extends('admin.layouts.layoutAdmin')
@section('contents')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @include('admin.solicitud.estadisticas')
            @if (session('crearCampaña'))
            <div class="alert alert-primary" role="alert">
                {{(session('crearCampaña'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('seelimino'))
            <div class="alert alert-danger" role="alert">
                {{(session('seelimino'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('editarsoli'))
            <div class="alert alert-warning" role="alert">
                {{(session('editarsoli'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Gestión de Campañas</h4>
                            </div>
                        </div>
                        <div class="card-body">                       
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Solicitud</th>
                                            <th>Estado</th>
                                            <th style="width: 10%">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitud as $soli)
                                        <tr>
                                            <td>{{$soli->name}}</td>
                                            <td>
                                                @if ($soli->estado == 'Revisado')
                                                <span class="badge badge-lg badge-success">{{$soli->estado}}</span>
                                                @else
                                                <span class="badge badge-lg badge-danger">{{$soli->estado}}</span>
                                                @endif</td>                                 
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('editarsolicitud',$soli->id)}}" class="btn btn-link btn-primary btn-lg" data-original-title="Editar usuario">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button href="#" class="btn btn-link btn-danger" data-toggle="modal" data-target="#deleteUsuario{{$soli->id}}" data-original-title="Eliminar usuario">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteUsuario{{$soli->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteUsuarioTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3>¿Estás seguro?</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form role="form" method="POST" action="{{route('eliminarsolicitud',$soli->id) }}">
                                                                    @csrf @method('DELETE')
                                                                    <div class="modal-body">
                                                                        ¡No podrás revertir esto!
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        <button type="sum" class="btn btn-primary">Eliminar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        </div>
    </div>

</div>
</div>
@section('js')
<script src="{{asset("plantillaAdmin/assets/js/plugin/datatables/datatables.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/tablus.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/select2.full.min.js")}}"></script>
@endsection
@endsection
