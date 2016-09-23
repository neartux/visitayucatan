<?
include("../scripts/consultas.php");
$idreserva = $_REQUEST["idreserva"];
echo "idrserva = ".$idreserva;
$reserva = reservacionesLista($idreserva);

$tiporeserva = $reserva["idtiporeserva"][0];
$idreserva = $reserva["idreserva"][0];
$cliente = $reserva["email"][0];
$nombrecliente = $reserva["nombre"][0];
$nombredelhotel = $reserva["hotelpickup"][0];


if($tiporeserva == 1){
	$idpaquete = $reserva["idvinculo"][0];
	$info = paquetes(1, $idpaquete);
	$tipohab = $reserva["tipohab"][0]; //1: sencilla, 2: doble, 3: triple, 4: cuadruple
	$idcombinacion = $reserva["idcombinacion"][0];
	$combinacion = combinaciones($idcombinacion);
	
switch ($tipohab) {
    case "1":
        $habitacion = "Sencilla";
        break;
    case "2":
        $habitacion = "Doble";
        break;	
    case "3":
        $habitacion = "Triple";
        break;
    case "4":
        $habitacion = "Cuádruple";
        break;						
}	
		
}
if($tiporeserva == 2){	
	$idtour = $reserva["idvinculo"][0];	
	$info = tours(1, $idtour);
	$costoTotalTour = ($info["tadulto"][0] * $reserva["adultos"][0])+($info["tmenor"][0] * $reserva["menores"][0]);
	
}

if($tiporeserva == 3){
	$htl = hoteldetalle($reserva["idvinculo"][0], $reserva["tipohab"][0]);	
}
	$tipotarjeta = 'NA';
	switch ($reserva["idtipotarjeta"][0]) {
	    case "1":
	        $tipotarjeta = "VISA";
			break;
	    case "2":
	        $tipotarjeta = "MASTERCARD";
			break;
	}	
	
	if($reserva["pagado"][0] == 0){
		$mensaje ="DECLINADA";
	}else{
		$mensaje ="APROBADA";
	}	
	
	$importe = uncodedbmx($reserva["importe"][0]);	
	$fecha = formatofecha($reserva["fechareserva"][0]);
	$checkin = formatofecha($reserva["checkin"][0]);
	
	if($reserva["pagado"][0] == 1){
		$titulo ="Muchas gracias por su compra";
		$delimporte = "Total pagado";
	}else{
		$titulo ="Lo sentimos, su tarjeta ha sido declinada";
		$delimporte = "Total a pagar";
	}

?>
<div class="menuContenido scrollmanual">
<div id="botones">
	<button type="button" class="agregarAlgo" id="btnImprimirReserva" onclick="imprimir()">IMPRIMIR</button>
	<button type="button" class="agregarAlgo" id="btnReenviarReserva" onclick="ReenviarReserva('<? echo $idreserva; ?>')">RE-ENVIAR CORREO</button>
	<a href="index"><button type="button" class="agregarAlgo" id="btnReenviarReserva">REGRESAR A RESERVACIONES</button></a>
