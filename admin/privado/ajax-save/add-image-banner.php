<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idbanner = $_REQUEST["banner"];
$archivo = $_REQUEST["file"];
$ididioma = $_REQUEST["idioma"];

$qry="insert into banners_descripciones (idbanner, ididioma, archivo) values('$idbanner', '$ididioma', '$archivo')";
ejecuta($qry);
//$id=mysql_insert_id();
//echo $id;
?>