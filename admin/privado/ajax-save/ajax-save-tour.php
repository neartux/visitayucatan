<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$descripcion = limpia($_REQUEST["desclarga"]);
$nombre = $_REQUEST["nombre"];
$circuito = $_REQUEST["circuito"];
$idtour = $_REQUEST["idtour"];
$ididioma = $_REQUEST["ididioma"];
$iddescripcion = $_REQUEST["iddescripcion"];
$msjtour = $_REQUEST["msjtour"];


if($iddescripcion >= 1){
	//Actualizo
	$qry="update tours_descripciones set
	descripcion = '$descripcion',
	tourmsj = '$msjtour',
	tags = '$lostags',
	nombretour = '$nombre'
	where iddescripcion = '$iddescripcion'";
	ejecuta($qry);
	echo $qry;
		
	$qryb="update tours set
	circuito = '$circuito'
	where idtour = '$idtour'";	
	ejecuta($qryb);	
}else{
	//Inserto
	$qry="insert into tours_descripciones (idtour, ididioma, descripcion, tourmsj, tags, nombretour) 
	values('$idtour', '$ididioma', '$descripcion', '$tourmsj', '$tags', '$nombre')";
	ejecuta($qry);
}

function limpia($cadena) {
	$no_permitidas= array ("'");
	$permitidas= array ("''");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}  


?>