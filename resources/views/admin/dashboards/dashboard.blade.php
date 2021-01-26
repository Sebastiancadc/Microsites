@extends('admin.layouts.layout')
@section('content')
<?php
$date =date('m-d')
?>

<link rel="stylesheet" href="{{asset("plantilla/css/gallery.css")}}" type="text/css">
<div class="header bg-primary pb-6" >
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-10 ml-9 mr-auto mt--6">
    <div class="row">       
        <div class="col-lg-11">
            <div class="card bg-default" style="background-color: #ffffff !important;">
                <div class="card-header bg-transparent">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Presentaciones de interes</h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="row align-items-center">
                   
                      <div class="col sm-4">
                        <?php
                         $fechahoy = new \DateTime();
                         $fechas = $fechahoy->format('d-m-Y');
                        ?>
                         @foreach ($vercampaña as $item)
                         @if(App\Helpers\Helpers::formatearFechahoy($item->fecha) == $fechas)
                         <a href="{{'presentacion'}}/{{$item->title}}">
                             <div style="overflow: hidden;
                             cursor: default;
                             background-color: {{$item->color}};
                             margin-bottom: 10px;
                             position: relative;
                             width: 960px;
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
                         @endif
                         @endforeach
                     </div>
                    </div>
                </div>
            </div>               
        </div>
    </div>
    @include('admin.layouts.footer')
  </div>

</div>
@section('js')
<script src="{{asset("plantilla/vendor/fullcalendar/dist/locale/es.js")}}"></script>
<script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
<script src="{{asset("plantilla/js/gallery.js")}}"></script>
</body>
@endsection
@endsection