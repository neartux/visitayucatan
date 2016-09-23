<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idreserva = $_REQUEST["id"];

$qry="update reservaciones set correoadmin = 0, correousuario = 0 where idreserva = '$idreserva'";
ejecuta($qry);

?>