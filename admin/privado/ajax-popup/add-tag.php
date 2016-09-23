<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
$ididioma = $_REQUEST["ididioma"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<input type="text" name="elidiomita" id="elidiomita" value="<? echo $ididioma; ?>" class="oculto" />
	<label>Tag</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveTag()">GUARDAR</button>	
</form>
<? }else {	
	$idtag = $_REQUEST["idtag"];	
	$detalle = detalleTag($idtag);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idtag" id="idtag" value="<? echo $idtag; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<input type="text" name="elidiomita" id="elidiomita" value="<? echo $ididioma; ?>" class="oculto" />
	<label>Tag</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $detalle["tag"][0]; ?>" />		
	<button class="btnFormas agregarAlgo" type="button" onclick="saveTag()">GUARDAR</button>	
</form>
<? } ?>