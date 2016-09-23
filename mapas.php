<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$paquetes = paquetesIndex();
$seccion = 1;
?>
<!DOCTYPE html>
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
		<div id="sombraslide"><img src="imagenes/sombra-slide.png" /></div>
		
		<section id="contenido">
			<div class="center">							
				<section id="contenidoLeft">
					<div class="full left">
						<div id="menumapas">
							<ul>
								<li class="activo" onclick="muestramapa(this, 'map_yucatan')"><span>Yucatán</span></li>
								<li onclick="muestramapa(this, 'map_valladolid')"><span>Valladolid</span></li>
								<li onclick="muestramapa(this, 'map_izamal')"><span>Izamal</span></li>
								<li onclick="muestramapa(this, 'map_merida')"><span>Mérida</span></li>
								<li onclick="muestramapa(this, 'map_chistorico')"><span>Centro histórico</span></li>
							</ul>
						</div>
						<div id="portamapas">
							<div id="map_yucatan" class="mapita">
								<img src="imagenes/mapas/yucatan.png" />
							</div>
							<div id="map_valladolid" class="mapita oculto">
								<img src="imagenes/mapas/valladolid.png" />
							</div>
							<div id="map_izamal" class="mapita oculto">
								<img src="imagenes/mapas/izamal.jpg" />
							</div>
							<div id="map_merida" class="mapita oculto">
								<img src="imagenes/mapas/merida.jpg" />
							</div>
							<div id="map_chistorico" class="mapita oculto">
								<img src="imagenes/mapas/centrohistorico.gif" />
							</div>																												
						</div>
					</div>
					
																							
				</section>
				<section id="contenidoRight"><? include("templates/publicidad.php"); ?></section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>