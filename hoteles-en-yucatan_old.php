<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$pagina = paginaDescripcion("hoteles");
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
		
		<section id="slide">
			<? include("templates/slides.php"); ?>
			
			<div class="center">
				<div id="motor"><? include("templates/motor.php"); ?></div>
			</div>
		</section>
		<div id="sombraslide"><img src="imagenes/sombra-slide.png" /></div>
		
		<section id="contenido">
			<div class="center">							
				<section id="contenidoLeft">
					<div class="contenidoSuperior">
						<img src="imagenes/hoteles-adorno.png" class="logoSeccion" />
						<div class="publireportaje"><? echo $pagina["descripcion"][0]; ?></div>
					</div>					
					<div class="registro registrofirst">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>

					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>
					
					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>

					<div class="registro">
						<div class="headerRegistro headerRegistroHoteles"><h2 class="tituloPaquete oswaldo">Escape a Yucatan</h2> <img src="imagenes/divisor3.png" class="divisorRegistro" />  <h3 class="tituloCircuito">Mérida - Uxmal - Kabah</h3></div>
						<div class="fotoRegistro"><img src="imagenes/pic1.jpg" /></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <h2>$2,068</h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="stars">
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								<img src="imagenes/estrella.png" class="estrellaRegistro" />
								
								<h4>3 días y 4 noches</h4>
							</div>							
							
							<p class="textoRegistro">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
								pariatur...
							</p>
						</div>
					</div>																																													

																			
				</section>
				<section id="contenidoRight"><? include("templates/publicidad.php"); ?></section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>