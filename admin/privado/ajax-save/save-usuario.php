<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$activo = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idusuario = $_REQUEST["idusuario"];

if($accion == 0){
	$qry="insert into usuarios (email, password, activo, nivel, nombre, apellido) values('$email', '$password', '$activo', '1', '$nombre', '$apellido')";
}else{
	$qry="update usuarios set
	email = '$email',
	password = '$password',
	activo = '$activo',
	nivel = '1',
	nombre = '$nombre',
	apellido = '$apellido'
	where idusuario = '$idusuario'";	
}
ejecuta($qry);


?>