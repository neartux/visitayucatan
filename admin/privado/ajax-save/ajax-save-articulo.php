<?
//header('Content-Type: text/html; charset=utf-8');
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");

function limpia($cadena) {
	$no_permitidas= array ("'", '’');
	$permitidas= array ("''", "''");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}  

$descripcion = limpia($_REQUEST["desclarga"]);
$nombre = limpia($_REQUEST["nombre"]);
$idregistro = $_REQUEST["idregistro"];
$ididioma = $_REQUEST["ididioma"];
$idarticulo = $_REQUEST["idarticulo"];

if($idregistro >= 1){
	$qry="update articulos_descripciones set 
	nombre = '$nombre',
	descripcion = '$descripcion'
	where idregistro = $idregistro";
}else{
	$qry="insert into articulos_descripciones (idarticulo, ididioma, nombre, descripcion) values ('$idarticulo', '$ididioma', '$nombre', '$descripcion')";	
}
ejecuta($qry);
$id=mysql_insert_id();
echo $id;

?>