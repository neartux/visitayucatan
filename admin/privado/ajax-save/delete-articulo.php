<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idarticulo = $_REQUEST["id"];
$qry = "delete from articulos_descripciones where idarticulo = '$idarticulo'";
$qryb ="delete from articulos_peninsula where idarticulo = '$idarticulo';";
ejecuta($qry);
ejecuta($qryb);
?>