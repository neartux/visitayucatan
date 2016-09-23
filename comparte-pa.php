<? 
	include("scripts/consultas.php");
	$idpaquete  = $_REQUEST["idpa"];
	$idioma = $_REQUEST["idioma"];
	$paquete = unpaquete($idpaquete, $idioma);
	$imgs = fotopaqueteprincipal($idpaquete, $idioma);
	$link="http://www.visitayucatan.com/paseos-en-yucatan/".string2url($paquete["nombre"][0])."/".$idpaquete."/".$idioma."/";	
	$r = $_REQUEST["r"];
	$descripcion = strip_tags($paquete["descripcion"][0]);
	$descripcion = cortarTexto($descripcion, $tamano=200, $colilla="...");
	if ($r==1){
			
	}else{
		header('Location: '.$link);
	} 
	//echo "idpaquete: ".$idpa." idioma: ".$idioma." imagen: ".$imgs["archivo"][0];
	//echo "<br />descripcion: ".$paquete["descripcion"][0];
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<base href="http://www.visitayucatan.com">
		<meta property="og:title" content="<? echo $paquete["nombre"][0]; ?>" />
		<meta property="og:description" content="<? echo $descripcion; ?>" />
		<!--<meta property="og:url" content="<? echo $link; ?>"/>-->	
		<meta property="og:site_name" content="Visita Yucatán"/>
		<meta property="og:image" content="http://www.visitayucatan.com/imagenes/paquetes/<? echo $imgs["archivo"][0]; ?>"/>
		<!--<? for($i=0; $imgs["idimagen"][$i]; $i++){ ?>
			<meta property="og:image" content="http://www.visitayucatan.com/imagenes/paquetes/<? echo $imgs["archivo"][$i]; ?>" />	
		<? } ?>-->		
			
	</head>
	<body>		
		<div id="descripcion"><p><? echo $paquete["descripcion"][0]; ?></p></div>		
	</body>	
</html>