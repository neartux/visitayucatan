<? 
	include("../scripts/consultas.php");
	$tours = tours();
?>

<div id="botones">
	<button type="button" class="agregarAlgo" onclick="agregarTour('248', '296', '0', '0')">AGREGAR TOUR</button>
</div>

<table cellpadding="0" cellspacing="0" id="tablaRegistros">
	<thead>
		<tr>
			<td>#</td>
			<td>Nombre del tour</td>
			<td>Tarifa Adulto</td>
			<td>Tarifa Menor</td>
			<td>Visitas</td>
			<td>Vendidos</td>
                        <td>Min. Personas</td>
			<td>Circuito</td>
			<td>Estatus</td>
			<td>Opciones</td>
			<td>Promover</td>
		</tr>
	</thead>
	<tbody>
		<? for($i=0; $tours["idtour"][$i]; $i++){ $ib = $i+1;
		$st = $tours["estatus"][$i];
		   if($tours["estatus"][$i]=='paloma.png' and $tours["promovido"][$i] == 1){
		   	 $promovido = 1;
		   }else{
		   	 $promovido = 0;
		   }
		?>
		<tr>
			<td><? echo $ib; ?></td>
			<td><? echo $tours["nombre"][$i]; ?></td>
			<td><? echo "$ ".$tours["tadulto"][$i]." MN"; ?></td>
			<td><? echo "$ ".$tours["tmenor"][$i]." MN"; ?></td>
			<td><? echo $tours["visitas"][$i]; ?></td>
			<td><? echo $tours["vendidos"][$i]; ?></td>
                        <td><? echo $tours["minimopersonas"][$i] ?></td>
			<td><? echo $tours["circuito"][$i]; ?></td>
			<td><img src="imagenes/<? echo $tours["estatus"][$i]; ?>" /></td>
			<td>
				<img class="icon" src="imagenes/edit-clientes.png"  onclick="agregarTour('248', '296', '1', '<? echo $tours["idtour"][$i]; ?>')" />
				<img class="icon" src="imagenes/eliminar.png" onclick="deleteTour('<? echo $tours["idtour"][$i]; ?>')" />
				<img class="icon" src="imagenes/avanzadas.png" onclick="descripcionesTours('<? echo $tours["idtour"][$i]; ?>')" />
			</td>
			<td class="textcenter"><input  <? if($st == 'tacha.png'){ ?> disabled="disabled" <? } ?> type="checkbox" onchange="promovertour(this, '<? echo $tours["idtour"][$i]; ?>')" <? if($promovido == 1){ ?> checked="checked" <? } ?> class="cajapromocionar" value="<? echo $tours["idtour"][$i]; ?>" /></td>
		</tr>
		<? } ?>						
	</tbody>
</table>