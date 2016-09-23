<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idorigen = $_REQUEST["idorigen"];
$adulto = $_REQUEST["adulto"];
$menor = $_REQUEST["menor"];
$idtour = $_REQUEST["idtour"];


$qryInsert="insert into tours_origenes (idtour, idorigen, adulto, menor) values ('$idtour', '$idorigen', '$adulto', '$menor')";

$qrybusca = "select count(idregistro) as encontrados from tours_origenes where idtour = '$idtour' and idorigen = '$idorigen'";
$res = consulta($qrybusca);
$encontrados = $res["encontrados"][0];

if($encontrados == 0){
	if($idorigen >= 1){
		echo "1";
		ejecuta($qryInsert);
	}else{
		echo "2";
	}	
}else{
	echo "0";
}

?>