<? 
include("scripts/sesiones.php");
error_reporting(0);
if($login == true){
include("scripts/consultas.php");
$tampagina = 10;	
$reservas = reservacionesLista(0,0,$tampagina);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>		
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<title></title>
		<!-- JQUERY -->
		<script type="text/javascript" src="scripts/jquery.js"></script>

		<!--SCROLL-->
		<script src="scripts/superscroll.js"></script>
		<link href="css/scroll.css" rel="stylesheet" />
		
		<!-- TINY -->
		<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>
		
		<!-- UPLOAD -->
		<!--<script src="scripts/uploadifyhtml/jquery.uploadifive.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="scripts/uploadifyhtml/uploadifive.css">-->
		
		<!-- TAGS -->
		<link rel="stylesheet" href="scripts/supertags/css/textext.core.css" type="text/css" />
		<link rel="stylesheet" href="scripts/supertags/css/textext.plugin.tags.css" type="text/css" />
		<link rel="stylesheet" href="scripts/supertags/css/textext.plugin.autocomplete.css" type="text/css" />
		<link rel="stylesheet" href="scripts/supertags/css/textext.plugin.focus.css" type="text/css" />
		<link rel="stylesheet" href="scripts/supertags/css/textext.plugin.prompt.css" type="text/css" />
		<link rel="stylesheet" href="scripts/supertags/css/textext.plugin.arrow.css" type="text/css" />
		<script src="scripts/supertags/js/textext.core.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.tags.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.autocomplete.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.suggestions.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.filter.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.focus.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.prompt.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.ajax.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/supertags/js/textext.plugin.arrow.js" type="text/javascript" charset="utf-8"></script>		
		
		<!-- JQUERY UI -->
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<link type="text/css" rel="stylesheet" href="scripts/jquery-ui.min.css">				

		<!-- FUNCIONES -->
		<script type="text/javascript" src="scripts/funciones.js"></script>		

		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>

		<!-- ESTILOS -->
		<link type="text/css" rel="stylesheet" href="css/estilos.css"> <!-- PANTALLA -->
		<link type="text/css" rel="stylesheet" href="css/imprimir.css" media="print"> <!-- IMPRESION -->
		
	</head>
	<body>
	<div id="mensajes"><p></p></div>	
	<div class="popup">
		<div class="oscuro"></div>
		<div id="contenedorPral">
			<div id="decoracionRosa"></div>
			<img src="imagenes/salir.png" onclick="closePopup()" class="imgsalir" />
			<div id="muestraFormas" class="cajaCentral"></div>
		</div>
	</div>
	<header>
			<div class="center">
				<button type="button" class="agregarAlgo logoff" onclick="location.href='cerrarsesion'">CERRAR SESIÓN</button>
				<section id="logo">
					<a href="index" target="_self" title="Visita Yucatán"><img src="../../imagenes/logo.png" alt="Visita Yucatán" /></a>
				</section>
				<nav>
					<ul>
						<li class="index">
							<span class="link" rel="index">reservas</span>							
						</li>
						<li class="paquetes-yucatan">
							<span class="link" rel="paquetes-yucatan">paquetes</span>							
						</li>
						<li class="tours-en-yucatan">
							<span class="link" rel="tours-en-yucatan">tours</span>							
						</li>
						<li class="hoteles-en-yucatan">
							<span class="link" rel="hoteles-en-yucatan">hoteles</span>							
						</li>
						<li class="yucatan-mexico">
							<span class="link" rel="usuarios">usuarios</span>							
						</li>
						<li class="contacto">
							<span>catalogo</span>	
							<ul>
								<li><span class="link" rel="monedas">monedas</span></li>
								<li><span class="link" rel="idiomas">idiomas</span></li>
								<li><span class="link" rel="banners">banners</span></li>
								<li><span class="link" rel="peninsula">la peninsula</span></li>
								<li><span class="link" rel="slides">slides</span></li>
								<li><span class="link" rel="lista-tags">tags</span></li>
								<li><span class="link" rel="paginas">paginas</span></li>
								<li><span class="link" rel="traducciones">traducciones</span></li>
								<li><span class="link" rel="correos">correos</span></li>
								<li><span class="link" rel="destinos">destinos</span></li>
							</ul>						
						</li>

					</ul>
				</nav>
			</div>
		</header>
		<section id="contenedor">
			<div id="loading"><img src="imagenes/loading.gif" /></div>
			<div id="loader">
				<table cellpadding="0" cellspacing="0" id="tablaRegistros" class="tablaReservas">
					<thead>
						<tr>
							<td>Reserva</td>
							<td>Tipo de<br /> Reserva</td>
							<td>Nombre</td>
							<td>Teléfono</td>
							<td>Correo</td>
							<td>Checkin</td>
							<td>Checkout</td>
							<td>Paquete/Tour/Hotel</td>
							<td>Adultos</td>
							<td>Menores</td>
							<td>Hotel</td>
							<td>Transp</td>
							<td>Importe</td>							
							<td>Pagado</td>
							<td>Opciones</td>
						</tr>
					</thead>
					<tbody>
						<? 
						   
						   
						   
						   for($i=0; $reservas["idreserva"][$i]; $i++){ 
						   $tiporeserva = $reservas["idtiporeserva"][$i];
						   $idvinculo = $reservas["idvinculo"][$i];
						   $importe = uncodedbmx($reservas["importe"][$i]);	
						   $moneda = detMoneda($reservas["moneda"][$i]);
						   if($tiporeserva == 1){
						   	//Consulto cosas de paquetes
						   	$tipo="Paquete";
						   	$detalle = paqueteReserva($idvinculo);
						   }
						   if($tiporeserva == 2){
						   	$tipo = "Tour";
							$detalle = paqueteTour($idvinculo);
						   }
						   if($tiporeserva == 3){
						   	$tipo = "Hotel";
							$detalle = paqueteHoteles($idvinculo);
						   }						   
						?>
						<tr id="fila_<? echo $reservas["idreserva"][$i]; ?>">
							<td><? echo $reservas["idreserva"][$i]; ?></td>
							<td><? echo $tipo; ?></td>
							<td><? echo $reservas["nombre"][$i]; ?></td>
							<td><? echo $reservas["lada"][$i]."-".$reservas["telefono"][$i]; ?></td>
							<td><? echo $reservas["email"][$i]; ?></td>
							<td><? echo $reservas["checkin"][$i]; ?></td>
							<td><? echo $reservas["checkout"][$i]; ?></td>
							<td><? echo $detalle["nombre"][0] ?></td>
							<td><? echo $reservas["adultos"][$i]; ?></td>
							<td><? echo $reservas["menores"][$i]; ?></td>
							<? if($tiporeserva == 3){ ?>
								<td><? echo $detalle["nombre"][0]; ?></td>
							<? }else{ ?>
								<td><? echo $reservas["hotelpickup"][$i]; ?></td>
							<? } ?>
							<td>
								<? if($reservas["vuelo"][$i] != ""){ ?>
									<img src="imagenes/paloma.png">
								<? }else { ?>
									<img src="imagenes/tacha.png">
								<? } ?>
							</td>
							<td><? echo $importe; ?> (<?echo  $moneda["simbolo"][0] ?>)</td>			
							<td>
								<? if($reservas["pagado"][$i]==1){ ?>
									<img src="imagenes/paloma.png">
								<? }else { ?>
									<img src="imagenes/tacha.png">
								<? } ?>
							</td>
							<td>
								<!--<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarPaquete('248', '212', '1', '<? echo $paquetes["idpaquete"][$i]; ?>')" />-->								
								<img class="icon" src="imagenes/avanzadas.png" onclick="detalleReserva('<? echo $reservas["idreserva"][$i]; ?>')" />
								<img class="icon" src="imagenes/eliminar.png" onclick="deleteReserva('<? echo $reservas["idreserva"][$i]; ?>')">
							</td>			
						</tr>
						<? } ?>
												
					</tbody>
				</table>
				
				<div id="paginacion">
					<?
						$reservaciones = todaslasreservas();
						$paginas = ceil($reservaciones/$tampagina);
						for($p=$paginas; $p>=1; $p--){
					?>
						<span class="pagina <? if($p==1){ echo "activa"; } ?>" onclick="cargaPagina('ajax', 'index', 'loader', 'pagina=<? echo $p; ?>', '1', '1', '1');"><span><? echo $p; ?></span></span>
					<? } ?>					
				</div>				
			</div>		
		</section>		
	</body>
</html>
<? }else{ ?>
	<script>location.replace('../index.php');</script>
<? } ?>