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
						<a href="#">Roles</a>
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
					<form action="{{url('admin/updatepermisos',$permisoActualizar->Id_Rol)}}" method="POST">
						@method('PUT')
						@csrf
						<div class="card-body">
							<h3 class="card-header">Edita el rol {{$permisoActualizar->Roles}}</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<h4>Crear</h4>
												<div class="input-group">
													<input type="checkbox" data-toggle="toggle" data-on="Habilitado" name="create_status" data-off="Deshabilitado" @if ($permisoActualizar->create_status == '1')
													checked data-onstyle="success" value="1"
													@else
													data-offstyle="danger" value="0"
													@endif>
												</div>
											</div>
											<div class="col-md-4">
												<h4>Editar</h4>
												<div class="input-group">
													<input type="checkbox" data-toggle="toggle" data-on="Habilitado" name="update_status" data-off="Deshabilitado" @if ($permisoActualizar->update_status == '1')
													checked data-onstyle="success" value="1"
													@else
													data-offstyle="danger" value="0"
													@endif>
												</div>
											</div>
											<div class="col-md-4">
												<h4>Elimiar</h4>
												<div class="input-group">
													<input type="checkbox" data-toggle="toggle" data-on="Habilitado" name="delete_status" data-off="Deshabilitado" @if ($permisoActualizar->delete_status == '1')
													checked data-onstyle="success" value="1"
													@else
													data-offstyle="danger" value="0"
													@endif>
												</div>
											</div>
										</div>
										<div class="col-sm-10 col-md-9" style="margin-left: 72%;">
											<button type="submit" class="btn btn-primary  mt-4">Editar</button>
											<a href="{{ url('admin/permisoslista') }}" class="btn btn-danger mt-4">Cancelar</a>
										</div>
									</div>
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