<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Flaticon -->
    <link rel="icon" href="{{asset('plantilla/img/theme/IsotipoCOS.png')}}" type="image/png">
  <title>Presentacion - {{$presentacion->title}}</title>
 
</head>
<style>
  #sequence .step1 {
background-color:{{$presentacion->color}};
} 
.color {
color:  {{$presentacion->colortitulos}};
}
.colorcont {
color:  {{$presentacion->colorcontenido}};
}
body,html {
      width: 100% !important;
    max-width: 100% !important;
    height: 100% !important;
    max-height: 100% !important;
    overflow: hidden;
    margin: 0;
      padding: 0;
}
</style>
<body onclick="goFull()" id="myBut">
  <div class="card-body" onclick="goFull()" id="myBut">
  <div id="sequence">
    <ul class="seq-canvas">
        @foreach ($titulo1 as $item)
        @if (json_encode($item->titulo) == "null")
        @else
        
      <li @foreach ($imagen_fondo1 as $item)                     
       @if (json_encode($item->imagen_fondo) == "null" )
        class="step1"
        @else
        style="background-image: url('{{$item->imagen_fondo}}');
         background-repeat: no-repeat;background-size:cover;"
      @endif 
      @endforeach>
        <div class="content">  
            @foreach ($titulo1 as $item)
          <h2 data-seq class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido1 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          
          @foreach ($imagen1 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach
    
      @foreach ($titulo2 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo2 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo2 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido2 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach

          @foreach ($imagen2 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach
     
      @foreach ($titulo3 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo3 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo3 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido3 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach

          @foreach ($imagen3 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach


      @foreach ($titulo4 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo4 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo4 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido4 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach

          @foreach ($imagen4 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo5 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo5 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo5 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido5 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen5 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo6 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo6 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo6 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido6 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen6 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo7 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo7 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo7 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido7 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen7 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo8 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo8 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo8 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido8 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen8 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo9 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo9 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo9 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido9 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen9 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo10 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo10 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo10 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido10 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen10 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo11 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo11 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo11 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido11 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen11 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo12 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo12 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo12 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido12 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen12 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo13 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo13 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo13 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido13 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen13 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo14 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo14 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo14 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido14 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen14 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo15 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo15 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo15 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido15 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen15 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo16 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo16 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo16 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido16 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen16 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo17 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo17 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo17 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido17 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen17 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo18 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo18 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo18 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido18 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen18 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo19 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo19 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo19 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido19 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen19 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach

      @foreach ($titulo20 as $item)
      @if (json_encode($item->titulo) == "null")
      @else
      <li @foreach ($imagen_fondo20 as $item)                     
      @if (json_encode($item->imagen_fondo) == "null" )
       class="step1"
       @else
       style="background-image: url('{{$item->imagen_fondo}}');
        background-repeat: no-repeat;background-size:cover;"
     @endif 
     @endforeach>
        <div class="content">
            @foreach ($titulo20 as $item)
          <h2 data-seq  class="color">{{$item->titulo}}</h2>
          @endforeach
          @foreach ($contenido20 as $item)
          <h3 data-seq class="colorcont">{{$item->contenido}}</h3>
          @endforeach
          @foreach ($imagen20 as $item)
          @if (json_encode($item->imagen) == "null")
          @else
          <img src="{{$item->imagen}}" height="300" width="500">
          @endif
          @endforeach
        </div>
      </li>
      @endif
      @endforeach
    </ul>
  </div>
  @include('admin.presentaciones.csspresentaciones')

</div>

  <style>
/* Style the Sequence container */
#sequence {
  position: absolute;
  overflow: hidden;
  margin: 0;
  padding: 0;
    width: 100% !important;
    max-width: 100% !important;
    height: 100% !important;
    max-height: 100% !important;
}

/* Reset */
#sequence .seq-canvas,
#sequence .seq-canvas > * {
  margin: 0;
  padding: 0;
  list-style: none;
}

/* Make the canvas the same dimensions as the container and prevent lines from
   wrapping so each step can sit side-by-side */
#sequence .seq-canvas {
  position: absolute;
  height: 100%;
  width: 100%;
  white-space: nowrap;
  font-size: 0;
}

/* Make the steps the same size as the container and sit side-by-side */
#sequence .seq-canvas > * {
  display: inline-block;
  vertical-align: top;
  width: 100%;
  height: 100%;
  white-space: normal;
  text-align: center;
  color: white;
}

/* Used to vertically center align the .content element */
#sequence .seq-canvas > li:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  height: 100%;
}

/* Vertically center align the .content element */
#sequence .content {
  display: inline-block;
  vertical-align: middle;
  margin: 0 4%;
  font-size: 16px;
}

#sequence h2,
#sequence h3 {
  margin: 0;
  display: block;
  line-height: 120%;
}

