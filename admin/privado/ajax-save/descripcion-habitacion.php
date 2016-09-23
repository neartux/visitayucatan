<?
include("../scripts/consultas.php");
$ididioma = $_REQUEST["ididioma"];
$idhab = $_REQUEST["idhab"];
$accion = $_REQUEST["accion"];
$descripcionhabitacion = $_REQUEST["descripcionhabitacion"];
if($accion == 0){
	//actualiza
	$qry="update habitaciones_descripciones set descripcion = '$descripcionhabitacion' where idhabitacion = '$idhab' and ididioma = '$ididioma'";
	ejecuta($qry);
	echo 0;	
}else{
	//inserta
	$qry="insert into habitaciones_descripciones (idhabitacion, ididioma, descripcion) values('$idhab', '$ididioma', '$descripcionhabitacion')";
	ejecuta($qry);
	echo 0;	 	
}


?>