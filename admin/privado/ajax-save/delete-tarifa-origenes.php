<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idorigen = $_REQUEST["idorigen"];
$qry="delete from tours_origenes where idregistro = '$idorigen'";
ejecuta($qry);

?>