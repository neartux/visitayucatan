<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idusuario = $_REQUEST["id"];
$qry="delete from usuarios where idusuario = '$idusuario'";
ejecuta($qry);
?>