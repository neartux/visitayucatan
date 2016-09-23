<? 
	include("../scripts/consultas.php");
	$idiomas = idiomas();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarIdioma('248', '260', '0', '0')">AGREGAR IDIOMA</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre del idioma</td>
			<td>Clave del idioma</td>
			<td>URL</td>
			<td>Imagen</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $idiomas["ididioma"][$i]; $i++){ $ib = $i+1; ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $idiomas["idioma"][$i]; ?></td>
			<td><? echo $idiomas["claveidioma"][$i]; ?></td>
			<td><? echo $idiomas["url"][$i]; ?></td>
			<td><? echo $idiomas["bandera"][$i]; ?></td>
			<td><img src="imagenes/<? echo $idiomas["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarIdioma('248', '333', '1', '<? echo $idiomas["ididioma"][$i]; ?>')" />
				<? if($idiomas["ididioma"][$i] >= 2){ ?>
				<img class="icon" src="imagenes/eliminar.png" onclick="delIdioma('<? echo $idiomas["ididioma"][$i]; ?>')" />
				<? } ?>
			</td>		
		</tr>
		<? } ?>						
	</tbody>
</table>