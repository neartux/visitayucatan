<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idhotel = $_REQUEST["id"];

$qrypaquetes = "select count(1) as encontrados from paquetes_combinaciones where idhotel = '$idhotel'";
$res = consulta($qrypaquetes);
$ctos = $res["encontrados"][0];
if($ctos >= 1){
	echo $ctos;
}else{
	$qry="delete from hoteles where idhotel = '$idhotel'";
	ejecuta($qry);
	echo "OK";	
}
?>