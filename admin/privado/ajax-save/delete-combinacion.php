<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idcombinacion = $_REQUEST["id"];

$qrya="select * from paquetes_combinaciones where idcombinacion = '$idcombinacion'";
$res = consulta($qrya);
$idpaquete = $res["idpaquete"][0];
$dias = $res["dias"][0];

$qrydel = "delete from paquetes_itinerarios where idpaquete = '$idpaquete' and dias = '$dias'";
ejecuta($qrydel);

$qry="delete from paquetes_combinaciones where idcombinacion = '$idcombinacion'";
ejecuta($qry);
?>