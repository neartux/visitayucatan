<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre del artículo</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="savearticulo()">GUARDAR</button>	
</form>
<? }else {	
	$idarticulo = $_REQUEST["idarticulo"];	
	$articulo = detArticulo($idarticulo);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idarticulo" id="idarticulo" value="<? echo $idarticulo; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre del artículo</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $articulo["nombre"][0]; ?>" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0" <? echo ($articulo["idestatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($articulo["idestatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="savearticulo()">GUARDAR</button>
</form>
<? } ?>