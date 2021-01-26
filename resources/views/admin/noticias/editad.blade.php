@extends('admin.layouts.layoutAdmin')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Administrador</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Presentación</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Editar</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 ml-auto mr-auto">
				<div class="card">
					<form action="{{url('admin/presentacion',$noticiaActualizar->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="card-body">
							<h3 class="card-header">Editar Presentación</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="card-body">
										<div class="row">

											<div class="col-md-12">

												<h4>Titulo</h4>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-align-center"></i>
														</span>
													</div>
													<input class="form-control" placeholder="Titulo" name="title" id="title" value="{{$noticiaActualizar->title }}" type="text">
												</div>
											</div>
											<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
											<div class="col-md-12">
												<br>
												<h4>Campaña</h4>
												<select class="form-control"  data-toggle="select" name="campana"> 
													<option>{{$noticiaActualizar->campana}}</option> 
													<option value="admin">Todas las campañas</option> 
													@foreach ($vercampaña as $item)
													
													  <option value="{{$item->Roles}}">{{$item->Roles}}</option>      
													  @endforeach
														   
													</select>
											</div>
											<div class="col-md-12">
												<br>
												<h4>Fecha de publicación</h4>
												<input class="form-control" placeholder="Fecha" name="fecha"  value="{{$noticiaActualizar->fecha}}" type="date">
											</div>
										</div>
									</div>
								</div>
							</div>

							<input type="hidden" name="id" value="{{json_encode($noticiaActualizar->id)}}">
							
								
								<div class="col-md-12">
									<h4>Color de diapositivas</h4>
								 <div class='input-group date' id='datetime1'>
									<span class="input-group-addon input-group-append">
										<input class="form-control" type="color" name="color" value="{{$noticiaActualizar->color}}" style="height: 47px; 
										width: 671px;">
									  </span>
								</div>
								</div>
								<br>
								<div class="col-md-12">
									<h4>Color de títulos</h4>									
								 <div class='input-group date' id='datetime1'>
									<span class="input-group-addon input-group-append">
										<input class="form-control" type="color" name="colortitulos" value="{{$noticiaActualizar->colortitulos}}" style="height: 47px; 
										width: 671px;">
									  </span>
								</div>
								</div>
								<br>
								<div class="col-md-12">
									<h4>Color del contenido</h4>
								 <div class='input-group date' id='datetime1'>
									<span class="input-group-addon input-group-append">
										<input class="form-control" type="color" name="colorcontenido" value="{{$noticiaActualizar->colorcontenido}}" style="height: 47px; 
										width: 671px;">
									  </span>
								</div>
								</div><br>
								<div class="col-md-12">
									<h4>Tiempo de transición	</h4>
								<select class="form-control" name="time">
									<option value="{{$noticiaActualizar->time }}">{{$noticiaActualizar->time}}</option>
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



				@foreach ($titulo1 as $item)
				@if (json_encode($item->titulo) == "null") 
				@else
				
				 <div id="accordion" style="margin-top: -5px;">
					
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								 <h3 class="text-section">Página - 1</h3>
						 </div>  
						 <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="1">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo1 as $item)
									<input class="form-control " placeholder="Título..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen1 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control " placeholder="imagen..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
								
									@foreach ($imagen_fondo1 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido1 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]"  cols="10" rows="6" maxlength="420">{{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>
					 </div>
				 </div>

				 @endif
				 @endforeach

				 @foreach ($titulo2 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion" >
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsedos" aria-expanded="false" aria-controls="collapsedos">
							 <div class="span-title">
								 <h3 class="text-section">Página - 2</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collapsedos" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="2">
									<h4 class="colorsito">Titulo</h4>
									@foreach ($titulo2 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen2 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo2 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido2 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"maxlength="420">{{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo3 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion" >
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsetres" aria-expanded="false" aria-controls="collapsetres">
							 <div class="span-title">
								 <h3 class="text-section">Página - 3</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collapsetres" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="3">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo3 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen3 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo3 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido3 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"maxlength="420">{{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo4 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion" >
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
							 <div class="span-title">
								 <h3 class="text-section">Página - 4</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collapsecuatro" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="4">

									<h4 class="colorsito">Título</h4>
									@foreach ($titulo4 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen4 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo4 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido4 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"maxlength="420">{{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo5 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap5" aria-expanded="false" aria-controls="collap5">
							 <div class="span-title">
								 <h3 class="text-section">Página - 5</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap5" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="5">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo5 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									 @endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen5 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo5 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido5 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo6 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap6" aria-expanded="false" aria-controls="collap6">
							 <div class="span-title">
								 <h3 class="text-section">Página - 6</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap6" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="6">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo6 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen6 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo7 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido6 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo7 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap7" aria-expanded="false" aria-controls="collap7">
							 <div class="span-title">
								 <h3 class="text-section">Página - 7</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap7" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="7">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo7 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen7 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo7 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>										 
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido7 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
								</div>
						 </div>					 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo8 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap8" aria-expanded="false" aria-controls="collap8">
							 <div class="span-title">
								 <h3 class="text-section">Página - 8</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap8" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="8">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo8 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen8 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo8 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido8 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo9 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap9" aria-expanded="false" aria-controls="collap9">
							 <div class="span-title">
								 <h3 class="text-section">Página - 9</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap9" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="9">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo9 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									 @endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen9 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hiddenhidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo9 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hiddenhidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido9 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo10 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap10" aria-expanded="false" aria-controls="collap10">
							 <div class="span-title">
								 <h3 class="text-section">Página - 10</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap10" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="10">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo10 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen10 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo10 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido10 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo11 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap11" aria-expanded="false" aria-controls="collap11">
							 <div class="span-title">
								 <h3 class="text-section">Página - 11</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap11" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="11">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo11 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen11 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo11 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido11 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>				 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo12 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap12" aria-expanded="false" aria-controls="collap12">
							 <div class="span-title">
								 <h3 class="text-section">Página - 12</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap12" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="12">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo12 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen12 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo12 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>	
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido12 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo13 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap13" aria-expanded="false" aria-controls="collap13">
							 <div class="span-title">
								 <h3 class="text-section">Página - 13</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap13" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="13">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo13 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen13 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo13 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido13 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo14 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap14" aria-expanded="false" aria-controls="collap14">
							 <div class="span-title">
								 <h3 class="text-section">Página - 14</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap14" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="14">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo14 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen14 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo14 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido14 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo15 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap15" aria-expanded="false" aria-controls="collap15">
							 <div class="span-title">
								 <h3 class="text-section">Página - 15</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap15" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="15">

									<h4 class="colorsito">Título</h4>
								 	@foreach ($titulo15 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen15 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo15 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido15 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
							 </div>
						 </div>
						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo16 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap16" aria-expanded="false" aria-controls="collap16">
							 <div class="span-title">
								 <h3 class="text-section">Página - 16</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap16" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="16">
								 <ul class="list-group list-group-flush">
									 <li class="list-group-item">
										 <h4 class="colorsito">Título</h4>
										 @foreach ($titulo16 as $item)
										<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
										 @endforeach
									 </li>
									 <li class="list-group-item">
										 <h4 class="colorsito">Imagen (Opcional)</h4>
										 @foreach ($imagen16 as $item)
										 <img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
										 <input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
										 @endforeach
									 </li>
									 <li class="list-group-item">
										 <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										 @foreach ($imagen_fondo16 as $item)
										 <img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
										 <input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
										 @endforeach
									 </li>
									 <li class="list-group-item">
										 <h4 class="colorsito">Contenido</h4>
										 @foreach ($contenido16 as $item)
										 <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
										 @endforeach
									 </li>         
								 </ul>
								 
							 </div>
						 </div>
						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo17 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap17" aria-expanded="false" aria-controls="collap17">
							 <div class="span-title">
								 <h3 class="text-section">Página - 17</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap17" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 <div class="card-body">
								 <input type="hidden" name="numero_pg[]" value="17">
										<h4 class="colorsito">Título</h4>
										@foreach ($titulo17 as $item)
										<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
										@endforeach
										<br>
										 <h4 class="colorsito">Imagen (Opcional)</h4>
										 @foreach ($imagen17 as $item)
										 <img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
										 <input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
										 @endforeach
										 <br>
										 <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										 @foreach ($imagen_fondo17 as $item)
										 <img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
										 <input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
										 @endforeach
										 <h4 class="colorsito">Contenido</h4>
										 @foreach ($contenido17 as $item)
										 <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
										 @endforeach
							 </div>
						 </div>
						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
				 @foreach ($titulo18 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 	<div id="accordion">
					 	<div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap18" aria-expanded="false" aria-controls="collap18">
							 <div class="span-title">
								 <h3 class="text-section">Página - 18</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 	<div id="collap18" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 	<div class="card-body">
								 	<input type="hidden" name="numero_pg[]" value="16">
										<h4 class="colorsito">Título</h4>
										@foreach ($titulo18 as $item)
										<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
										@endforeach
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										@foreach ($imagen18 as $item)
										<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
										<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
										@endforeach
										<br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										@foreach ($imagen_fondo18 as $item)
										<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
										<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
										@endforeach
										<br>
										<h4 class="colorsito">Contenido</h4>
										@foreach ($contenido18 as $item)
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
										@endforeach
							 	</div>
						 	</div>
						 
					 	</div>
				 	</div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo19 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap19" aria-expanded="false" aria-controls="collap19">
							 <div class="span-title">
								 <h3 class="text-section">Página - 19</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap19" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 	<div class="card-body">
								 	<input type="hidden" name="numero_pg[]" value="19">
									 <h4 class="colorsito">Título</h4>
									 @foreach ($titulo19 as $item)
									 <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									 @endforeach
									 <br>
									 <h4 class="colorsito">Imagen (Opcional)</h4>
									 @foreach ($imagen19 as $item)
									 <img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									 <input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									 @endforeach
									 <br>
									 <h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									 @foreach ($imagen_fondo19 as $item)
									 <img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									 <input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									 @endforeach
									 <br>
									 <h4 class="colorsito">Contenido</h4>
									 @foreach ($contenido19 as $item)
									 <textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									 @endforeach
							 	</div>
						 </div>
						 
					 </div>
				 </div>
				 @endif
				 @endforeach
		 
		 
				 @foreach ($titulo20 as $item)
				 @if (json_encode($item->titulo) == "null")
				 @else
				 <div id="accordion">
					 <div class="card">
						 <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collap20" aria-expanded="false" aria-controls="collap20">
							 <div class="span-title">
								<h3 class="text-section">Página - 20</h3>
							 </div>
							 <div class="span-mode"></div>
						 </div>
						 <div id="collap20" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							 	<div class="card-body">
								 	<input type="hidden" name="numero_pg[]" value="20">
									<h4 class="colorsito">Título</h4>
									@foreach ($titulo20 as $item)
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" value="{{$item->titulo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen (Opcional)</h4>
									@foreach ($imagen20 as $item)
									<img src="{{asset("$item->imagen")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="Titulo..." type="hidden" name="imagen[]" value="{{$item->imagen}}">
									@endforeach
									<br>
									<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
									@foreach ($imagen_fondo20 as $item)
									<img src="{{asset("$item->imagen_fondo")}}" class="img-fluid rounded img4">
									<input class="form-control form-control-alternative" placeholder="imagen..." type="hidden" name="imagen_fondo[]" value="{{$item->imagen_fondo}}">
									@endforeach
									<br>
									<h4 class="colorsito">Contenido</h4>
									@foreach ($contenido20 as $item)
									<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4" maxlength="420"> {{$item->contenido}}</textarea>
									@endforeach
								</div>
						 </div>
						 
					 </div>
				 </div>
				 @endif
				 @endforeach

				<div class="col-sm-10 col-md-9" style="margin-left: 72%;">
					<button type="submit" class="btn btn-primary  mt-4">Actualizar</button>
					<a href="{{ url('admin/noticia') }}" class="btn btn-danger mt-4">Cancelar</a>
				</div>
				</form>
			</div>
		</div>
	</div>
	@section('js')
	<script src="{{asset("plantillaAdmin/assets/js/bootstrap-datetimepicker.min.js")}}"></script>
	<script src="{{asset("plantillaAdmin/assets/js/select2.full.min.js")}}"></script>
	<script>
		$('#datepicker').datetimepicker({
			format: 'YYYY/MM/DD',
		});
		$('#basic').select2({
			theme: "bootstrap"
		});
	</script>
	
	@endsection
	@endsection