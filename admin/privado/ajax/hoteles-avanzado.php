<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idhotel = $_REQUEST["idhotel"];
$hotel = detHotel($idhotel);
$contactos = contactosHotel($idhotel);
$cierres = cierreHoteles($idhotel);
$imagenes = imagenesHotel($idhotel);
$idiomas = idiomas();
$contratos = contratos($idhotel);
$planes = planes();
$habitaciones = habitaciones($idhotel);
$destinos = destinos();
?>
<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Información</span></li>
		<li class="fotos" onclick="cargaPanel('fotos')"><span>Fotografías</span></li>		
		<li class="itinerarios" onclick="cargaPanel('itinerarios')"><span>Fechas de cierre</span></li>
		<li class="descripciones" onclick="cargaPanel('descripciones')"><span>Descripciones</span></li>
		<li class="contratos" onclick="cargaPanel('contratos')"><span>Contratos</span></li>
		<li class="habitaciones" onclick="cargaPanel('habitaciones')"><span>Habitaciones</span></li>
		<li class="deshabitaciones" onclick="cargaPanel('deshabitaciones')"><span>Descripciones Hab.</span></li>
		<li class="tarifas" onclick="cargaPanel('tarifas')"><span>Tarifas</span></li>
		<!--<li class="generales" onclick="cargaPanel('generales')"><span>Generales</span></li>-->		
	</ul>
</div>

