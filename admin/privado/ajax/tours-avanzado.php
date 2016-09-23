<!--<script src="scripts/uploadifyhtml/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadifyhtml/uploadifive.css">-->

<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idtour = $_REQUEST["idtour"];
$idiomas = idiomas();
$origenes = origenes();
$porigenes = porigenes($idtour);
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Información</span></li>
		<li class="fotos" onclick="cargaPanel('fotos')"><span>Fotografías</span></li>
		<li class="orgienes" onclick="cargaPanel('origenes')"><span>Precios por origen</span></li>
		<li class="precios" onclick="cargaPanel('porigenes')"><span>Agregar x origen</span></li>
	</ul>
</div>

<div id="reload">
	<!-- INFORMACION POR  IDIOMA -->
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
		
		<div class="menuContenido scrollear">			
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){ 
			   $tour = toursDescripciones($idtour, $idiomas["ididioma"][$i]);			   
			
				?>
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				  <form name="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>" id="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>">
				  	<input type="hidden" name="idtour" id="idtour" value="<? echo $idtour; ?>" />
				  	<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />				  	
					<input type="hidden" name="iddescripcion" id="iddescripcion" value="<? echo $tour["iddescripcion"][0]; ?>" />
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2> 
					<label>Nombre</label>
					<input name="nombre" id="nombre_<? echo $idiomas["ididioma"][$i]; ?>" type="text" value="<? echo $tour["nombretour"][0]; ?>" /> 							
					
					<label <!--class="lbltop"-->Escribe aqui un mensaje si este tour no acepta menores</label>
					<input name="mensajetour" id="mensajetour_<? echo $idiomas["ididioma"][$i]; ?>" type="text" value="<? echo $tour["tourmsj"][0]; ?>" />
					
					<label>Circuito</label>
					<input name="circuito" id="circuito_<? echo $idiomas["ididioma"][$i]; ?>" type="text" value="<? echo $tour["circuito"][0]; ?>" />
					
					<label>Descripción larga</label>
					<textarea name="desclarga" id="desclarga_<? echo $idiomas["ididioma"][$i]; ?>" class="mceEditor"><? echo $tour["descripcion"][0]; ?></textarea>
					
					<div class="flotis"></div>
				  </form>
				  <button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionTour('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				</div>				
			<? } ?>
		</div>
	</div>
	<!-- INFORMACION POR  IDIOMA -->

	<div id="fotos" class="panelInfo oculto">
		<?
		$imgs = imgsTours($idtour);
		?>
		<div class="lagaleria">
			<? for($i=0; $imgs["idfoto"][$i]; $i++){ ?>
			<div class="objectfile" id="objectfile_<? echo $imgs["idfoto"][$i]; ?>">
				<div class="deleteImg" onclick="deleteImgTour('<? echo $imgs["idfoto"][$i]; ?>')"></div>
				<? if($imgs["principal"][$i] == 1){ ?> <img src="imagenes/paloma.png" class="imgpral" /> <? } ?>
				<img src="../../imagenes/tours/<? echo $imgs["archivo"][$i]; ?>" class="pointer" onclick="asignapraltour('<? echo $imgs["idfoto"][$i]; ?>', '<? echo $idtour; ?>')" />
			</div>
			<? } ?>																		
		</div>
		
		<div class="subefile"> 
			<h2>Para agregar mas imagenes presione el boton:</h2>
			<form>
				<div id="queue"></div>
				<input id="file_upload" name="file_upload" type="file" multiple="true">	
			</form>	
		</div>
	</div>
	
	<div id="origenes" class="panelInfo oculto">
		<? for($po=0; $porigenes["idregistro"][$po]; $po++){ ?>		
		<div class="precioOrigenes" id="prorigenes_<? echo $porigenes["idregistro"][$po]; ?>">
			<div class="loadingcombinacion" style="display: none;"><img src="imagenes/loading.gif"></div>
			<form id="precioorigen_<? echo $porigenes["idregistro"][$po]; ?>" name="precioorigen">
				<label>Origen</label>
				<input type="text" id="origen" name="origen" value="<? echo utf8_encode($porigenes["origen"][$po]); ?>" readonly="readonly" />
				<input type="hidden" id="idorigen" name="idorigen" value="<? echo $porigenes["idregistro"][$po]; ?>" />
				
				<label>Precio adulto</label>
				<input type="text" id="adulto" name="adulto" value="<? echo $porigenes["adulto"][$po]; ?>" />
				
				<label>Precio menor</label>
				<input type="text" id="menor" name="menor" value="<? echo $porigenes["menor"][$po]; ?>" />		
				
				<div class="filabotones">
					<button type="button" class="agregarAlgo btnEspecial" onclick="eliminarPrecioOrigen('<? echo $porigenes["idregistro"][$po]; ?>')">ELIMINAR</button>
					<button type="button" class="agregarAlgo btnEspecial" onclick="guardarPrecioOrigen('<? echo $porigenes["idregistro"][$po]; ?>')">GUARDAR</button>
				</div>	
			</form>			
		</div><!-- -->
		<? } ?>
	</div>
	
	<div id="porigenes" class="panelInfo oculto">
		<div class="precioOrigenes" id="agregarprecioorigennuevo">
			<div class="loadingcombinacion" style="display: none;"><img src="imagenes/loading.gif"></div>
			<form id="nuevoprecio" name="nuevoprecio">
				<input type="hidden" id="idtour" name="idtour" value="<? echo $idtour; ?>" />
				<label>Origen</label>
				<select name="idorigen" id="idorigen" class="validar">
					<option>Seleccione una opción</option>
					<? for($o=0; $origenes["idorigen"][$o]; $o++){ ?>
					<option value="<? echo $origenes["idorigen"][$o]; ?>"><? echo utf8_encode($origenes["origen"][$o]); ?></option>
					<? } ?>
				</select>
				
				<label>Precio adulto</label>
				<input type="text" id="adulto" name="adulto" class="validar" />
				
				<label>Precio menor</label>
				<input type="text" id="menor" name="menor" class="validar" />		
				
				<div class="filabotones">					
					<button type="button" class="agregarAlgo btnEspecial" onclick="guardarTarifaNueva()">GUARDAR</button>
				</div>	
			</form>			
		</div>
	</div>	
</div>

	<script type="text/javascript">
		<?php 
		$random =  generateRandomString($length = 10);
		$timestamp = time();
		?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'prefijo' : '<? echo $random; ?>',
					'destino': '/imagenes/tours/',
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'scripts/uploadify/uploadify.swf',
				'uploader' : 'scripts/uploadify/uploadify.php',
				'buttonText' : 'Seleccione..',
		        'onUploadComplete' : function(file) {
		        	mensaje("La imgagen se ha subido correctamente, por favor espere, estamos agregando la imagen a la base de datos...")
		        	var archivo = '<? echo $random; ?>_'+file.name;		
		        	$.post("ajax-save/add-image-tour.php", {tour: '<? echo $idtour; ?>', file: archivo}, function(e){
		        		$(".lagaleria").append('<div class="objectfile" id="objectfile_'+e+'"><div class="deleteImg" onclick="deleteImgTour('+e+')"></div><img class="pointer" onclick="asignapraltour('+e+', <? echo $idtour; ?>)" src="../../imagenes/tours/'+archivo+'" /></div>');	
		        	});	        
		        }				
			});
		});
	</script>