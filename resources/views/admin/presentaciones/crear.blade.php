@extends('admin.layouts.layout')
@section('content')
<!-- Crear Noticia -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <h6 class="h2 text-white d-inline-block mb-0">Presentaciones</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Crear presentacion</li>
                            </ol>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@if (session('noticia_crear'))
<div class="alert alert-success mt-3">
    {{session('noticia_crear')}}
</div>
@endif
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper">
            <!-- Grid system -->
            <?php
            $sumarid = Illuminate\Support\Facades\DB::select("SELECT MAX(number)+1 as id FROM presentaciones");
            ?>
            <div class="card">
                <div class="card-header collapsed" data-toggle="collapse"  aria-expanded="false" >
                    <div class="span-title">
                        <h3 class="text-section">Ajustes generales</h3>
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('crearpresentaciones') }}" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            
                            <div class="form-group"> 
                                <label class="form-control-label" for="exampleFormControlInput1">Nombre de la Presentacion</label>
                                <input type="text" class="form-control form-control-alternative" placeholder="titulo" value="{{ old('title') }}" name="title" maxlength="30" >
                                @if ($errors->has('title'))
                                <strong class="text-danger tamano">{{$errors->first('title') }}</strong>
                                @endif
                            </div>
                            @if (Auth::user()->role == 'admin')
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlInput1">Campaña</label>
                                <select class="form-control" aria-placeholder="sdaads" data-toggle="select" name="campana"> 
                                <option value=" ">Selecciona una campaña </option> 
                                <option value="admin">Todas las campañas</option> 
                                @foreach ($vercampaña as $item)
                                  <option value="{{$item->Roles}}">{{$item->Roles}}</option>      
                                  @endforeach
                                </select>
                                @if ($errors->has('campana'))
                                <strong class="text-danger tamano">{{$errors->first('campana') }}</strong>
                                @endif
                            </div>
                            @else 
                            <input type="hidden" name="campana" value="{{Auth::user()->username}}" hidden>
                            @endif
                            @foreach ($sumarid as $item)
                            <input type="hidden" name="id" value="{{json_encode($item->id)}}">
                            @endforeach
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Fecha de publicacion</label>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                      </span>
                                    <input type='text' class="form-control" name="fecha">
                                </div>
                                </div>
                                @if ($errors->has('fecha'))
                                 <strong class="text-danger tamano">{{$errors->first('fecha')}}</strong>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Color de las diapositivas</label>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="color" style="height: 47px;
                                        width: 771px;">
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Color de los titulos</label>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="colortitulos" style="height: 47px;
                                        width: 771px;">
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Color del contenido</label>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="colorcontenido" style="height: 47px;
                                        width: 771px;">
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Tiempo de transicion</label>
                                <div class="col-md-12">
                                <select class="form-control" name="time">
                                    <option value="1000">1 segundo</option>
                                    <option value="2000">2 segundos</option>
                                    <option value="3000">3 segundos</option>
                                    <option value="4000">4 segundos</option>
                                    <option value="5000">5 segundos</option>
                                    <option value="5000">6 segundos</option>
                                    <option value="7000">7 segundos</option>
                                    <option value="8000">8 segundos</option>
                                    <option value="9000">9 segundos</option>
                                    <option value="10000">10 segundos</option>
                                    <option value="100000">1 minuto</option>
                                </select>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    
        {{-- <a style="margin-left: 78%;
        top: -39px;color:white;" id="btn2" class="btn btn-danger my-4">Agregar otra pagina</a> --}}
        <a class="add btn btn-danger my-4" style="margin-left: 81%;
        top: -17px;
        color: white;
        width: 154px;">Agregar otra pagina</i></a>
        <div id="accordion" style="margin-top: -28px;">
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <div class="span-title">
                        <h3 class="text-section">Pagina - 1</h3>
                        
                    </div>
                    <div class="span-mode"></div>
                </div>
               
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" name="numero_pg[]" value="1">
                       
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                
                                <h4 class="colorsito">Titulo</h4>
                                
                               <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" >
                              
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen[]" >
                            </li>
                            
                            <li class="list-group-item">
                                <h4 class="colorsito">Contenido</h4>
                                <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                            </li>         
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>

        <div id="accordion" >
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsedos" aria-expanded="false" aria-controls="collapsedos">
                    <div class="span-title">
                        <h3 class="text-section">Pagina - 2</h3>
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div id="collapsedos" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" name="numero_pg[]" value="2">
                       
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="colorsito">Titulo</h4>
                               <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Contenido</h4>
                                <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                            </li>         
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>


        <div id="accordion" >
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsetres" aria-expanded="false" aria-controls="collapsetres">
                    <div class="span-title">
                        <h3 class="text-section">Pagina - 3</h3>
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div id="collapsetres" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" name="numero_pg[]" value="3">
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="colorsito">Titulo</h4>
                               <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Contenido</h4>
                                <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                            </li>         
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>


        <div id="accordion" >
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
                    <div class="span-title">
                        <h3 class="text-section">Pagina - 4</h3>
                        
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div id="collapsecuatro" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" name="numero_pg[]" value="4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="colorsito">Titulo</h4>
                               <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Contenido</h4>
                                <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                            </li>         
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>



        <div id="accordion">
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap5" aria-expanded="false" aria-controls="collap5">
                    <div class="span-title">
                        <h3 class="text-section">Pagina - 5</h3>
                        
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div id="collap5" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" name="numero_pg[]" value="5">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="colorsito">Titulo</h4>
                               <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Imagen (Opcional)</h4>
                                <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                            </li>
                            <li class="list-group-item">
                                <h4 class="colorsito">Contenido</h4>
                                <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                            </li>         
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>

    

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap6" aria-expanded="false" aria-controls="collap6">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 6</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap6" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap7" aria-expanded="false" aria-controls="collap7">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 7</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap7" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="7">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap8" aria-expanded="false" aria-controls="collap8">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 8</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap8" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="8">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap9" aria-expanded="false" aria-controls="collap9">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 9</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap9" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="9">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap10" aria-expanded="false" aria-controls="collap10">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 10</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap10" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="10">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap11" aria-expanded="false" aria-controls="collap11">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 11</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap11" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="11">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap12" aria-expanded="false" aria-controls="collap12">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 12</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap12" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap13" aria-expanded="false" aria-controls="collap13">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 13</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap13" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="13">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap14" aria-expanded="false" aria-controls="collap14">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 14</h3>
                            
                        </div15
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap14" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="14">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap15" aria-expanded="false" aria-controls="collap15">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 15</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap15" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="15">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap16" aria-expanded="false" aria-controls="collap16">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 16</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap16" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="16">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap17" aria-expanded="false" aria-controls="collap17">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 17</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap17" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="17">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap18" aria-expanded="false" aria-controls="collap18">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 18</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap18" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="18">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap19" aria-expanded="false" aria-controls="collap19">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 19</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap19" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="19">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="accordion">
                <div class="card hidden" >
                    <i class="far fa-times-circle close" style="    margin-left: 98%;"></i>
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap20" aria-expanded="false" aria-controls="collap20">
                        <div class="span-title">
                            <h3 class="text-section">Pagina - 20</h3>
                            
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collap20" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="numero_pg[]" value="20">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4 class="colorsito">Titulo</h4>
                                   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="imagen..." type="text" name="imagen_fondo[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Imagen (Opcional)</h4>
                                    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="imagen[]">
                                </li>
                                <li class="list-group-item">
                                    <h4 class="colorsito">Contenido</h4>
                                    <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
                                </li>         
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        <div class="col-lg-6 col-5 text-right" style="float: right;">
            <button type="submit" class="btn btn-primary my-4">Enviar</button>
            <a href="{{url('noticiausu')}}" class="btn btn-danger my-4">Cancelar</a>
        </div>
    </form>
    </div>
</div>
</div>
<script src="{{asset("plantillaAdmin/assets/js/select2.full.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/plugin/datatables/datatables.min.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/tablus.js")}}"></script>
<script src="{{asset("plantillaAdmin/assets/js/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("plantilla/vendor/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("plantilla/vendor/moment/min/moment.min.js")}}"></script>
<script>
$('#basic').select2({
    theme: "bootstrap"
});
</script>

<script type="text/javascript">
  $(function() {
    $('#datetime1').datetimepicker({
      format: 'D/M/Y',
      icons: {
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
      }
    });
  });
</script>
<style>

a.add {
  display:block ;
}
.card.hidden {
  display: none;
}
</style>
<script>
document.addEventListener("click", e => {
  if (e.target.matches("a.add")) showCard(e);
  if (e.target.matches(".card > .close")) hideCard(e);
})

const showCard = () => {
  const hiddenCard = document.querySelector(".card.hidden");
	if(!hiddenCard) alert("No puede añadir mas diapositivas");
  hiddenCard.classList.remove("hidden");
}

const hideCard = e => {
  e.target.parentElement.classList.add("hidden");
}

</script>
@endsection