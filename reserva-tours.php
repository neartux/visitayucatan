<?
	error_reporting(0);
 $idtipo = $_REQUEST["idtipo"];
 $idtour = $_REQUEST["idtour"];
 $idorigen = $_REQUEST["idorigen"];
 $idregistroorigen = $_REQUEST["idregistroorigen"];
 $adultos = $_REQUEST["cantadultos"];
 $menores = $_REQUEST["cantmenores"];
 $checkin = $_REQUEST["fecha"]; 
 include("templates/sessions.php"); 
 include("scripts/consultas.php");
 $tour = tours($idtour, 0, 0);
 $tadulto = $tour["tadulto"][0];
 $tmenor = $tour["tmenor"][0];
 $total = ($tadulto * $adultos) + ($tmenor * $menores); 
 $totalp = number_format(round($total,2));
 $otros = otrosTours($idtour);
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
					<div id="procesando">
						<div class="oscuro"></div>
						<div id="contenidoprocesa">
							<img src="imagenes/loading.gif" />
							<span id="mensajeprocesa">Por favor espere, estamos procesando su reservación... será reenviado a un portal de pagos seguros online de Banamex</span>
						</div>
					</div>
					
					
					<!-- -->
					<form name="pagareserva" id="pagareserva" action="banamex/super_order_do.php" method="post">						
						<input type="hidden" name="Title" value = "PHP VPC 3 Party Super Transacion">					
						<input type="hidden" name="virtualPaymentClientURL" size="65" value="https://banamex.dialectpayments.com/vpcpay" maxlength="250">				
						<input type="hidden" name="vpc_Version" value="1" size="20" maxlength="8"/>
						<input type="hidden" name="vpc_Command" value="pay" size="20" maxlength="16"/>
						<input type="hidden" name="vpc_AccessCode" value="909A99CA" size="20" maxlength="8"/>
						<input type="hidden" name="vpc_Merchant" value="1032478" size="20" maxlength="16"/>
						<input type="hidden" name="vpc_ReturnURL" size="65" value="http://localhost/visitayucatan/gracias" maxlength="250"/>
						<!-- <input type="hidden" name="vpc_ReturnURL" size="65" value="http://www.visitayucatan.com/banamex/super_order_dr.php" maxlength="250"/> -->
						<select name="vpc_Locale" class="oculto"><option SELECTED>es_MX</option><option>en_MX</option></select>
						<select name="vpc_Currency" class="oculto"><option SELECTED>MXN</option></select>						
	
						<input type="hidden" name="vpc_MerchTxnRef" id="vpc_MerchTxnRef" size="20" maxlength="40"/>
						<input type="hidden" name="vpc_OrderInfo" id="vpc_OrderInfo" size="20" maxlength="34"/>
						<input type="hidden" name="vpc_Amount" id="vpc_Amount" value="<? echo $total."00"; ?>" maxlength="10"/>		
					</form>	

						<input type="hidden" name="moneda" value="<? echo $moneda; ?>" id="moneda" />						
						<input type="hidden" name="tipocambio" value="<? echo $tcambio; ?>" id="tipocambio" />
						<input type="hidden" name="totalmostrado" id="totalmostrado" />						
						<input type="hidden" id="precioAdulto" value="<? echo ceil($tadulto); ?>" />
						<input type="hidden" id="precioMenor" value="<? echo ceil($tmenor); ?>" />		
						<input type="hidden" id="elsimbolo" value="<? echo $tour["simbolo"][0]; ?>"	/>
						<input type="hidden" id="ididtour" value="<? echo $idtour; ?>"	/>
						<input type="hidden" id="lasesion" value="<? echo $session; ?>"	/>						
						<input type="hidden" id="eltiporeserva" value="2"	/>
						<input type="hidden" id="idregistroorigen" value="<? echo $idregistroorigen; ?>"	/>
						<input type="hidden" id="minpersonas" value="<? echo $tour["minimopersonas"][0] ?>"/>
						
						<div id="resumendecompra" class="divform">
							<h3><? traducciones(39); ?></h3>							
							<div class="cajitaforma">
								<label>* <? traducciones(32); ?>:</label>
								<input type="text" name="nombre" id="nombre" class="validar" />
	
								<label>* <? traducciones(26); ?>:</label>
								<input type="text" name="lada" id="lada" class="validar" onkeypress="return isNumberKey(event)" />
								
								<label>* <? traducciones(48); ?>:</label>
								<input type="text" name="telefono" id="telefono" class="validar" onkeypress="return isNumberKey(event)" />
	
								<label>* <? traducciones(7); ?>:</label>
								<input type="text" name="email" id="email" class="validar" />
								
								<label>* <? traducciones(5); ?>:</label>
								<input type="text" name="ciudad" id="ciudad" class="validar" />
																						
								<label>* <? traducciones(21); ?> pickup <br />(¿En que hotel esta hospedado?):</label>
								<input type="text" name="pickup" id="pickup" />																							
							</div>		
							
							<div class="cajitaforma">
								<label>Tour seleccionado:</label>
								<span class="seleccion"><? echo $tour["nombre"][0]; ?></span>
								
								<label>Precio por adulto:</label>
								<span class="seleccion">$ <? echo ceil($tour["tadulto"][0])." ".$tour["simbolo"][0]; ?></span>
								
								<label><? traducciones(38); ?>:</label>
								<span class="seleccion">$ <? echo ceil($tour["tmenor"][0])." ".$tour["simbolo"][0]; ?></span>
							</div>																										
						</div>
						
						<div id="sureserva" class="divform">
							<label>* Seleccione su fecha (aaaa-mm-dd)</label>
							<input type="text" id="checkin" name="checkin" class="validar" value="<? echo $checkin; ?>" />
							<input type="hidden" id="checkout" name="checkout" readonly="readonly" />
													
							
							<!--<div class="cajonform clear">
								<label><? traducciones(54); ?>: </label>
								<select id="adultosc" name="adultosc" onchange="recalculatotalpaqueteTour()">
									<option value="1">1</option>
									<option value="2" selected="selected">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>							
								</select>
							</div>
							
							<div class="cajonform">
								<label><? traducciones(28); ?></label>
								<select id="menoresc" name="menoresc" onchange="recalculatotalpaqueteTour()">
									<? if($tour["tmenor"][0] >= 1){ ?>
									<option value="0" selected="selected">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<? }else { ?>
										<option value="0">Este paquete no acepta menores</option>
									<? }	 ?>							
								</select>
							</div>-->	
							
							<div class="cajonform clear">
								<label><? traducciones(54); ?>: </label>
								<select id="adultosc" name="adultosc" onchange="recalculatotalpaqueteTour()">
									<option value="0" <? echo $adultos == 0 ? 'selected' : ''?>>0</option>
									<option value="1" <? echo $adultos == 1 ? 'selected' : ''?>>1</option>
									<option value="2" <? echo $adultos == 2 ? 'selected' : ''?>>2</option>
									<option value="3" <? echo $adultos == 3 ? 'selected' : ''?>>3</option>
									<option value="4" <? echo $adultos == 4 ? 'selected' : ''?>>4</option>
									<option value="5" <? echo $adultos == 5 ? 'selected' : ''?>>5</option>
								</select>
							</div>
							
							<div class="cajonform">
								<label><? traducciones(28); ?></label>
								<select id="menoresc" name="menoresc" onchange="recalculatotalpaqueteTour()">
									<? if($tour["tmenor"][0] >= 1){ ?>
									<option value="0" <? echo $menores == 0 ? 'selected' : ''?>>0</option>
									<option value="1" <? echo $menores == 1 ? 'selected' : ''?>>1</option>
									<option value="2" <? echo $menores == 2 ? 'selected' : ''?>>2</option>
									<option value="3" <? echo $menores == 3 ? 'selected' : ''?>>3</option>
									<option value="4" <? echo $menores == 4 ? 'selected' : ''?>>4</option>
									<option value="5" <? echo $menores == 5 ? 'selected' : ''?>>5</option>
									<? }else { ?>
										<option value="0">Este paquete no acepta menores</option>
									<? }	 ?>							
								</select>
							</div>							
						</div>	
						
						<span class="eltotalapagar"><? traducciones(24); ?>: $ <? echo $totalp." ".$tour["simbolo"][0]; ?></span>
						<button type="button" id="reservanow" onclick="reservaAhoraTour()"><? traducciones(40); ?></button>							
					<!-- -->										
				</section>
				<section id="contenidoRight">
					<div id="otrosPaquetes">
						<h2><? traducciones(34); ?></h2>						
						<div class="minipaquetes">
							<? for($o=0; $otros["idtour"][$o]; $o++){ 
								$link= "tours-en-yucatan/".string2url($otros["nombre"][$o])."/".$otros["idtour"][$o]."/";
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
		<script>
			$(document).ready(function(){
				$('#checkin').datepicker({
					minDate: 3,
				    dateFormat: 'dd-mm-yy',
				    showButtonPanel: true,
				    changeMonth: true,
				    changeYear: false,
				    yearRange: '2013:c',
				    inline: true
				});				
			});
		</script>
	</body>
</html>