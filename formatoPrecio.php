<?
include("templates/sessions.php");
$precio = $_REQUEST["precio"];
$preciob = number_format(round($precio), 2);
echo "$ ".$preciob;

?>

