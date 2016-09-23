<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$circuito = $_REQUEST["circuito"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idpaquete = $_REQUEST["idpaquete"];

if($accion == 0){
	$qry="insert into paquetes (idestatus, nombre, circuito) values ('$estatus', '$nombre', '$circuito')";
	ejecuta($qry);
	$id=mysql_insert_id();
	
	$qryb="insert into paquetes_descripciones (idpaquete, ididioma, nombre) values ('$id', '1', '$nombre')";
	ejecuta($qryb);
}else{
	$qry="update paquetes set 
	idestatus = '$estatus',
	nombre = '$nombre',
	circuito = '$circuito'
	where idpaquete = '$idpaquete'";
	ejecuta($qry);	
	
	$qryb="update paquetes_descripciones set nombre = '$nombre' where idpaquete = '$idpaquete' and ididioma = 1";
	ejecuta($qryb);
}


?>