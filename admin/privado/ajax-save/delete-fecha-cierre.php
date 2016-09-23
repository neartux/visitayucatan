<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idcierre = $_REQUEST["id"];

$qry = "delete from hoteles_fechas_cierre where idcierre = '$idcierre'";
ejecuta($qry);
?>