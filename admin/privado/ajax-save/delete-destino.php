<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$iddestino = $_REQUEST["id"];
$qry="delete from destinos where iddestino = '$iddestino'";
ejecuta($qry);
echo 1;
?>