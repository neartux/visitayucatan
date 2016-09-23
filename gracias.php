<?
error_reporting(0);
include("templates/sessions.php"); 
include("scripts/consultas.php");
$reserva = buscaReserva($session);
$tiporeserva = $reserva["idtiporeserva"][0];
$idvinculo = $reserva["idvinculo"][0];
include("banamex/respuesta.php");
include("banamex/codificacion.php");
actualizaReserva($ttarjeta, $pagado, $authorizeID, $transactionNo, $session, $receiptNo);

echo "el idpaqyuete es: ".$idvinculo;

if($tiporeserva == 1){
	$idpaquete = $idvinculo;	
	$info = paquetes($idpaquete, 0);
	$tipohab = $reserva["tipohab"][0]; //1: sencilla, 2: doble, 3: triple, 4: cuadruple
	$idcombinacion = $reserva["idcombinacion"][0];
	$combinacion = combinaciones($idcombinacion);	
}
if($tiporeserva == 2){	
	$idtour = $reserva["idvinculo"][0];	
	$info = tours($idtour);
}

if($tiporeserva == 3){
	$htl = hoteldetalle($reserva["idvinculo"][0], $reserva["tipohab"][0]);
	$hab = lahabitacion($reserva["tipohab"][0]);
}
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
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
				<? if($pagado == 1){ ?>		
					<h2 id="titulocompra">Muchas gracias por su compra</h2>
				<? }else { ?>
					<h2 id="titulocompra">Lo sentimos su tarjeta ha sido declinada</h2>
				<? } ?>		
				
				<div class="imprimeVoucher" onclick="imprSelec('voucher')">
					<span class="btnImprimirVocuher">IMPRIMIR VOUCHER</span>
				</div>						
				<div id="voucher">
					<h3>Voucher electrónico</h3>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class="tituloTicket">NUMERO DE VOUCHER</td>
							<td><?php echo($receiptNo); ?></td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $tipotarjeta; ?></td>						
						</tr>
						<tr>
							<td colspan="2"><? echo $resultado; ?></td>						
						</tr>
						<tr>
							<td><span class="negrita">AUT:</span><? echo ($authorizeID >=  1) ? $authorizeID:"----"; ?></td>
							<td><span class="negrita">OPER:</span><? echo $transactionNo; ?></td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2">ORDER: <? echo $orderInfo; ?></td>						
						</tr>
						<tr>
							<td colspan="2"><?php echo $tipotarjeta; ?></td>						
						</tr>					
						<tr>
							<td colspan="2" class="importevoucher"><span class="negrita">IMPORTE $</span> <? echo uncodedbmx($amount); ?></td>						
						</tr>					
						
						<tr>
							<td>Fecha: <? echo formatofecha($reserva["fechareserva"][0]); ?></td>
							<td>Hora: <? echo $reserva["horareserva"][0]; ?></td>
						</tr>					 
					</table>
				</div>
				
				<div class="imprimeCompra" onclick="imprSelec('detalleCompra')">
					<span class="btnImprimirCompra">IMPRIMIR COMPRA</span>
				</div>
				<div id="detalleCompra">
					<h3>Detalle de su compra</h3>					
					<table cellpadding="0" cellspacing="0">
						<tr class="encabezado">
							<td>Descripción</td>
							<td>Fecha reservada</td>							
							<td>Adultos</td>
							<td>Menores</td>
							<td>Importe</td>
						</tr>
						<? if($tiporeserva==1){ ?>
						<tr>
							<td>Paquete <? echo $info["nombre"][0]; ?></td>
							<td><? echo formatofecha($reserva["checkin"][0]); ?></td>
							<td><? echo $reserva["adultos"][0]; ?></td>
							<td><? echo $reserva["menores"][0]; ?></td>
							<td>$ <? echo uncodedbmx($amount); ?></td>
						</tr>
						<tr>
							<td><? echo "(".$combinacion["noches"][0]." noches y ".$combinacion["dias"][0]." días en habitación ".$habitacion." )";  ?></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<? } ?>
						
						<? if($tiporeserva==2){ ?>
						<tr>
							<td>Tour <? echo $info["nombre"][0]; ?></td>
							<td><? echo formatofecha($reserva["checkin"][0]); ?></td>
							<td><? echo $reserva["adultos"][0]; ?></td>
							<td><? echo $reserva["menores"][0]; ?></td>
							<td>$ <? echo uncodedbmx($amount); ?></td>
						</tr>
						<tr>
							<td><? echo "(Circuito: ".$info["circuito"][0].")";  ?></td>
							<td></td>
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
								<? echo "* Tipo de habitación: ".$hab["nombre"][0]; ?>
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<? } ?>												
						
						
						<tr class="totalpagar">
							<? if($pagado == 1){ ?>
								<td colspan="4"><span class="tituloPagar">Total pagado</span></td>
							<? }else{ ?>
								<td colspan="4"><span class="tituloPagar">Total a pagar</span></td>	
							<? } ?>							
							<td>$ <? echo uncodedbmx($amount); ?></td>
						</tr>
						
					</table>
					
					<div id="otrosdatos">
						<? if($pagado == 1){ ?>
							<label>Clave de su reservación</label>
						<? }else { ?>
							<label>Referencia de pedido</label>
						<? } ?>
						<span><? echo $reserva["clavereserva"][0]; ?></span>
						
						<? if($pagado == 1){ ?>
							<span class="importante">En un plazo no mayor a 24 horas usted recibirá toda la información de su reservación en un email</span>
						<? }else { ?>
							<span class="importante">Su tarjeta de crédito ha sido declinada, por favor verifique con su banco. Si usted cree que es un error, marque al 01800 111 1111, tenga a la mano
								su número de referencia: <? echo $reserva["clavereserva"][0]; ?></span>
						<? } ?>
					</div>					
				</div>
			</div>
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
	</body>
</html>