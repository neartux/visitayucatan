<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$iditinerario = $_REQUEST["iditinerario"];
$itinerario = $_REQUEST["itinerario"];
$idpaquete = $_REQUEST["paquete"];
$losdias = $_REQUEST["losdias"];
$ididioma = $_REQUEST["idioma"];

if($iditinerario >= 1){
	$qry="update paquetes_itinerarios set itinerario = '$itinerario' where iditinerario = '$iditinerario'";	
}else{
	$qry="insert into paquetes_itinerarios (idpaquete, itinerario, dias, ididioma) values ('$idpaquete', '$itinerario', '$losdias', '$ididioma')";	
}
ejecuta($qry);
$id=mysql_insert_id();

if($iditinerario >= 1){
	echo $iditinerario;
}else{
	echo $id;	
}




?>