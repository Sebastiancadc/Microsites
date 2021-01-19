<!doctype html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">

		<title>Presentacion</title>
		<!-- Flaticon -->
		<link rel="icon" href="{{asset('plantilla/img/theme/IsotipoCOS.png')}}" type="image/png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="{{asset("presentaciones/docs/css/reveal.css")}}">
		
		<link rel="stylesheet" href="{{asset("presentaciones/docs/css/theme/moon.css")}}" id="theme">

		<!-- Theme used for syntax highlighting of code -->
		<link rel="stylesheet" href="{{asset("presentaciones/docs/lib/css/zenburn.css")}}">
	
		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match( /print-pdf/gi ) ? '{{asset("presentaciones/docs/css/print/pdf.css")}}' : '{{asset("presentaciones/docs/css/print/paper.css")}}';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>
	</head>
	
	<body>

		<div class="reveal">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">

				<section>
					<h1>Micro sites</h1>
					<h4>La representación de los archivos en Fallout 3 y Guild Wars 2</h4>
					
				</section>

				<section>
					<section>
						<h2>Introducción</h2>
					</section>
					<section>
						<h2>Objetivo</h2>
						<p>
							Estudiar la representación de los documentos, los archivos y los archiveros en los videojuegos <i>Fallout 3</i> y <i>Guild Wars 2</i>.
						</p>
					</section>
					<section>
						<h2>Precedentes</h2>
						<ul>
							<li><a href="https://www.arxivers.com/index.php/documents/publicacions/revista-lligall-1/lligall-24-1/96-04-els-arxius-i-el-cinema-ombres-i-llums-d-una-relacio-dificil-1/file">"Els arxius i el cinema, ombres i llums d’una relació difícil"</a> (Margarida Gómez y Jordi Amigó).</li>
							<li><a href="https://turbulentlondon.com/2015/06/09/undying-archivists-representations-of-archives-in-video-games/">"Undying archivists: Representation of archives in video games"</a> (Hannah Awcock).</li>
							<li>Blog <a href="https://librariesinvideogames.tumblr.com/"><i>Libraries in Video Games</i></a>.</li>
						</ul>
					</section>
					<section>
						<h2>Justificación</h2>
						<ul>
							<li>La imagen de los profesionales de la información repercute en su estatus profesional y sueldo.</li>
							<li>Los videojuegos lideran la industria del entretenimiento y cada vez más académicos subrayan la necesidad de analizarlos (Henry Lewood, Frans Mäyrä, Rafael Rodríguez Prieto).</li>
							<li>Los videojuegos contribuyen a asentar o modificar estereotipos.</li>
						</ul>
					</section>
					<section>
						<h2>Videojuegos persuasivos</h2>
						<p>
							Ian Bogost explica que el enorme poder de persuasión de los videojuegos obedece a su retórica procedimental. Un claro ejemplo es el uso de los videojuegos para obtener más reclutas, aunque también encontramos títulos que promueven el el ecologismo y la cultura de paz.
						</p>
					</section>
					<section data-background="{{asset("presentaciones/docs/img/us-army-controller.jpg")}}">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Periférico oficial del Ejército de Estados Unidos</p>
						</div>
					</section>
					<section data-background="{{asset("presentaciones/docs/img/americas-army.jpg")}}">
						
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Pantallazo de <i>America's Army</i></p>
						</div>
					</section>
					<section data-background="{{asset("presentaciones/docs/img/ffvii.jpg")}}">
						
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p><i>Final Fantasy VII</i></p>
						</div>
					</section>
					<section data-background="{{asset("presentaciones/docs/img/undertale.jpg")}}">
						
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Pantallazo de <i>Undertale</i></p>
						</div>
					</section>
				</section>
				
				<section>
					<section>
						<h2>Fallout 3</h2>
					</section>
					<section>
						<h2>9,88 millones de copias vendidas</h2>
						<p>
							Esta tercera entrega supuso el punto de inflexión de la saga <i>Fallout</i>, hoy considerada un referente obligado en la historia de los videojuegos de temática postapocalíptica.
						</p>
					</section>
					<section>
						<h2>Bienvenidos a Yermo Capital</h2>
						<p>
							La trama se desarrolla en Yermo Capital doscientos años después de la guerra nuclear entre Estados Unidos y China. El jugador encarna a un habitante del refugio 101 que escapa en busca de su padre.
						</p>
					</section>
					<section data-background="img/sociedad-conservacion-capital-02-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Sociedad para la Conservación de Capital</p>
						</div>
					</section>
					<section data-background="img/sociedad-conservacion-capital-01-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Sociedad para la Conservación de Capital</p>
						</div>
					</section>
					<section data-background="img/national-archives-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Fachada de los Archivos Nacionales</p>
						</div>
					</section>
					<section data-background="img/national-archives-us.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Fachada de los Archivos Nacionales</p>
						</div>
					</blockquote>
					</section>
					<section data-background="img/rotunda-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Rotonda de las Cartas de la Libertad</p>
						</div>
					</section>
					<section data-background="img/rotunda.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Rotonda de las Cartas de la Libertad</p>
						</div>
					</section>
					<section data-background="img/microfilm-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Archivo Multimedia de la Biblioteca de Arlington</p>
						</div>
					</section>
					<section data-background="img/menu-principal-fallout-3.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Menú principal</p>
						</div>
					</section>
					<section>
						<h2>Conclusiones</h2>
						<ul>
							<li>La finalidad de los archivos en <i>Fallout 3</i> es preservar la historia de las instituciones: son un "instrumento de hegemonía" (Terry Cook).</li>
							<li>Desaparición de las fronteras entre el archivo, la biblioteca y el museo.</li>
							<li>Mayor durabilidad de las microformas con respecto al papel y los soportes ópticos o magnéticos.</li>
							<li>Funciones propias del archivero como la clasificación, la eliminación y la difusión no están representadas.</li>
						</ul>
					</section>
				</section>
				
				<section>
					<section>
						<h2>Guild Wars 2</h2>
					</section>
					<section>
						<h2>Un videojuego multijugador masivo</h2>
						<img src="img/google-trends-mmorpg.png">
					</section>
					<section>
						<h2>Suenan tambores de guerra</h2>
						<p>
							Cinco años después de que el Filo del Destino se enfrentara a Kralkatorrik, el jugador tiene que unir a las cinco razas principales de Tyria contra la amenaza del dragón antiguo Zhaitan.
						</p>
					</section>
					<section data-background="img/gw-01.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Archivo del Priorato de Durmand</p>
						</div>
					</section>
					<section data-background="img/gw-03.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Colecciones especiales del Priorato de Durmand</p>
						</div>
					</section>
					<section data-background="img/gw-04.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Colecciones especiales del Priorato de Durmand</p>
						</div>
					</section>
					<section data-background="img/gw-02.jpg">
						<div style="background-color: rgba(0, 0, 0, 0.9); color: #fff;position:relative;top:600px">
							<p>Archivo del Instituto de Sinergética</p>
						</div>
					</section>
					<section>
						<h2>Conclusiones</h2>
						<ul>
							<li>El archivo en <i>Guild Wars 2</i> es cualquier lugar donde se almacena huellas del pasado.</li>
							<li>Tenemos documentación histórica y administrativa.</li>
							<li>Referencia a la gestión de documentos electrónicos y sus ventajas.</li>
							<li>Los archiveros aparecen como guardianes de la documentación en vez de como facilitadores del acceso.</li>
						</ul>
					</section>
				</section>
				
				<section>
					<section>
						<h2>Conclusiones</h2>
					</section>
					<section>
						<h2>Archivos</h2>
						<p>
							Hay un enfoque historicista que subraya la importancia de los archivos para la preservación de la memoria colectiva, pero invisibiliza el trabajo que los archiveros realizan fuera de los archivos históricos. Se echa en falta un tratamiento diferenciado del archivo, la biblioteca y el museo.
						</p>
					</section>
					<section>
						<h2>Documentos</h2>
						<p>
							Un tema que los dos juegos abordan de manera muy lograda es la variedad de soportes que se trabaja en los archivos y los problemas de conservación planteados por cada uno de ellos.
						</p>
					</section>
					<section>
						<h2>Archiveros</h2>
						<p>
							Los archiveros no existen en <i>Fallout 3</i> y, en <i>Guild Wars 2</i>, cumplen bastantes de los estereotipos negativos sobre la profesión. La sociedad continúa viendo a los archiveros como una barrera entre el usuario y el documento y esto se refleja en los videojuegos.
						</p>
					</section>
					<section>
						<h2>Algo más que un decorado</h2>
						<p>
							Los archivos son escenarios elaborados con los que el jugador debe interactuar para avanzar en la trama y para obtener más información sobre el trasfondo del juego. Se muestran ante él como una institución fundamental para comprender mejor su realidad.
						</p>
					</section>
				</section>
				
				<section data-background="https://media.giphy.com/media/OkYsEFNkbPRZe/giphy.gif">
				</section>

			</div>

		</div>

		<script src="{{asset("presentaciones/docs/lib/js/head.min.js")}}"></script>
		
		<script src="{{asset("presentaciones/docs/js/reveal.js")}}"></script>
		
		<script>
			
			// More info https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

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
	</body>
</html>
