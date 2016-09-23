<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$paquete = $_REQUEST["paquete"];
$file = $_REQUEST["file"];

$qry="insert into paquetes_fotos (idpaquete, archivo, principal) values ('$paquete', '$file', '0')";
ejecuta($qry);
$id=mysql_insert_id();
echo $id;
?>