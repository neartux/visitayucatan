<? 
	include("../scripts/consultas.php");
	$hoteles = hoteles();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarHotel('248', '208', '0', '0')">AGREGAR HOTEL</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre del hotel</td>
			<td>Estrellas</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $hoteles["idhotel"][$i]; $i++){ $ib = $i+1; ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $hoteles["hotel"][$i]; ?></td>
			<td><? echo $hoteles["stars"][$i]; ?></td>
			<td><img src="imagenes/<? echo $hoteles["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarHotel('248', '208', '1', '<? echo $hoteles["idhotel"][$i]; ?>')" />
				<img class="icon" src="imagenes/eliminar.png" onclick="deleteHotel('<? echo $hoteles["idhotel"][$i]; ?>')" />
				<img class="icon" src="imagenes/avanzadas.png" onclick="detalleHotel('<? echo $hoteles["idhotel"][$i]; ?>')">
			</td>
		</tr>
		<? } ?>						
	</tbody>
</table>