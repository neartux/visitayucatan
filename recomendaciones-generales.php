<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
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
				<h2 class="privacidad">Recomendaciones generales</h2>
				
				<p id="info_paquete_texto">Para disfrutar sin contratiempos de nuestros tours y excursiones, le recomendamos seguir estas sencillas instrucciones:</p>
				<ul id="recomendaciones">
					<li>Dejar en las cajas de seguridad de su hotel, sus papales importantes.</li>
					<li>Llevar sólo el dinero suficiente para compras y pago de bebidas.</li>
					<li>Calzar zapatos que le sean cómodos para caminar.</li> 
					<li>Vestir ropa clara y fresca, preferentemente de algodón.</li>
					<li>Usar Gorra o Sombrero.</li> 
					<li>Usar Lentes Obscuros.</li>
					<li>Usar Bloqueador solar.</li>
					<li>Llevar Repelente contra insectos.</li>
					<li>En su caso llevar traje de baño puesto y una toalla delgada.</li>
					<li>Seguir siempre las instrucciones e indicaciones de su guía.</li>
				</ul>				
												
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>