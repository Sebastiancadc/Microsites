@extends('admin.layouts.layout')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">

                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar archivo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper">
            <!-- Grid system -->
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update', $ArchivoActualizar->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <style>
                            .ii {
                                color: red;
                            }
                        </style>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="form-control-label">Titulo<i class="ii">*</i></label>
                                    <input type="text" class="form-control" placeholder="Título" name="titulo"
                                        id="titulo" required value="{{$ArchivoActualizar->titulo}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Tipo de
                                            archivo<i class="ii">*</i></label>
                                        <select class="form-control" name="tipo_archivo" id="tipo_archivo" required>
                                            <option></option>
                                            <option>Excel</option>
                                            <option>PDF</option>
                                            <option>Word</option>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label">Archivo<i class="ii">*</i></label>
                                        <input type="file" class="form-control form-control-alternative" name="archivo"
                                            id="archivo" required value="{{$ArchivoActualizar->archivo}}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ url('/archivos') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection