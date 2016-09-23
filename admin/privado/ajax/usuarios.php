<? 
	include("../scripts/consultas.php");
	$usuarios = usuarios();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarUsuario('248', '296', '0', '0')">AGREGAR USUARIO</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Email/Usuario</td>
			<td>Nivel</td>			
			<td>Estatus</td>
			<td>Opciones</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $usuarios["idusuario"][$i]; $i++){ $ib = $i+1; ?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $usuarios["nombre"][$i]; ?></td>
			<td><? echo $usuarios["apellido"][$i]; ?></td>
			<td><? echo $usuarios["email"][$i]; ?></td>
			<td><? echo $usuarios["nivel"][$i]; ?></td>			
			<td><img src="imagenes/<? echo $usuarios["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarUsuario('248', '296', '1', '<? echo $usuarios["idusuario"][$i]; ?>')" />
				<img class="icon" src="imagenes/eliminar.png" onclick="eliminaUsuario('<? echo $usuarios["idusuario"][$i]; ?>')" />
			</td>	
		</tr>
		<? } ?>						
	</tbody>
</table>