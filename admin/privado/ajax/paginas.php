<!--<script src="scripts/uploadifyhtml/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadifyhtml/uploadifive.css">-->

<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idiomas = idiomas();
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Paquetes</span></li>
		<li class="estancias" onclick="cargaPanel('estancias')"><span>Tours</span></li>
		<li class="hospedaje" onclick="cargaPanel('hospedaje')"><span>Hoteles</span></li>
	</ul>
</div>

<div id="reload">
	<div id="informacion" class="panelInfo">
		<div id="menuLeft">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="b_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="idiomaActivo" <? } ?> onclick="descripcionesIdioma('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>	

		<? for($i=0; $idiomas["ididioma"][$i]; $i++){ 
		   $descripcion = descripcionPaginas("paquetes", $idiomas["ididioma"][$i]);	
			?>
			<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				<button type="button" class="agregarAlgo btnSavePageDescripciones" onclick="guardaDescripcionPage('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				<form id="forma_<? echo $idiomas["ididioma"][$i]; ?>">
					<input type="hidden" name="pagina" value="paquetes" />
					<input type="hidden" name="idpage" value="<? echo $descripcion["idpage"][0]; ?>" />
					<input type="hidden" name="idioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />
					<label class="superlabel">Descripción</label>
					<textarea class="supertext" name="descripcion"><? echo $descripcion["descripcion"][0]; ?></textarea>
				</form>
			</div>	
		<? } ?>
   
	</div>
	
	<div id="estancias" class="panelInfo oculto">		
		<div id="menuRight">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="c_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="nocheActiva" <? } ?> onclick="ptoursDescripciones('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>
		
		<? for($i=0; $idiomas["ididioma"][$i]; $i++){ 
		   $descripcion = descripcionPaginas("tours", $idiomas["ididioma"][$i]);
			?>
			<div id="bb_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas muestranoches <? if($i >= 1){ ?> oculto <? } ?>">
				<button type="button" class="agregarAlgo btnSavePageDescripciones" onclick="guardaDescripcionPageTours('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				<form id="formatour_<? echo $idiomas["ididioma"][$i]; ?>">
					<input type="hidden" name="pagina" value="tours" />
					<input type="hidden" name="idpage" value="<? echo $descripcion["idpage"][0]; ?>" />
					<input type="hidden" name="idioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />					
					<label class="superlabel">Descripción</label>
					<textarea class="supertext" name="descripcion"><? echo $descripcion["descripcion"][0]; ?></textarea>
				</form>
			</div>	
		<? } ?>
	</div>
	
	<div id="hospedaje" class="panelInfo oculto">		
		<div id="menuRightb">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="d_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="hospedajeactivo" <? } ?> onclick="hospedajeDescripciones('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>
		
		<? for($i=0; $idiomas["ididioma"][$i]; $i++){ 
		   $descripcion = descripcionPaginas("hoteles", $idiomas["ididioma"][$i]);
			?>
			<div id="dd_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas muestranoches <? if($i >= 1){ ?> oculto <? } ?>">
				<button type="button" class="agregarAlgo btnSavePageDescripciones" onclick="guardaDescripcionPageHoteles('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				<form id="formahotel_<? echo $idiomas["ididioma"][$i]; ?>">
					<input type="hidden" name="pagina" value="hoteles" />
					<input type="hidden" name="idpage" value="<? echo $descripcion["idpage"][0]; ?>" />
					<input type="hidden" name="idioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />					
					<label class="superlabel">Descripción</label>
					<textarea class="supertext" name="descripcion"><? echo $descripcion["descripcion"][0]; ?></textarea>
				</form>
			</div>	
		<? } ?>
	</div>	
</div>
