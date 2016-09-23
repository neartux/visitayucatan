<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idpaquete = $_REQUEST["id"];

$qrycount = "select count(1) as encontrados from reservaciones where idtiporeserva = 1 and idvinculo = '$idpaquete'";
$res = consulta($qrycount);

if($res["encontrados"][0]>= 1){
	echo $res["encontrados"][0];
}else{
	$qry="delete from paquetes_combinaciones where idpaquete = '$idpaquete'";
	$qryb="delete from paquetes_descripciones where idpaquete = '$idpaquete'";
	$qryc="delete from paquetes where idpaquete = '$idpaquete'";
	ejecuta($qryc);
	ejecuta($qryb);
	ejecuta($qry);	
	echo "OK";
}

?>