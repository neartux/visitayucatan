<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$hotel = $_REQUEST["hotel"];
$dias = $_REQUEST["dias"];
$noches = $_REQUEST["noches"];
$idpaquete = $_REQUEST["idpaquete"];
$sencilla = $_REQUEST["sencilla"];
$doble = $_REQUEST["doble"];
$triple = $_REQUEST["triple"];
$cuadruple = $_REQUEST["cuadruple"];
$tmenor = $_REQUEST["tmenor"];

$qryInsert="insert into paquetes_combinaciones (idpaquete, idhotel, noches, dias, sencilla, doble, triple, cuadruple, menor) 
values ('$idpaquete', '$hotel', '$noches', '$dias', '$sencilla', '$doble', '$triple', '$cuadruple', '$tmenor')";

$qrybusca = "select count(idcombinacion) as encontrados from paquetes_combinaciones where idpaquete = '$idpaquete' and idhotel = '$hotel' and noches='$noches' and dias = '$dias'";
$res = consulta($qrybusca);
$encontrados = $res["encontrados"][0];

if($encontrados == 0){
	echo "1";
	ejecuta($qryInsert);	
}else{
	echo "0";
}

?>