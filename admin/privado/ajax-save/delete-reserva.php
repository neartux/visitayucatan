<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idarticulo = $_REQUEST["id"];
$qry = "delete from reservaciones where idreserva = '$idarticulo'";
ejecuta($qry);
?>