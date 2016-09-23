<?
 $idtipo = $_REQUEST["idtipo"]; //1: sencilla, 2: doble, 3:triple, 4:cuadruple
 $idpaquete = $_REQUEST["idpaquete"]; //Id del paquete dado de alta en la base de datos
 $idcombinacion = $_REQUEST["idcombinacion"];  //Cada paquete tiene diferentes combinaciones con hoteles.
 include("templates/sessions.php"); 
 include("scripts/consultas.php");
 
 //echo "idtipo: ".$idtipo." - idcombinacion: ".$idcombinacion." - idpaquete: ".$idpaquete." - sesion: ".$session;
 error_reporting(0);
 //ini_set("display_errors", 1);
 $combinacion = combinacion($idcombinacion);
 $idhotel = $combinacion["idhotel"][0];
 $fechas = fechasCerradas($idhotel);
 
 if($idtipo==1){
 	$tipodehabitacion = "Sencilla";
 	$adultosf = $combinacion["sencilla"][0];
 	$importe = number_format(round(($adultosf * $idtipo)), 2); //Se usa para mostrar el importe a pagar en la pagina web
 	$adulto = number_format(round($combinacion["sencilla"][0], 2));	
 }
 
if($idtipo==2){
	$tipodehabitacion = "Doble";
	$adultosf = $combinacion["doble"][0];
	$importe = number_format(round(($adultosf * $idtipo)), 2); //Se usa para mostrar el importe a pagar en la pagina web
 	$adulto = number_format(round($combinacion["doble"][0], 2));	  
 }

if($idtipo==3){
	$tipodehabitacion = "Triple";
	$adultosf = $combinacion["triple"][0];
	$importe = number_format(round(($adultosf * $idtipo)), 2); //Se usa para mostrar el importe a pagar en la pagina web
 	$adulto = number_format(round($combinacion["triple"][0], 2)); 	
 }

if($idtipo==4){
	$tipodehabitacion = "Cuadruple";
	$adultosf = $combinacion["cuadruple"][0];
	$importe = number_format(round(($adultosf * $idtipo)), 2); //Se usa para mostrar el importe a pagar en la pagina web
 	$adulto = number_format(round($combinacion["cuadruple"][0], 2));	 
 }

