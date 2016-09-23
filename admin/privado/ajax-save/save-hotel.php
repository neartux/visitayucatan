<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$stars = $_REQUEST["estrellas"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idhotel = $_REQUEST["idhotel"];

if($accion == 0){
	$qry="insert into hoteles (idestatus, hotel, stars) values ('$estatus', '$nombre', '$stars')";
}else{
	$qry="update hoteles set
	idestatus = '$estatus',
	hotel = '$nombre',
	stars = '$stars'
	where idhotel = '$idhotel'";	
}
ejecuta($qry);
?>