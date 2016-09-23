<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idfoto = $_REQUEST["id"];
$qry = "delete from paquetes_fotos where idfoto = '$idfoto'";
ejecuta($qry);
?>