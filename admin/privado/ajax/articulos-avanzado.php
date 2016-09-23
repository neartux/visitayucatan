<?
include("../scripts/consultas.php");
$idarticulo = $_REQUEST["idarticulo"];
$idiomas = idiomas();
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Información</span></li>		
	</ul>
</div>

<div id="reload">
	<!-- INFORMACION POR  IDIOMA -->
	<div id="informacion" class="panelInfo scrollear">
		<div id="menuLeft">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="b_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="idiomaActivo" <? } ?> onclick="descripcionesIdioma('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>
		
		<div class="menuContenido scrollear">			
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				  <form name="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>" id="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>">
				  	<input type="hidden" name="idarticulo" id="idarticulo" value="<? echo $idarticulo; ?>" />
				  	<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />				  	
					<?					
					$articulo = articulosDescripciones($idarticulo, $idiomas["ididioma"][$i]); 
					?>
					<input type="hidden" name="idregistro" id="idregistro" value="<? echo $articulo["idregistro"][0]; ?>" />
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2>
					<label>Nombre</label>
					<input name="nombre" id="nombre_<? echo $idiomas["ididioma"][$i]; ?>" type="text" value="<? echo $articulo["nombre"][0]; ?>" />
				
					<label class="lbltop">Descripción larga</label>
					<textarea name="desclarga" id="desclarga_<? echo $idiomas["ididioma"][$i]; ?>" class="mceEditor"><? echo $articulo["descripcion"][0]; ?></textarea>
					
					<div class="flotis"></div>
				  </form>
				  <button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionArticulo('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				</div>				
			<? } ?>
		</div>
	</div>
	<!-- INFORMACION POR  IDIOMA -->
</div>
