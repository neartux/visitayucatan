<? 
	include("../scripts/consultas.php");
	$monedas = monedas();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarMoneda('248', '260', '0', '0')">AGREGAR MONEDA</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre de la moneda</td>
			<td>Simbolo</td>
			<td>Tipo de Cambio</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $monedas["idmoneda"][$i]; $i++){ $ib = $i+1; ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $monedas["moneda"][$i]; ?></td>
			<td><? echo $monedas["simbolo"][$i]; ?></td>
			<td><? echo $monedas["tipocambio"][$i]; ?></td>
			<td><img src="imagenes/<? echo $monedas["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarMoneda('248', '260', '1', '<? echo $monedas["idmoneda"][$i]; ?>')" />
				<? if($monedas["idmoneda"][$i] != 1){ ?>				
					<img class="icon" src="imagenes/eliminar.png" onclick="eliminaMoneda('<? echo $monedas["idmoneda"][$i]; ?>')" />
				<? } ?>
			</td>	
		</tr>
		<? } ?>						
	</tbody>
</table>