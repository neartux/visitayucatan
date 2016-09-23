<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$tours = tours();
$pagina = paginaDescripcion("tours");
$seccion = 3;
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
						<div class="portafotito">
							<img src="imagenes/tours-adorno.png" class="logoSeccion" />
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
					<? for($t=0; $tours["idtour"][$t]; $t++){
						$descripcion = cortarTexto($tours["descripcion"][$t]);
						$descripcion = strip_tags($descripcion, '<p><a>');
						$idtour = $tours["idtour"][$t];
						$link= "tours-en-yucatan/".string2url($tours["nombre"][$t])."/".$tours["idtour"][$t]."/".$idioma."/";
						?>
						<div class="registro <? if($t==0){ ?>registrofirst <? } ?>">
							<div class="headerRegistro headerRegistroTour">
								<h2 class="tituloPaquete oswaldo"><? echo $tours["nombretour"][$t]; ?></h2> 
								<img src="imagenes/divisor2.png" class="divisorRegistro" />  
								<h3 class="tituloCircuito"><? echo $tours["circuito"][$t]; ?></h3>
							</div>
							<div class="fotoRegistro"><a href="<? echo $link; ?>"><img src="imagenes/tours/<? echo $tours["archivo"][$t]; ?>" /></a></div>
							<div class="infoRegistro">
								<div class="precioRegistro precioTour">
									<span><? traducciones(54); ?>:</span> <br />
									<h2>$<? echo ceil($tours["tadulto"][$t])." ".$tours["simbolo"][$t]; ?></h2><br />
									<? if(round($tours["tmenor"][$t], 2) >= 1){ ?>
									<span><? traducciones(28); ?>:</span> <br /><h2>$<? echo ceil($tours["tmenor"][$t])." ".$tours["simbolo"][$t]; ?></h2>
									<? }else{
										if ($tour["tourmsj"][$t] != ""){
										 ?>
										<span><b>(<? echo $tours["tourmsj"][$t]; ?>)</b></span></h2>
									<? }else{ ?>
										<span><b>(NA)</b></span></h2>
									<? }} ?>
									<a href="<? echo $link; ?>" title="Ver más información"><div class="vermasinfotour"><span><? traducciones(56); ?></span></div></a>
								</div>
								<?						
									$linkface = "http://www.visitayucatan.com/comparte-tours.php?lang=".$idioma."&r=1&idtour=".$idtour;									
								?>						
								<!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<? echo $linkface; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
									<span class="compartirlistahoteles"><img src="imagenes/compartir-facebook.png" /></span>
								</a>-->
								<div class="stars">
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
									<img src="imagenes/estrella.png" class="estrellaRegistro" />
								</div>	
								<div class="textoRegistro"><? echo $descripcion; ?></div>
							</div>
						</div>
					<? } ?>																			
				</section>
				<section id="contenidoRight"><? include("templates/publicidad.php"); ?></section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>