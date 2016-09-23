<?php
	header( 'Content-type: text/html; charset=iso-8859-1' );
	include("scripts/consultas.php");
	$nombre=$_REQUEST["nombre"];
	$tags = buscaTags($nombre);
	
	for($i=0; $tags["idtag"][$i]; $i++){
		echo '<div class="suggest-element" onclick="selecttag(this)" data=""><a data="'.$tags["tag"][$i].'" id="'.$tags["idtag"][$i].'">'.$tags["tag"][$i].'</a></div>';
	}
?>