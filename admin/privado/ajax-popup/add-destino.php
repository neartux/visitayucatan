<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre del destino</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="savedestino()">GUARDAR</button>	
</form>
<? }else {	
	$iddestino = $_REQUEST["iddestino"];	
	$destino = destinos($iddestino);
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="iddestino" id="iddestino" value="<? echo $iddestino; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre del destino</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $destino["destino"][0]; ?>" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0" <? echo ($destino["estatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($destino["estatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="savedestino()">GUARDAR</button>
</form>
<? } ?>