<div id="reload" class="scroll-x">
	<div id="informacion" class="panelInfo scrollear cajainfotel">
		<button type="button" class="agregarAlgo guardaInfotel" onclick="guardarInfoHotel()">GUARDAR</button>
		
		<form id="frmInfoHotel" name="frmInfoHotel" class="formulario">
			<input type="hidden" id="idhotel" name="idhotel" value="<? echo $idhotel; ?>" />
			<label>Nombre del hotel</label>
			<input type="text" id="nombrehotel" name="nombrehotel" value="<? echo $hotel["hotel"][0]; ?>" />
			
			<label>Destino</label>
			<select name="iddestino" id="iddestino" class="validar">
				<option value="0">Seleccione una opción</option>
				<? for($i=0; $destinos["iddestino"][$i]; $i++){ ?>
					<option value="<? echo $destinos["iddestino"][$i]; ?>" <? if($destinos["iddestino"][$i] == $hotel["iddestino"][0]){ ?>selected="selected" <? } ?>>
						<? echo $destinos["destino"][$i]; ?>
					</option>
				<? } ?>
			</select>			
			
			<label>Dirección</label>
			<textarea name="direccion" id="direccion"><? echo $hotel["direccion"][0]; ?></textarea>
			
			<label>Teléfono</label>
			<input type="number" maxlength="10" name="telefono" id="telefono" value="<? echo $hotel["telefono"][0]; ?>" />
			
			<label>Estatus</label>
			<select name="estatus" id="estatus">
				<option value="0" <? if($hotel["idestatus"][0] == 0){ ?> selected="selected" <? } ?>>Inactivo</option>
				<option value="1" <? if($hotel["idestatus"][0] == 1){ ?> selected="selected" <? } ?>>Activo</option>
			</select>
			
			<label>Correos electrónicos de contacto</label>
			<button type="button" id="addCorreo" onclick="addContactoHotel()">Agregar Contacto</button>
			<div id="contenedorCorreos">
				<? for($i=0; $contactos["idcontacto"][$i]; $i++){ ?>
				<div class="filaCorreos">
					<label>Nombre: </label><input type="text" name="nombreContacto[]" value="<? echo $contactos["nombre"][$i]; ?>" />
					<label>Correo: </label><input type="text" name="correoContacto[]" value="<? echo $contactos["correo"][$i]; ?>" />
					<img class="icon" src="imagenes/eliminar.png" onclick="deleteContactoHotel(this)">
				</div>
				<? } ?>
			</div>
		</form>		
	</div>

	<div id="fotos" class="panelInfo oculto">
		<div id="uploadfoto">
			<form>
				<div id="queue"></div>
				<input id="file_upload" name="file_upload" type="file" multiple="true">	
			</form>	
		</div>
		
		<? for($i=0; $imagenes["idimagen"][$i]; $i++){ ?>
			<div class="portafotos" id="objectFile_<? echo $imagenes["idimagen"][$i]; ?>">
				<div class="deleteImg" onclick="deleteImgHotel('<? echo $imagenes["idimagen"][$i]; ?>')"></div>
				<img id="imgBanner" src="../../imagenes/hoteles/<? echo $imagenes["imagen"][$i]; ?>">
			</div>			
		<? } ?>		
	</div>
	
	<div id="itinerarios" class="panelInfo oculto">
		<div class="addfechacierre" id="botones"><button type="button" class="agregarAlgo" onclick="agregarFechaCierre('248', '150', '0', '0', '<? echo $idhotel; ?>')">AGREGAR FECHA DE CIERRE</button></div>
		<table cellpadding="0" cellspacing="0" id="tablaRegistros">
			<thead>
				<tr>
					<td>#</td>
					<td>Fecha inicial</td>
					<td>Fecha final</td>					
					<td>Opciones</td>
				</tr>
			</thead>
			<tbody>
				<? for($c=0; $cierres["idcierre"][$c]; $c++){ $n= $c+1; ?>
				<tr id="filita_<? echo $n; ?>">
					<td><? echo $n; ?></td>
					<td><? echo $cierres["finicio"][$c]; ?></td>
					<td><? echo $cierres["ffinal"][$c]; ?></td>
					<td>
						<img class="icon" src="imagenes/edit-clientes.png" onclick="agregarFechaCierre('248', '150', '1', '<? echo $cierres["idcierre"][$c]; ?>', '<? echo $idhotel; ?>')">
						<img class="icon" src="imagenes/eliminar.png" onclick="deletefechacierre('<? echo $cierres["idcierre"][$c]; ?>', <? echo $n; ?>)">
					</td>
				</tr>					
				<? } ?>
			</tbody>
		</table>		
	</div>
	
	<div id="descripciones" class="panelInfo oculto">
		<div id="menuLeft">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="b_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="idiomaActivo" <? } ?> onclick="descripcionesIdioma('<? echo "idioma_".$idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>	
		
		<div class="menuContenido scrollmanual">			
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){
			   $paquete = paquetes($idiomas["ididioma"][$i], $idpaquete);
			   $hoteld = hotelesdet($idiomas["ididioma"][$i], $idhotel);
			?>
				
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				  <form name="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>" id="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>">
				  	<input type="hidden" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" />
				  	<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />				  	
					<input type="hidden" name="idregistro" id="idregistro" value="<? echo $hoteld["idregistro"][0]; ?>" />
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2>
					
					<label class="lbltop">Descripción</label>
					<textarea name="desclarga" id="desclarga_<? echo $idiomas["ididioma"][$i]; ?>" class="mceEditor"><? echo $hoteld["descripcion"][0]; ?></textarea>
					
					<div class="flotis"></div>
				  </form>
				  <button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionHotel('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				</div>				
			<? } ?>
		</div>			
	</div>
	<div id="contratos" class="panelInfo oculto">		
		<div id="addcontrato">
			<? for($i=0; $contratos["idcontrato"][$i]; $i++){ ?>
				<button type="button" class="listcontrato <? if($i==0){ ?> currentcontrato <? } ?>" id="contrato_<? echo $contratos["idcontrato"][$i]; ?>" onclick="showcontrato('<? echo $contratos["idcontrato"][$i]; ?>')"><? echo $contratos["nombre"][$i]; ?></button>
			<? } ?>			
			<button type="button" id="btnaddcontrato" onclick="showcontrato('0')">Agregar nuevo contrato</button>
		</div>
		
		<? for($i=0; $contratos["idcontrato"][$i]; $i++){ ?>
			<div id="resumencontrato_<? echo $contratos["idcontrato"][$i]; ?>" class="ocultarcontrato <? if($i==0){ ?> contratoactivo <? } ?>">
				<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardarcontrato('<? echo $contratos["idcontrato"][$i]; ?>')">GUARDAR</button>
				<form id="formacontrato_<? echo $contratos["idcontrato"][$i]; ?>" name="formacontrato_<? echo $contratos["idcontrato"][$i]; ?>">				
				<div class="containerform">
					<input type="hidden" name="idcontrato" id="idcontrato" value="<? echo $contratos["idcontrato"][$i]; ?>" >
					<input type="hidden" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" >
					<label>Nombre del contrato:</label>
					<input type="text" name="ncontrato" id="ncontrato" value="<? echo $contratos["nombre"][$i]; ?>" />
					
					<label>Estatus</label>
					<select name="estatuscontrato" id="estatuscontrato">						
						<option value="0" <? if($contratos["estatus"][$i] == 0){ ?>selected="selected" <? } ?> >Inactivo</option>
						<option value="1" <? if($contratos["estatus"][$i] == 1){ ?>selected="selected" <? } ?>>Activo</option>
					</select>
					
					<label>Fecha inicial</label>
					<input type="text" name="fechainicial" id="fechainicial" class="inpfechai" value="<? echo $contratos["fechai"][$i]; ?>" />
					
					<label>Fecha final</label>
					<input type="text" name="fechafinal" id="fechafinal" class="inpfechaf" value="<? echo $contratos["fechaf"][$i]; ?>" />
					
					<label>Plan de alimentos</label>
					<select name="planalimentos" id="planalimentos">
						<option>Seleccione una opción</option>
						<? for($p=0; $planes["idplan"][$p]; $p++){ ?>
							<option value="<? echo $planes["idplan"][$p]; ?>" <? if($contratos["idplan"][$i] == $planes["idplan"][$p]){ ?>selected="selected" <? } ?>>
								<? echo $planes["plan"][$p]; ?>
							</option>
						<? } ?>
					</select>				
					
					<label>Edad máxima del menor</label>
					<input type="text" name="edadmenor" id="edadmenor" value="<? echo $contratos["edadmenor"][$i]; ?>" />
						
				</div>
				
				<div class="containerform">
					<label>ISH (%)</label>
					<input type="text" name="ish" id="ish" onkeypress="return isNumberKey(event)" value="<? echo $contratos["ish"][$i]; ?>" />					
					
					<label>Markup</label>
					<input type="text" name="markup" id="markup" onkeypress="return isNumberKey(event)" value="<? echo $contratos["markup"][$i]; ?>" />
					
					<label>Marcar si ya incluye impuestos</label>	
					<input type="checkbox" name="impuestos" id="impuestos" onkeypress="return isNumberKey(event)" value="1" <? if($contratos["impuestos"][$i] == 1){ ?> checked="checked" <? } ?> />
					
					<label>IVA</label>
					<input type="text" name="iva" id="iva" onkeypress="return isNumberKey(event)" value="<? echo $contratos["iva"][$i]; ?>" />
					
					<label>Resort Fee</label>
					<input type="text" name="fee" id="fee" onkeypress="return isNumberKey(event)" value="<? echo $contratos["fee"][$i]; ?>" />
				</div>
				</form>
			</div>
		<? } ?>
		<div id="agregarcontrato" class="ocultarcontrato">
				<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="agregarcontrato('<? echo $idhotel; ?>')">GUARDAR</button>
				<form id="frmnuevocontrato" name="frmnuevocontrato">				
				<div class="containerform">
					<input type="hidden" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" >
					<input type="hidden" name="accion" id="accion" value="1" >
					<label>Nombre del contrato:</label>
					<input type="text" name="ncontrato" id="ncontrato" value="" />
					
					<label>Estatus</label>
					<select name="estatuscontrato" id="estatuscontrato">						
						<option value="0">Inactivo</option>
						<option value="1" selected="selected">Activo</option>
					</select>
					
					<label>Fecha inicial</label>
					<input type="text" name="fechainicial" id="fechainicialb" class="inpfechaib" />
					
					<label>Fecha final</label>
					<input type="text" name="fechafinal" id="fechafinalb" class="inpfechafb" />
					
					<label>Plan de alimentos</label>
					<select name="planalimentos" id="planalimentos">
						<option selected="selected">Seleccione una opción</option>
						<? for($p=0; $planes["idplan"][$p]; $p++){ ?>
							<option value="<? echo $planes["idplan"][$p]; ?>" >
								<? echo $planes["plan"][$p]; ?>
							</option>
						<? } ?>
					</select>		
					
					<label>Edad máxima del menor</label>
					<input type="text" name="edadmenor" id="edadmenor" value="12" />								
				</div>
				
				<div class="containerform">
					<label>ISH (%)</label>
					<input type="text" name="ish" id="iva" onkeypress="return isNumberKey(event)" value="3" />					
					
					<label>Markup</label>
					<input type="text" name="markup" id="iva" onkeypress="return isNumberKey(event)"  />
					
					<label>Impuestos</label>	
					<input type="checkbox" id="impuestos" onkeypress="return isNumberKey(event)" name="impuestos" value="1" checked="checked" />
					
					<label>IVA</label>
					<input type="text" name="iva" id="iva" onkeypress="return isNumberKey(event)" value="16" />
					
					<label>Resort Fee</label>
					<input type="text" name="fee" id="iva" onkeypress="return isNumberKey(event)" value="0" />
				</div>
				</form>			
		</div>
	</div>
	<div id="deshabitaciones" class="panelInfo oculto">
		<div id="selectores">
			<div class="cajonselector">
				<label>Seleccione habitación</label>
				<select name="habitacajon" id="habitacajon" onchange="cargadeshahbitacion();">
					<option value="0">Seleccione una opción</option>
					<? for($i=0; $habitaciones["idhabitacion"][$i]; $i++){ ?>
						<option value="<? echo $habitaciones["idhabitacion"][$i];  ?>"><? echo $habitaciones["nombre"][$i];  ?></option>
					<? } ?>					
				</select>
			</div>

			<div class="cajonselector">
				<label>Seleccione Idioma</label>
				<select name="idiomacajon" id="idiomacajon" onchange="cargadeshahbitacion()">
					<option value="0">Seleccione una opción</option>
					<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
						<option value="<? echo $idiomas["ididioma"][$i]; ?>"><? echo $idiomas["idioma"][$i]; ?></option>
					<? } ?>					
				</select>
			</div>
		</div>
		
		<div id="ladescripcionhabitacion">
			
		</div>		
	</div>
	<div id="habitaciones" class="panelInfo oculto">
		<div id="addhabitacion">
			<? for($i=0; $habitaciones["idhabitacion"][$i]; $i++){ ?>
				<button type="button" class="listcontrato <? if($i==0){ echo 'currenthabitacion'; } ?>" id="habitacion_<? echo $habitaciones["idhabitacion"][$i];  ?>" onclick="showhabitacion('<? echo $habitaciones["idhabitacion"][$i];  ?>')"><? echo $habitaciones["nombre"][$i];  ?></button>
			<? } ?>						
			<button type="button" id="btnaddhabitacion" onclick="showhabitacion('0')">Agregar habitación</button>
		</div>

		<? for($i=0; $habitaciones["idhabitacion"][$i]; $i++){ ?>
			<div id="resumenhabitacion_<? echo $habitaciones["idhabitacion"][$i]; ?>" class="ocultarhabitacion <? if($i==0){ echo 'habitacionactiva'; } ?>">
				<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="editahabitacion('<? echo $habitaciones["idhabitacion"][$i]; ?>')">GUARDAR</button>
				<form id="frmhabitacion_<? echo $habitaciones["idhabitacion"][$i]; ?>" name="frmhabitacion_<? echo $habitaciones["idhabitacion"][$i]; ?>">
					<input type="hidden" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" />
					<input type="hidden" name="idhabitacion" id="idhabitacion" value="<? echo $habitaciones["idhabitacion"][$i]; ?>" />
					<input type="hidden" name="accion" id="accion" value="0" />
					<div class="containerform">
						<label>Nombre de la habitación</label>
						<input type="text" name="nhabitacion" id="nhabitacion" value="<? echo $habitaciones["nombre"][$i]; ?>" />
						
						<label>Base allotment</label>
						<input type="text" name="allotment" id="allotment" value="<? echo $habitaciones["allotment"][$i]; ?>" onkeypress="return isNumberKey(event)" />
						
						<!--<label>Descripcion</label>
						<textarea name="descripcionroom" id="descripcionroom_<? echo $habitaciones["idhabitacion"][$i]; ?>"><? echo $habitaciones["descripcion"][$i];  ?></textarea>-->
					</div>
					<div class="containerform">	
						<h2>Capacidades máximas</h2>
						<!--<label>Máximo infantes</label>
						<input type="text" name="infantes" id="infantes" onkeypress="return isNumberKey(event)" value="<? echo $habitaciones["maxinfantes"][$i];  ?>" />-->
						
						<label>Máximo menores</label>
						<input type="text" name="menores" id="menores" onkeypress="return isNumberKey(event)" value="<? echo $habitaciones["maxmenores"][$i];  ?>" />	
						
						<!--<label>Máximo juniors</label>
						<input type="text" name="juniors" id="juniors" onkeypress="return isNumberKey(event)" value="<? echo $habitaciones["maxjuniors"][$i];  ?>" />-->
						
						<label>Máximo adultos</label>
						<input type="text" name="adultos" id="adultos" onkeypress="return isNumberKey(event)" value="<? echo $habitaciones["maxadultos"][$i];  ?>" />
						
						<label>Capacidad máxima de la habitación</label>
						<input type="text" name="maxroom" id="maxroom" onkeypress="return isNumberKey(event)" value="<? echo $habitaciones["capmaxima"][$i];  ?>" />
					</div>
				</form>	
			</div>
		<? } ?>			
		<div id="agregarhabitacion" class="ocultarhabitacion">
				<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="agregarhabitacion('<? echo $idhotel; ?>')">GUARDAR</button>
				<form id="frmaddhabitacion" name="frmaddhabitacion">
				<input type="hidden" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" />				
				<input type="hidden" name="accion" id="accion" value="1" />
				<input type="hidden" name="idhabitacionnva" id="idhabitacionnva" />
				<div class="containerform">
					<label>Nombre de la habitación</label>
					<input type="text" name="nhabitacion" id="nhabitacion" />
						
					<label>Base allotment</label>
					<input type="text" name="allotment" id="allotment" />
					
					<label>Descripcion</label>
					<textarea name="descripcionroom" id="descripcionroom"></textarea>
				</div>
				<div class="containerform">	
					<h2>Capacidades máximas</h2>
					<!--<label>Máximo infantes</label>
					<input type="text" name="infantes" id="infantes" onkeypress="return isNumberKey(event)" />-->
						
					<label>Máximo menores</label>
					<input type="text" name="menores" id="menores" onkeypress="return isNumberKey(event)" />	
						
					<!--<label>Máximo juniors</label>
					<input type="text" name="juniors" id="juniors" onkeypress="return isNumberKey(event)" />-->
						
					<label>Máximo adultos</label>
					<input type="text" name="adultos" id="adultos" onkeypress="return isNumberKey(event)" />
						
					<label>Capacidad máxima de la habitación</label>
					<input type="text" name="maxroom" id="maxroom" onkeypress="return isNumberKey(event)" />
				</div>
			</form>				
		</div>
	</div>	
	
	
	
	<div id="tarifas" class="panelInfo oculto">
		<div id="addcontrato">
			<? for($i=0; $contratos["idcontrato"][$i]; $i++){ ?>
				<button type="button" class="listcontrato <? if($i==0){ ?>currenttarifa<? } ?>" id="tarifas_<? echo $contratos["idcontrato"][$i]; ?>" onclick="showtarifas('<? echo $contratos["idcontrato"][$i]; ?>')">
					<? echo $contratos["nombre"][$i]; ?>
				</button>	
			<? } ?>
		</div>
		
		<? for($i=0; $contratos["idcontrato"][$i]; $i++){ ?>
			<div id="resumentarifas_<? echo $contratos["idcontrato"][$i]; ?>" class="ocultartarifa <? if($i==0){ ?>tarifaactiva<? } ?>">
				<!-- -->
					<div id="roomstarifas">
						<? for($h=0; $habitaciones["idhabitacion"][$h]; $h++){ ?>
							<button type="button" class="listcontrato <? if($h==0){ echo "currentroomtarifa";} ?>" id="roomtarifas_<? echo $habitaciones["idhabitacion"][$h]; ?>" onclick="showroomtarifas('<? echo $habitaciones["idhabitacion"][$h]; ?>', '<? echo $contratos["idcontrato"][$i]; ?>')">
								<? echo $habitaciones["nombre"][$h]; ?>
							</button>
						<? } ?>				
					</div>
					<? for($h=0; $habitaciones["idhabitacion"][$h]; $h++){
					   $mesito = date('m');
					   $yearsito = date('Y');
					   $desde = $yearsito."-".$mesito."-1";
					   $hasta = $yearsito."-".$mesito."-31";	
					   $tarifas = tarifas($idhotel, $contratos["idcontrato"][$i], $habitaciones["idhabitacion"][$h], $desde, $hasta);
						
					?>
						<div id="resumenroomtarifas_<? echo $habitaciones["idhabitacion"][$h]; ?>" class="ocultarsubcajon <? if($h==0){ echo "roomtarifaactiva";} ?>">
							<!-- -->
								<div class="containerform mbottom">
									<h2>Búsqueda por fecha</h2>
									<form id="frmbuscatarifa_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>" name="frmbuscatarifa">
										<input type="hidden" name="action" value="1" id="action_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>" />
										<input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />
										<label>Desde: </label> <input type="text" name="desde" id="desde_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>" class="desdetarifa" />
										<label>Hasta: </label> <input type="text" name="hasta" id="hasta_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>" class="hastatarifa" />
									</form>
									<button type="button" class="agregarAlgo mleft clear" onclick="buscatarifas('<? echo $contratos["idcontrato"][$i]; ?>', '<? echo $habitaciones["idhabitacion"][$h]; ?>', '<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>')">Buscar</button>			
								</div>			
								<div id="modificatarifas" class="containerform mbottom">
									<h2 onclick="modificatarifas('<? echo $contratos["idcontrato"][$i]; ?>', '<? echo $habitaciones["idhabitacion"][$h]; ?>')" class="pointer">Modificar/Agregar tarifas</h2>
									<div class="cajon oculto">
										<form name="frmtarifa_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>" id="frmtarifa_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>">
											<input type="hidden" name="idhabitacion" value="<? echo $habitaciones["idhabitacion"][$h]; ?>" />
											<input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />
											<input type="hidden" name="idcontrato" value="<? echo $contratos["idcontrato"][$i]; ?>" />
											<label>Tarifa sencilla</label>
											<input type="text" name="tarifa" />
											
											<label>Tarifa doble</label>
											<input type="text" name="tdoble" />
											
											<label>Tarifa triple</label>
											<input type="text" name="ttriple" />

											<label>Tarifa cuádruple</label>
											<input type="text" name="tcuadruple" />																						
										</form>	
										<button type="button" class="agregarAlgo mleft clear" onclick="savetarifa('<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>')">Guardar</button>																	
									</div>
								</div>
								
								<table cellpadding="0" cellspacing="0" id="tablaRegistros" class="tablatarifas mtop">
								<thead>
									<tr> 
										<td>#</td>
										<td>Fecha</td>
										<td>T. Sencilla</td>					
										<td>T. Doble</td>
										<td>T. Triple</td>
										<td>T. Cuádruple</td>
									</tr>
								</thead>
								<tbody id="body_<? echo $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h]; ?>">
									<? for($t=0; $tarifas["idtarifa"][$t]; $t++){ $n = $t + 1; ?>
										<tr id="filita_1">
											<td><? echo $n; ?></td>
											<td><? echo $tarifas["fecha"][$t] ?></td>
											<td><? echo $tarifas["tarifa"][$t] ?></td>
											<td><? echo $tarifas["doble"][$t] ?></td>
											<td><? echo $tarifas["triple"][$t] ?></td>
											<td><? echo $tarifas["cuadruple"][$t] ?></td>
										</tr>
									<? } ?>		
								</tbody>
							 </table>							
							<!-- -->
						</div>
					<? } ?>																																		
				<!-- -->				
			</div>	
		<? } ?>		
								
				
	</div>
	<!--<div id="generales" class="panelInfo oculto">
		Generales (aun estamos subiendo archivos de programacion)
	</div>-->	
	</div>	
