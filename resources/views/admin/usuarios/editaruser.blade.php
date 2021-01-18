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
						<a href="#">Campañas</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Editar</a>
					</li>
				</ul>
			</div>				
			
			@if(count($errors) > 0)
			<div class="col-md-12">
			<div class="alert alert-danger" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			  <ul> 
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		  </ul>
		  </div>
		  </div>  
			@endif
			<div class="col-md-9 ml-auto mr-auto">
				<div class="card">
					<form action="{{url('admin/usuario',$userActualizar->id)}}" method="POST">
						@method('PUT')
						@csrf
						<div class="card-body">
							<h3 class="card-header">Edita la campaña</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<h4>Nombre de la campaña</h4>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-user"></i>
														</span>
													</div>
													<input class="form-control" placeholder="Nombre" value='{{$userActualizar->username}}' name="username" type="text">
													@if ($errors->has('name'))
													<strong class="text-danger tamano">{{ $errors->first('name') }}</strong>
													@endif
												</div>
											</div>
										
										</div>
									</div>
								</div>
							</div>		
							<div class="card-body">
								<h4>Ciudad</h4>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-envelope"></i>
										</span>
									</div>
									<div class="form-control">
										<select id="basic" name="ciudad" class="col-md-12" >
											<option value="{{$userActualizar->ciudad}} ">{{$userActualizar->ciudad}}</option>
											<option value="Bogota">Bogotá</option>
											<option value="Barranquilla">Barranquilla</option>
											<option value="Medellin">Medellín</option>
										</select>
									</div>
								</div>
							</div>
							<div class="card-body">
								<h4>Contraseña</h4>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
									</div>
									<input class="form-control" placeholder="Contraseña" name="password" value="{{Crypt::decrypt($userActualizar->pass)}}" type="text">
								</div>
								@if ($errors->has('password'))
								<strong class="text-danger tamano">{{ $errors->first('password') }}</strong>
								@endif
							</div>
							<div class="card-body">
								<h4>Confirmar contraseña</h4>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
									</div>
									<input class="form-control" placeholder="Confimrar contraseña" name="password_confirmation" value="{{Crypt::decrypt($userActualizar->pass)}}" type="text">
								</div>
							</div>
							<div class="col-sm-10 col-md-9" style="margin-left: 72%;">
								<button type="submit" class="btn btn-primary  mt-4">Editar</button>
								<a href="{{ url('admin/usuario') }}" class="btn btn-danger mt-4">Cancelar</a>
							</div>
						</div>
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
		$('#basic2').select2({
			theme: "bootstrap"
		});
		$('#basic3').select2({
			theme: "bootstrap"
		});
	</script>
	@endsection
	@endsection