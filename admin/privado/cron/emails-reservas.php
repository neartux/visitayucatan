<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>
<link type="text/css" rel="stylesheet" href="../attachments/estilo-reserva.css">
<?
include_once("/home/visityuc/public_html/admin/privado/scripts/consultas.php");
include_once("/home/visityuc/public_html/admin/privado/scripts/toPDF.php");
require_once('/home/visityuc/public_html/admin/privado/scripts/phpmailer/class.phpmailer.php'); 

$hay = reservacionesCount();
echo "Hay: ".$hay." <br />";
if ($hay >= 1){
echo "<br />inicializando... <br />";
$reserva = reservaciones();
$emails = emailsAdmins();
$idioma = $reserva["ididioma"][0];
$cuerpo  = cuerpomail($idioma);
$tiporeserva = $reserva["idtiporeserva"][0];
$idreserva = $reserva["idreserva"][0];
$cliente = $reserva["email"][0];
$nombrecliente = $reserva["nombre"][0];
$nombredelhotel = $reserva["hotelpickup"][0];
$clavereserva = "VIYUC".$idreserva;

$qryupdatereserva = "update reservaciones set clavereserva = '$clavereserva' where idreserva = '$idreserva'";
ejecuta($qryupdatereserva);


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
}

if($tiporeserva == 3){
	$htl = hoteldetalle($reserva["idvinculo"][0], $reserva["tipohab"][0]);
	$hab = lahabitacion($reserva["tipohab"][0]);
}

