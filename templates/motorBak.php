<form id="buscador" name="buscador" action="resultado-paquetes" method="post">
<label class="firstLabel"><? traducciones(4); ?></label>
<?
$ListaPaquetes = paquetes(0,1); //idpaquete-orden(0: sin ordenar, 1: ordenado)
$ListaTours = tours(0,1); //idtour-orden(0: sin ordenar, 1: ordenado)
?>
<select name="aventura" id="aventura">
	<option value="0">Seleccione una opción</option>
	<option value="0">Mostrar todas las opciones</option>
		<? for($i=0; $ListaPaquetes["idpaquete"][$i]; $i++){ ?>
			<option value="<? echo $ListaPaquetes["idpaquete"][$i]; ?>" <? if($laaventura == $ListaPaquetes["idpaquete"][$i]){ ?> selected="selected" <? } ?>>
				<? echo $ListaPaquetes["nombre"][$i]; ?>
			</option>
		<? } ?>
</select>

<div class="grupo">
	<label><? traducciones(27); ?></label>
	<input type="text" name="llegada" id="llegada" value="<? echo $llegada; ?>" />
</div>

<div class="grupo">
	<label><? traducciones(42); ?></label>
	<input type="text" name="salida" id="salida" value="<? echo $salida; ?>" />
</div>

<div class="grupo">
	<label><? traducciones(54); ?></label>
	<select name="adultosb" id="adultosb">
		<option value="1" <? if($losadultos == 1){ ?>selected="selected" <? } ?>>1</option>
		<option value="2" <? if(!isset ($losadultos) or $losadultos == 2){ ?>selected="selected" <? } ?>>2</option>
		<option value="3" <? if($losadultos == 3){ ?>selected="selected" <? } ?>>3</option>
		<option value="4" <? if($losadultos == 4){ ?>selected="selected" <? } ?>>4</option>
	</select>
</div>

<div class="grupo">
	<label><? traducciones(28); ?></label>
	<select name="menoresb" id="menoresb">
		<option value="0" <? if(!isset ($losmenores)){ ?>selected="selected" <? } ?>>0</option>
		<option value="1" <? if($losmenores == 1){ ?>selected="selected" <? } ?>>1</option>
		<option value="2" <? if($losmenores == 2){ ?>selected="selected" <? } ?>>2</option>
		<option value="3" <? if($losmenores == 3){ ?>selected="selected" <? } ?>>3</option>
	</select>
</div>

<button type="button" id="encuentra" onclick="buscaPaquetes()"></button>
</form>