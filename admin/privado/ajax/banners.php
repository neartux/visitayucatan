<? 
	include("../scripts/consultas.php");
	$banners = banners();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarBanner('248', '156', '0', '0')">AGREGAR BANNER</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Banner</td>
			<td>Clicks</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $banners["idbanner"][$i]; $i++){ $ib = $i+1; ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $banners["nombre"][$i]; ?></td>
			<td><? echo $banners["clics"][$i]; ?></td>
			<td><img src="imagenes/<? echo $banners["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarBanner('248', '156', '1', '<? echo $banners["idbanner"][$i]; ?>')" />				
				<img class="icon" src="imagenes/eliminar.png" onclick="delBanner('<? echo $banners["idbanner"][$i]; ?>')" />
				<img class="icon" src="imagenes/avanzadas.png" onclick="descripcionesBanners('<? echo $banners["idbanner"][$i]; ?>')">
			</td>		
		</tr>
		<? } ?>						
	</tbody>
</table>