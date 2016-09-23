<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idmoneda = $_REQUEST["id"];
$qry="delete from moneda where idmoneda = '$idmoneda'";
ejecuta($qry);
?>