<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/consultas.php");
$idhotel = $_REQUEST["idhotel"];
$idcontrato = $_REQUEST["idcontrato"];
$idhabitacion = $_REQUEST["idhabitacion"];
$desde = $_REQUEST["d"];
$hasta = $_REQUEST["h"];

$tarifa = $_REQUEST["tarifa"];  
$tdoble = $_REQUEST["tdoble"];
$ttriple = $_REQUEST["ttriple"];
$tcuadruple = $_REQUEST["tcuadruple"];


//Borramos los registros del segmento de fecha seleccionado
$qrydelete="delete from hoteles_tarifas where idhotel = '$idhotel' and idcontrato = '$idcontrato' and idhabitacion = '$idhabitacion' and fecha between '$desde' and '$hasta'";
ejecuta($qrydelete);

$desde = explode("-", $desde);
$finicial = $desde[2]."-".$desde[1]."-".$desde[0];
$fechaiespecial = ceros($desde[0],2)."-".ceros($desde[1], 2)."-".$desde[2];

$hasta = explode("-", $hasta);
$ffinal = $hasta[2]."-".$hasta[1]."-".$hasta[0];

//dd-mm-yy | Primero la fecha peque y luego la fecha grande
$resta = restaFechas($finicial, $ffinal);


for($i=0; $i <= $counthab; $i++){
	 for($f=0; $f <= $resta; $f++){	 
	 	$lafecha = sumadias($fechaiespecial, $f); //yy-mm-dd
	 	if($tarifa >= 1){
		 	$qry="insert into hoteles_tarifas (idhotel, idcontrato, idhabitacion, fecha, tarifa, doble, triple, cuadruple) 
		 	values ('$idhotel', '$idcontrato', '$idhabitacion', '$lafecha', '$tarifa', '$tdoble', '$ttriple', '$tcuadruple')";
		}else{
			$qry="delete from hoteles_tarifas where idhotel = '$idhotel', '$idcontrato = '$idcontrato', idhabitacion = '$idhabitacion' and fecha = '$lafecha'";			
		}		 	
		ejecuta($qry);
	 }
} 



?>