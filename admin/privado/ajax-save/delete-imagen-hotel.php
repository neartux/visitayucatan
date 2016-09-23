<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idimg = $_REQUEST["id"];

$qry="delete from hoteles_imagenes where idimagen = '$idimg'";
ejecuta($qry);
?>