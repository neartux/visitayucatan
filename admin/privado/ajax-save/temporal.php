<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");

$qryfind="select * from diccionario where idpalabra = 47";
$res = consulta($qryfind);
$palabra = utf8_encode($res["palabra"][0]);
$idpalabra = $res["idpalabra"][0];

$qry="update diccionario set palabra = '$palabra' where idpalabra = '$idpalabra'";
echo $qry;
ejecuta($qry);

/*
 * 
 * $qryfind="select * from diccionario";
$res = consulta($qryfind);


for($i=0; $res["idpalabra"][$i]; $i++){
	$palabra = utf8_encode($res["palabra"][$i]);
	$idpalabra = $res["idpalabra"][$i];
	
	$qry="update diccionario set palabra = '$palabra' where idpalabra = '$idpalabra'";
	echo "<br /><b>consulta: </b>".$qry;
	ejecuta($qry);	
}
 */
?>