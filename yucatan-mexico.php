<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$articulos = articulosPeninsula();
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
				<section id="contenidoLeft" class="leftFull">
						<div id="menuPeninsula">
							<ul>
								<? for($a=0; $articulos["idarticulo"][$a]; $a++){ ?>
								<li id="<? echo string2url(trim(limpia($articulos["nombre"][$a]))); ?>"><span><? echo $articulos["nombre"][$a]; ?></span></li>
								<? } ?>																					
							</ul>
						</div>	
						<div id="descripcionesPeninsula">
							<? for($i=0; $articulos["idarticulo"][$i]; $i++){ ?>
							<div class="descPeninsula <? if($i==0){ ?>currentdesc <? } ?> <? echo string2url(trim(limpia($articulos["nombre"][$i]))); ?>">
								<h1 class="oswaldo"><? echo $articulos["nombre"][$i]; ?></h1>
								<? echo $articulos["descripcion"][$i]; ?>
							</div>								
							<? } ?>																		
						</div>																	
				</section>								
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>