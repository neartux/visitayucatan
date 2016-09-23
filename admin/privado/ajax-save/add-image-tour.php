<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$tour = $_REQUEST["tour"];
$file = $_REQUEST["file"];

$qry="insert into tours_fotos (idtour, archivo, principal) values ('$tour', '$file', '0')";
ejecuta($qry);
$id=mysql_insert_id();
echo $id;
?>