//Enlistamos los emails....
for($i=0; $reserva["idreserva"][$i]; $i++){
	$cuerpomail = $cuerpo["texto"][0];
	echo $cuerpomail;	
	
	switch ($reserva["idtipotarjeta"][0]) {
	    case "VC":
	        $tipotarjeta = "VISA";
	    case "MC":
	        $tipotarjeta = "MASTERCARD";
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
		
$htmlb ='<div class="center">
	<img id="logoimg" src="http://www.visitayucatan.com/imagenes/logo.png" />					
	<h2 id="titulocompra">'.$titulo.'</h2>
	<div id="voucher">
		<h3>Voucher electrónico</h3>
		<table cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td class="tituloTicket">NUMERO DE VOUCHER</td>
					<td>'.$reserva["voucherBMX"][0].'</td>
				</tr>
				<tr>
					<td colspan="2">'.$tipotarjeta.'</td>						
				</tr>
				<tr>
					<td colspan="2">'.$mensaje.'</td>						
				</tr>
				<tr>
					<td><span class="negrita">AUT:</span>'.$reserva["autorizacionBMX"][0].'</td>
					<td><span class="negrita">OPER:</span>'.$reserva["operacionBMX"][0].'</td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2">ORDER: '.$reserva["clavereserva"][0].'</td>						
				</tr>
				<tr>
					<td colspan="2">'.$tipotarjeta.'</td>						
				</tr>					
				<tr>
					<td colspan="2" class="importevoucher"><span class="negrita">IMPORTE $</span>'.$importe.'</td>						
				</tr>					
				<tr>
					<td>Fecha: '.$fecha.'</td>
					<td>Hora: '.$reserva["horareserva"][0].'</td>
				</tr>					 
			</tbody>
		</table>
	</div>
				
	<div id="detalleCompra">
		<h3>Detalle de su compra</h3>					
		<table cellpadding="0" cellspacing="0">
			<tbody>
				<tr class="encabezado">
					<td>Descripción</td>
					<td>Fecha reservada</td>							
					<td>Adultos</td>
					<td>Menores</td>
					<td>Importe</td>
				</tr>';

		if($tiporeserva==1){				
		$htmlb .='<tr>
					<td>Paquete: '.$info["nombre"][0].'</td>
					<td>'.$checkin.'</td>
					<td>'.$reserva["adultos"][0].'</td>
					<td>'.$reserva["menores"][0].'</td>
					<td>$ '.$importe.' MXN</td>
				</tr>
				<tr>
					<td colspan="3">'.$combinacion["noches"][0]." noches y ".$combinacion["dias"][0]." días en habitación ".$habitacion.'</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">Hotel reservado: '.$nombredelhotel.'</td>
					<td></td>
					<td></td>
				</tr>';
			}

		if($tiporeserva==2){				
		$htmlb .='<tr>
					<td>Tour: '.$info["nombre"][0].'</td>
					<td>'.$checkin.'</td>
					<td>'.$reserva["adultos"][0].'</td>
					<td>'.$reserva["menores"][0].'</td>
					<td>$ '.$importe.' MXN</td>
				</tr>
				<tr>
					<td>Circuito: '.$info["circuito"][0].'</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">Hotel para pickup: '.$nombredelhotel.'</td>
					<td></td>
					<td></td>
				</tr>';
			}
		
		if($tiporeserva==3){				
		$htmlb .='<tr>
					<td>Reservacion de hospedaje en el hotel'.$htl["hotel"][0].'</td>
					<td>'.formatofecha($reserva["fechareserva"][0]).'</td>
					<td>'.$reserva["adultos"][0].'</td>
					<td>'.$reserva["menores"][0].'</td>
					<td>$ '.$importe.'</td>
				</tr>
				<tr>
					<td>* Plan de hospedaje: '.$htl["plan"][0].'
						<br />* Del '.formatofecha($reserva["checkin"][0]).' al '.formatofecha($reserva["checkout"][0]).'
						<br />* Tipo de habitación: '.$hab["nombre"][0].'
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>';
			}		
				
		$htmlb .='<tr class="totalpagar">
					<td></td>
					<td></td>
					<td></td>
					<td><span class="tituloPagar">'.$delimporte.'</span></td>
					<td>$ '.$importe.'</td>
				</tr>
				<tr class="totalpagar">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>				
				<tr class="totalpagar">
					<td><b>Clave de su reservación:</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="totalpagar">
					<td>'.$clavereserva.'</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>																			
			</tbody>
		</table>					
	</div>
</div>';	


if($reserva["vuelo"][0] >= 1){
$htmlb .='<div id="detalleCompra">
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
			<td>'.$reserva["vuelo"][0].'</td>
			<td>'.$reserva["aerolinea"][0].'</td>							
			<td>'.$reserva["llegadaavion"][0].'</td>
		    <td>'.$reserva["horallegadaavion"][0].'</td>';	
			
	if($tiporeserva == 3){
		$htmlb.='<td>'.$htl["hotel"][0].'</td>';
	}else{
		$htmlb.='<td>'.$reserva["hotelpickup"][0].'</td>';		
	}	
		$htmlb.='</tr>
	</tbody>
</table>
</div>';		
}

$htmlb .='<div id="detalleCompra">
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
			<td>'.$reserva["nombre"][0].'</td>
			<td>'.$reserva["lada"][0].' '.$reserva["telefono"][0].'</td>							
			<td>'.$reserva["email"][0].'</td>
			<td>'.$reserva["ciudad"][0].'</td>
		</tr>
	</tbody>
</table>
</div>';
	
	$html = utf8_decode($htmlb);
	//echo $html;
	$newfile = "/home/visityuc/public_html/admin/privado/attachments/reserva_".$reserva["idreserva"][0];
	doPDF($newfile, $html, true, 'estilo-reserva.css', true); //lo guardamos en la carpeta pdfs
	
	
	
	//Enviaremos ahora el correo:
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	//$mail->IsSendmail(); // telling the class to use SendMail transport
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Host       = "mail.visitayucatan.com"; // sets the SMTP server
	$mail->Port       = 26;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "notificaciones@visitayucatan.com"; // SMTP account username
	$mail->Password   = "8toledo2015";        // SMTP account password	
	

try {
	$entidad = utf8_decode("Visita Yucatán");
	$subject = utf8_decode($cuerpo["asunto"][0]);
  	$mail->AddAddress($cliente, $nombrecliente);	

	for($e=0; $emails["idregistro"][$e]; $e++){
		$mail->AddBCC($emails["email"][$e]); 
	}
		
	$mail->AddBCC('near31_3112@hotmail.com');
  	$mail->SetFrom('notificaciones@visitayucatan.com', $entidad);
  	$mail->Subject = $subject;
	$mail->AltBody = 'Para ver este correo correctamente debe soportar html';
	$mail->MsgHTML($cuerpomail);
	$mail->AddAttachment($newfile.".pdf");	
	$mail->Send();
    echo "Message Sent OK</p>\n";
	$update="update reservaciones set correoadmin = 1, correousuario = 1 where idreserva = '$idreserva'";
	ejecuta($update);
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

}//termina el for

}else{
	echo "No hay mensajes que enviar";
}
 
?>