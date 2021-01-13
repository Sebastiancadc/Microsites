
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Solicitud de usuario</title>
  <!-- Favicon -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset("plantilla/vendor/nucleo/css/nucleo.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/@fortawesome/fontawesome-free/css/all.min.css")}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset("plantilla/css/argon.css?v=1.1.0")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("css/registro.css")}}" type="text/css">
</head>
@section('content')
<body class="bg-default" style="background: linear-gradient(87deg, #002a60 0%,rgb(31 34 37) 100%) !important;">
  <div id="particles-js"> </div>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header --> 
    @if (session('crearsoli'))
    <div class="alert alert-primary" role="alert">
        {{(session('crearsoli'))}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="header  py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5" style="margin-top: -9%;">
              <h1 class="text-white">¡Envia tu solicitud de usuario!</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0"  style="top: -147px;">
            {{-- <div class="card-header bg-transparent pb-5" style="padding-bottom: 1rem !important;" >
              <img src="{{asset("plantilla/img/theme/isotipo.png")}}" style="height: 70px;margin-left: 199px;">
            </div> --}}
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h3>Ingresa los datos</h3>
              </div>
              <form role="form"  method="POST" action="{{url('Solitudcrear')}}">
                @csrf @method('POST')
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div> 
                    <input  type="text" class="form-control" name="name" placeholder="Nombre de usuario" autofocus>
                  </div>
                </div>
                <div class="text-center" style="margin-right: 38%;">
                  <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                </div>
                <div class="text-center" style="margin-top: -15%;margin-left: 25%;" >
                    <a href="{{ url('/') }}" class="btn btn-danger mt-4">Cancelar</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset("plantilla/vendor/jquery/dist/jquery.min.js")}}"></script>
  <script src="{{asset("plantilla/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("plantilla/vendor/js-cookie/js.cookie.js")}}"></script>
  <script src="{{asset("plantilla/vendor/jquery.scrollbar/jquery.scrollbar.min.js")}}"></script>
  <script src="{{asset("plantilla/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js")}}"></script>
  <!-- Argon JS -->
  <script src="{{asset("plantilla/js/argon.js?v=1.1.0")}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset("plantilla/js/demo.min.js")}}"></script>
  <script src="{{asset("plantilla/particles/particles.min.js")}}"></script>
  <script src="{{asset("plantilla/particles/app.js")}}"></script>
  <script src="{{asset("plantilla/vendor/moment/min/moment.min.js")}}"></script>
<script src="{{asset("plantilla/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>

</body>
</html>
