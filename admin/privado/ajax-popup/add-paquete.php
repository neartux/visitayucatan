<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre del paquete</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Circuito</label>
	<input type="text" name="circuito" id="circuito" class="validar" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="savePaquete()">GUARDAR</button>	
</form>
<? }else {	
	$idpaquete = $_REQUEST["idpaquete"];	
	$paquete = detPaquete($idpaquete);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idpaquete" id="idpaquete" value="<? echo $idpaquete; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre del paquete</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $paquete["nombre"][0]; ?>" />
	
	<label>Circuito</label>
	<input type="text" name="circuito" id="circuito" class="validar" value="<? echo $paquete["circuito"][0]; ?>" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0" <? echo ($paquete["idestatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($paquete["idestatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>
	<button class="btnFormas agregarAlgo" type="button" onclick="savePaquete()">GUARDAR</button>	
</form>
<? } ?>