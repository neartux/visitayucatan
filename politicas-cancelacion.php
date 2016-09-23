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
				<h2 class="tituloPoliticas">Políticas de Cancelación de hoteles</h2>
				<table class="tablaPoliticas">
					<tr>
						<td>Fecha de cancelación</td>
						<td></td>
						<td>Penalidad</td>
					</tr>
					
					<tr>
						<td>15 días o más antes de la fecha de llegada</td>
						<td></td>
						<td>Sin cargos</td>						
					</tr>
					
					<tr>
						<td>14 a 3 días antes de la fecha de llegada</td>
						<td></td>
						<td>1 noche</td>
					</tr>
					
					<tr>
						<td>2 a 0 días antes de la fecha de llegada</td>
						<td></td>
						<td>100%</td>
					</tr>		
					
					<tr>
						<td colspan="3"><h4>SERVICIOS NO UTILIZADOS NO SON REEMBOLSABLES</h4></td>
					</tr>								
				</table>
				
				<h2 class="tituloPoliticas">Políticas de Cancelación de Servicios adicionales</h2>
				<table class="tablaPoliticas">
					<tr>
						<td>Fecha de cancelación</td>
						<td></td>
						<td>Penalidad</td>
					</tr>
					
					<tr>
						<td>15 días o 2 días antes de la fecha de llegada</td>
						<td></td>
						<td>Sin cargos</td>						
					</tr>
					
					<tr>
						<td>1 a 0 días antes de la fecha de llegada</td>
						<td></td>
						<td>100%</td>
					</tr>					
					<tr>
						<td colspan="3"><h4>SERVICIOS NO UTILIZADOS NO SON REEMBOLSABLES</h4></td>
					</tr>								
				</table>
				
				<h2 class="privacidad">Límite de responsabilidad</h2>
				<p>Turismo Yucatán, S. A de C. V., sus afiliados y/o proveedores no serán responsables, </p>
				<p id="info_paquete_texto">
					<strong>I.-</strong>Por Actos y omisiones de personas ajenas a la empresa.<br>
					<strong>II.-</strong>Por  Enfermedad, robo, disputas laborales, huelgas, fallas mecánicas, cuarentena, acciones gubernamentales, o cualquier otra causa ajena al control directo de la Mayorista o sus Proveedores.<br>
					<strong>III.-</strong>Condiciones climáticas o desastres naturales, como inundaciones, huracanes, terremotos, etc.<br>
					<strong>IV.-</strong>Incumplimiento del cliente en no seguir instrucciones de hora y fecha de entrada y salida en hoteles, políticas de canje de cupones.<br>
					<strong>V.-</strong>No aplican reembolsos totales en situaciones en las que el viaje tenga que ser cancelado, interrumpido o pospuesto por razones que estén fuera de nuestro control (causas de fuerza mayor, tales como, pero no limitadas a, condiciones climáticas, huracanes, terremotos, huelgas, guerras, actos de terrorismo, etc.).<br>
					<strong>VI.-</strong>Cancelación o cambio por cualquier razón de los servicios de viaje ofrecidos,  La Operadora  se reserva el derecho de cancelar o cambiar los servicios publicados, pero  tratará de sustituirlos con servicios similares o mayor categoría, Si una reservación debe ser cancelada, la responsabilidad de la operadora estará limitada al reembolso de todo el dinero recibido.<br>
					<strong>VII.-</strong>Por motivos de Operación y buen servicio, en los paquetes, la Operadora se reserva el derecho de modificar el orden de los tours y/o excursiones.<br>
					<strong>Atentamente<br>
					Turismo Yucatán, S.A. de C.V.<br><br>
				</p>
				

												
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>