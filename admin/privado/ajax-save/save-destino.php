<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$iddestino = $_REQUEST["iddestino"];

if($accion == 0){
	$qry="insert into destinos (estatus, destino) values ('$estatus', '$nombre')";	
}else{
	$qry="update destinos set destino = '$nombre', estatus = '$estatus' where iddestino = '$iddestino'";		
}
ejecuta($qry);
?>