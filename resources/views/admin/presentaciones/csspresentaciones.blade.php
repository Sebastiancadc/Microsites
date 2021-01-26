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
  #sequence .seq-canvas>* {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  /* Make the canvas the same dimensions as the container and prevent lines from
                                   wrapping so each step can sit side-by-side */
  #sequence .seq-canvas {
    height: 100%;
    width: 100%;
    white-space: nowrap;
    font-size: 0;
  }

  /* Make the steps the same size as the container and sit side-by-side */
  #sequence .seq-canvas>* {
    display: inline-block;
    vertical-align: top;
    width: 100%;
    height: 100%;
    white-space: normal;
    text-align: center;
    color: white;
  }

  /* Used to vertically center align the .content element */
  #sequence .seq-canvas>li:before {
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



  #sequence .step12 {
    background-image: url('https://estaticos.muyinteresante.es/media/cache/1140x_thumb/uploads/images/gallery/59c4f5655bafe82c692a7052/gato-marron_0.jpg');
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