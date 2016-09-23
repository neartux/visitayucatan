<? 
	include("../scripts/consultas.php");	
	$idiomas = idiomas();
?>

<div id="informacion" class="panelInfo scrollear">
	<div id="menuLeft">
		<ul>
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
				<li id="b_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="idiomaActivo" <? } ?> onclick="descripcionesIdioma('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
					<span><? echo $idiomas["idioma"][$i]; ?></span>
				</li>
			<? } ?>
		</ul>
	</div>			

	<? for($i=0; $idiomas["ididioma"][$i]; $i++){ 
	   $tags = buscarTags("", $idiomas["ididioma"][$i]);
		?>
		<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
			
		<div id="botones">
			<button type="button" class="agregarAlgo" onclick="agregarTag('248', '108', '0', '0', '<? echo $idiomas["ididioma"][$i]; ?>')">AGREGAR TAG</button>
		</div>				
			
		<table cellpadding="0" cellspacing="0" id="tablaRegistros">
			<thead>
				<tr>
					<td>#</td>
					<td>Tag</td>
					<td>Idioma</td>
					<td>Opciones</td>
				</tr>
			</thead>
			<tbody>
				<? for($t=0; $tags["idtag"][$t]; $t++){ $num = $t+1; ?>
					<tr id="fila_<? echo $tags["idtag"][$t]; ?>">
						<td><? echo $num; ?></td>
						<td><? echo $tags["tag"][$t]; ?></td>
						<td><? echo $idiomas["idioma"][$i]; ?></td>
						<td>
							<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarTag('248', '108', '1', '<? echo $tags["idtag"][$t]; ?>', '<? echo $idiomas["ididioma"][$i]; ?>')">
							<img class="icon" src="imagenes/eliminar.png" onclick="eliminaTag('<? echo $tags["idtag"][$t]; ?>', '<? echo $tags["tag"][$t]; ?>')">
						</td>
					</tr>
				<? } ?>
			</tbody>
		</table>
		</div>	
	<? } ?>	
	
	

	

</div>