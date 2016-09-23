<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idioma = $_REQUEST["ididioma"];
$inicio = $_REQUEST["inicio"];
$paquetes = $_REQUEST["paquetes"];
$tours = $_REQUEST["tours"];
$hoteles = $_REQUEST["hoteles"];
$peninsula = $_REQUEST["peninsula"];
$contacto = $_REQUEST["contacto"];
$cuantos = count($idioma)-1;

for($i=0; $i<= $cuantos; $i++){
	//inicio
	$ididioma = $idioma[$i];
	$qrydelete = "delete from menu_descripciones where ididioma = '$ididioma'";
	ejecuta($qrydelete);	
	
	$txtinicio = $inicio[$i];
	$txtpaquetes = $paquetes[$i];
	$txttours = $tours[$i];
	$txtpeninsula = $peninsula[$i];
	$txtcontacto = $contacto[$i];
	$txthoteles = $hoteles[$i];		
	$qrya="insert into menu_descripciones (idmenu, ididioma, traduccion)values('1', '$ididioma', '$txtinicio')";
	$qryb="insert into menu_descripciones (idmenu, ididioma, traduccion)values('2', '$ididioma', '$txtpaquetes')";
	$qryc="insert into menu_descripciones (idmenu, ididioma, traduccion)values('3', '$ididioma', '$txttours')";
	$qryd="insert into menu_descripciones (idmenu, ididioma, traduccion)values('4', '$ididioma', '$txthoteles')";
	$qrye="insert into menu_descripciones (idmenu, ididioma, traduccion)values('5', '$ididioma', '$txtpeninsula')";
	$qryf="insert into menu_descripciones (idmenu, ididioma, traduccion)values('6', '$ididioma', '$txtcontacto')";
	ejecuta($qrya);
	ejecuta($qryb);
	ejecuta($qryc);
	ejecuta($qryd);
	ejecuta($qrye);
	ejecuta($qryf);
}

?>

