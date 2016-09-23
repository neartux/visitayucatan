<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$asunto = $_REQUEST["asunto"];
$cuerpo = $_REQUEST["cuerpocorreo"];
$ididioma = $_REQUEST["ididioma"];
$ctos = count($asunto);

$qrydelete = "delete from cuerpos_correo";
ejecuta($qrydelete);

for($i=0; $i<=$ctos; $i++){
	$texto = $cuerpo[$i];
	$idioma = $ididioma[$i];
	$asuntin = $asunto[$i];
	if($asunto != "" and $texto != ""){
		$qry="insert into cuerpos_correo (texto, ididioma, asunto) values('$texto', '$idioma', '$asuntin')";
		ejecuta($qry);
	}
}

?>