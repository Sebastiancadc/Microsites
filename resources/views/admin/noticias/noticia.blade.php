@extends('admin.layouts.layout')
@section('content')
<?php

$rol = auth()->user()->username;
$campaña = Illuminate\Support\Facades\DB::table('rol')->select('*')->where('Roles', '=', $rol)->first();

 $fechahoy = new \DateTime();
 $fechas = $fechahoy->format('d-m-Y');
?><link rel="stylesheet" href="{{asset("plantilla/css/gallery.css")}}" type="text/css">
<link rel="stylesheet" href="{{asset("plantilla/css/blog.css")}}" type="text/css">
<link rel="stylesheet" href="{{asset("plantilla/css/landing.css")}}" type="text/css">
<div id="headerWrapper" class="container-fluid navHeaderWrapper header-image">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  mt-5" style="padding-right: 20px;">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-2 align-self-center  mb-lg-0 mb-5">
                <div class="site-header-inner  mt-lg-0 mt-5">
                    <h2 style="color:white;">Presentaciones de intéres</h2>
                    <p style="color:white;">Descubre lo último en actualidad y mantente conectado.</p>
                    {{-- @if ($campaña->create_status == '1')
                    <a href="{{ url('crearnoticia') }}" class="btn btn-sm btn-neutral mt-5">Agregar</a>
                    @endif --}}
                    @if ($campaña->create_status == '1')
                    <a href="{{ url('crearpresentacion') }}" class="btn btn-sm btn-neutral mt-5">Crear presentacion</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-1 text-center">
                <div class="banner-image">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/cover.png")}}" class="img-fluid cover" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/code.png")}}" class="img-fluid code" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/cloud.png")}}" class="img-fluid cloud" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/globe.png")}}" class="img-fluid globe" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/wave-1.png")}}" class="img-fluid wave-1" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/wave-2.png")}}" class="img-fluid wave-2" style="">
                    <img alt="cover-image" src="{{asset("plantilla/img/theme/wave-3.png")}}" class="img-fluid wave-3" style="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Header -->
<!-- Page content -->
        @if (session('crearnoticia'))
            <div class="alert alert-success" role="alert" style="    margin-top: 37px;
            width: 92%;
            margin-left: 63px;">
                {{(session('crearnoticia'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif  
            @if (session('eliminar'))
            <div class="alert alert-danger" role="alert" style="    margin-top: 37px;
            width: 92%;
            margin-left: 63px;">
                {{(session('eliminar'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('editarnoticia'))
            <div class="alert alert-warning" role="alert" style="  margin-top: 37px;
            width: 92%;
            margin-left: 63px;">
                {{(session('editarnoticia'))}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif 
<div id="articlesPostWrapper">
    <div class="container-fluid">
        <div class="row">       
            <div id="articlesPostHeading" class="col-md-12">
                <h2 class="pb-4 m-0">Artículos</h2>
            </div>
            <div id="articlesPostContent" class="col-md-12 mt-5 pt-4">

                @foreach ($vercampaña as $item)
                @if(App\Helpers\Helpers::formatearFechahoy($item->fecha) == $fechas)
                <article class="mb-5 pb-5">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="thumbnail-img">
                                <a href="{{'presentacion'}}/{{$item->title}}">
                                    <div style="overflow: hidden;
                                    cursor: default;
                                    background-color: {{$item->color}};
                                    margin-bottom: 10px;
                                    position: relative;
                                    width: 520px;
                                    height: 240px;" data-width="1" data-height="1" style="padding-left: 10px; width: auto;">
                                        <h4 class="titulodash" style=" color: {{$item->colortitulos}};">{{$item->title}} </h4>
                                        <div class="overlayer bottom-left full-width"  style="margin-top: -127px;margin-left: 16px;">
                                        <div class="overlayer-wrapper item-info ">
                                                <div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
                                                   
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                   </a>
                            </div>
                        </div>
                        <div class="col-md-8 text-md-left text-center">
                            <div class="row mt-5">                 
                                <div class="col-md-4 col-sm-4 col-12 text-center text-sm-right">
                                    <a href="{{'presentacion'}}/{{$item->title}}" class="btn btn-outline-info btn-rounded">Ver Presentacion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
<script src="{{asset("pausasacitvas/pausas.js")}}"></script>
@endsection
@endsection