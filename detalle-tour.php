<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
error_reporting(0);
//ini_set("display_errors", 1);
$idtour = $_REQUEST["idtour"];
//actualizavisitasTours($idtour);
$eltour =  tours($idtour, 0, 0);
$origenes =precioOrigenes($idtour);
$fotos = fotosTour($idtour);
$otros = otrosTours($idtour);
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<base href="http://localhost/visitayucatan/" >
		<title></title>
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<? include ("templates/snipped-header.php"); ?>
	</head>
	<body>
		<header><? include("templates/header.php"); ?></header>
	
		<section id="contenido">
			<div class="center">							
				<section id="contenidoLeft">
					<div id="galeria">
						<div id="fotoPral">
							<img src="imagenes/tours/<? echo $fotos["archivo"][0]; ?>" alt="" />
						</div>
						<div class="nombrepaquete">
							<h1 class="oswaldo"><? echo $eltour["nombretour"][0]; ?></h1>
							<div class="cajitaestrellas">
								<img src="imagenes/estrella.png" />
								<img src="imagenes/estrella.png" />
								<img src="imagenes/estrella.png" />
								<img src="imagenes/estrella.png" />
							</div>						
							<h3><? echo $eltour["circuito"][0]; ?></h3>
								<?						
									$linkface = "http://www.visitayucatan.com/comparte-tours.php?lang=".$idioma."&r=1&idtour=".$idtour;									
								?>						
								<!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<? echo $linkface; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
									<span class="compartirlistahoteles"><img src="imagenes/compartir-facebook.png" /></span>
								</a>-->
						</div>
						<div class="minifotospaquete">
							<? for($i=0; $fotos["idfoto"][$i]; $i++){ ?>
							<img onclick="cargafotoPaquete(this)" src="imagenes/tours/<? echo $fotos["archivo"][$i] ?>" />
							<? } ?>
						</div>
					</div>
					
					<div id="descripciontitle">
						<h2 class="oswaldo"><? traducciones(9); ?></h2>
						<img src="imagenes/flecha-paquetes.png" class="flechaPaquetes" />
					</div>
					
					<div class="descripcionpaquete"><? echo $eltour["descripcion"][0]; ?></div>
					
					<div id="descripciontitle"><h2 class="oswaldo"><? traducciones(40); ?></h2> 
						<span class="updateprecio">
							<img class="imgleft" src="imagenes/ajax-loader.gif" /> 
							Actualizando precios / Updating prices
							<img class="imgright" src="imagenes/ajax-loader.gif" />
						</span>
					</div>		
					
					<div id="filaformulario">
						<div class="seccion">
							<label class="oswaldo"><? traducciones(58); ?>:</label>
							<form id="reservaPaquete" name="reservaPaquete" action="reserva-tours" method="post">			
								<input type="text" name="idtipo" id="idtipo" class="oculto" value="2" />
								<input type="text" name="idtour" id="idtour" class="oculto" value="<? echo $idtour; ?>" />
								<input type="text" name="idorigen" id="idorigen" class="oculto" />
								<input type="text" name="idregistroorigen" id="idregistroorigen" class="oculto" />
								<input type="text" name="cantadultos" id="cantadultos" class="oculto" />
								<input type="text" name="cantmenores" id="cantmenores" class="oculto" />												
								<input type="text" name="fecha" id="fecha" />
							</form>		
						</div>
						
						<div class="seccion">
							<label class="oswaldo"><? traducciones(28); ?>:</label>
							<select name="menores" id="menores" onchange="tarifaAdultosTours(this)">
								<? if($eltour["tmenor"][0] >= 1){ ?>								
								<option value="0" selected="selected">0</option>								
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>		
								<? }else{ ?>
								<option value="0" selected="selected">NA</option>
								<? } ?>						
							</select>
						</div>
						
						<div class="seccion">
							<label class="oswaldo"><? traducciones(54); ?>:</label>
							<select name="adultos" id="adultos" onchange="tarifaAdultosTours(this)">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2" selected="selected">2</option>
								<option value="3">3</option>
								<option value="4">4</option>								
							</select>
						</div>												
					</div>
					
					
					<h2 class="oswaldo titulorestour"><? traducciones(40); ?></h2>
			
								
					<? for($i=0; $origenes["idregistro"][$i]; $i++){
					$tarifa = ($origenes["tadulto"][$i] * 2);
					$tarifa = number_format(round($tarifa, 2));
					?>				
					
					<!-- TARIFAS PARA JQUERY -->
					<input type="text" class="tarifaorigen oculto" name="origen_<? echo $origenes["idregistro"][$i]; ?>" id="<? echo $origenes["idregistro"][$i]; ?>" />
					<input type="text" name="tadulto" id="tadulto_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["tadulto"][$i]; ?>" class="oculto" />
					<input type="text" name="tmenor" id="tmenor_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["tmenor"][$i]; ?>" class="oculto" />
					<input type="text" name="simbolo" id="simbolo_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["simbolo"][$i]; ?>" class="oculto" />					
					
					
					
					<div class="precioTours" id="tarifa_<? echo $origenes["idregistro"][$i]; ?>">						
						<label class="apunteReserva"><span>2</span> <? traducciones(54); ?>, <? traducciones(25); ?></label>
						<h3><? traducciones(51); ?> <? echo utf8_encode($origenes["origen"][$i]); ?></h3>
						<button type="button" onclick="reservaTour('<? echo $idtour; ?>', '<? echo  $origenes["idorigen"][$i]; ?>', '<? echo $origenes["idregistro"][$i]; ?>')"><? echo "$ ".$tarifa." ".$origenes["simbolo"][$i]; ?></button>						
						<div class="clearheight"></div>
					</div>
					<? } ?>
					
					<div class="footerReserva"><span class="italica">Para reservar presione el boton del importe a pagar / <br />To book press the button of the amount payable</span></div>
																			
				</section>
				<section id="contenidoRight">
					<div id="otrosPaquetes">
						<h2><? traducciones(34); ?></h2>
						
						<div class="minipaquetes">
							<? for($o=0; $otros["idtour"][$o]; $o++){ 
								$link= "tours-en-yucatan/".string2url($otros["nombre"][$o])."/".$otros["idtour"][$o]."/".$idioma."/";
								?>
							<div class="miniregistro">
								<a href="<? echo $link; ?>" target="_self"><img src="imagenes/tours/<? echo $otros["archivo"][$o]; ?>" class="minifoto" /></a>
								<div class="miniinfo">
									<h2><? echo $otros["nombre"][$o]; ?></h2>
									<div class="cajitaestrellas">
										<img src="imagenes/estrella-blanca.png" />
										<img src="imagenes/estrella-blanca.png" />
										<img src="imagenes/estrella-blanca.png" />
										<img src="imagenes/estrella-blanca.png" />									
									</div>
								</div>	
								<h3 class="titulopreciotour"><? traducciones(54); ?>: <? echo "$ ".number_format(round($otros["tadulto"][$o]), 2)." ".$otros["simbolo"][$o]; ?></h3>
								<? if($otros["tmenor"][$o] >= 1){ ?>
								<h3 class="titulopreciotour"><? traducciones(28); ?>: <? echo "$ ".number_format(round($otros["tmenor"][$o]), 2)." ".$otros["simbolo"][$o]; ?></h3>
								<? } ?>															
							</div>
							<div class="separadormini"></div>									
							<? } ?>																								
						</div>						
					</div>
					<? include("templates/publicidad.php"); ?>
				</section>				
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>