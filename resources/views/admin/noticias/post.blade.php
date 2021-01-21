@extends('admin.layouts.layout')
@section('content')
<?php

$rol = auth()->user()->username;
$campaña = Illuminate\Support\Facades\DB::table('rol')->select('*')->where('Roles', '=', $rol)->first();

?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Presentacion</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Presentacion publicada</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ url('noticiausu') }}" class="btn btn-sm btn-neutral">Volver</a>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="col-md-15">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="h3 mb-0">{{$presentacion->title }}</h5>
                </div>
                <div class="card-header d-flex align-items-center">
                        <div class="d-flex align-items-center">
                        {{-- <a href="#">
                            <img src="{{$presentacion->user->photo }}" class="avatar">
                        </a> --}}
                        <div class="mx-3">
                            <h4 class="mb-0">
                                <a>Fecha de publicacion</a>
                            </h4>
                            <small class="d-block text-muted">{{ $presentacion->created_at->format('d/m/Y') }}</small>
                        </div>
                        </div>
                        <div class="text-right ml-auto">
                            @if($presentacion->user_id == Auth::User()->id)
                            @if ($campaña->update_status == '1')
                            <a href="{{route('editarpresentacion', $presentacion->id)}}" type="button" class="btn btn-sm btn-primary btn-icon">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Editar</span>
                            @endif
                            @endif
                            @if ($campaña->delete_status == '1')
                            <a href="" data-toggle="modal" data-target="#deleteNoticia{{$presentacion->id}}" type="button" class="btn btn-sm btn-danger btn-icon">
                            <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            <span class="btn-inner--text">Eliminar</span>
                            @endif
                        </a>
                        </div>
                    </div>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteNoticia{{$presentacion->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteUsuarioTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>¿Estás seguro de eliminar esta noticia?</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('eliminarpresentacion',$presentacion->id)}}">
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
                <div class="card-body">
                    {{-- PRESENTACIONN AQUI --}}
                    <img alt="Image placeholder" src="{{ $presentacion->title }}" class="img-fluid rounded" style="margin-left: 260px; margin-right: 260px; width: 477px; heightmin-width: ;min-width: 474px;">
                    <div class="row align-items-center my-3 pb-3 border-bottom">
                    <div class="col-sm-6">
                    </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection
