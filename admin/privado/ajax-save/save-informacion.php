<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = limpia(trim($_REQUEST["nombre"]));
$desccorta = limpia(trim($_REQUEST["desccorta"]));
$desclarga = limpia(trim($_REQUEST["desclarga"]));
$incluye = limpia(trim($_REQUEST["incluye"]));
$itinerario = limpia(trim($_REQUEST["itinerario"]));
$idpaquete = $_REQUEST["idpaquete"];
$ididioma = $_REQUEST["ididioma"];
$idregistro = $_REQUEST["idregistro"];
$tags = $_REQUEST["tags"];
$supertags = json_decode($tags);
$resultado = count($supertags);
$lostags="";
for($i=0; $i<=$resultado; $i++){
	$next = $i+1;
	if($i==0){
		$lostags = $supertags[$i].",";
	}else{
		if($supertags[$next] == ""){
			$lostags = $lostags."".$supertags[$i];
		}else{
			$lostags = $lostags."".$supertags[$i].",";	
		}		
	}		
}


if($idregistro >= 1){
	//Actualizo
	$qry="update paquetes_descripciones set
	descripcion = '$desclarga',
	incluye ='$incluye',
	nombre ='$nombre',
	intro = '$desccorta',
	itinerario = '$itinerario',
	tags= '$lostags'
	where idregistro = '$idregistro'";
}else{
	//Inserto
	$qry="insert into paquetes_descripciones (idpaquete, ididioma, descripcion, incluye, nombre, intro, itinerario, tags) 
	values ('$idpaquete', '$ididioma', '$desclarga', '$incluye', '$nombre', '$desccorta', '$itinerario', '$tags')";
	
}
ejecuta($qry);
$id=mysql_insert_id();
echo $id;

function limpia($cadena) {
	$no_permitidas= array ("'");
	$permitidas= array ("''");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}  
?>