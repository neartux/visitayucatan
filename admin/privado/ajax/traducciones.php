<!--<script src="scripts/uploadifyhtml/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadifyhtml/uploadifive.css">-->

<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idiomas = idiomas();
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Menu</span></li>
		<li class="estancias" onclick="cargaPanel('estancias')"><span>Varios</span></li>
	</ul>
</div>



<div id="reload">	
	<div id="informacion" class="panelInfo">
		<form name="frmTraducciones" id="frmTraducciones">
		<button type="button" class="agregarAlgo btnSaveTraducciones" onclick="guardaTraducciones()">GUARDAR</button>
		<div class="cajaIdioma">
			<h2>Español</h2>			
			<input type="text" name="inicio0" value="Inicio" disabled="disabled"  />
			<input type="text" name="paquetes0" value="Paquetes" disabled="disabled"  />
			<input type="text" name="tours0" value="Tours" disabled="disabled"  />
			<input type="text" name="hoteles0" value="Hoteles" disabled="disabled"  />
			<input type="text" name="peninsula0" value="La Peninsula" disabled="disabled"  />
			<input type="text" name="contacto0" value="Contacto" disabled="disabled"  />			
		</div>
		
		<? for($i=1; $idiomas["ididioma"][$i]; $i++){
		   $inicio = menuIdioma("1", $idiomas["ididioma"][$i]);
		   $paquetes = menuIdioma("2", $idiomas["ididioma"][$i]);
		   $tours = menuIdioma("3", $idiomas["ididioma"][$i]);
		   $hoteles = menuIdioma("4", $idiomas["ididioma"][$i]);
		   $peninsula = menuIdioma("5", $idiomas["ididioma"][$i]);
		   $contacto = menuIdioma("6", $idiomas["ididioma"][$i]);		
		?>
		<div class="cajaIdioma">
			<h2><? echo $idiomas["idioma"][$i]; ?></h2>			
			<input type="hidden" name="ididioma[]" value="<? echo $idiomas["ididioma"][$i]; ?>"  />						
			<input type="text" name="inicio[]" value="<? echo $inicio; ?>"  />
			<input type="text" name="paquetes[]" value="<? echo $paquetes; ?>" />
			<input type="text" name="tours[]" value="<? echo $tours; ?>" />
			<input type="text" name="hoteles[]" value="<? echo $hoteles; ?>" />
			<input type="text" name="peninsula[]" value="<? echo $peninsula; ?>" />
			<input type="text" name="contacto[]" value="<? echo $contacto; ?>" />			
		</div>
		<? } ?>
		</form>
	</div>	
		
	<div id="estancias" class="panelInfo oculto scrollear">		
		<form name="frmDiccionario" id="frmDiccionario">
		<button type="button" class="agregarAlgo btnSaveTraducciones" onclick="guardaDiccionario()">GUARDAR</button>
		<div class="cajaDiccionario primerdiccionario">
			<h2>Español</h2>			
			<input type="text" disabled="disabled" value="Aerolínea" />
			<input type="text" disabled="disabled" value="Adultos" />
			<input type="text" disabled="disabled" value="Aviso de privacidad" />
			<input type="text" disabled="disabled" value="Ayuda" />
			<input type="text" disabled="disabled" value="Busca tu aventura" />
			<input type="text" disabled="disabled" value="Ciudad de origen" />
			<input type="text" disabled="disabled" value="Comentarios" />
			<input type="text" disabled="disabled" value="Contacto" />
			<input type="text" disabled="disabled" value="Correo" />			
			<input type="text" disabled="disabled" value="Cuadruple" />
			<input type="text" disabled="disabled" value="Descripción" />
			<input type="text" disabled="disabled" value="Desde" />
			<input type="text" disabled="disabled" value="Días" />
			<input type="text" disabled="disabled" value="Doble" />
			<input type="text" disabled="disabled" value="Enviar" />
			<input type="text" disabled="disabled" value="Escoge tu paquete" />
			<input type="text" disabled="disabled" value="Estadía" />
			<input type="text" disabled="disabled" value="Estamos para ayudarte" />
			<input type="text" disabled="disabled" value="FAQS" />
			<input type="text" disabled="disabled" value="Fecha del tour" />
			<input type="text" disabled="disabled" value="Fecha de salida" />
			<input type="text" disabled="disabled" value="Fecha llegada" />					
			<input type="text" disabled="disabled" value="Habitacion" />
			<input type="text" disabled="disabled" value="Hotel" />			
			<input type="text" disabled="disabled" value="Hora llegada" />
			<input type="text" disabled="disabled" value="Hotel seleccionado" />
			<input type="text" disabled="disabled" value="Idioma" />
			<input type="text" disabled="disabled" value="Importe" />
			<input type="text" disabled="disabled" value="impuestos incluidos" />
			<input type="text" disabled="disabled" value="Lada" />
			<input type="text" disabled="disabled" value="Llegada" />
			<input type="text" disabled="disabled" value="Más información" />
			<input type="text" disabled="disabled" value="Menores" />
			<input type="text" disabled="disabled" value="Menu" />			
			<input type="text" disabled="disabled" value="Moneda" />
			<input type="text" disabled="disabled" value="Noches" />
			<input type="text" disabled="disabled" value="Nombre" />
			<input type="text" disabled="disabled" value="Número de vuelo" />
			<input type="text" disabled="disabled" value="Otros tours" />
			<input type="text" disabled="disabled" value="Paquete seleccionado" />			
			<input type="text" disabled="disabled" value="Paquetes similares" />		
			<input type="text" disabled="disabled" value="Políticas de cancelación" />
			<input type="text" disabled="disabled" value="Precio por menor" />
			<input type="text" disabled="disabled" value="Precio por persona" />
			<input type="text" disabled="disabled" value="Preparemos su reservación" />
			<input type="text" disabled="disabled" value="Reserva ahora" />
			<input type="text" disabled="disabled" value="Recomendaciones generales" />
			<input type="text" disabled="disabled" value="Salida" />
			<input type="text" disabled="disabled" value="Seleccione la fecha para su paquete" />
			<input type="text" disabled="disabled" value="Sencilla" />
			<input type="text" disabled="disabled" value="Servicio al cliente" />
			<input type="text" disabled="disabled" value="Social" />			
			<input type="text" disabled="disabled" value="Tarifa por adulto en ocupación" />
			<input type="text" disabled="disabled" value="Teléfono" />
			<input type="text" disabled="disabled" value="Tipo de habitación" />
			<input type="text" disabled="disabled" value="Tipo de plan" />			
			<input type="text" disabled="disabled" value="Triple" />	
			<input type="text" disabled="disabled" value="Transportación saliendo de" />
			<input type="text" disabled="disabled" value="y" />
		</div>	
		
		
			<? for($i=1; $idiomas["ididioma"][$i]; $i++){
			   $elidioma = $idiomas["ididioma"][$i];
			   $inicio = menuIdioma("1", $idiomas["ididioma"][$i]);
			   $paquetes = menuIdioma("2", $idiomas["ididioma"][$i]);
			   $tours = menuIdioma("3", $idiomas["ididioma"][$i]);
			   $hoteles = menuIdioma("4", $idiomas["ididioma"][$i]);
			   $peninsula = menuIdioma("5", $idiomas["ididioma"][$i]);
			   $contacto = menuIdioma("6", $idiomas["ididioma"][$i]);		
			?>
			<div class="cajaDiccionario">			
				<h2><? echo $idiomas["idioma"][$i]; ?></h2>
				<input type="hidden" name="elididioma[]" value="<? echo $elidioma; ?>" />
				<input type="text" name="aerolinea[]" value="<? echo diccionario("1", $elidioma); ?>" />
				<input type="text" name="adultos[]" value="<? echo diccionario("54", $elidioma); ?>" />
				<input type="text" name="privacidad[]" value="<? echo diccionario("2", $elidioma); ?>" />
				<input type="text" name="ayuda[]" value="<? echo diccionario("3", $elidioma); ?>" />
				<input type="text" name="aventura[]" value="<? echo diccionario("4", $elidioma); ?>" />
				<input type="text" name="origen[]" value="<? echo diccionario("5", $elidioma); ?>" />
				<input type="text" name="comentarios[]" value="<? echo diccionario("6", $elidioma); ?>" />
				<input type="text" name="contacto[]" value="<? echo diccionario("55", $elidioma); ?>" />
				<input type="text" name="correo[]" value="<? echo diccionario("7", $elidioma); ?>" />			
				<input type="text" name="cuadruple[]" value="<? echo diccionario("8", $elidioma); ?>" />
				<input type="text" name="descripcion[]" value="<? echo diccionario("9", $elidioma); ?>" />
				<input type="text" name="desde[]" value="<? echo diccionario("10", $elidioma); ?>" />
				<input type="text" name="dias[]" value="<? echo diccionario("11", $elidioma); ?>" />
				<input type="text" name="doble[]" value="<? echo diccionario("12", $elidioma); ?>" />
				<input type="text" name="enviar[]" value="<? echo diccionario("13", $elidioma); ?>" />
				<input type="text" name="escoge[]" value="<? echo diccionario("14", $elidioma); ?>" />
				<input type="text" name="estadia[]" value="<? echo diccionario("15", $elidioma); ?>" />
				<input type="text" name="ayudarte[]" value="<? echo diccionario("16", $elidioma); ?>" />
				<input type="text" name="faqs[]" value="<? echo diccionario("17", $elidioma); ?>" />
				<input type="text" name="fechatour[]" value="<? echo diccionario("58", $elidioma); ?>" />
				<input type="text" name="salida[]" value="<? echo diccionario("18", $elidioma); ?>" />
				<input type="text" name="llegada[]" value="<? echo diccionario("19", $elidioma); ?>" />					
				<input type="text" name="habitacion[]" value="<? echo diccionario("20", $elidioma); ?>" />
				<input type="text" name="hotel[]" value="<? echo diccionario("21", $elidioma); ?>" />			
				<input type="text" name="llegadab[]" value="<? echo diccionario("22", $elidioma); ?>" />
				<input type="text" name="hotelseleccionado[]" value="<? echo diccionario("53", $elidioma); ?>" />
				<input type="text" name="idioma[]"value="<? echo diccionario("23", $elidioma); ?>" />
				<input type="text" name="importe[]" value="<? echo diccionario("24", $elidioma); ?>" />
				<input type="text" name="impuestos[]" value="<? echo diccionario("25", $elidioma); ?>" />
				<input type="text" name="lada[]" value="<? echo diccionario("26", $elidioma); ?>" />
				<input type="text" name="llegadac[]" value="<? echo diccionario("27", $elidioma); ?>" />
				<input type="text" name="masinfo[]" value="<? echo diccionario("56", $elidioma); ?>" />
				<input type="text" name="menores[]" value="<? echo diccionario("28", $elidioma); ?>" />
				<input type="text" name="menu[]" value="<? echo diccionario("29", $elidioma); ?>" />				
				<input type="text" name="moneda[]" value="<? echo diccionario("30", $elidioma); ?>" />
				<input type="text" name="noches[]" value="<? echo diccionario("31", $elidioma); ?>" />
				<input type="text" name="nombre[]" value="<? echo diccionario("32", $elidioma); ?>" />
				<input type="text" name="novuelo[]" value="<? echo diccionario("33", $elidioma); ?>" />
				<input type="text" name="otrostours[]" value="<? echo diccionario("34", $elidioma); ?>" />
				<input type="text" name="paqueteseleccionado[]" value="<? echo diccionario("35", $elidioma); ?>" />			
				<input type="text" name="paquetesimilares[]" value="<? echo diccionario("36", $elidioma); ?>" />		
				<input type="text" name="cancelacion[]" value="<? echo diccionario("37", $elidioma); ?>" />
				<input type="text" name="preciomenor[]" value="<? echo diccionario("38", $elidioma); ?>" />
				<input type="text" name="porpersona[]" value="<? echo diccionario("59", $elidioma); ?>" />	
				<input type="text" name="preparemos[]" value="<? echo diccionario("39", $elidioma); ?>" />
				<input type="text" name="reservaahora[]"value="<? echo diccionario("40", $elidioma); ?>" />
				<input type="text" name="recomendaciones[]" value="<? echo diccionario("41", $elidioma); ?>" />
				<input type="text" name="salidab[]" value="<? echo diccionario("42", $elidioma); ?>" />
				<input type="text" name="fechapaquete[]" value="<? echo diccionario("43", $elidioma); ?>" />
				<input type="text" name="sencilla[]" value="<? echo diccionario("44", $elidioma); ?>" />
				<input type="text" name="servicio[]" value="<? echo diccionario("45", $elidioma); ?>" />
				<input type="text" name="social[]" value="<? echo diccionario("46", $elidioma); ?>" />			
				<input type="text" name="tarifaporadulto[]" value="<? echo diccionario("47", $elidioma); ?>" />
				<input type="text" name="telefono[]" value="<? echo diccionario("48", $elidioma); ?>" />
				<input type="text" name="tipohabitacion[]" value="<? echo diccionario("49", $elidioma); ?>" />
				<input type="text" name="tipodeplan[]" value="<? echo diccionario("57", $elidioma); ?>" />			
				<input type="text" name="triple[]" value="<? echo diccionario("50", $elidioma); ?>" />	
				<input type="text" name="transportacion[]" value="<? echo diccionario("51", $elidioma); ?>" />
				<input type="text" name="letra[]" value="<? echo diccionario("52", $elidioma); ?>" />						
				
			</div>		
			<? } ?>
		</form>		
	</div>
</div>
