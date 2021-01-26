@extends('admin.layouts.layout')
@section('content')
<!-- ARCHIVOS -->
<div class="header bg-primary pb-6" style="height: 100px;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archivos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br><br><br>
            <div class="container-fluid mt--6">

                @if (session('agregar'))
                <div class="alert alert-primary" role="alert">
                    {{(session('agregar'))}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('update'))
                <div class="alert alert-warning" role="alert">
                    {{(session('update'))}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('eliminar'))
                <div class="alert alert-danger" role="alert">
                    {{(session('eliminar'))}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-12 card-wrapper">
                        <!-- Grid system -->
                        <div class="card">
                            <div class="card-body ">
                                <a href="" class="btn btn-sm btn-neutral" style="float: right" data-toggle="modal"
                                    data-target="#addRowModal">Agregar Archivo</a>
                                <br><br>
                                @foreach ($archivos22 as $item)
                                <div class="col-lg-4 card-wrapper" style="float:left;">
                                    <div class="card"
                                
                                    @if ($item->tipo_archivo == 'Excel')
                                        style="background-image:
                                        url('{{asset("plantilla/img/archivos/excel1.ico")}}');background-repeat: no-repeat;background-position: center;
                                        "
                                        @endif

                                        @if ($item->tipo_archivo == 'PDF')
                                        style="background-image:
                                        url('{{asset("plantilla/img/archivos/pdf1.ico")}}');
                                        background-repeat: no-repeat;background-position: center;"
                                        @endif

                                        @if ($item->tipo_archivo == 'Word')
                                        style="background-image: url('{{asset("plantilla/img/archivos/word2.ico")}}');
                                        background-repeat: no-repeat;background-position: center;"
                                        @endif  >

                                        <!-- Card body -->
                                        <div class="card-body awhite" >
                                        
                                            <h1 style="color:black;" class="h2 card-title mb-0 ">{{$item->titulo}}</h1>
                                            <h4 style="color:black;">{{$item->tipo_archivo}}</h4>
                                            <br>

                                            <a href="{{route('editar', $item->id)}}"
                                                style="color: rgb(100, 100, 100);"><i class="fa fa-edit"></i>
                                            </a>

                                            <a href="" class="btn btn-sm btn-neutral" style="float: right"
                                                data-toggle="modal" data-target="#modaleliminar" id="botoneliminar"> <i
                                                    class="fa fa-times"></i>
                                            </a>

                                            {{-- BOTON ELIMINAR MODAL  --}}
                                            <!-- Modal -->
                                            <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <h3>¿Estás seguro?</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 style="text-align: center; margin-top:-20px">¡No podrás
                                                                revertir esto!
                                                            </h5>
                                                            <br>
                                                            <form role="form" method="POST"
                                                                action="{{route('eliminar',$item->id)}}">
                                                                @csrf @method('DELETE')
                                                                <div class="text-center" style="margin-top: -20px">
                                                                    <button type="submit"
                                                                        class="btn btn-primary my-4">Eliminar</button>
                                                                    <button class="btn btn-danger ml-auto"
                                                                        data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- FIN MODAL --}}

                                            <style>
                                                #botoneliminar {
                                                    box-shadow: none;
                                                    background: none;
                                                    border-color: transparent;
                                                    float: right;
                                                    margin-top: -107px;
                                                    margin-right: -24px;
                                                }
                                            </style>

                                            <a href="upload/{{$item->archivo}}" download="{{$item->archivo}}"
                                                class="btn btn-primary btn-sm" style="float: right">
                                                Descargar &nbsp
                                                <i class="fa fa-download"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </body>
                    @include('admin.archivos.create')
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection