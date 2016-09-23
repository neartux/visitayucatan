<? 
	include("scripts/consultas.php");
	$idhotel  = $_REQUEST["idhotel"];
	$idioma = $_REQUEST["lang"];
	$hotel = hoteldetalle($idhotel, $idioma);
	$imgs = imagenesHotel($idhotel);
	$link = "http://www.visitayucatan.com/hoteles-en-yucatan/".string2url($hotel["hotel"][0])."/".$idhotel."/1/";
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
		<meta property="og:title" content="<? echo $hotel["hotel"][0]; ?>" />
		
		<meta property="og:description" content="<? echo $hotel["descripcion"][0]; ?>" />
		<? for($i=0; $imgs["idimagen"][$i]; $i++){ ?>
			<meta property="og:image" content="http://www.visitayucatan.com/imagenes/hoteles/<? echo $imgs["imagen"][$i]; ?>" />	
		<? } ?>
	
	</head>
	<body>
		<img src="imagenes/hoteles/<? echo $imgs["imagen"][0]; ?>" alt="">
		<div id="descripcion"><p><? echo $hotel["descripcion"][0]; ?></p></div>		
	</body>	
</html>