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
						<a href="#">Presentacion</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Crear</a>
					</li>
				</ul>
			</div>
			<?php
            $sumarid = Illuminate\Support\Facades\DB::select("SELECT MAX(number)+1 as id FROM presentaciones");
			?>
			<div class="col-md-9 ml-auto mr-auto">
            <div class="card">
                <div class="card-header collapsed" data-toggle="collapse"  aria-expanded="false" >
                    <div class="span-title">
                        <h3 class="text-section">Ajustes generales</h3>
                    </div>
                    <div class="span-mode"></div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/crearpresentacionesAdmin') }}"  enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            
                            <div class="form-group"> 
                                <h3 class="form-control-label" for="exampleFormControlInput1">Nombre de la Presentacion</h3>
                                <input type="text" class="form-control form-control-alternative" placeholder="titulo" value="{{ old('title') }}" name="title" maxlength="30" >
                                @if ($errors->has('title'))
                                <strong class="text-danger tamano">{{$errors->first('title') }}</strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlInput1">Campaña</h3>
                                <select class="form-control" aria-placeholder="sdaads" data-toggle="select" name="campana"> 
                                <option value=" ">Selecciona una campaña </option> 
                                <option value="admin">Todas las campañas</option> 
                                @foreach ($vercampaña as $item)
                                  <option value="{{$item->Roles}}">{{$item->Roles}}</option>      
                                  @endforeach
                                </select>
                            </div>

                            @foreach ($sumarid as $item)
                            <input type="hidden" name="id" value="{{json_encode($item->id)}}">
                            @endforeach
                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlTextarea1">Fecha de publicacion</h3>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <input type='date' class="form-control" name="fecha">
                                </div>
                                </div>
                                @if ($errors->has('fecha'))
                                 <strong class="text-danger tamano">{{$errors->first('fecha')}}</strong>
                                 @endif
                            </div>

                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlTextarea1">Color de las diapositivas</h3>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="color" style="height: 47px;
                                        width: 655px;">
                                      </span>
                                </div>
                                @if ($errors->has('color'))
                                 <strong class="text-danger tamano">{{$errors->first('color')}}</strong>
                                 @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlTextarea1">Color de los titulos</h3>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="colortitulos" style="height: 47px;
                                        width: 655px;">
                                      </span>
                                </div>
                                @if ($errors->has('colortitulos'))
                                <strong class="text-danger tamano">{{$errors->first('colortitulos')}}</strong>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlTextarea1">Color del contenido</h3>
                                <div class="col-md-12">
                                 <div class='input-group date' id='datetime1'>
                                    <span class="input-group-addon input-group-append">
                                        <input class="form-control" type="color" name="colorcontenido" style="height: 47px;
                                        width: 655px;">
                                      </span>
                                </div>
                                @if ($errors->has('colorcontenido'))
                                <strong class="text-danger tamano">{{$errors->first('colorcontenido')}}</strong>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <h3 class="form-control-label" for="exampleFormControlTextarea1">Tiempo de transicion</h3>
                                <div class="col-md-16">
                                <select class="form-control" name="time">
                                    <option ></option>
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
                                @if ($errors->has('time'))
                                <strong class="text-danger tamano">{{$errors->first('time')}}</strong>
                                @endif
							</div>
                </div>
            </div>
        </div>
		<a class="add btn btn-danger my-4" style="margin-left: 79%;
        top: -17px;
        color: white;
        width: 154px;">Agregar otra pagina</i></a>
				<div id="accordion" style="margin-top: -10px;">
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

										<h4 class="colorsito">Titulo</h4>
									   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]" >
									  	<br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
										<br>
										<h4 class="colorsito">Contenido</h4>
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
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
							   
										<h4 class="colorsito">Titulo</h4>
									   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
									   <br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										<input class="form-control form-control-alternative" type="file"   name="imagen_fondo[]">
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										<input class="form-control form-control-alternative" type="file"   name="imagen[]">
										<br>
										<h4 class="colorsito">Contenido</h4>
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

								
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
								

										<h4 class="colorsito">Titulo</h4>
									   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
									   <br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
										<br>
										<h4 class="colorsito">Contenido</h4>
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

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

										<h4 class="colorsito">Titulo</h4>
									   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
									   <br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
										<br>
										<h4 class="colorsito">Contenido</h4>
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

								
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

										<h4 class="colorsito">Titulo</h4>
									   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
									   <br>
										<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
										<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
										<br>
										<h4 class="colorsito">Imagen (Opcional)</h4>
										<input class="form-control form-control-alternative" type="file"  name="imagen[]">
										<br>
										<h4 class="colorsito">Contenido</h4>
										<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

								
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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
								
											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   	<br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										  	<br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"   name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"   name="imagen[]">
											<br>

											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>

											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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

											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"   name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"   name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>

									
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


											<h4 class="colorsito">Titulo</h4>
										   <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   <br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4> 
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
									
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
								
											<h4 class="colorsito">Titulo</h4>
										    <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										    <br>

											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen_fondo[]">
											<br>
										
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative" type="file"  name="imagen[]">
											<br>

											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
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
											<h4 class="colorsito">Titulo</h4>
										  	 <input class="form-control form-control-alternative" placeholder="Titulo..." type="text" name="titulo[]">
										   	<br>
											<h4 class="colorsito">Imagen de fondo (Opcional)</h4>
											<input class="form-control form-control-alternative"  type="file"  name="imagen_fondo[]">
											<br>
											<h4 class="colorsito">Imagen (Opcional)</h4>
											<input class="form-control form-control-alternative"   type="file"  name="imagen[]">
											<br>
											<h4 class="colorsito">Contenido</h4>
											<textarea class="form-control form-control-alternative" placeholder="Contenido..." name="contenido[]" id="" cols="10" rows="4"></textarea>
								</div>
							</div>
							
						</div>
					</div>
				<div class="col-sm-10 col-md-9" style="margin-left: 72%;">
					<button type="submit" class="btn btn-primary  mt-4">Actualizar</button>
					<a href="{{ url('admin/noticia') }}" class="btn btn-danger mt-4">Cancelar</a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
	@section('js')
	<script src="{{asset("plantillaAdmin/assets/js/bootstrap-datetimepicker.min.js")}}"></script>
	<script src="{{asset("plantillaAdmin/assets/js/select2.full.min.js")}}"></script>
	<style>

		a.add {
		  display:block ;
		}
		.card.hidden {
		  display: none;
		}
		</style>
	<script>
		$('#datepicker').datetimepicker({
			format: 'YYYY/MM/DD',
		});
		$('#basic').select2({
			theme: "bootstrap"
		});
	</script>
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
	@endsection