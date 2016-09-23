<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idtour = $_REQUEST["id"];
$estatus = $_REQUEST["estatus"];

$qry="update paquetes set promovido = '$estatus' where idpaquete = '$idtour'";
ejecuta($qry);


?>