$menor =  number_format(round($combinacion["menor"][0], 2)); //Precio de menor con formato
$menorsf = $combinacion["menor"][0]; // Precio del menor sn formato
// TODO: se agrega multiplicacion del costo del paquete por persona por el numero de personas
$adultosbmx = ($adultosf * $idtipo);
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
						<input type="hidden" name="vpc_ReturnURL" size="65" value="http://localhost/visitayucatan//gracias" maxlength="250"/>						
						<select name="vpc_Locale" class="oculto"><option SELECTED>es_MX</option><option>en_MX</option></select>
						<select name="vpc_Currency" class="oculto"><option SELECTED>MXN</option></select>
						<input type="hidden" name="vpc_MerchTxnRef" id="vpc_MerchTxnRef" size="20" maxlength="40"/>
						<input type="hidden" name="vpc_OrderInfo" id="vpc_OrderInfo" size="20" maxlength="34"/>
						<input type="hidden" name="vpc_Amount" id="vpc_Amount" value="<? echo $adultosbmx."00"; ?>" maxlength="10"/>		
					</form>						
						
						<input type="hidden" name="moneda" value="<? echo $moneda; ?>" id="moneda" />						
						<input type="hidden" name="tipocambio" value="<? echo $tcambio; ?>" id="tipocambio" />
						<input type="hidden" name="totalmostrado" id="totalmostrado" />
						<input type="hidden" id="precioAdultoS" value="<? echo ceil($combinacion["sencilla"][0]); ?>" />
						<input type="hidden" id="precioAdultoD" value="<? echo ceil($combinacion["doble"][0]); ?>" />
						<input type="hidden" id="precioAdultoT" value="<? echo ceil($combinacion["triple"][0]); ?>" />
						<input type="hidden" id="precioAdultoC" value="<? echo ceil($combinacion["cuadruple"][0]); ?>" />						
						
						<input type="hidden" id="precioMenor" value="<? echo $menorsf; ?>" />						
						<input type="hidden" id="elsimbolo" value="<? echo $combinacion["simbolo"][0]; ?>"	/>
						<input type="hidden" id="elidpaquete" value="<? echo $idpaquete; ?>"	/>
						<input type="hidden" id="lasesion" value="<? echo $session; ?>"	/>
						<input type="hidden" id="lacombinacion" value="<? echo $idcombinacion; ?>"	/>
						<input type="hidden" id="eltiporeserva" value="<? echo $idtipo; ?>"	/>
						<input type="hidden" id="diasreserva" value="<? echo $combinacion["noches"][0]; ?>"	/>						
					
						
						<div id="resumendecompra" class="divform">
							<h3><? traducciones(39); ?></h3>							
							<div class="cajitaforma">
								<label>* <? traducciones(43); ?></label>
								<input type="text" id="checkin" name="checkin" class="validar" />
								
								<label><? traducciones(18); ?></label>
								<input type="text" id="checkout" name="checkout" readonly="readonly" />								
								
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
								
								<input type="hidden" name="pickup" id="pickup" class="validar" value="<? echo $combinacion["hotel"][0]; ?>" />										
							</div>		
							
							<div class="cajitaforma">
								<label><? traducciones(35); ?>:</label>
								<span class="seleccion"><? echo $combinacion["nombre"][0]; ?></span>
								
								<label><? traducciones(53); ?>:</label>
								<span class="seleccion"><? echo $combinacion["hotel"][0]; ?></span>
								
								<label><? traducciones(49); ?>:</label>
								<span id="eltipodehabitacion" class="seleccion"><? echo $tipodehabitacion; ?></span>
								
								<label><? traducciones(15); ?>:</label>
								<span class="seleccion"><? echo $combinacion["dias"][0]; ?> <? traducciones(11); ?> y <? echo $combinacion["noches"][0]; ?> <? traducciones(31); ?></span>
								
								<label id="tarifaocupacion"><? traducciones(47); ?> <? echo $tipodehabitacion; ?>:</label>
								<span id="precioporadulto" class="seleccion">$ <? echo $adulto." ".$combinacion["simbolo"][0]; ?></span>
								
								<label><? traducciones(38); ?>:</label>
								<span class="seleccion">$ <? echo $menor." ".$combinacion["simbolo"][0]; ?></span>
							</div>																										
						</div>
						
						<div id="sureserva" class="divform">							
							<div class="cajonform clear">
								<label><? traducciones(54); ?>: </label>
								<select id="adultosc" name="adultosc" onchange="recalculatotalpaquete('1')">
									<? if($combinacion["sencilla"][0] >= 1){ ?><option value="1" <? if($idtipo == 1){ ?>selected="selected"<? } ?>>1</option> <? } ?>
									<? if($combinacion["doble"][0] >= 1){ ?><option value="2" <? if($idtipo == 2){ ?>selected="selected"<? } ?>>2</option> <? } ?>
									<? if($combinacion["triple"][0] >= 1){ ?><option value="3" <? if($idtipo == 3){ ?>selected="selected"<? } ?>>3</option> <? } ?>
									<? if($combinacion["cuadruple"][0] >= 1){ ?><option value="4" <? if($idtipo == 4){ ?>selected="selected"<? } ?>>4</option> <? } ?>							
								</select>
							</div>
							
							<div class="cajonform">
								<label><? traducciones(28); ?></label>
								<select id="menoresc" name="menoresc" onchange="recalculatotalpaquete('2')">
									<? if($menorsf >= 1){ ?>
									<option value="0" selected="selected">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<? }else { ?>
										<option value="0">Este paquete no acepta menores</option>
									<? }	 ?>							
								</select>
							</div>							
						</div>	
						
						<span class="eltotalapagar"><? traducciones(24); ?>: $ <? echo $importe." ".$combinacion["simbolo"][0]; ?></span>	
						
						<div id="transportacion">
							<h2>Sí usted llega al Aeropuerto, usted puede solicitar totalmente gratis la transportación a su hotel:</h2>

							<div class="cajitaforma">
								<label><? traducciones(33); ?>:</label>
								<input type="text" name="novuelo" id="novuelo" />
	
								<label><? traducciones(1); ?>:</label>
								<input type="text" name="aerolinea" id="aerolinea" />
								
								<label><? traducciones(19); ?>:</label>
								<input type="text" name="llegadaavion" id="llegadaavion" />
								
								<label><? traducciones(22); ?>:</label>
								<input type="time" name="horallegada" id="horallegada" />
							</div>	
						</div>
						
						
											
						<button type="button" id="reservanow" onclick="reservaAhora()"><? traducciones(40); ?></button>
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
<script>
	$(document).ready(function(){
		var disabledDays = [<? echo $fechas; ?>];
				
		//Fecha de llegada paquete
		$("#checkin").datepicker({
			minDate: 3,
			//dateFormat: "yy-mm-dd",
			dateFormat: "dd-mm-yy",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',
		   	beforeShowDay: noWeekendsOrHolidays,
	   		onSelect: function(dateText){	   			 
	             var dias = $("#diasreserva").val();
		        $.ajax({
		            type: "POST",
		            url: "valida-cierre-fechas.php",
		            data: {fecha: dateText, arreglo: disabledDays, dias: dias},		            
		            success: function(e) {               
			     	  if(e==1){
			     	  	mensaje("Lo sentimos, la fecha seleccionada no tiene disponibilidad. Seleccione otra fecha.");
			     	  	$("#reservanow").hide();
			     	  }else{
			     	  	 $("#reservanow").show();
			             var d = $("#diasreserva").val();
			             var fnuevab = sumaFecha(d, dateText);
			             var fnuevab = fnuevab.split("-");
			             var fnueva = fnuevab[2]+"-"+fnuevab[1]+"-"+fnuevab[0];                         
			             $("#checkout").val(fnueva);
			             $("#llegadaavion").val(dateText);			     	  	
			     	  }         
		            }
		        });
	         }	    		
		});	
				
		//var disabledDays = ["3-27-2015", '3-28-2015'];		
		/* utility functions */
		function nationalDays(date) {
			var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
			//console.log('Checking (raw): ' + m + '-' + d + '-' + y);
			for (i = 0; i < disabledDays.length; i++) {
				var mm = (m+1);
				var analiza = y+"-"+mm+"-"+d;
				//if($.inArray((m+1) + '-' + d + '-' + y,disabledDays) != -1 || new Date() > date) {
				if($.inArray(analiza,disabledDays) != -1 || new Date() > date) {					
					console.log('bad:  ' + analiza + ' / ' + disabledDays[i]);
					return [false];
				}
			}
			//console.log('good:  ' + (m+1) + '-' + d + '-' + y);
			return [true];
		}
		function noWeekendsOrHolidays(date) {	
			//console.log('fecha:  ' + m + '-' + d + '-' + y);
			var noWeekend = jQuery.datepicker.noWeekends(date);
			//return noWeekend[0] ? nationalDays(date) : noWeekend;
			return nationalDays(date);			
		}
		
			
	});
</script>
</html>