#sequence h2 {
  margin-bottom: .5em;
  font-family: 'Roboto', sans-serif;
  font-size: 2.6em;
}

#sequence h3 {
  font-size: 1.4em;
}
  </style>
 
<script src="{{asset("presentaciones/scripts/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/hammer.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/sequence.min.js")}}"></script>
<script src="{{asset("presentaciones/scripts/sequence-theme.basic.js")}}"></script>

<script>
	// Get the Sequence element
	var sequenceElement = document.getElementById("sequence");
  
	var options = {

	  keyNavigation: true,
	  fadeStepWhenSkipped: false,
	  autoPlay: true,
    
	  autoPlayInterval: {{$presentacion->time}},
	}
  
	// Launch Sequence on the element, and with the options we specified above
	var mySequence = sequence(sequenceElement, options);
  </script>


<script>
  //variable to keep track of whether we are in Full Screen mode or not
  var fullScreen = false;
  
  //NEED THIS TO GO FULL SCREEn        2)
    var elem = document.body; // Make the body go full screen.
  
  //use for slideshow to keep track of which image is displayed
  var imgCount = 0;
  var totImgs = 3;
  
//create image object
    var div = new Image();
  
  //call draw function to display image
    draw();
 

function draw(){
    //uncomment if you want to have a slideshow
    /* imgCount++;
        if(imgCount>totImgs)
            imgCount=0;
    */
    
  
    
    div = new Image();
    //setup first image to display
    div.src = imgCount + ".jpg";
    //determine the correct width and height to use to fit current screen size
    div.onload = getSize;
     
    //update HTML with image to display
    document.getElementById("myImg").src=div.src;   
      

    }
//keep calling draw function to update image and update image size
var myVar = setInterval(draw, 100);
  
  

   function getSize(){
       var height = div.height;
       var width = div.width;
       var w = window.innerWidth;//size of browser window
       var h = window.innerHeight;
       //going with w above as width of our image 
       //calculate ratio
      //original width * new height / original height = new width;
      //original height * new width / original width = new height;
       var adjH = height * (w/width);
       var adjW = w;
       
       //don't want image going below scroll - below will make sure it doesn't
       
       if(adjH>h){
           var wRatio = h/adjH;  
           adjH = h;
           adjW = wRatio * w;
       }

       // add new image height
      document.getElementById('myImg').height = adjH;
      document.getElementById('myImg').width = adjW;
  }
  
   //added method below so we can make button go away when we go full screen
  function goFull(){
      //hide button - comment if not using button
      document.getElementById("myBut").style.visibility="hidden";

      requestFullScreen(elem);
  }
  
  //added method below for full screen 3)
  
  function requestFullScreen(element) {
      
      if(fullScreen==false){
          fullScreen=true;
 // Supports most browsers and their versions.
 var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

 if (requestMethod) { // Native full screen.
     requestMethod.call(element);
 } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
     var wscript = new ActiveXObject("WScript.Shell");
     if (wscript !== null) {
         wscript.SendKeys("{F11}");
     }
 }
  }else{
      fullScreen=false;
      
      if(document.cancelFullScreen){
     document.cancelFullScreen();
 } else if(document.exitFullScreen){
     document.exitFullScreen();
 } else if(document.mozCancelFullScreen){
     document.mozCancelFullScreen();
 } else if(document.webkitCancelFullScreen){
     document.webkitCancelFullScreen();
 } else if(document.msExitFullscreen){
     document.msExitFullscreen();
 }
      //Show Button - comment if not using button
       document.getElementById("myBut").style.visibility="visible";
      
  }//end of else
      
}//end of full screen

 
 
</script>
</body>
</html>
