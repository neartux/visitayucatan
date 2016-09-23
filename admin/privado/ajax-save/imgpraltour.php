<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idimagen = $_REQUEST["id"];
$idtour = $_REQUEST["tour"];

$qry="update tours_fotos set principal = 0 where idtour = '$idtour'";
ejecuta($qry);

$qryb="update tours_fotos set principal = 1 where idfoto = '$idimagen'";
ejecuta($qryb);
?>