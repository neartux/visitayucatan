<?
$fllegada = $_REQUEST["llegada"];
$fsalida = $_REQUEST["salida"];
$adultoshtl = $_REQUEST["adultoshtl"];
$menoreshtl = $_REQUEST["menoreshtl"];
$resultados = 2;
include("templates/sessions.php"); 
include("scripts/consultas.php");
error_reporting(0);
//ini_set("display_errors", 1);
$idpaquete = $_REQUEST["idhotel"];

$elidioma = $_REQUEST["lang"];
$idhotel = $_REQUEST["idhotel"];

$dethotel = hoteldetalle($idhotel, $elidioma);
$imgs = imagenesHotel($idhotel);
$habs = habitaciones($idhotel);
$fechascerradas = fechasCerradasb($idhotel);
$edadmax = $dethotel["edadmenor"][0]; //Edad maxima de los menores

if(isset($fllegada)){
 	$desde = $fllegada;
 }else{
 	$desde = date('Y-m-d');
	$desde = sumadias($desde, 4);
 }
					 
if(isset($fsalida)){
 	$hasta = $fsalida;
 }else{
 	//$hoy = date('Y-m-d');
	$hasta = sumadias($desde, 4);
}

//Edades de los menores
$ctosmenores = $_REQUEST["menoreshtl"];
	$menor1 = $_REQUEST["menor1"];
	$menor2 = $_REQUEST["menor2"];
	$menor3 = $_REQUEST["menor3"];
	$menor4 = $_REQUEST["menor4"];	
 
if(isset($adultoshtl)){
	$adultoshtl = $adultoshtl;
}else{
	$adultoshtl = 2;
}

if(isset($menoreshtl)){
	$menoreshtl = $menoreshtl;
}else{
	$menoreshtl = 0;
}

//echo "Llegada: ".$desde." - Salida: ".$hasta." - Adultos: ".$adultoshtl." - Menores: ".$menoreshtl." - Edad maxima menores: ".$dethotel["edadmenor"][0];
$nuevafecha = strtotime ( '-1 day' , strtotime ( $hasta)) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); 
$link = "http://www.visitayucatan.com/comparte-hotel.php?idhotel=".$idhotel."&lang=".$idioma."&r=1";


