<?
include_once("/home/visityuc/public_html/admin/privado/scripts/consultas.php");

//Contaremos cuantas reservas tienen estatus 2
$qrya = "select count(1) as encontrados from reservaciones where correoadmin = 2 and correousuario = 2 and fechareserva < curdate()";
$resa= consulta($qrya);
if($resa["encontrados"][0] >= 1){
	$update="update reservaciones set correoadmin = 0, correousuario = 0 where correoadmin = 2 and correousuario = 2 and fechareserva < curdate()";
	ejecuta($update);	
}else{
	echo "Todo bien!";	
}
?>