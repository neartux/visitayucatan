<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idarticulo = $_REQUEST["idarticulo"];

if($accion == 0){
	$qry="insert into articulos_peninsula (idestatus) values ('$estatus')";
	ejecuta($qry);
	$id=mysql_insert_id();
	
	$qryb="insert into articulos_descripciones (idarticulo, ididioma, nombre) values('$id', '1', '$nombre')";
	ejecuta($qryb);	
}else{
	$qry="update articulos_peninsula set idestatus = '$estatus' where idarticulo = '$idarticulo'";	
	ejecuta($qry);
	
	$qryb="update articulos_descripciones set nombre = '$nombre' where idarticulo = '$idarticulo' and ididioma = 1";
	ejecuta($qryb);	
}
?>