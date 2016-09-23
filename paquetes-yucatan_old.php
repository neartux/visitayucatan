<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
error_reporting(0);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$pagina = paginaDescripcion("paquetes");
$paquetes = listapaquetes();
$seccion = 2;
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
							<img src="imagenes/paquetes-adorno.png" class="logoSeccion" />
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
						
						
						<!--<div class="publireportaje"><? echo $pagina["descripcion"][0]; ?></div>-->
					</div>	
					<? for($p=0; $paquetes["idpaquete"][$p]; $p++){
						$desde = precioPaquete($paquetes["idpaquete"][$p]);
						$link = "paseos-en-yucatan/".string2url($paquetes["nombre"][$p])."/".$paquetes["idpaquete"][$p]."/".$idioma."/";
						$paquete = $paquetes["idpaquete"][$p];
					?>
					<div class="registro <? if($p==0){ ?>registrofirst <? } ?>">
						<div class="headerRegistro">
							<h2 class="tituloPaquete oswaldo"><? echo $paquetes["nombre"][$p]; ?></h2> 
							<img src="imagenes/divisor.png" class="divisorRegistro" />  
							<h3 class="tituloCircuito"><? echo $paquetes["circuito"][$p]; ?></h3>
						</div>
						<div class="fotoRegistro"><a href="<? echo $link; ?>" title="<? echo $paquetes["nombre"][$p]; ?>"><img src="imagenes/paquetes/<? echo $paquetes["archivo"][$p]; ?>" /></a></div>
						<div class="infoRegistro">
							<div class="precioRegistro">
								<span><? traducciones(10); ?>:</span> 
								<h2>$<? echo $desde; ?></h2>
								<a href="<? echo $link; ?>" title="Ver más información"><div class="vermasinfo"><span><? traducciones(56); ?></span></div></a>
							</div>

								<?						
									$linkface = "http://www.visitayucatan.com/comparte-paquete.php?lang=".$idioma."&r=1&idpaquete=".$idpaquete;
									//$linkface = "http://www.visitayucatan.com/paquetes-yucatan";
								?>						
								<!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<? echo $linkface; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
									<span class="compartirlistahoteles"><img src="imagenes/compartir-facebook.png" /></span>
								</a>-->

							<div class="textoRegistro"><? echo $paquetes["intro"][$p]; ?></div>
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