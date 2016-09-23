<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idtag = $_REQUEST["id"];
$tagname = $_REQUEST["tagname"];


//Checamos si esta en tours
$qrypaquetes = "select count(1) as encontrados from paquetes_descripciones where tags like '%".$tagname."%'";
$qrytours = "select count(1) as encontrados from tours_descripciones where tags like '%".$tagname."%'";
$respaquetes = consulta($qrypaquetes);
$restours = consulta($qrytours);
$paquetes= $respaquetes["encontrados"][0];
$tours = $restours["encontrados"][0];

if($paquetes >= 1){
	echo "Aún hay paquetes con este tag asignado.";
}else{
	if($tours >= 1){
		echo "Aún hay tours con este tag asignado";
	}else{
		$qry="delete from tags where idtag = '$idtag'";
		ejecuta($qry);
		echo "El tag se ha eliminado con éxito";				
	}
}
?>