<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$hotel = $_REQUEST["hotel"];
$dias = $_REQUEST["dias"];
$noches = $_REQUEST["noches"];
$idcombinacion = $_REQUEST["idcombinacion"];
$sencilla = $_REQUEST["sencilla"];
$doble = $_REQUEST["doble"];
$triple = $_REQUEST["triple"];
$menor = $_REQUEST["tmenor"];
$cuadruple = $_REQUEST["cuadruple"];


$qry="update paquetes_combinaciones set
noches = '$noches',
dias = '$dias',
sencilla = '$sencilla',
doble = '$doble',
triple = '$triple',
cuadruple = '$cuadruple',
menor = '$menor'
where idcombinacion = '$idcombinacion'";
ejecuta($qry);
?>