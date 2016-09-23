<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Apellido</label>
	<input type="text" name="apellido" id="apellido" class="validar" />
	
	<label>Email (usuario)</label>
	<input type="text" name="email" id="email" class="validar" />
	
	<label>Password</label>
	<input type="text" name="password" id="password" class="validar" />	
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveUsuario()">GUARDAR</button>	
</form>
<? }else {	
	$idusuario = $_REQUEST["idusuario"];	
	$usuario = detUsuario($idusuario);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idusuario" id="idusuario" value="<? echo $idusuario; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	<label>Nombre</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $usuario["nombre"][0]; ?>" />
	
	<label>Apellido</label>
	<input type="text" name="apellido" id="apellido" class="validar" value="<? echo $usuario["apellido"][0]; ?>" />
	
	<label>Email (usuario)</label>
	<input type="text" name="email" id="email" class="validar" value="<? echo $usuario["email"][0]; ?>" />
	
	<label>Password</label>
	<input type="text" name="password" id="password" class="validar" value="<? echo $usuario["password"][0]; ?>" />	
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0" <? echo ($usuario["activo"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($usuario["activo"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveUsuario()">GUARDAR</button>	
</form>
<? } ?>