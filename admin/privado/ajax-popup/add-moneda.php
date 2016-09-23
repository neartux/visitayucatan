<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre de la moneda</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Simbolo de la moneda</label>
	<input type="text" name="simbolo" id="simbolo" class="validar" />
	
	<label>Tipo de cambio</label>
	<input type="text" name="tcambio" id="tcambio" class="validar" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveMoneda()">GUARDAR</button>	
</form>
<? }else {	
	$idmoneda = $_REQUEST["idmoneda"];	
	$moneda = detMoneda($idmoneda);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idmoneda" id="idmoneda" value="<? echo $idmoneda; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre de la moneda</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $moneda["moneda"][0]; ?>" />
	
	<label>Simbolo de la moneda</label>
	<input type="text" name="simbolo" id="simbolo" class="validar" value="<? echo $moneda["simbolo"][0]; ?>" />
	
	<label>Tipo de cambio</label>
	<input type="text" name="tcambio" id="tcambio" class="validar" value="<? echo $moneda["tipocambio"][0]; ?>" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus" <? echo ($moneda["idmoneda"][0] == 1) ? 'disabled="disabled"' : ''; ?>>
		<option value="0" <? echo ($moneda["estatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($moneda["estatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveMoneda()">GUARDAR</button>	
</form>
<? } ?>