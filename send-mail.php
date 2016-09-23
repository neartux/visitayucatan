<?
//include("scripts/mysql.php");

$nombre = $_REQUEST["nombre"];
$telefono = $_REQUEST["telefono"];
$email = $_REQUEST["email"];
$comentarios = $_REQUEST["comentarios"];

//Enviar el correo
$destinatario = "info@visitayucatan.com";
$asunto = "Se ha generado un nuevo prospecto | Visita Yucatan"; 
$cuerpo = ' 
<html> 
<head> 
<title>Nuevo prospecto</title> 
</head> 
<body> 
<h1>Se ha generado un nuevo prospecto</h1> 
<br /><br /><b>Nombre: </b>'.$nombre.'
<br /><b>Teléfono: </b>'.$telefono.'
<br /><b>Email: </b>'.$email.'
<br /><b>Comentarios: </b>'.$comentarios.'
<br /><br /><h2>Suerte!!!</h2>
</body> 
</html>'; 

//Envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//Dirección del remitente 
$headers .= "From: Notificaciones Inbound <notificaciones@visitayucatan.com>\r\n"; 

//Dirección de respuesta (Puede ser una diferente a la de pepito@mydomain.com)
$headers .= "Reply-To: noresponder@visitayucatan.com\r\n"; 

//Ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@mydomain.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: director@visitayucatan.com\r\n";
$headers .= "Cc: sales@visitayucatan.com\r\n";
//$headers .= "Cc: faustinopech@posadatoledo.com\r\n";

//Direcciones que recibirán copia oculta 
$headers .= "Bcc: near31_3112@hotmail.com\r\n";

mail($destinatario,$asunto,$cuerpo,$headers); 
?>
