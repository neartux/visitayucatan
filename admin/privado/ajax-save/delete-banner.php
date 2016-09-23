<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idbanner = $_REQUEST["id"];
$qry="delete from banners where idbanner = '$idbanner'";
$qryb="delete from banners_descripciones where idbanner = '$idbanner'";
ejecuta($qry);
ejecuta($qryb);
?>