@extends('admin.layouts.layout')
@section('content')
<?php
$date =date('m-d')
?>
	<link rel="stylesheet" href="{{asset("presentaciones/docs/css/reveal.css")}}">
	
	<link rel="stylesheet" href="{{asset("presentaciones/docs/css/theme/moon.css")}}" id="theme">
		<!-- Theme used for syntax highlighting of code -->
	<link rel="stylesheet" href="{{asset("presentaciones/docs/lib/css/zenburn.css")}}">
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
                                <div class="gallery-item " data-width="1" data-height="1" style="padding-left: 10px; width: auto;">
                                    <h4 style="color:white;">{{$item->title}}</h4>
                                    <div class="overlayer bottom-left full-width"  style="margin-top: -127px;margin-left: 16px;">
                                    <div class="overlayer-wrapper item-info ">
                                            <div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
                                                <div class="">
                                                    <p class="pull-left bold text-white fs-14 p-t-10">{{$item->title}}</p>                                            
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                            @endforeach

                            <div class="reveal reveal-example reveal-viewport slide embedded center has-horizontal-slides ready focused" data-config="{&quot;slideNumber&quot;: &quot;c/t&quot;}" role="application" data-transition-speed="default" data-background-transition="fade" style="--slide-width:900px; --slide-height:500px;"><div class="slides" style="width: 900px; height: 500px; inset: 50% auto auto 50%; transform: translate(-50%, -50%) scale(0.60096);"><section style="top: 227px; display: block;" class="past" hidden="" aria-hidden="true">Slide 1</section><section style="top: 227px; display: block;" class="present">Slide 3</section></div><div class="backgrounds"><div class="slide-background past" data-loaded="true" style="display: block;"><div class="slide-background-content"></div></div><div class="slide-background present" data-loaded="true" style="display: block;"><div class="slide-background-content"></div></div></div><div class="slide-number" style="display: block;"><a href="#/1">
                              <span class="slide-number-a">2</span>
                              <span class="slide-number-delimiter">/</span>
                              <span class="slide-number-b">2</span>
                              </a></div><aside class="controls" data-controls-layout="bottom-right" data-controls-back-arrows="faded" style="display: block;"><button class="navigate-left enabled" aria-label="previous slide"><div class="controls-arrow"></div></button>
                          <button class="navigate-right" aria-label="next slide" disabled="disabled"><div class="controls-arrow"></div></button>
                          <button class="navigate-up" aria-label="above slide" disabled="disabled"><div class="controls-arrow"></div></button>
                          <button class="navigate-down" aria-label="below slide" disabled="disabled"><div class="controls-arrow"></div></button></aside><div class="progress" style="display: none;"><span></span></div><div class="speaker-notes" data-prevent-swipe="" tabindex="0"></div><div class="pause-overlay"><button class="resume-button">Resume presentation</button></div><div class="aria-status" aria-live="polite" aria-atomic="true" style="position: absolute; height: 1px; width: 1px; overflow: hidden; clip: rect(1px, 1px, 1px, 1px);">Slide 3 </div></div>
                        </div>
                    </div>
                </div>
            </div>               
        </div>
    </div>
    @include('admin.layouts.footer')
  </div>
</div>
	
<script src="{{asset("presentaciones/docs/lib/js/head.min.js")}}"></script>
		
<script src="{{asset("presentaciones/docs/js/reveal.js")}}"></script>

<script>
  
  // More info https://github.com/hakimel/reveal.js#configuration
  Reveal.initialize({
    controls: false,
    progress: true,
    history: true,
    center: true,
    autoSlide: 5000,
      loop: true,
    embedded: true,
    transition: 'slide', // none/fade/slide/convex/concave/zoom

    // More info https://github.com/hakimel/reveal.js#dependencies
    dependencies: [
      { src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
      { src: '{{asset("presentaciones/docs/plugin/markdown/marked.js")}}', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
      { src: '{{asset("presentaciones/docs/plugin/markdown/markdown.js")}}', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
      { src: '{{asset("presentaciones/docs/plugin/highlight/highlight.js")}}', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
      { src: '{{asset("presentaciones/docs/plugin/zoom-js/zoom.js")}}', async: true },
      { src: '{{asset("presentaciones/docs/plugin/notes/notes.js")}}', async: true }
      
    ]
  });

</script>
@section('js')
<script src="{{asset("plantilla/vendor/fullcalendar/dist/locale/es.js")}}"></script>
<script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
<script src="{{asset("plantilla/js/gallery.js")}}"></script>
</body>
@endsection
@endsection