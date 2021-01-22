<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sequence.js - The responsive CSS animation framework</title>
  <link href="{{asset('presentaciones/css/sequence-theme.basic.css')}}" rel="stylesheet" media="all">
		
</head>
<body>
  <div id="sequence">
    <ul class="seq-canvas">
  
      <li class="step1">
        <div class="content">
          <h2 data-seq>Powered by Sequence.js</h2>
          <h3 data-seq>The open-source CSS animation framework.</h3>
        </div>
      </li>
  
      <li class="step2">
        <div class="content">
          <h2 data-seq>Create Unique Animated Themes</h2>
          <h3 data-seq>For responsive sliders, presentations, <br />banners, and other step-based applications.</h3>
        </div>
      </li>
  
      <li class="step3">
        <div class="content">
          <h2 data-seq>No Restrictions, Endless Possibilities</h2>
          <h3 data-seq>Use the HTML and CSS syntax you're used to. <br />No JavaScript knowledge required.</h3>
        </div>
      </li>
  
    </ul>
  </div>

  <style>
/* Style the Sequence container */
#sequence {
  position: relative;
  width: 100%;
  height: 585px;
  max-width: 100%;
  overflow: hidden;
  margin: 0 auto;
  padding: 0;
  font-family: sans-serif;
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

#sequence .step1 {
  background-color: #279fe5;
}

#sequence .step2 {
  background-color: #f96852;
}

#sequence .step3 {
  background-color: #2bbf8e;
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
	  // Place your Sequence options here to override defaults
	  // See: https://sequencejs.com/documentation/#options
	  keyNavigation: true,
	  fadeStepWhenSkipped: false,
	  autoPlay: true,
	  autoPlayInterval: 4000,
	}
  
	// Launch Sequence on the element, and with the options we specified above
	var mySequence = sequence(sequenceElement, options);
  </script>
</body>
</html>
