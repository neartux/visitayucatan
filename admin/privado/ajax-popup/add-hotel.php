<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre del hotel</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Estrellas</label>
	<select name="estrellas" id="estrellas">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveHotel()">GUARDAR</button>	
</form>
<? }else {	
	$idhotel = $_REQUEST["idhotel"];	
	$hotel = detHotel($idhotel);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre de la moneda</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $hotel["hotel"][0]; ?>" />
	
	<label>Estrellas</label>
	<select name="estrellas" id="estrellas">
		<option value="1" <? echo ($hotel["stars"][0] == 1) ? 'selected="selected"' : ''; ?>>1</option>
		<option value="2" <? echo ($hotel["stars"][0] == 2) ? 'selected="selected"' : ''; ?>>2</option>
		<option value="3" <? echo ($hotel["stars"][0] == 3) ? 'selected="selected"' : ''; ?>>3</option>
		<option value="4" <? echo ($hotel["stars"][0] == 4) ? 'selected="selected"' : ''; ?>>4</option>
		<option value="5" <? echo ($hotel["stars"][0] == 5) ? 'selected="selected"' : ''; ?>>5</option>
	</select>
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0" <? echo ($hotel["idestatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($hotel["idestatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveHotel()">GUARDAR</button>	
</form>
<? } ?>