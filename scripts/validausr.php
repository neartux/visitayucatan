<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1); 

include("consultas.php");
$usuario = $_REQUEST["usuario"];
$password = $_REQUEST["password"];
//Errores= 0:usuario no existe 1:password incorrecto

$qryusr="select count(idusuario) as encontrados from usuarios where email = '$usuario'";
$resusr = consulta($qryusr);
if($resusr["encontrados"][0] >= 1){
	$qrypass="select * from usuarios where email = '$usuario' and `password` = '$password'";
	$respass = consulta($qrypass);	
	if($respass["idusuario"][0] >= 1){
		//Generamos sesiones
		session_start();
		$_SESSION["login"] = true;
		$_SESSION["minombre"] = $respass["nombre"][0];
		$_SESSION["miapellido"] = $respass["apellido"][0];
		$_SESSION["miemail"] = $usuario;
		$_SESSION["miidusuario"] = $respass["idusuario"][0];;		
		$_SESSION["minivel"] = $respass["nivel"][0];	
		echo 2;				   
	}else{
		echo 1;
	}
}else{
	echo 0;
}
?>