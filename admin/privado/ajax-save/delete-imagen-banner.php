<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idbanner = $_REQUEST["id"];
$ididioma = $_REQUEST["idioma"];
$qry = "delete from banners_descripciones where idbanner= '$idbanner' and ididioma = '$ididioma'";
$qryposicion = "delete from banners_posiciones where idbanner = '$idbanner'";
ejecuta($qry);
ejecuta($qryposicion);
?>