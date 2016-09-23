<? 
	include("scripts/consultas.php");
	$idpaquete  = $_REQUEST["idpaquete"];
	$idioma = $_REQUEST["lang"];
	$paquete = unpaquete($idpaquete, $idioma);
	$imgs = fotopaqueteprincipal($idpaquete, $idioma);
	$link="http://www.visitayucatan.com/paseos-en-yucatan/".string2url($paquete["nombre"][0])."/".$idpaquete."/".$idioma."/";	
	$r = $_REQUEST["r"];
	if ($r==1){
			
	}else{
		//header('Location: '.$link);
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
		<img src="imagenes/paquetes/<? echo $imgs["archivo"][0]; ?>" alt="">
		<div id="descripcion"><p><? echo $paquete["descripcion"][0]; ?></p></div>		
	</body>	
</html>