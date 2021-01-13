@extends('admin.layouts.layoutAdmin')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard-Admin</h4>
                
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Usuarios registrados</p>
                                        <h4 class="card-title">{{$usuarioRegistrads}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-gestures"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Solicitudes registradas</p>
                                        <h4 class="card-title">{{$solicitudRegistradas}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Solicitudes Pendientes</div>
                            </div>
                        </div>
                        @foreach ($solicidesPendientes as $solicitud)
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar ">
                                    <span class="avatar-title rounded-circle border border-white bg-info"><i class="fas fa-exclamation-triangle"></i></span>
                                </div>
                                <div class="flex-1 ml-3 pt-1">
                                    <h5 class="text-uppercase fw-bold mb-1">{{$solicitud->name}}<span class="text-danger pl-3">Pendiente</span></h5>
                                    <span class="text-muted">Crear usuario</span>
                                </div>
                                <div class="float-right pt-1">
                                    <small class="text-muted">{{Carbon\Carbon::parse($solicitud->created_at)->diffForHumans()}}</small>
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
</div>
</div>
@endsection