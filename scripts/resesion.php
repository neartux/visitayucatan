<?
session_start();
if($_REQUEST["idmoneda"]){
	$datos = explode(",", $_REQUEST["idmoneda"]);
	$monedita = $datos[0];
	$tipocambio = $datos[1];	
	$_SESSION[moneda] = $monedita;	
	$_SESSION[tcambio] = $tipocambio;
}

if($_REQUEST["ididioma"]){
	$_SESSION[idioma] = $_REQUEST["ididioma"];	
}


?>