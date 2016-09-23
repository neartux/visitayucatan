<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idpaquete = $_REQUEST["idpaquete"];
$hoteles = hoteles();
$idiomas = idiomas();
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Información</span></li>
		<li class="itinerarios" onclick="cargaPanel('itinerarios')"><span>Itinerarios</span></li>
		<li class="estancias" onclick="cargaPanel('estancias')"><span>Combinaciones</span></li>
		<li class="hoteles" onclick="cargaPanel('hoteles')"><span>Agregar combinación</span></li>
		<li class="fotos" onclick="cargaPanel('fotos')"><span>Fotografías</span></li>
	</ul>
</div>

<div id="reload">
	<!-- INFORMACION POR  IDIOMA -->
	<div id="informacion" class="panelInfo">
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
			    
			   $tags = explode(",",$paquete["tags"][0]);
			   $resultado = count($tags);
			   $supertags = "";
			   
			   for($t=0; $t<= $resultado; $t++){
			   	if($t==0){
			   		$supertags = trim($tags[$t])."',";	
			   	}else{
			   		if($t== $resultado){
			   			$supertags = $supertags." ".trim($tags[$t]);
			   		}else{
			   			$supertags = $supertags."'".trim($tags[$t])."',";
			   		}			   		
			   	}
			   }
			?>
				
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				  <form name="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>" id="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>">
				  	<input type="hidden" name="idpaquete" id="idpaquete" value="<? echo $idpaquete; ?>" />
				  	<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />				  	
					<input type="hidden" name="idregistro" id="idregistro" value="<? echo $paquete["idregistro"][0]; ?>" />
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2>
					<label>Nombre</label>
					<input name="nombre" id="nombre" type="text" value="<? echo $paquete["nombre"][0]; ?>" />
					
					<label>Tags</label>
					<div class="sujetatags">
					<input name="tags" id="tags_<? echo $idiomas["ididioma"][$i]; ?>" class="supertags" type="text" />
					</div>
					
				<script>			
			    $("#tags_<? echo $idiomas["ididioma"][$i]; ?>").textext({
			        plugins : 'tags prompt focus autocomplete ajax arrow',
			        <? if($paquete["tags"][0] != "0"){ ?>
			        tagsItems : [ '<? echo $supertags; ?> ],
			        <? } ?>	            
		            prompt: "Escriba un tag...",
		            ajax : {
		                url : 'ajax/tags.php?ididioma=<? echo $idiomas["ididioma"][$i]; ?>',
		                dataType : 'json',
		                loadingMessage: 'Cargando...',
		                cacheResults : true,
		                loadingDelay: "1" 		                
		            }       
			    });
				</script>					

					<label>Descripción corta</label>
					<textarea name="desccorta" id="desccorta_<? echo $idiomas["ididioma"][$i]; ?>"><? echo $paquete["intro"][0]; ?></textarea>
					
					<label class="lbltop">Descripción larga</label>
					<textarea name="desclarga" id="desclarga_<? echo $idiomas["ididioma"][$i]; ?>" class="mceEditor"><? echo $paquete["descripcion"][0]; ?></textarea>
					
					<label class="lbltop">Incluye</label>
					<textarea name="incluye" id="incluye_<? echo $idiomas["ididioma"][$i]; ?>"><? echo $paquete["incluye"][0]; ?></textarea>
					
					<div class="flotis"></div>
				  </form>
				  <button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcion('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				</div>				
			<? } ?>
		</div>
	</div>
	<!-- INFORMACION POR  IDIOMA -->
	
	<div id="itinerarios" class="panelInfo oculto">
		<div id="menuItinerarios">
			<ul>
				<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
					<li id="iti_<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" <? if($i==0){ ?>class="itinerarioactivo" <? } ?> onclick="descripcionesItinerarios('<? echo $idiomas["ididioma"][$i]; ?>')">
						<span><? echo $idiomas["idioma"][$i]; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>
		
		<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
			<div id="itin_<? echo $idiomas["ididioma"][$i]; ?>" class="descripItinerarios <? if($i >= 1){ ?> oculto <? } ?>">
			   <div class="submenuitinerarios">
					<? 
					$filasdias = menunochesdias($idpaquete);					
					for($f=0; $filasdias["idcombinacion"][$f]; $f++){
					$compidbtn = $filasdias["dias"][$f]."_".$idpaquete."_".$idiomas["ididioma"][$i]; 
					?>
					<button onclick="muestraItinerario('<? echo $filasdias["dias"][$f]; ?>', '<? echo $idpaquete; ?>', '<? echo $idiomas["ididioma"][$i]; ?>')" type="button" id="btniti_<? echo $compidbtn; ?>" class="btnItinerarios btniti_<? echo $idiomas["ididioma"][$i]; ?> <? if($f==0){ echo "menuItiActivo"; } ?>"><? echo $filasdias["dias"][$f]." dias"; ?></button>																				
					<? } ?>					
				</div>
				<? for($f=0; $filasdias["idcombinacion"][$f]; $f++){
					$compid = $filasdias["dias"][$f]."_".$idpaquete."_".$idiomas["ididioma"][$i];
					$descitinerario = descripcionItinerarios($idpaquete, $filasdias["dias"][$f], $idiomas["ididioma"][$i]);
				 ?>
				<div id="cont_<? echo $compid; ?>" class="cajondesitinerario <? if($f >= 1){ echo "oculto"; } ?>">
					<button type="button" class="agregarAlgo btnSaveDescripciones" onclick="guardaDescripcionItinerario('<? echo $compid; ?>')">GUARDAR</button>
					<form name="frmitinerario_<?  echo $compid; ?>" id="frmitinerario_<?  echo $compid; ?>">
						<input type="hidden" name="ididioma" id="ididioma_<? echo $compid; ?>" value="<? echo $idiomas["ididioma"][$i]; ?>" />
						<input type="hidden" name="iditinerario" id="iditinerario_<? echo $compid; ?>" value="<? echo $descitinerario["iditinerario"][0]; ?>" />
						<input type="hidden" name="idpaquete" id="paquete_<? echo $compid; ?>" value="<? echo $idpaquete; ?>" />
						<input type="hidden" name="losdias" id="losdias_<? echo $compid; ?>" value="<? echo $filasdias["dias"][$f]; ?>" />
						<textarea name="itinerario" id="itinerario_<? echo $compid; ?>"><? echo $descitinerario["itinerario"][0]; ?></textarea>
					</form>
				</div>
				<? } ?>					
			</div>
		<? } ?>		
	</div>
	
	<? $noches = menunochesdias($idpaquete); ?>
	<div id="estancias" class="panelInfo oculto">		
		<div id="menuRight">
			<ul>
				<? for($n=0; $noches["idcombinacion"][$n]; $n++){ ?>
					<li id="b_<? echo "noche_".$noches["noches"][$n]."_".$noches["dias"][$n]; ?>" <? if($n==0){ ?>class="nocheActiva" <? } ?> onclick="estanciasNoches('<? echo "noche_".$noches["noches"][$n]."_".$noches["dias"][$n]; ?>')">
						<span><? echo $noches["noches"][$n]." noches y ".$noches["dias"][$n]." dias"; ?></span>
					</li>
				<? } ?>
			</ul>
		</div>	
		<div class="menuContenido scrollear">
			<? for($n=0; $noches["idcombinacion"][$n]; $n++){ ?>
			<div id="<? echo "noche_".$noches["noches"][$n]."_".$noches["dias"][$n]; ?>" class="muestranoches <? if($n>=1){ ?>oculto <? } ?>">
				<? 
				$photeles = paquetesHoteles($idpaquete, $noches["noches"][$n], $noches["dias"][$n]); 
				for($p=0; $photeles["idcombinacion"][$p]; $p++){?>
					<div id="<? echo "comb_".$photeles["idcombinacion"][$p]; ?>" class="filaHotel" >
						<form name="forma_<? echo $photeles["idcombinacion"][$p]; ?>" id="forma_<? echo $photeles["idcombinacion"][$p]; ?>">
						<input type="hidden" name="idcombinacion" id="combinacion" value="<? echo $photeles["idcombinacion"][$p]; ?>" />						
						<div class="loadingcombinacion"><img src="imagenes/loading.gif" /></div>
						<div class="division">
							<label>Hotel</label>
							<select name="hotel" id="hotel">
								<? for($h=0; $hoteles["idhotel"][$h]; $h++){ ?>
									<option value="<? echo $hoteles["idhotel"][$h]; ?>" <? if($hoteles["idhotel"][$h]==$photeles["idhotel"][$p]){ ?>selected="selected" <? } ?>>
										<? echo $hoteles["hotel"][$h]; ?>
									</option>
								<? } ?>
							</select>
							
							<label>Dias</label>
							<input name="dias" id="dias" type="text" value="<? echo $photeles["dias"][$p]; ?>" />
							
							<label>Noches</label>
							<input name="noches" id="noches" type="text" value="<? echo $photeles["noches"][$p]; ?>" />				

							<label>Hab. Sencilla</label>
							<input name="sencilla" id="sencilla" type="text" value="<? echo $photeles["sencilla"][$p]; ?>" />
						</div>
			
						<div class="division">							
							<label>Hab. Doble</label>
							<input name="doble" id="doble" type="text" value="<? echo $photeles["doble"][$p]; ?>" />
							
							<label>Hab. Triple</label>
							<input name="triple" id="triple" type="text" value="<? echo $photeles["triple"][$p]; ?>" />

							<label>Hab. Cuádruple</label>
							<input name="cuadruple" id="cuadruple" type="text" value="<? echo $photeles["cuadruple"][$p]; ?>" />	
							
							<label>Tarifa Menor</label>
							<input name="tmenor" id="tmenor" type="text" value="<? echo $photeles["menor"][$p]; ?>" />
						</div>
						
						<div class="filabotones">
							<button type="button" class="agregarAlgo btnEspecial" onclick="eliminarcombinacion('<? echo $photeles["idcombinacion"][$p]; ?>')">ELIMINAR</button>
							<button type="button" class="agregarAlgo btnEspecial" onclick="guardarcombinacion('<? echo $photeles["idcombinacion"][$p]; ?>')">GUARDAR</button>
						</div>	
						</form>		
					</div>						
				<? } ?>
			</div>
			<? } ?>
		</div>	
	</div>
	<div id="hoteles" class="panelInfo oculto">
					<div id="filaAddcombina" class="filaHotel">
						<form name="formaaddcombinacion" id="formaaddcombinacion">
						<input type="hidden" name="idpaquete" id="idpaquete" value="<? echo $idpaquete; ?>" />												
						<div class="loadingcombinacion"><img src="imagenes/loading.gif" /></div>
						<div class="division">
							<label>Hotel</label>
							<select name="hotel" id="hotel" class="validar">
								<option value="0" selected="selected">Seleccione una opción</option>
								<? for($h=0; $hoteles["idhotel"][$h]; $h++){ ?>
									<option value="<? echo $hoteles["idhotel"][$h]; ?>">
										<? echo $hoteles["hotel"][$h]; ?>
									</option>
								<? } ?>
							</select>
							
							<label>Dias</label>
							<input name="dias" id="dias" type="text" class="validar" />
							
							<label>Noches</label>
							<input name="noches" id="noches" type="text" class="validar"/>

							<label>Habitación Sencilla</label>
							<input name="sencilla" id="sencilla" type="text" class="validar" />											
						</div>
			
						<div class="division">							
							<label>Hab. Doble</label>
							<input name="doble" id="doble" type="text" class="validar" />
							
							<label>Hab. Triple</label>
							<input name="triple" id="triple" type="text" class="validar" />
							
							<label>Hab. Cuádruple</label>
							<input name="cuadruple" id="cuadruple" type="text" class="validar" />
							
							<label>Tarifa Menor</label>
							<input name="tmenor" id="tmenor" type="text" />																		
						</div>
						
						<div class="filabotones">							
							<button type="button" class="agregarAlgo btnEspecial" onclick="agregarcombinacion('<? echo $idpaquete; ?>')">GUARDAR</button>
						</div>	
						</form>		
					</div>			
	</div>
	<div id="fotos" class="panelInfo oculto">
		<?
		$imgs = imgsPaquetes($idpaquete);
		?>
		<div class="lagaleria">
			<? for($i=0; $imgs["idfoto"][$i]; $i++){ ?>
			<div class="objectfile" id="objectfile_<? echo $imgs["idfoto"][$i]; ?>">
				<div class="deleteImg" onclick="deleteImgPaquete('<? echo $imgs["idfoto"][$i]; ?>')"></div>
				<? if($imgs["principal"][$i] == 1){ ?> <img src="imagenes/paloma.png" class="imgpral" /> <? } ?>
				<img src="../../imagenes/paquetes/<? echo $imgs["archivo"][$i]; ?>" class="pointer" onclick="asignapral('<? echo $imgs["idfoto"][$i]; ?>', '<? echo $idpaquete; ?>')" />
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
					'destino': '/imagenes/paquetes/',
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'scripts/uploadify/uploadify.swf',
				'uploader' : 'scripts/uploadify/uploadify.php',
				'buttonText' : 'Seleccione..',
		        'onUploadComplete' : function(file) {
		        	mensaje("La imgagen se ha subido correctamente, por favor espere, estamos agregando la imagen a la base de datos...")
		        	var archivo = '<? echo $random; ?>_'+file.name;		
		        	$.post("ajax-save/add-image-paquete.php", {paquete: '<? echo $idpaquete; ?>', file: archivo}, function(e){
		        		$(".lagaleria").append('<div class="objectfile" id="objectfile_'+e+'"><div class="deleteImg" onclick="deleteImgPaquete('+e+')"></div><img class="pointer" onclick="asignapral('+e+', <? echo $idpaquete; ?>)" src="../../imagenes/paquetes/'+archivo+'" /></div>');	
		        	});	        
		        }				
			});
		});
	</script>
