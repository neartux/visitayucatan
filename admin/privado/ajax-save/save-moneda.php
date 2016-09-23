<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$simbolo = $_REQUEST["simbolo"];
$tcambio = $_REQUEST["tcambio"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idmoneda = $_REQUEST["idmoneda"];

if($accion == 0){
	$qry="insert into moneda (moneda, estatus, simbolo, tipocambio) values ('$nombre', '$estatus', '$simbolo', '$tcambio')";
}else{
	$qry="update moneda set
	moneda = '$nombre',
	estatus = '$estatus',
	simbolo = '$simbolo',
	tipocambio = '$tcambio'
	where idmoneda = '$idmoneda'";	
}
ejecuta($qry);


?>