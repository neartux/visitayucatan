<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$tadulto = $_REQUEST["tadulto"];
$tmenor = $_REQUEST["tmenor"];
$circuito = $_REQUEST["circuito"];
$estatus = $_REQUEST["estatus"];
$accion = $_REQUEST["accion"];
$idtour = $_REQUEST["idtour"];
$minPersonas = $_REQUEST["minpersonas"];

if($accion == 0){
	$qry="insert into tours (nombre, tadulto, tmenor, estatus, circuito, minimopersonas) values ('$nombre', '$tadulto', '$tmenor', '$estatus', '$circuito', '$minPersonas')";
	ejecuta($qry);
	$id=mysql_insert_id();
	$qryb="insert into tours_origenes (idtour, idorigen, adulto, menor) values ('$id', '2', '$tadulto', '$tmenor')";
	ejecuta($qryb);
}else{
	$qry="update tours set
	nombre = '$nombre',
	estatus = '$estatus',
	circuito = '$circuito',
        minimopersonas = '$minPersonas'
	where idtour = '$idtour'";
	$qryb="update tours_origenes set adulto = '$tadulto', menor = '$tmenor' where idtour = '$idtour' and idorigen = 2";
	ejecuta($qry);
	ejecuta($qryb);
}

?>