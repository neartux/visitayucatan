<?
error_reporting(E_ALL);
ini_set("display_errors", 1); 
	include("http://www.visitayucatan.com/scripts/consultas.php");
	$idtour  = $_REQUEST["idtour"];
	$idioma = $_REQUEST["lang"];
	$tour = compartetour($idtour, $idioma);
	$imgs = fotosTour($idtour);	
	$descripcion = cortarTexto($tour["descripcion"][0]);
	$descripcion = strip_tags($descripcion, '<p><a>');
	$link="http://www.visitayucatan.com/tours-en-yucatan/".string2url($tour["nombre"][0])."/".$idtour."/".$idioma."/";	
	$r = $_REQUEST["r"];
	if ($r==1){
			
	}else{
		header('Location: '.$link);
	} 
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<base href="http://www.visitayucatan.com">
	</head>
	<body>
		<img src="imagenes/tours/<? echo $imgs["archivo"][0]; ?>" alt="">
		<div id="descripcion"><p><? echo $descripcion; ?></p></div>		
	</body>	
</html>