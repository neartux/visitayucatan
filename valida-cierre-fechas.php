<?
 //include("templates/sessions.php"); 
 include("scripts/consultas.php");
 $fecha = $_REQUEST["fecha"];
 $dias = $_REQUEST["dias"];
 $arreglob = $_REQUEST["arreglo"];
 $arreglo = explode(",",$arreglob);
 $r=0;
  
 for($f=0; $f<= $dias; $f++){
   $lafecha = sumadias($fecha, $f);
   if (in_array($lafecha, $arreglo)) {
   	   $r=1;   	   	   	   
   }
}
 echo $r;
 
 ?>