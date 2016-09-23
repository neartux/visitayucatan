<?
//echo $_SERVER['DOCUMENT_ROOT'];
include_once($_SERVER['DOCUMENT_ROOT']."/admin/privado/scripts/consultas.php");
$desde = $_REQUEST["desde"];
$hasta = $_REQUEST["hasta"];
$idhotel = $_REQUEST["idhotel"];

$idcontrato = $_REQUEST["contrato"];
if($idcontrato >= 1){
	$idcontrato = $idcontrato;
}else{
	$idcontrato = $_REQUEST["idcontrato"];
}

$idhabitacion = $_REQUEST["habitacion"];
if($idhabitacion >= 1){
	$idhabitacion = $idhabitacion;
}else{
	$idhabitacion = $_REQUEST["idhabitacion"];
}

$action = $_REQUEST["action"]; //usado solo para agregar tarifas

$mesito = date('m');
$yearsito = date('Y');
if($action == 1){
	$desde = $yearsito."-".$mesito."-1";
}
if($action == 1){
	$hasta = $yearsito."-".$mesito."-31";	
}	

$tarifas = tarifas($idhotel, $idcontrato, $idhabitacion, $desde, $hasta);

for($i=0; $tarifas["idtarifa"][$i]; $i++){
$n = $i + 1;
?>
<tr>
	<td><? echo $n; ?></td>
	<td><? echo $tarifas["fecha"][$i]; ?></td>
	<td><? echo $tarifas["tarifa"][$i]; ?></td>
	<td><? echo $tarifas["doble"][$i] ?></td>
	<td><? echo $tarifas["triple"][$i] ?></td>
	<td><? echo $tarifas["cuadruple"][$i] ?></td>	
</tr>		
<? } ?>							
