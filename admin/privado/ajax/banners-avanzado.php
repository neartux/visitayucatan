<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
include("../scripts/consultas.php");
$idbanner = $_REQUEST["idbanner"];
$idiomas = idiomas();
$bannerpos = bannerPosiciones($idbanner);
$sehome = bannerSection(1);
$sepaquetes = bannerSection(2);
$setours = bannerSection(3);
?>

<div id="submenu">
	<ul>
		<li class="menuActivo informacion" onclick="cargaPanel('informacion')"><span>Información</span></li>		
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

		<?php 
		$random =  generateRandomString($length = 10);
		$timestamp = time();
		?>		
		
		<div class="menuContenido scrollear">			
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
				<div id="<? echo "idioma_".$idiomas["ididioma"][$i]; ?>" class="descripIdiomas <? if($i >= 1){ ?> oculto <? } ?>">
				  <div class="cajadivisora">
				  <form name="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>" id="formaInfo_<? echo $idiomas["ididioma"][$i]; ?>">
				  	<input type="hidden" name="idbanner" id="idbanner" value="<? echo $idbanner; ?>" />
				  	<input type="hidden" name="ididioma" id="ididioma" value="<? echo $idiomas["ididioma"][$i]; ?>" />				  	
					<?
					$banner = bannersDescripciones($idbanner, $idiomas["ididioma"][$i]);
					?>
					<input type="hidden" name="idregistro" id="idregistro" value="<? echo $banner["idregistro"][0]; ?>" />
					<h2 class="tituloIdioma"><? echo $idiomas["idioma"][$i]; ?></h2>
					<label>Nombre</label>
					<input name="nombre" id="nombre_<? echo $idiomas["ididioma"][$i]; ?>" type="text" value="<? echo $banner["nombre"][0]; ?>" />
					
					<label>Secciones</label>
					<div class="seccionesinput">
						<?
						$shome = (in_array("1", $bannerpos)) ? 'checked="checked"' : '';
						$spaquetes = (in_array("2", $bannerpos)) ? 'checked="checked"' : '';
						$stours = (in_array("3", $bannerpos)) ? 'checked="checked"' : '';  
						?>
						
						<label>Home</label>
						<input type="checkbox" name="seccionhome" id="seccionhome_<? echo $idiomas["ididioma"][$i]; ?>" value="1" <? echo $shome; ?> />
						
						<label>Paquetes</label>
						<input type="checkbox" name="seccionpaquetes" id="seccionpaquetes_<? echo $idiomas["ididioma"][$i]; ?>" value="2" <? echo $spaquetes; ?> />
						
						<label>Tours</label>
						<input type="checkbox" name="secciontours" id="secciontours_<? echo $idiomas["ididioma"][$i]; ?>" value="3" <? echo $stours; ?> />
					</div>
					
					
					
					<label>Imagen</label>
					<div class="portaimgbanner" id="porta_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>">
						
						<?
						 $clase = "";
						 if($banner["archivo"][0] != "no"){
							$clase = "oculto";
							 ?>						
								<div class="deleteImg" onclick="deleteImgBanner('<? echo $idbanner; ?>', '<? echo $idiomas["ididioma"][$i]; ?>')"></div>
								<img id="imgBanner" src="../../imagenes/banners/<? echo $banner["archivo"][0]; ?>" />						
						<? } ?>
					</div>
										
					<div class="subefile <? echo $clase; ?>" id="subefile_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>"> 
						<h2>Para subir una imagen presione el botón:</h2>
						<form>
							<div id="queue"></div>
							<input id="file_upload_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>" name="file_upload" type="file" multiple="true">	
						</form>	
					</div>					
					
					<div class="flotis"></div>
				  </form>
				  <button type="button" class="agregarAlgo btnSaveDescripciones" onclick="updatebanner('<? echo $idiomas["ididioma"][$i]; ?>')">GUARDAR</button>
				  </div>
				  
				  <? if($idiomas["ididioma"][$i] == 1){ ?>
				  <div class="cajadivisorab">
				  	<h2 class="tituloIdioma">Posiciones</h2>
				  	
				  	<ul>
				  		<li id="1" class="currentseccion" onclick="cargaPosiciones('1')"><span>Home</span></li>
				  		<li id="2" onclick="cargaPosiciones('2')"><span>Paquetes</span></li>
				  		<li id="3" onclick="cargaPosiciones('3')"><span>Tours</span></li>
				  	</ul>
				  	
				  		<? 				  		
					  		$sehome = bannerSection(1);
							$sepaquetes = bannerSection(2);
							$setours = bannerSection(3);
						?>
				  	
				  	<div id="contenedorSecciones">
				  		<div id="loadingposicion" class="oscuro oculto">
				  			<div id="loadingb"><img src="imagenes/loading.gif"></div>	
				  		</div>
				  		
				  		<div id="contseccion_1" class="cajonmuestra">
				  			<table cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<td>Banner</td>
										<td>Opciones</td>
									</tr>
								</thead>
								<tbody>
						  			<? for($a=0; $sehome["idregistro"][$a]; $a++){
						  				$next = $a + 1;	
									?>
										<tr id="lugar_<? echo $sehome["lugar"][$a]; ?>" class="filita_1" data="<? echo $sehome["idbanner"][$a]; ?>">
											<td><? echo $sehome["nombre"][$a]; ?></td>
											<td>
												<div class="portalugares">
													<? if($sehome["idregistro"][$next] >= 1){ ?>
														<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('<? echo $sehome["lugar"][$a]; ?>', '1', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $sehome["idbanner"][$a]; ?>')">
													<? } ?>
													
													<? if($a>= 1){ ?>
														<img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('<? echo $sehome["lugar"][$a]; ?>', '1', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $sehome["idbanner"][$a]; ?>')">
													<? } ?>
												</div>											
											</td>
										</tr>						  				
						  			<? } ?>																
								</tbody>
				  			</table>
				  		</div>
				  		
				  		
				  		<div id="contseccion_2" class="cajonmuestra oculto">
				  			<table cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<td>Banner</td>
										<td>Opciones</td>
									</tr>
								</thead>
								<tbody>
						  			<? for($a=0; $sepaquetes["idregistro"][$a]; $a++){
						  				$next = $a + 1;	
									?>
										<tr id="lugar_<? echo $sepaquetes["lugar"][$a]; ?>" class="filita_2" data="<? echo $sepaquetes["idbanner"][$a]; ?>">
											<td><? echo $sepaquetes["nombre"][$a]; ?></td>
											<td>
												<div class="portalugares">
													<? if($sepaquetes["idregistro"][$next] >= 1){ ?>
														<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('<? echo $sepaquetes["lugar"][$a]; ?>', '2', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $sepaquetes["idbanner"][$a]; ?>')">
													<? } ?>
													
													<? if($a>= 1){ ?>
														<img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('<? echo $sepaquetes["lugar"][$a]; ?>', '2', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $sepaquetes["idbanner"][$a]; ?>')">
													<? } ?>
												</div>											
											</td>
										</tr>						  				
						  			<? } ?>																	
								</tbody>
				  			</table>				  			
				  		</div>
				  		
				  		
				  		<div id="contseccion_3" class="cajonmuestra oculto">
				  			<table cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<td>Banner</td>
										<td>Opciones</td>
									</tr>
								</thead>
								<tbody>
						  			<? for($a=0; $setours["idregistro"][$a]; $a++){
						  				$next = $a + 1;	
									?>
										<tr id="lugar_<? echo $setours["lugar"][$a]; ?>" class="filita_3" data="<? echo $setours["idbanner"][$a]; ?>">
											<td><? echo $setours["nombre"][$a]; ?></td>
											<td>
												<div class="portalugares">
													<? if($setours["idregistro"][$next] >= 1){ ?>
														<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('<? echo $setours["lugar"][$a]; ?>', '3', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $setours["idbanner"][$a]; ?>')">
													<? } ?>
													
													<? if($a>= 1){ ?>
														<img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('<? echo $setours["lugar"][$a]; ?>', '3', '<? echo $idiomas["ididioma"][$i]; ?>', '<? echo $setours["idbanner"][$a]; ?>')">
													<? } ?>
												</div>											
											</td>
										</tr>						  				
						  			<? } ?>																
								</tbody>
				  			</table>				  			
				  		</div>
				  	</div>				  	
				  </div>
				  <? } ?>

				</div>			
				
				
				<script type="text/javascript">
					$(function() {
						$('#file_upload_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>').uploadify({
							'formData'     : {
								'prefijo' : '<? echo $random; ?>',
								'destino': '/imagenes/banners/',
								'timestamp' : '<?php echo $timestamp;?>',
								'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
							},
							'swf'      : 'scripts/uploadify/uploadify.swf',
							'uploader' : 'scripts/uploadify/uploadify.php',
							'buttonText' : 'Seleccione..',
					        'onUploadComplete' : function(file) {
					        	mensaje("La imagen se ha subido correctamente, por favor espere, estamos agregando la imagen a la base de datos...")
					        	var archivo = '<? echo $random; ?>_'+file.name;		
					        	$.post("ajax-save/add-image-banner.php", {banner: '<? echo $idbanner; ?>', file: archivo, idioma: '<? echo $idiomas["ididioma"][$i]; ?>' }, function(){
					        		var contenido = '<div class="deleteImg" onclick="deleteImgBanner(<? echo $idbanner ?>, <? echo $idiomas["ididioma"][$i]; ?>)"></div><img id="imgBanner" src="../../imagenes/banners/'+archivo+'">';					        		
					        		$("#porta_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>").html(contenido);
					        		$("#subefile_<? echo $idbanner."_".$idiomas["ididioma"][$i]; ?>").hide();					        							        		
					        	});	        
					        }				
						});
					});
				</script>				
					
			<? } ?>
		</div>
	</div>
	<!-- INFORMACION POR  IDIOMA -->
</div>
