<?
 include("templates/sessions.php"); 
 include("scripts/consultas.php");
 error_reporting(0);
 //Recibiendo variables
 $idhotel = $_REQUEST["idhotel"];
 $adultos = $_REQUEST["adultos"];
 $menores = $_REQUEST["menores"];
 $checkin = $_REQUEST["checkin"];
 $checkout = $_REQUEST["checkout"];
 $total = number_format($_REQUEST["total"],2);
 $totalb = number_format($_REQUEST["total"], 2);
 $totalb=str_replace(',','',$totalb);
 $totalc=$totalb;
 $totalb=str_replace('.','',$totalb); 
 $idhabitacion = $_REQUEST["idhabitacion"];
 $hotel = hoteldetallecompra($idhotel, $idhabitacion, $checkin); 
 
 $checkinb = explode("-", $checkin);
 $checkinb = $checkinb[2]."-".$checkinb[1]."-".$checkinb[0];
 
 $checkoutb = explode("-", $checkout);
 $checkoutb = $checkoutb[2]."-".$checkoutb[1]."-".$checkoutb[0];
 
 $noches = restaFechas($checkinb, $checkoutb);
 $dias = $noches + 1;
 
switch ($adultos) {
    case 1:
        $ttarifa = "Sencilla";
		$tarifa = $hotel["tarifa"][0];
		$tarifa = calculatarifa($tarifa, $idhotel, $hotel["idcontrato"][0]);
		$tarifa = number_format(round($tarifa, 2))." ".$hotel["simbolo"][0];
        break;
    case 2:
        $ttarifa = "Doble";
		$tarifa = $hotel["doble"][0];
		$tarifa = calculatarifa($tarifa, $idhotel, $hotel["idcontrato"][0]);
		$tarifa = number_format(round($tarifa, 2))." ".$hotel["simbolo"][0];		
        break;
    case 2:
        $ttarifa = "Triple";
		$tarifa = $hotel["triple"][0];
		$tarifa = calculatarifa($tarifa, $idhotel, $hotel["idcontrato"][0]);	
		$tarifa = number_format(round($tarifa, 2))." ".$hotel["simbolo"][0];
        break;
    case 2:
        $ttarifa = "Cuádruple";
		$tarifa = $hotel["cuadruple"][0];
		$tarifa = calculatarifa($tarifa, $idhotel, $hotel["idcontrato"][0]);	
		$tarifa = number_format(round($tarifa, 2))." ".$hotel["simbolo"][0];	
        break;				
} 
 
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
						<!--<input type="hidden" name="vpc_AccessCode" value="98A99E09" size="20" maxlength="8"/>
						<input type="hidden" name="vpc_Merchant" value="TEST1032478" size="20" maxlength="16"/>-->
						<input type="hidden" name="vpc_AccessCode" value="909A99CA" size="20" maxlength="8"/>
						<input type="hidden" name="vpc_Merchant" value="1032478" size="20" maxlength="16"/>				
						<input type="hidden" name="vpc_ReturnURL" size="65" value="http://localhost/visitayucatan/gracias" maxlength="250"/>						
						<select name="vpc_Locale" class="oculto"><option SELECTED>es_MX</option><option>en_MX</option></select>
						<select name="vpc_Currency" class="oculto"><option SELECTED>MXN</option></select>
						<input type="hidden" name="vpc_MerchTxnRef" id="vpc_MerchTxnRef" size="20" maxlength="40"/>
						<input type="hidden" name="vpc_OrderInfo" id="vpc_OrderInfo" size="20" maxlength="34"/>
						<input type="hidden" name="vpc_Amount" id="vpc_Amount" value="<? echo $totalb; ?>" maxlength="10"/>
						<!--<input type="hidden" name="vpc_Amount" id="vpc_Amount" value="100" maxlength="10"/>-->												
					</form>
					
					<form id="frmReservaHotel" name="frmReservaHotel">	
						<div id="resumendecompra" class="divform">
							<h3><? traducciones(39); ?></h3>							
							<div class="cajitaforma">
								<input type="hidden" id="lasesion" name="lasesion" value="<? echo $session; ?>"	/>								
								<input type="hidden" id="grantotal" name="grantotal" value="<? echo $total; ?>"	/>
								<input type="hidden" id="grantotalb" name="grantotalb" value="<? echo $totalc; ?>"	/>
								<input type="hidden" id="idhotel" name="idhotel" value="<? echo $idhotel; ?>"	/>
								<input type="hidden" id="idhabitacion" name="idhabitacion" value="<? echo $idhabitacion; ?>" />
								<input type="hidden" id="moneda" name="moneda" value="<? echo $moneda; ?>" />
								<input type="hidden" id="tipocambio" name="tipocambio" value="<? echo $tcambio; ?>" />								
								<input type="hidden" id="idioma" name="idioma" value="<? echo $idioma; ?>" />
								
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
							</div>		
							
							<div class="cajitaforma">							
								<label><? traducciones(53); ?>:</label>
								<span class="seleccion"><? echo $hotel["hotel"][0]; ?></span>
								
								<label><? traducciones(49); ?>:</label>
								<span id="eltipodehabitacion" class="seleccion"><? echo $hotel["nombre"][0]; ?></span>
								
								<label><? traducciones(15); ?>:</label>
								<span class="seleccion"><? echo $dias; ?> <? traducciones(11); ?> y <? echo $noches; ?> <? traducciones(31); ?></span>
								
								<label id="tarifaocupacion"><? traducciones(47); ?> <? echo $ttarifa; ?>:</label>
								<span id="precioporadulto" class="seleccion">$ <? echo $tarifa; ?></span>
								
								<label><? traducciones(38); ?>:</label>
								<span class="seleccion">$ <? echo "0 ".$hotel["simbolo"][0]; ?></span>
							</div>																										
						</div>
						
						<div id="sureserva" class="divform">
							<label>* <? traducciones(43); ?></label>
							<input type="text" id="checkin" name="checkin" class="validar" readonly="readonly" value="<? echo $checkin; ?>" />
							
							<label><? traducciones(18); ?></label>
							<input type="text" id="checkout" name="checkout" readonly="readonly" value="<? echo $checkout; ?>" />
													
							
							<div class="cajonform clear">
								<label><? traducciones(54); ?>: </label>
								<input type="text" name="adultosc" id="adultosc" readonly="readonly" value="<? echo $adultos; ?>" />
							</div>
							
							<div class="cajonform">
								<label><? traducciones(28); ?></label>
								<input type="text" name="menoresc" id="menoresc" readonly="readonly" value="<? echo $menores; ?>" />								
							</div>							
						</div>	
						
						<span class="eltotalapagar"><? traducciones(24); ?>: $ <? echo $total." ".$hotel["simbolo"][0]; ?></span>	
						
						<!--<div id="transportacion">
							<h2>Sí usted llega al Aeropuerto, usted puede solicitar totalmente gratis la transportación a su hotel:</h2>

							<div class="cajitaforma">
								<label><? traducciones(33); ?>:</label>
								<input type="text" name="novuelo" id="novuelo" onkeypress="return isNumberKey(event)" />
	
								<label><? traducciones(1); ?>:</label>
								<input type="text" name="aerolinea" id="aerolinea" />
								
								<label><? traducciones(19); ?>:</label>
								<input type="text" name="llegadaavionb" id="llegadaavionb" value="<? echo $checkin; ?>" readonly="readonly" />
								
								<label><? traducciones(22); ?>:</label>
								<input type="time" name="horallegada" id="horallegada" />
							</div>	
						</div>-->
					</form>	
						
											
						<button type="button" id="reservanow" onclick="reservaAhoraHotel()"><? traducciones(40); ?></button>
						<span class="actualizaelprecio">ACTUALIZANDO EL PRECIO...</span>							
					<!-- -->										
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
</html>

