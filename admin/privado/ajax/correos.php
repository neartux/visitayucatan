<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idiomas = idiomas();
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Confirmación de Reserva</span></li>		
	</ul>
</div>

<div id="reload">	
	<div id="informacion" class="panelInfo">
		<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardarCuerpoCorreos()">GUARDAR</button>
		<div id="menuLeft">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="b_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="idiomaActivo" <? } ?> onclick="descripcionesIdioma('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>

		<div class="menuContenido">
			<form name="frmCorreos" id="frmCorreos">			
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){
				$correo = cuerposCorreos($idiomas["ididioma"][$i]);
				?>				
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2>					
						<input type="hidden" name="ididioma[]" value="<? echo $idiomas["ididioma"][$i]; ?>" />
						
						<label>Asunto del correo:</label>
						<input type="text" name="asunto[]" value="<? echo $correo["asunto"][0]; ?>" />
						
						<label>Cuerpo del correo:</label>
						<textarea name="cuerpocorreo[]"><? echo $correo["texto"][0]; ?></textarea>					
				</div>				
			<? } ?>
		</div>		
	</div>
</div>