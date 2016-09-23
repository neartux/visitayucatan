<?
	include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
	$ncontrato = $_REQUEST["ncontrato"];
	$estatuscontrato = $_REQUEST["estatuscontrato"];
	$fechainicial = $_REQUEST["fechainicial"];
	$fechafinal = $_REQUEST["fechafinal"];
	$planalimentos = $_REQUEST["planalimentos"];
	$ish = $_REQUEST["ish"];
	$impuestos = $_REQUEST["impuestos"];
	$iva = $_REQUEST["iva"];
	$fee = $_REQUEST["fee"];
	$markup = $_REQUEST["markup"];
	$idcontrato = $_REQUEST["idcontrato"];
	$idhotel = $_REQUEST["idhotel"];
	$accion = $_REQUEST["accion"];
	$edadmenor = $_REQUEST["edadmenor"];
	if($impuestos == 1){
		$impuestos = 1;
	}else{
		$impuestos = 0;
	}
		
	if($accion == 1){
		//alta de nuevo contrato
		$qry="insert into contratos_hoteles (nombre, fechai, fechaf, idplan, ish, impuestos, iva, fee, idhotel, estatus, markup, edadmenor) 
		values ('$ncontrato', '$fechainicial', '$fechafinal', '$planalimentos', '$ish', '$impuestos', '$iva', '$fee', '$idhotel', '$estatuscontrato', '$markup', '$edadmenor')";
	}else{
		//Editamos contrato		
		$qry="update contratos_hoteles set
		nombre = '$ncontrato',
		fechai = '$fechainicial',
		fechaf = '$fechafinal',
		idplan = '$planalimentos',
		ish = '$ish',
		markup = '$markup',
		impuestos = '$impuestos',
		iva = '$iva',
		fee = '$fee',
		idhotel = '$idhotel',
		estatus = '$estatuscontrato',
		edadmenor = '$edadmenor'
		where idcontrato = '$idcontrato'";		
	}
	ejecuta($qry);		

?>