</div>

	<div id="voucher">
		<h3>Voucher electrónico</h3>
		<table cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td class="tituloTicket">NUMERO DE VOUCHER</td>
					<td><? echo $reserva["voucherBMX"][0]; ?></td>
				</tr>
				<tr>
					<td colspan="2"><? echo $tipotarjeta; ?></td>						
				</tr>
				<tr>
					<td colspan="2"><? echo $mensaje; ?></td>						
				</tr>
				<tr>
					<td><span class="negrita">AUT:</span><? echo $reserva["autorizacionBMX"][0]; ?></td>
					<td><span class="negrita">OPER:</span><? echo $reserva["operacionBMX"][0]; ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2">ORDER: <? echo $reserva["clavereserva"][0]; ?></td>						
				</tr>
				<tr>
					<td colspan="2"><? echo $tipotarjeta; ?></td>						
				</tr>					
				<tr>
					<td colspan="2" class="importevoucher"><span class="negrita">IMPORTE $</span><? echo $tiporeserva == 2 ? number_format($costoTotalTour) .'MXN' :  $importe; ?></td>						
				</tr>					
				<tr>
					<td>Fecha: <? echo $fecha; ?></td>
					<td>Hora: <? echo $reserva["horareserva"][0]; ?></td>
				</tr>					 
			</tbody>
		</table>
	</div>
	
	<div id="detalleCompra">
		<h3>Detalle de la compra</h3>					
		<table cellpadding="0" cellspacing="0">
			<tbody>
				<tr class="encabezado">
					<td>Descripción</td>
					<td>Fecha reservada</td>							
					<td>Adultos</td>
					<td>Menores</td>
					<td>Importe</td>
				</tr>

		<? if($tiporeserva==1){ ?>				
				<tr>
					<td>Paquete: <? echo $info["nombre"][0]; ?></td>
					<td><? echo $checkin; ?></td>
					<td><? echo $reserva["adultos"][0]; ?></td>
					<td><? echo $reserva["menores"][0]; ?></td>
					<td><? echo $importe." MXN"; ?></td>
				</tr>
				<tr>
					<td colspan="3"><? echo $combinacion["noches"][0]." noches y ".$combinacion["dias"][0]." días en habitación ".$habitacion; ?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">Hotel reservado: <? echo $nombredelhotel; ?></td>
					<td></td>
					<td></td>
				</tr>
		<? } ?>

		<? if($tiporeserva==2){ ?>				
				<tr>
					<td>Tour: <? echo $info["nombre"][0]; ?></td>
					<td><? echo $checkin; ?></td>
					<td><? echo $reserva["adultos"][0]; ?></td>
					<td><? echo $reserva["menores"][0]; ?></td>
					<td><? echo number_format($costoTotalTour)." MXN"; ?></td>
				</tr>
				<tr>
					<td>Circuito: <? echo $info["circuito"][0]; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">Hotel para pickup: <? echo $nombredelhotel; ?></td>
					<td></td>
					<td></td>
				</tr>
		<? } ?>
		
		<? if($tiporeserva==3){ ?>
				<tr>
					<td>Reservacion de hospedaje en el hotel <? echo $htl["hotel"][0]; ?></td>
					<td><? echo formatofecha($reserva["fechareserva"][0]); ?></td>
					<td><? echo $reserva["adultos"][0]; ?></td>
					<td><? echo $reserva["menores"][0]; ?></td>
					<td>$ <? echo uncodedbmx($amount); ?></td>
				</tr>
				<tr>
					<td>
						<? echo "* Plan de hospedaje: ".$htl["plan"][0];  ?>
						<br />
						<? echo "* Del ".formatofecha($reserva["checkin"][0])." al ".formatofecha($reserva["checkout"][0]);  ?>
						<br />
						<? echo "* Tipo de habitación: ".$htl["nombre"][0]; ?>
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		<? } ?>		
				
		<tr class="totalpagar">
					<td></td>
					<td></td>
					<td></td>
					<td><span class="tituloPagar"><? echo $delimporte; ?></span></td>
					<td>$ <? echo $tiporeserva == 2 ? number_format($costoTotalTour).'MXN' : $importe; ?></td>
				</tr>
				<tr class="totalpagar">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>				
				<tr class="totalpagar">
					<td><b>Clave de la reservación:</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="totalpagar">
					<td><? echo $reserva["clavereserva"][0]; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>																			
			</tbody>
		</table>					
	</div>
	
<? if($reserva["vuelo"][0] >= 1){ ?>
	<div id="detalleCompra">
	<h3>Servicio de Transportación</h3>					
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr class="encabezado">
				<td>No. de vuelo</td>
				<td>Aerolínea</td>
				<td>Fecha de llegada</td>							
				<td>Hora de llegada</td>
				<td>Destino</td>
			</tr>		
			<tr>
				<td><? echo $reserva["vuelo"][0]; ?></td>
				<td><? echo $reserva["aerolinea"][0]; ?></td>							
				<td><? echo $reserva["llegadaavion"][0]; ?></td>
				<td><? echo $reserva["horallegadaavion"][0]; ?></td>
				<td><? echo $reserva["hotelpickup"][0]; ?></td>
			</tr>
		</tbody>
	</table>
	</div>		
<? } ?>

<div id="detalleCompra">
<h3>Datos Personales</h3>					
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr class="encabezado">
			<td>Nombre</td>
			<td>Telefono</td>							
			<td>Email</td>
			<td>Ciudad de Origen</td>
		</tr>		
		<tr>
			<td><? echo $reserva["nombre"][0]; ?></td>
			<td><? echo $reserva["lada"][0].' '.$reserva["telefono"][0]; ?></td>							
			<td><? echo $reserva["email"][0]; ?></td>
			<td><? echo $reserva["ciudad"][0]; ?></td>
		</tr>
	</tbody>
</table>
</div>

</div>