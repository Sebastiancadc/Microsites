<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
$user = auth()->user();
$rol = auth()->user()->role;
$colaborador = Illuminate\Support\Facades\DB::table('rol')->select('*')->where('Roles', '=', $rol)->first();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Flaticon -->
  <link rel="icon" href="{{asset('plantilla/img/theme/IsotipoCOS.png')}}" type="image/png">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset("plantilla/vendor/nucleo/css/nucleo.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/@fortawesome/fontawesome-free/css/all.min.css")}}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{asset("plantilla/css/jquery-ui.css")}}">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/fullcalendar/dist/fullcalendar.min.css")}}">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/sweetalert2/dist/sweetalert2.min.css")}}">
  <link rel="stylesheet" href="../../assets/vendor/quill/dist/quill.core.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset("plantilla/vendor/select2/dist/css/select2.min.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("plantilla/css/argon.css?v=1.1.0")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("plantilla/endor/quill/dist/quill.core.css")}}" type="text/css">

  <!-- Modo Oscuro CSS -->
  <link rel="stylesheet" href="{{asset("plantilla/css/dark.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plantilla/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css")}}">

  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
  <title>Microsites </title>
</head>
<body>
  {{-- @include('admin.configuracionweb.css2') --}}
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav ">
            <li class="nav-item">
              <div style="margin-top: 7px;">
              <a class="nav-link" href="{{url("home")}}" style="margin-top: -24px;">
                <img src="{{asset('plantilla/img/theme/logoCOS.png')}}" class="navbar-brand-img"
                style="max-width: 60%;
                max-height: 129px;"></a>
                </div>
            </li>

          </ul>
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('home')}}">Inicio <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('noticiausu')}}">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('archivos')}}">Archivos</a>
              </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>


          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{Auth::user()->photo}}">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->username}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido!</h6>
                </div>

                @if ($user->role=='admin')
                <a href="{{ url('admin/HomeAdmin')}}" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Administrador</span>
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Cerrar sesión </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset("plantilla/vendor/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/js-cookie/js.cookie.js")}}"></script>
    <script src="{{asset("plantilla/vendor/jquery.scrollbar/jquery.scrollbar.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js")}}"></script>
    <!-- Optional JS -->
    <script src="{{asset("plantilla/vendor/chart.js/dist/Chart.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/chart.js/dist/Chart.extension.js")}}"></script>
    <script src="{{asset("plantilla/vendor/moment/min/moment.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/fullcalendar/dist/fullcalendar.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/bootstrap-notify/bootstrap-notify.min.js")}}"></script>
    <!-- scripts buscador tablas -->
    <script src="{{asset("plantilla/vendor/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("plantilla/vendor/datatables.net-select/js/dataTables.select.min.js")}}"></script>
    @yield('jss')
    <script src="{{asset("plantilla/vendor/date/bootstrap-datetimepicker.js")}}"></script>
    <!-- Argon JS -->
    <script src="{{asset("plantilla/js/dark.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset("plantilla/js/argon.js?v=1.1.0")}}"></script>
    <script src="{{asset("plantilla/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    @yield('js')

    <script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
    </script>

</body>
