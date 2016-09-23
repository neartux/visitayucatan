<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$clave = $_REQUEST["clave"];
$url = $_REQUEST["url"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$ididioma = $_REQUEST["ididioma"];

if($accion == 0){
	$qry="insert into idiomas (idioma, claveidioma, url, estatus) values ('$nombre', '$clave', '$url', '$estatus')";
}else{
	$qry="update idiomas 
	set idioma = '$nombre',
	claveidioma = '$clave',
	url = '$url',
	estatus = '$estatus',
	where ididioma = '$ididioma'";	
}
ejecuta($qry);


?>