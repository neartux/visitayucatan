<? 
	include("../scripts/consultas.php");
	$destinos = destinos();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarDestino('248', '156', '0', '0')">AGREGAR DESTINO</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Destino</td>
			<td>URL</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $destinos["iddestino"][$i]; $i++){ $ib = $i+1;
		$url = "http://www.visitayucatan.com/grupos/".$destinos["destino"][$i]."/".$destinos["iddestino"][$i]."/1/"; 
		if($destinos["estatus"][$i]==1){
			$img = "paloma.png";
		}else{
			$img = "tacha.png";
		}	
		?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $destinos["destino"][$i]; ?></td>
			<td><a target="_blank" href="<? echo $url; ?>"><? echo $url; ?></a></td>			
			<td><img src="imagenes/<? echo $img; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarDestino('248', '156', '1', '<? echo $destinos["iddestino"][$i]; ?>')" />				
				<img class="icon" src="imagenes/eliminar.png" onclick="delDestino('<? echo $destinos["iddestino"][$i]; ?>')" />				
			</td>		
		</tr>
		<? } ?>						
	</tbody>
</table>