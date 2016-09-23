<? 
	include("../scripts/consultas.php");
	$articulos = articulos();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarArticulo('248', '156', '0', '0')">AGREGAR ARTICULO</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Artículo</td>
			<td>Descripción</td>
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $articulos["idarticulo"][$i]; $i++){ $ib = $i+1;
		$texto = strip_tags($articulos["descripcion"][$i]);
		$descripcion = cortarTexto($texto, $tamano=100, $colilla="...");
		 ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $articulos["nombre"][$i]; ?></td>
			<td><? echo $descripcion; ?></td>
			<td><img src="imagenes/<? echo $articulos["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarArticulo('248', '156', '1', '<? echo $articulos["idarticulo"][$i]; ?>')" />				
				<img class="icon" src="imagenes/eliminar.png" onclick="delArticulo('<? echo $articulos["idarticulo"][$i]; ?>')" />
				<img class="icon" src="imagenes/avanzadas.png" onclick="descripcionesArticulos('<? echo $articulos["idarticulo"][$i]; ?>')">
			</td>		
		</tr>
		<? } ?>						
	</tbody>
</table>