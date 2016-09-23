<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombrehotel = $_REQUEST["nombrehotel"];
$direccion = $_REQUEST["direccion"];
$telefono = $_REQUEST["telefono"];
$estatus = $_REQUEST["estatus"];
$nombrecontacto = $_REQUEST["nombreContacto"];
$correocontacto = $_REQUEST["correoContacto"];
$idhotel = $_REQUEST["idhotel"];
$iddestino = $_REQUEST["iddestino"];
$ctos = count($nombrecontacto);

//Actualizamos informacion del hotel
$qryup="update hoteles set hotel = '$nombrehotel', direccion = '$direccion', telefono = '$telefono', idestatus = '$estatus', iddestino = '$iddestino' where idhotel = '$idhotel'";
ejecuta($qryup);

//Eliminamos todos los contactos del hotel
$qrydel="delete from hoteles_contactos where idhotel = '$idhotel'";
ejecuta($qrydel);

//Agregamos todos los contactos del hotel
if($ctos >= 1){
	for($i=0; $i<= $ctos; $i++){
		if($nombrecontacto[$i] != ""){
			$nombre = $nombrecontacto[$i];
			$correo = $correocontacto[$i];
			$qryinsert="insert into hoteles_contactos (idhotel, nombre, correo) values ('$idhotel', '$nombre', '$correo')";
			ejecuta($qryinsert);
		}
	}
}
?>