?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<base href="http://localhost/visitayucatan/">
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
							<img src="imagenes/hoteles/<? echo $imgs["imagen"][0]; ?>" alt="" />
						</div>
						<div class="nombrepaquete">
							<h1 class="oswaldo"><? echo $dethotel["hotel"][0]; ?></h1>
							<div class="cajitaestrellas">
								<? for($s=1; $s <= $dethotel["stars"][0]; $s++){ ?>
								 <img src="imagenes/estrella.png" />
								<? } ?>								
							</div><br />
								<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<? echo $link; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
									<!--<img src="imagenes/face.png" class="facePaqueteDetalle" />-->
									<span class="compartir"><img src="imagenes/compartir-facebook.png" /></span>
								</a>
						</div>
						<div class="minifotospaquete">
							<? for($f=0; $imgs["idimagen"][$f]; $f++){  ?>
							<img onclick="cargafotoPaquete(this)" src="imagenes/hoteles/<? echo $imgs["imagen"][$f]; ?>" alt="" />
							<? } ?>							
						</div>
					</div>
					
							
					<div id="portadorpaquetes">
					<h2 class="oswaldo">Tarifas</h2>						
						<div id="portafechashotel">
							<form name="frmfechashotel" id="frmfechashotel" method="post" action="">
						    <input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />
					    
							<div class="gpofechas margbottom">
								<label>Adultos</label>
								<select name="adultoshtl">
									<option value="1" <? if($adultoshtl == 1){ ?> selected="selected" <? } ?>>1</option>
									<option value="2" <? if($adultoshtl == 2){ ?> selected="selected" <? } ?>>2</option>
									<option value="3" <? if($adultoshtl == 3){ ?> selected="selected" <? } ?>>3</option>
									<option value="4" <? if($adultoshtl == 4){ ?> selected="selected" <? } ?>>4</option>									
								</select>
							</div>
							
							<div class="gpofechas margbottom">
								<label>Menores</label>
								<select name="menoreshtl" onchange="pideedades(this)">
									<option value="0" <? if($menoreshtl == 0){ ?> selected="selected" <? } ?>>0</option>
									<option value="1" <? if($menoreshtl == 1){ ?> selected="selected" <? } ?>>1</option>
									<option value="2" <? if($menoreshtl == 2){ ?> selected="selected" <? } ?>>2</option>
									<option value="3" <? if($menoreshtl == 3){ ?> selected="selected" <? } ?>>3</option>
									<option value="4" <? if($menoreshtl == 4){ ?> selected="selected" <? } ?>>4</option>									
								</select>
							</div>	
							
							<div id="edadesmenores">
								<div id="menor1" class="grupal">
									<label>Edad Menor 1</label>
									<input type="text" name="menor1" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor1; ?>" /> 
								</div>
								
								<div id="menor2" class="grupal">
									<label>Edad Menor 2</label>
									<input type="text" name="menor2" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor2; ?>" /> 
								</div>
								
								<div id="menor3" class="grupal">
									<label>Edad Menor 3</label>
									<input type="text" name="menor3" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor3; ?>" /> 
								</div>
								
								<div id="menor4" class="grupal">
									<label>Edad Menor 4</label>
									<input type="text" name="menor4" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor4; ?>" /> 
								</div>																								
							</div>
													

							<div class="gpofechas">
								<label>Desde</label>
								<input type="text" name="llegada" id="hoteldesde" value="<? echo $desde; ?>" />
							</div>
							<div class="gpofechas">	
								<label>Hasta</label>
								<input type="text" name="salida" id="hotelhasta" value="<? echo $hasta; ?>" />
							</div>
							<div class="gpofechas">	
								<div class="btnbuscarfechas" onclick="buscafechashotel()"><span>Buscar</span></div>
							</div>
							</form>
							
						<form class="oculto" id="frmreservahtl" action="reserva-hoteles.php" method="post">
							<input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />
							<input type="hidden" name="adultos" value="<? echo $adultoshtl; ?>" />
							<input type="hidden" name="menores" value="<? echo $menoreshtl; ?>" />
							<input type="hidden" name="checkin" value="<? echo $desde; ?>" />							
							<input type="hidden" name="checkout" value="<? echo $hasta; ?>" />
							<input type="hidden" name="total" id="grantotal" />
							<input type="hidden" name="idhabitacion" id="idhabitacion" />														
						</form>					
											
						</div>		
						
						<div id="eltipodeplan"><span><b><? echo traducciones(57); ?>: </b> <? echo $dethotel["plan"][0]; ?></span></div>
									
						<? for($i=0; $habs["idhabitacion"][$i]; $i++){ 
						    $tarifario = tarifas($idhotel, $habs["idhabitacion"][$i], $desde, $nuevafecha);
							if($tarifario["idtarifa"][$i] >= 1){
								$allotment = $tarifario["allotment"][$i];							
						?>
							<div class="portaprecios">
								<!-- NOMBRE DEL TIPO DE HABITACION -->								
								<h3><? echo "Habitación ".$habs["nombre"][$i]; ?></h3>
								<div class="descripthotel"><? echo $habs["descrihab"][$i]; ?></div>
								<? 
						          //CALCULO DE LA TARIFA								
								   $eltotal = 0;
								   $adultos = 0;
								   for($t=0; $tarifario["idtarifa"][$t]; $t++){
								  
								    //Determinar la ocupación máxima de la habitacion comparada con la cantidad de adultos y menores que dice el sistema
									$capmaxima = $tarifario["capmaxima"][$t];
									$personas = $adultoshtl + $menoreshtl; //Determinamos la cantidad de personas que quieren reservar
									$rooms = ceil($personas / $capmaxima);
									
									if($t==0){
										echo "<i style='float: left; clear: both;'><b>Ocupación máxima por habitación:</b> ".$capmaxima. " personas (Incluyendo menores)</i>";
										echo "<div class='full clear'></div>";										
									}
									
									
									if($rooms > 1){
										//Acomodamos las personas en las habitaciones que hayan sido necesarias para la reservacion
										
										//Adultos. Determinamos cuantos iran en cada habitacion
										$adultosbyroom = ceil($adultoshtl / $rooms);
										
										//Menores. Determinamos cuantos iran en cada habitacion
										$menoresbyroom = round($menoreshtl / $rooms);
										
										$quedanadultos = $adultoshtl;
										$quedanmenores = $menoreshtl;
										$tarifapordia = 0;										
										for($r=1; $r<= $rooms; $r++){											
											if($r==1){
												//Primera vuelta
												$calculoadultos = $adultosbyroom;
												$calculomenores = $menoresbyroom;
												
												$quedanadultos = $adultoshtl - $calculoadultos;
												$quedanmenores = $menoreshtl - $calculomenores;
												
											}else{
												//Segunda y demas vueltas...
											}
											
											switch ($calculoadultos){
											    case 1:
											        $latarifa = $tarifario["tarifa"][$t];
											        break;
											    case 2:
											        $latarifa = $tarifario["doble"][$t];
											        break;
											    case 3:
											        $latarifa = $tarifario["triple"][$t];
											        break;
											    case 4:
											        $latarifa = $tarifario["cuadruple"][$t];
											        break;								        											
												}											
											$tarifapordia = $latarifa;													
										}
										$tarifa = calculatarifa($tarifapordia, $tarifario["idhotel"][$t], $tarifario["idcontrato"][$t]);
									//Termina si hay mas de una habitacion
																			
									}else{
										//ESTA ES LA SECCION VALIDA POR AHORA
										//Si solo es una habitacion
										switch ($adultoshtl){
										//switch ($personas){											
										    case 1:
										        $latarifa = $tarifario["tarifa"][$t];
										        break;
										    case 2:
										        $latarifa = $tarifario["doble"][$t];
										        break;
										    case 3:
										        $latarifa = $tarifario["triple"][$t];
										        break;
										    case 4:
										        $latarifa = $tarifario["cuadruple"][$t];
										        break;								        											
											}			
										$tarifa = calculatarifa($latarifa, $tarifario["idhotel"][$t], $tarifario["idcontrato"][$t]);
									    $lafecha = $tarifario["fecha"][$t];
									    $lafechab = explode('-', $lafecha);
									    $mes = nombre_mesabr($lafechab[1]);
									    $lafechac = $lafechab[2]." ".$mes;
										
											
										   if(in_array($lafecha, $fechascerradas) or $allotment == 0){ ?>								   	
											<div class="day <? if($t % 2){ echo 'cambio'; } ?>">
												<span class="lafecha"><? echo $lafechac; ?></span>
												<span class="elprecio">No disponible</span>										
											</div>
										   	
										 <? }else{ $eltotal = $eltotal + $tarifa; ?>
											<div class="day <? if($t % 2){ echo 'cambio'; } ?>">
												<span class="lafecha"><? echo $lafechac; ?></span>
												<span class="elprecio"><? echo "$ ".number_format($tarifa, 2, '.', ''); ?></span>
												<span class="monedahtl"><? echo $tarifario["simbolo"][$t]; ?></span>
											</div>									
										<? } 																
									}//Termina si solo es una habitacion									
								} //Termina for ?>
								
								<? if($rooms == 1){ ?>
										
								<div class="clear left full mtop mbottom">
									<b>Habitaciones requeridas:</b> <? echo $rooms; ?>
									<br />
									<? if($tarifario["edadmenor"][0] >= 1){ ?>
									<b>Edad máxima del menor:</b> <? echo $tarifario["edadmenor"][0]." años"; ?>									
									<? } ?>
								</div>	
								<?
								 //El gran total se multiplicará por la cantidad de habitaciones que hayan resultado ser necesarias
								 $grantotal =  $eltotal * $rooms;
								?>
								
								<? if($grantotal >= 1){ ?>	
								<div class="vermasinfohtl" onclick="reservahotelA('<? echo $grantotal ?>', '<? echo $habs["idhabitacion"][$i]; ?>')"><span>Reserva ahora por sólo:  $ <? echo number_format($grantotal).".00 ".$total["simbolo"][0]; ?></span></div>
								<? } ?>
								<? }else{  ?>
									<br /><br /><h4>
										Lo sentimos, no hay habitaciones disponibles con las condiciones especificadas. Por favor comuníquese al teléfono (999)2895644 desde el 
										interior de la República Mexicana o al (+52) 999.2895644 desde cualquier parte del mundo, para buscar una solución.
									</h4>
								<? } ?>					
							</div>							
						<? }} ?>
						

					<div id="descripciontitle">
						<h2 class="oswaldo"><? traducciones(9); ?></h2>
						<img src="imagenes/flecha-paquetes.png" class="flechaPaquetes" />
					</div>					
					<div class="descripcionpaquete">
						<? echo $dethotel["descripcion"][0]; ?>						
					</div>						
																					
					</div>
																		
				</section>
				<section id="contenidoRight">
					<div id="otrosPaquetes">
						<h2><? traducciones(36); ?></h2>
						
						<div class="minipaquetes">
							<? $paquetes = paquetesSimilares($idpaquete);
							for($i=0; $paquetes["idpaquete"][$i]; $i++){
							?>
								<div class="miniregistro">
									<a href="detalle-paquete?idpaquete=1" target="_self"><img src="imagenes/paquetes/<? echo $paquetes["archivo"][$i]; ?>" class="minifoto" /></a>
									<div class="miniinfo">
										<h2><? echo $paquetes["nombre"][$i]; ?></h2>
										<div class="cajitaestrellas">
											<img src="imagenes/estrella-blanca.png" />
											<img src="imagenes/estrella-blanca.png" />
											<img src="imagenes/estrella-blanca.png" />
											<img src="imagenes/estrella-blanca.png" />									
										</div>
										<h3>$<? echo number_format($paquetes["sencilla"][$i])." ".$paquetes["simbolo"][$i]; ?></h3>
									</div>								
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
	<script>
		$(document).ready(function(){
			var menores = '<? echo $menoreshtl ?>';
			if(menores >= 1){
				if($("#edadesmenores").is(":visible")){
					$(".grupal").hide();			
					for(i=1; i<=menores; i++){
						$("#menor"+i).show();
					}
				}else{
					$("#edadesmenores").show();
					for(i=1; i<=menores; i++){
						$("#menor"+i).show();
					}	
				}		
			}else{
				$("#edadesmenores").hide();
				$(".grupal").hide();
			}
		});
	</script>
</html>