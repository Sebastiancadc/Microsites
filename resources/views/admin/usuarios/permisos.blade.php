@extends('admin.layouts.layoutAdmin')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @if (session('Rol'))
            <div class="alert alert-primary" role="alert">
                {{(session('Rol'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('eliminarpermiso'))
            <div class="alert alert-danger" role="alert">
                {{(session('eliminarpermiso'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('Permisosedit'))
            <div class="alert alert-warning" role="alert">
                {{(session('Permisosedit'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Gestión de Permisos</h4>

                            </div>
                        </div>
                    </div>
                    @include('admin.usuarios.createpermiso')
                    @foreach ($permisos as $permiso)
                    <div id="accordion" style="margin-top: -17px;">
                        <div class="card">
                            <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne{{$permiso->Id_Rol}}" aria-expanded="false" aria-controls="collapseOne">
                                <div class="span-title">
                                    <h3 class="text-section">{{$permiso->Roles}} - Acciones</h3>
                                </div>
                                <div class="span-mode"></div>
                            </div>
                            <div id="collapseOne{{$permiso->Id_Rol}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h4 class="colorsito">Crear</h4>
                                            @if ($permiso->create_status == '1')
                                            <span class="badge badge-lg badge-success">
                                                Habilitado
                                                @else
                                                <span class="badge badge-lg badge-danger">
                                                    Deshabilitado
                                                    @endif
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="colorsito">Editar</h4>
                                            @if ($permiso->update_status == '1')
                                            <span class="badge badge-lg badge-success">
                                                Habilitado
                                                @else
                                                <span class="badge badge-lg badge-danger">
                                                    Deshabilitado
                                                    @endif
                                        </li>
                                        <li class="list-group-item">
                                            <h4 class="colorsito">Eliminar</h4>
                                            @if ($permiso->delete_status == '1')
                                            <span class="badge badge-lg badge-success">
                                                Habilitado
                                                @else
                                                <span class="badge badge-lg badge-danger">
                                                    Deshabilitado
                                                    @endif
                                        </li>
                                    </ul>
                                    <br>
                                    @if ($permiso->Roles == 'admin')
                                    @else
                                    <div class="d-flex align-items-center">
                                        <a href="{{route('permisoedit',$permiso->Id_Rol)}}" class="btn btn-primary  ml-auto">Ver</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .colorsito {
        color: #444;
    }
</style>
@section('js')
<script src="{{asset("plantillaAdmin/assets/js/plugin/datatables/datatables.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/tablus.js")}}"></script>

<script src="{{asset("plantillaAdmin/assets/js/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/select2.full.min.js")}}"></script>

@endsection
@endsection
