<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idbanner = $_REQUEST["idbanner"];

if($accion == 0){
	$qry="insert into banners (idestatus, clics, nombre) values ('$estatus', '0', '$nombre')";	
}else{
	$qry="update banners set idestatus = '$estatus', nombre = '$nombre' where idbanner = '$idbanner'";		
}
ejecuta($qry);
?>