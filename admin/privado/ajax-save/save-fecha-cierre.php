<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$idcierre = $_REQUEST["idcierre"];
$idhotel = $_REQUEST["idhotel"];
$accion = $_REQUEST["accion"];
$finicial = $_REQUEST["finicial"];
$ffinal = $_REQUEST["ffinal"];

if($accion == 0){
	//Subir el cierre de fechas 
	$qry="insert into hoteles_fechas_cierre (idhotel, finicio, ffinal) values('$idhotel', '$finicial', '$ffinal')";
	ejecuta($qry);
	$id=mysql_insert_id();
	echo $id;
}else{
	//Actualizar el cierre de fechas
	$qry="update hoteles_fechas_cierre set finicio = '$finicial', ffinal = '$ffinal' where idcierre = '$idcierre'";
	ejecuta($qry);
}

?>




