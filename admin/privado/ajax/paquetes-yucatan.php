<? 
	include("../scripts/consultas.php");
	$paquetes = paquetes();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarPaquete('248', '212', '0', '0')">AGREGAR PAQUETE</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre del paquete</td>
			<td>Circuito</td>
			<td>Descripción</td>
			<td>Vendidos</td>
			<td>Visitas</td>
			<td>Estatus</td>
			<td>Opciones</td>
			<td>Promover</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $paquetes["idpaquete"][$i]; $i++){ $ib = $i+1; 
			$st = $paquetes["estatus"][$i];
			   if($paquetes["estatus"][$i]=='paloma.png' and $paquetes["promovido"][$i] == 1){
			   	 $promovido = 1;
			   }else{
			   	 $promovido = 0;
			   }			
		?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $paquetes["nombre"][$i]; ?></td>
			<td><? echo $paquetes["circuito"][$i]; ?></td>
			<td><? echo cortarTexto($paquetes["descripcion"][$i]); ?></td>
			<td><? echo $paquetes["vendidos"][$i]; ?></td>
			<td><? echo $paquetes["visitas"][$i]; ?></td>
			<td><img src="imagenes/<? echo $paquetes["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarPaquete('248', '212', '1', '<? echo $paquetes["idpaquete"][$i]; ?>')" />
				<img class="icon" src="imagenes/eliminar.png" onclick="deletePaquete('<? echo $paquetes["idpaquete"][$i]; ?>')" />
				<img class="icon" src="imagenes/avanzadas.png" onclick="descripcionesPaquete('<? echo $paquetes["idpaquete"][$i]; ?>')" />
			</td>	
			<td class="textcenter"><input  <? if($st == 'tacha.png'){ ?> disabled="disabled" <? } ?> type="checkbox" onchange="promoverpaquete(this, '<? echo $paquetes["idpaquete"][$i]; ?>')" <? if($promovido == 1){ ?> checked="checked" <? } ?> class="cajapromocionar" value="<? echo $paquetes["idpaquete"][$i]; ?>" /></td>		
		</tr>
		<? } ?>						
	</tbody>
</table>