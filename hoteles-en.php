<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$iddestino = $_REQUEST["iddestino"];
$pagina = paginaDescripcion("hoteles");
$hoteles = hoteles($iddestino);
$paquetes = paquetes();

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
		<base href="http://www.visitayucatan.com">
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
						<!--<img src="imagenes/hoteles1.png" class="logoSeccion" />
						<div class="publireportaje"><? echo $pagina["descripcion"][0]; ?></div>-->
						
						<div class="portafotito">
							<img src="imagenes/hoteles1.png" class="logoSeccion" />
						</div>						
						<? $texto = cortarTexto($pagina["descripcion"][0], $tamano=200, $colilla="..."); ?>
						<div id="contenedorreportaje">
							<div class="publireportaje">
								<? echo $texto; ?>								
							</div>
							<span id="btnleermas" class="leermastexto" onclick="leermastextito()">Leer más</span>
						</div>

						<div id="contenedorreportajeb" class="oculto">
							<div class="publireportajeb">
								<? echo $pagina["descripcion"][0]; ?>
							</div>
							<span id="btnleermasb" class="leermastextob" onclick="leermenostextito()">Leer menos</span>
						</div>						
						
						
					</div>	
					<? for($p=0; $hoteles["idhotel"][$p]; $p++){
						$tarifa = calculatarifa($hoteles["tarifamin"][$p], $hoteles["idhotel"][$p], $hoteles["idcontrato"][$p]);
						$desde = number_format(round($tarifa, 2))." ".$hoteles["simbolo"][$p];							
						$link = "hoteles-en-yucatan/".string2url($hoteles["hotel"][$p])."/".$hoteles["idhotel"][$p]."/".$idioma."/";						
						$texto = cortarTexto($hoteles["descripcion"][$p], $tamano=200, $colilla="...");
						//echo "<br />Texto:".$texto."<br />";
					?>
					<div class="registro <? if($p==0){ ?>registrofirst <? } ?>">
						<div class="headerRegistro">
							<h2 class="tituloPaquete oswaldo"><? echo $hoteles["hotel"][$p]; ?></h2> 
							<img src="imagenes/divisor.png" class="divisorRegistro" />
						</div>
						<div class="fotoRegistro"><a href="<? echo $link; ?>" title="<? echo $hoteles["hotel"][$p]; ?>"><img src="imagenes/hoteles/<? echo $hoteles["imagen"][$p]; ?>" /></a></div>
						<div class="infoRegistro">
							<div class="precioRegistro">
								<span><? traducciones(10); ?>:</span> 
								<h2>$<? echo $desde; ?></h2>
								<p class="full left textcenter mtop">Precio por noche en habitación doble</p>
								<a href="<? echo $link; ?>" title="Ver más información"><div class="vermasinfo"><span><? traducciones(56); ?></span></div></a>
							</div>
							<?						
								$linkface = "http://www.visitayucatan.com/comparte-hotel.php?idhotel=".$hoteles["idhotel"][$p]."&lang=".$idioma."&r=1";
							?>						
							<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?p[title]=<? echo $hoteles["hotel"][$p]; ?>&u=<? echo $linkface; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
								<span class="compartirlistahoteles"><img src="imagenes/compartir-facebook.png" /></span>
							</a>							
							
							<!--<img src="imagenes/face.png" class="faceRegistro" />-->
							<div class="cajitaestrellas estrellashtls">
								 <? 
								 $stars = $hoteles["stars"][$p];
								 for($s=1; $s<=$stars ; $s++){ ?>
								 <img src="imagenes/estrella.png">				
								 <? } ?>				 
							</div>								
							<div class="textoRegistro"><? echo $texto; ?></div>
						</div>
					</div>
					<? } ?>																			
				</section>
				<section id="contenidoRight"><? include("templates/publicidad.php"); ?></section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
		<script>
			$(document).ready(function(){
				autoscroll();
			});
		</script>
	</body>
</html>