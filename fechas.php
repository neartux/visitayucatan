<?
	$fecha = date('d-m-Y');
	$fecha = date('Y-m-d');
	echo "Fecha americana: ".$fecha."<br />";
	
	$date = date_create($fecha);
	echo date_format($date, 'Y-m-d');
	
	//$mexico = date_format($fecha, 'd/m/ y');
	//echo "<br /> Formato mexicano: ".$mexico;


?>