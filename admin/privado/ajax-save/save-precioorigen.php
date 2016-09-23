<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idorigen = $_REQUEST["idorigen"];
$adulto = $_REQUEST["adulto"];
$menor = $_REQUEST["menor"];

$qry="update tours_origenes set adulto = '$adulto', menor = '$menor' where idregistro = '$idorigen'";
ejecuta($qry);
?>