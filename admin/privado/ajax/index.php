<? 
	include("../scripts/sesiones.php");
	include($_SERVER['DOCUMENT_ROOT']."/admin/privado/scripts/consultas.php");
	$pagina = $_REQUEST["pagina"];
	if($pagina >= 1){
		$pagina = $pagina;
	}else{
		$pagina = 0;
	}
	$tampagina = 10;
	$inicia = ($pagina - 1 ) * $tampagina;	
	if($inicia < 0){
		$inicia = 0;
	}
	$reservas = reservacionesLista(0, $inicia, $tampagina);	
?>

	<table cellpadding="0" cellspacing="0" id="tablaRegistros" class="tablaReservas">
		<thead>
			<tr>
				<td>Reserva</td>
				<td>Tipo de<br /> Reserva</td>
				<td>Nombre</td>
				<td>Teléfono</td>
				<td>Correo</td>
				<td>Checkin</td>
				<td>Checkout</td>
				<td>Paquete/Tour/Hotel</td>
				<td>Adultos</td>
				<td>Menores</td>
				<td>Hotel</td>
				<td>Transp</td>
				<td>Importe</td>							
				<td>Pagado</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody>
			<? for($i=0; $reservas["idreserva"][$i]; $i++){ 
			   $tiporeserva = $reservas["idtiporeserva"][$i];
			   $idvinculo = $reservas["idvinculo"][$i];
			   $importe = uncodedbmx($reservas["importe"][$i]);
			   $moneda = detMoneda($reservas["moneda"][$i]);	
			   if($tiporeserva == 1){
			   	//Consulto cosas de paquetes
			   	$tipo="Paquete";
			   	$detalle = paqueteReserva($idvinculo);
			   }
			   if($tiporeserva == 2){
			   	$tipo = "Tour";
				$detalle = paqueteTour($idvinculo);
			   }
			   if($tiporeserva == 3){
			   	$tipo = "Hotel";
				$detalle = paqueteHoteles($idvinculo);
			   }						   
			?>
			<tr id="fila_<? echo $reservas["idreserva"][$i]; ?>">
				<td><? echo $reservas["idreserva"][$i]; ?></td>
				<td><? echo $tipo; ?></td>
				<td><? echo $reservas["nombre"][$i]; ?></td>
				<td><? echo $reservas["lada"][$i]."-".$reservas["telefono"][$i]; ?></td>
				<td><? echo $reservas["email"][$i]; ?></td>
				<td><? echo $reservas["checkin"][$i]; ?></td>
				<td><? echo $reservas["checkout"][$i]; ?></td>
				<td><? echo $detalle["nombre"][0] ?></td>
				<td><? echo $reservas["adultos"][$i]; ?></td>
				<td><? echo $reservas["menores"][$i]; ?></td>
				<? if($tiporeserva == 3){ ?>
					<td><? echo $detalle["nombre"][0]; ?></td>
				<? }else{ ?>
					<td><? echo $reservas["hotelpickup"][$i]; ?></td>
				<? } ?>
				<td>
					<? if($reservas["vuelo"][$i] != ""){ ?>
						<img src="imagenes/paloma.png">
					<? }else { ?>
						<img src="imagenes/tacha.png">
					<? } ?>
				</td>
				<td><? echo $importe; ?> (<?echo  $moneda["simbolo"][0] ?>)</td>			
				<td>
					<? if($reservas["pagado"][$i]==1){ ?>
						<img src="imagenes/paloma.png">
					<? }else { ?>
						<img src="imagenes/tacha.png">
					<? } ?>
				</td>
				<td>
					<!--<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarPaquete('248', '212', '1', '<? echo $paquetes["idpaquete"][$i]; ?>')" />-->								
					<img class="icon" src="imagenes/avanzadas.png" onclick="detalleReserva('<? echo $reservas["idreserva"][$i]; ?>')" />
					<img class="icon" src="imagenes/eliminar.png" onclick="deleteReserva('<? echo $reservas["idreserva"][$i]; ?>')">
				</td>			
			</tr>
			<? } ?>
									
		</tbody>
	</table>	
	
				<div id="paginacion">
					<?
						$reservaciones = todaslasreservas();						
						$paginas = ceil($reservaciones/$tampagina);
						$pagina = $_GET["pagina"]; 
												
						for($p=$paginas; $p>=1; $p--){
					?>
						<span class="pagina <? if($p== $pagina){ echo "activa"; } ?>" onclick="cargaPagina('ajax', 'index', 'loader', 'pagina=<? echo $p; ?>', '1', '1', '1');"><span><? echo $p; ?></span></span>
					<? } ?>					
				</div>	