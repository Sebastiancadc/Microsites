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
						<a href="#">Noticia</a>
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
							<h3 class="card-header">Edita noticia</h3>
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
											<div class="col-md-12">
												<br>
												<h4>Categoria</h4>
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
												<h4>Fecha de publicacion</h4>
												<input class="form-control" placeholder="Fecha" name="fecha"  value="{{$noticiaActualizar->fecha}}" type="date">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-10 col-md-9" style="margin-left: 72%;">
								<button type="submit" class="btn btn-primary  mt-4">Actualizar</button>
								<a href="{{ url('admin/noticia') }}" class="btn btn-danger mt-4">Cancelar</a>
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
	</script>
	
	@endsection
	@endsection