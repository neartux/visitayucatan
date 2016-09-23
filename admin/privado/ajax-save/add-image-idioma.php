<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idioma = $_REQUEST["idioma"];
$file = $_REQUEST["file"];

$qry="update idiomas set bandera = '$file' where ididioma = '$idioma'";
ejecuta($qry);
$id=mysql_insert_id();
echo $id;

?>