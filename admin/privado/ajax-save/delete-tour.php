<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idtour = $_REQUEST["id"];

$qrycount="select count(1) as encontrados from reservaciones where idtiporeserva = 2 and idvinculo = '$idtour'";
$res = ejecuta($qrycount);
$encontrados = $res["encontrados"][0];

if($encontrados >= 1){
	echo $encontrados;	
}else{
	$qry="delete from tours where idtour = '$idtour'";
	ejecuta($qry);	
	echo "OK";
}

?>