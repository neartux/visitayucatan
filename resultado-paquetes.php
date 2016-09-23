<? 
$fllegada = $_REQUEST["llegada"];
$fsalida = $_REQUEST["salida"];
$resultados = 1;
$aventura = $_REQUEST["aventura"];
$adultos = $_REQUEST["adultosb"];
$menores = $_REQUEST["menoresb"];

include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$paquetes = paquetesBusqueda($aventura);
$tours = toursBusqueda($aventura);
$seccion = 2;
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<title>Visita Yucatán</title>
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
					<? for($p=0; $paquetes["idpaquete"][$p]; $p++){
						$desde = precioPaquete($paquetes["idpaquete"][$p]);	
						$link = "paseos-en-yucatan/".string2url($paquetes["nombre"][$p])."/".$paquetes["idpaquete"][$p]."/";
					?>
					<div class="registro <? if($p==0){ ?>registrofirst <? } ?>">
						<div class="headerRegistro">
							<h2 class="tituloPaquete oswaldo"><? echo $paquetes["nombre"][$p]; ?></h2> 
							<img src="imagenes/divisor.png" class="divisorRegistro" />  
							<h3 class="tituloCircuito"><? echo $paquetes["circuito"][$p]; ?></h3>
						</div>
						<div class="fotoRegistro"><a href="<? echo $link; ?>" title="<? echo $paquetes["nombre"][$p]; ?>"><img src="imagenes/paquetes/<? echo $paquetes["archivo"][$p]; ?>" /></a></div>
						<div class="infoRegistro">
							<div class="precioRegistro"><span>Desde:</span> <br /><h2>$<? echo $desde; ?></h2></div>
							<img src="imagenes/face.png" class="faceRegistro" />
							<div class="textoRegistro"><? echo $paquetes["intro"][$p]; ?></div>
						</div>
					</div>
					<? } ?>
					<!--
					<? for($t=0; $tours["idtour"][$t]; $t++){ 
						$link= "tours-en-yucatan/".string2url($tours["nombre"][$t])."/".$tours["idtour"][$t]."/";
						?>
						<div class="registro <? if($t==0){ ?>registrofirst <? } ?>">
							<div class="headerRegistro headerRegistroTour">
								<h2 class="tituloPaquete oswaldo"><? echo $tours["nombre"][$t]; ?></h2> 
								<img src="imagenes/divisor2.png" class="divisorRegistro" />  
								<h3 class="tituloCircuito"><? echo $tours["circuito"][$t]; ?></h3>
							</div>
							<div class="fotoRegistro"><a href="<? echo $link; ?>"><img src="imagenes/tours/<? echo $tours["archivo"][$t]; ?>" /></a></div>
							<div class="infoRegistro">
								<div class="precioRegistro precioTour">
									<span>Adulto:</span> <br /><h2>$<? echo round($tours["tadulto"][$t], 2)." ".$tours["simbolo"][$t]; ?></h2><br />
									<? if(round($tours["tmenor"][$t], 2) >= 1){ ?>
									<span>Menor:</span> <br /><h2>$<? echo round($tours["tmenor"][$t], 2)." ".$tours["simbolo"][$t]; ?></h2>
									<? }else{
										if ($tour["tourmsj"][$t] != ""){
										 ?>
										<span><b>(<? echo $tours["tourmsj"][$t]; ?>)</b></span></h2>
									<? }else{ ?>
										<span><b>(NA)</b></span></h2>
									<? }} ?>
								</div> 
								<img src="imagenes/face.png" class="faceRegistro" />
								<div class="stars">
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
								</div>	
								<div class="textoRegistro"><? echo cortarTexto($tours["descripcion"][$t]); ?></div>
							</div>
						</div>
					<? } ?>		
					-->				
																								
				</section>
				<section id="contenidoRight"><? include("templates/publicidad.php"); ?></section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>