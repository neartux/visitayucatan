<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idtour = $_REQUEST["id"];
$estatus = $_REQUEST["estatus"];

$qry="update tours set promovido = '$estatus' where idtour = '$idtour'";
ejecuta($qry);


?>