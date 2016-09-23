<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idimagen = $_REQUEST["id"];
$idpaquete = $_REQUEST["paquete"];

$qry="update paquetes_fotos set principal = 0 where idpaquete = '$idpaquete'";
ejecuta($qry);

$qryb="update paquetes_fotos set principal = 1 where idfoto = '$idimagen'";
ejecuta($qryb);
?>