<!--</div>-->

	<script type="text/javascript">
		<?php 
		$random =  generateRandomString($length = 10);
		$timestamp = time();
		?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'prefijo' : '<? echo $random; ?>',
					'destino': '/imagenes/hoteles/',
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'scripts/uploadify/uploadify.swf',
				'uploader' : 'scripts/uploadify/uploadify.php',
				'buttonText' : 'Seleccione..',
		        'onUploadComplete' : function(file) {
		        	mensaje("La imgagen se ha subido correctamente, por favor espere, estamos agregando la imagen a la base de datos...")
		        	var archivo = '<? echo $random; ?>_'+file.name;		
		        	$.post("ajax-save/add-image-hotel.php", {hotel: '<? echo $idhotel; ?>', file: archivo}, function(e){		        		
		        		var html='<div class="portafotos" id="objectFile_'+e+'"><div class="deleteImg" onclick="deleteImgHotel('+e+')"></div><img id="imgBanner" src="../../imagenes/hoteles/'+archivo+'"></div>';
		        		$("#fotos").append(html);	
		        	});	        
		        }				
			});
		});
	</script>

<script>
	$(document).ready(function(){
		$(".inpfechai").datepicker({
			//minDate: 0,
			dateFormat: "yy-mm-dd",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    changeYear: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',
	   		onSelect: function(dateText) {
	             var Fecha = new Date(dateText);
	             var fecha = (Fecha.getDate()+1) + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear();
	             var fechanueva = fecha.split("/");
	             var fechab = fechanueva[2]+"-"+fechanueva[1]+"-"+fechanueva[0];
	            $(".inpfechai").datepicker( "option", "minDate", fechab);            
	         }	       		
		});
		$(".inpfechaf").datepicker({
			//minDate: 0,
			dateFormat: "yy-mm-dd",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    changeYear: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',	       		
		});	
		
		$(".inpfechaib").datepicker({
			minDate: 0,
			dateFormat: "yy-mm-dd",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    changeYear: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',
	   		onSelect: function(dateText) {
	             var Fecha = new Date(dateText);
	             var fecha = (Fecha.getDate()+1) + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear();
	             var fechanueva = fecha.split("/");
	             var fechab = fechanueva[2]+"-"+fechanueva[1]+"-"+fechanueva[0];
	           // $(".inpfechaib").datepicker( "option", "minDate", fechab);            
	         }	       		
		});
		$(".inpfechafb").datepicker({
			minDate: 0,
			dateFormat: "yy-mm-dd",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    changeYear: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',	       		
		});	
		
		<? for($i=0; $contratos["idcontrato"][$i]; $i++){ 
		     for($h=0; $habitaciones["idhabitacion"][$h]; $h++){		     	
				$ide = $contratos["idcontrato"][$i]."_".$habitaciones["idhabitacion"][$h];
		?>		
				$("#desde_<? echo $ide; ?>").datepicker({
					minDate: '<? echo $contratos["fechai"][$i]; ?>',
					maxDate: '<? echo $contratos["fechaf"][$i]; ?>',
					dateFormat: "yy-mm-dd",
				    closeText: 'Cerrar',
				    changeMonth: true,
				    changeYear: true,
				    prevText: '<Ant',
				    nextText: 'Sig>',
			   		onSelect: function(dateText) { }	       		
				});
				$("#hasta_<? echo $ide; ?>").datepicker({
					minDate: '<? echo $contratos["fechai"][$i]; ?>',
					maxDate: '<? echo $contratos["fechaf"][$i]; ?>',
					dateFormat: "yy-mm-dd",
				    closeText: 'Cerrar',
				    changeMonth: true,
				    changeYear: true,
				    prevText: '<Ant',
				    nextText: 'Sig>',	       		
				});			
		<? } } ?>						
	});
</script>	
