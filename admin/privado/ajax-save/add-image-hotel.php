<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$hotel = $_REQUEST["hotel"];
$file = $_REQUEST["file"];

$qry="insert into hoteles_imagenes (idhotel, imagen) values ('$hotel', '$file')";
ejecuta($qry);
$id=mysql_insert_id();
echo $id;

?>