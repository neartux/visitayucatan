<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$accion = $_REQUEST["accion"];
$ididioma = $_REQUEST["elidiomita"];
$idtag = $_REQUEST["idtag"];

if($accion == 0){
	$qry="insert into tags (ididioma, tag) values('$ididioma', '$nombre')";
}else{
	$qry="update tags set tag = '$nombre' where idtag = '$idtag'";	
}
ejecuta($qry);


?>