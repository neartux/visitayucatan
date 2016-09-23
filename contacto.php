<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<title></title>
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<? include ("templates/snipped-header.php"); ?>
	</head>
	<body>
		<header><? include("templates/header.php"); ?></header>
		
		<section id="slide" class="moviloculto">
			<? include("templates/slides.php"); ?>			
			<div class="center">
				<div id="motor"><? include("templates/motor.php"); ?></div>
			</div>
		</section>
		<div id="sombraslide" class="moviloculto"><img src="imagenes/sombra-slide.png" /></div>
		
		<section id="contenido">
			<div class="center centercontacto">							
				<div id="contacto">
					<form name="frmContacto" id="frmContacto">
					<h1 class="oswaldo"><? traducciones(16); ?></h1>
					<div class="columnaContacto">
						<label><? traducciones(32); ?>:</label>
						<input type="text" name="nombre" id="nombre" />
						
						<label><? traducciones(48); ?></label>
						<input type="text" name="telefono" id="telefono" />

						<label><? traducciones(7); ?></label>
						<input type="text" name="email" id="email" />						
					</div>
					<div class="columnaContacto">
						<label><? traducciones(6); ?></label>
						<textarea name="comentarios" id="comentarios"></textarea>
					</div>
					<button type="button" id="btnContacto" class="oswaldo" name="btnContacto"><? traducciones(13); ?></button>
					</form>
				</div>	
				<div id="mensajeFinal">
					<h1 class="oswaldo"><? mensajes(); ?></h1>
				</div>										
			</div>
			<img src="imagenes/tucan-contacto.png" class="samtucan moviloculto" />
		</section>
		<footer><? include("templates/footer.php"); ?></footer>		
	</body>
</html>