@extends('admin.layouts.layout')
@section('content')
<!-- Crear Noticia -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <h6 class="h2 text-white d-inline-block mb-0">Noticias</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Publicar noticia</li>
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
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('crearnoticias') }}" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <input type="hidden" name="user_id" name="user_id" value="{{$user->id}}" ;>
                        <div class="form-group">
                            
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlInput1">Título de la publicación</label>
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
                                <option value="Admin">Todas las campañas</option> 
                                @foreach ($vercampaña as $item)
                                  <option value="{{$item->Roles}}">{{$item->Roles}}</option>      
                                  @endforeach
                                       
                                </select>
                                @if ($errors->has('campana'))
                                <strong class="text-danger tamano">{{$errors->first('campana') }}</strong>
                                @endif
                            </div>
                            @else 
                            <input type="text" name="campana" value="{{Auth::user()->username}}" hidden>
                            @endif
        
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
                                 <strong class="text-danger tamano">{{$errors->first('fecha') }}</strong>
                                 @endif
                            </div>
                           
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-control-label"> Archivo </label>
                                    <input type="file" class="form-control form-control-alternative"  name="image" >
                                    @if ($errors->has('image'))
                                    <strong class="text-danger tamano">{{$errors->first('image') }}</strong>
                                    @endif
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

<script>


</script>
@endsection