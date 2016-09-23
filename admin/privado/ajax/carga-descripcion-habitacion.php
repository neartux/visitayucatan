<?
include("../scripts/consultas.php");
$hab = $_REQUEST["hab"];
$idioma = $_REQUEST["idioma"];
$des = descripcionHabitacion($hab, $idioma);
$count = count($des["idregistro"]);
if($count >= 1){
?>
<form name="frmdeshabitacion" id="frmdeshabitacion">
<label id="lbldescripcion">Descripción:</label>
<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idioma; ?>" />
<input type="hidden" name="idhab" id="idhab" value="<? echo $hab; ?>" />
<input type="hidden" name="accion" id="accion" value="0" />
<textarea name="descripcionhabitacion" id="descripcionhabitacion" class="cajondescripcion"><? echo $des["descripcion"][0]; ?></textarea>
<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionHahbitacion()">GUARDAR</button>
</form>

<? }else{ ?>
	
<form name="frmdeshabitacion" id="frmdeshabitacion">	
<label id="lbldescripcion">Descripción:</label>
<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idioma; ?>" />
<input type="hidden" name="idhab" id="idhab" value="<? echo $hab; ?>" />
<input type="hidden" name="accion" id="accion" value="1" />
<textarea name="descripcionhabitacion" id="descripcionhabitacion" class="cajondescripcion"></textarea>
<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionHahbitacion()">GUARDAR</button>
</form>	
<? } ?>