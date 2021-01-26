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
                    <h5 class="h3 mb-0">{{$presentacion->title }} </h5>
                </div>
                <div class="card-header d-flex align-items-center">
                        <div class="d-flex align-items-center">
                
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
                          </a>
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
                    <style>
                          #sequence .step1 {
                        background-color:{{$presentacion->color}};
                        } 
                        .color {
                        color:  {{$presentacion->colortitulos}};
                        }
                        .colorcont {
                        color:  {{$presentacion->colorcontenido}};
                        }
                    </style>
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
                <a href="{{route('presentacionf', $presentacion->id)}}">
                <div class="card-body">
                    <div id="sequence">
                        <ul class="seq-canvas">
                            @foreach ($titulo1 as $item)
                            @if (json_encode($item->titulo) == "null")
                            @else
                            
                          <li @foreach ($imagen_fondo1 as $item)                     
                           @if (json_encode($item->imagen_fondo) == "null" )
                            class="step1"
                            @else
                            style="background-image: url('{{asset("$item->imagen_fondo")}}');
                             background-repeat: no-repeat;background-size:cover;"
                          @endif 
                          @endforeach>
                            <div class="content">  
                                @foreach ($titulo1 as $item)
                              <h2 data-seq class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido1 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              
                              @foreach ($imagen1 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach
                        
                          @foreach ($titulo2 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo2 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo2 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido2 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach

                              @foreach ($imagen2 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach
                         
                          @foreach ($titulo3 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo3 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo3 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido3 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach

                              @foreach ($imagen3 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach


                          @foreach ($titulo4 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo4 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo4 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido4 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach

                              @foreach ($imagen4 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo5 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo5 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo5 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido5 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen5 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo6 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo6 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo6 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido6 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen6 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo7 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo7 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo7 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido7 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen7 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo8 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo8 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo8 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido8 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen8 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo9 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo9 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo9 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido9 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen9 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo10 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo10 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo10 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido10 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen10 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo11 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo11 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo11 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido11 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen11 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo12 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo12 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo12 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido12 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen12 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo13 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo13 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo13 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido13 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen13 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo14 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo14 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo14 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido14 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen14 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo15 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo15 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo15 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido15 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen15 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo16 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo16 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo16 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido16 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen16 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo17 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo17 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo17 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido17 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen17 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo18 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo18 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo18 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido18 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen18 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo19 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo19 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo19 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido19 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen19 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach

                          @foreach ($titulo20 as $item)
                          @if (json_encode($item->titulo) == "null")
                          @else
                          <li @foreach ($imagen_fondo20 as $item)                     
                          @if (json_encode($item->imagen_fondo) == "null" )
                           class="step1"
                           @else
                           style="background-image: url('{{asset("$item->imagen_fondo")}}');
                            background-repeat: no-repeat;background-size:cover;"
                         @endif 
                         @endforeach>
                            <div class="content">
                                @foreach ($titulo20 as $item)
                              <h2 data-seq  class="color">{{$item->titulo}}</h2>
                              @endforeach
                              @foreach ($contenido20 as $item)
                              <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
                              @endforeach
                              @foreach ($imagen20 as $item)
                              @if (json_encode($item->imagen) == "null")
                              @else
                              <img src="{{asset("$item->imagen")}}" height="300" width="500">
                              @endif
                              @endforeach
                            </div>
                          </li>
                          @endif
                          @endforeach
                        </ul>
                      </div>
                    @include('admin.presentaciones.csspresentaciones')
                </div>
              </a>
           </div>
        </div>
    </div>
</div>

<script src="{{asset("presentaciones/scripts/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/hammer.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/sequence.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/sequence-theme.basic.js")}}"></script>

<script>
	// Get the Sequence element
	var sequenceElement = document.getElementById("sequence");
  
	var options = {
	  keyNavigation: true,
	  fadeStepWhenSkipped: false,
      autoPlay: true,
	  autoPlayInterval: {{$presentacion->time}},
	}
  
	// Launch Sequence on the element, and with the options we specified above
	var mySequence = sequence(sequenceElement, options);
  </script>

 
@endsection
