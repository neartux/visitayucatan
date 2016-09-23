<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$pagina = $_REQUEST["pagina"];
$idpage = $_REQUEST["idpage"];
$idioma = $_REQUEST["idioma"];
$descripcion = $_REQUEST["descripcion"];
echo "descripcion: ".$descripcion." <br />";
$descripcion = limpia($descripcion);

if($idpage >= 1){
	$qry="update paginas_descripciones set descripcion = '$descripcion' where idpage = '$idpage'";
}else{
	$qry="insert into paginas_descripciones (ididioma, descripcion, pagina) values ('$idioma', '$descripcion', '$pagina')";	
}
ejecuta($qry);


function limpia($cadena) {
	$no_permitidas= array ("'");
	$permitidas= array ("''");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}  
?>