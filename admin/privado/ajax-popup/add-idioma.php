<script src="scripts/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="scripts/uploadify/uploadify.css">
<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<label>Nombre del idioma</label>
	<input type="text" name="nombre" id="nombre" class="validar" />
	
	<label>Clave del idioma</label>
	<input type="text" name="clave" id="clave" class="validar" />
	
	<label>URL</label>
	<input type="text" name="url" id="url" class="validar" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus">
		<option value="0">Inactivo</option>
		<option value="1" selected="selected">Activo</option>		
	</select>
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveIdioma('0')">GUARDAR</button>	
</form>
<? }else {
	
	$ididioma = $_REQUEST["ididioma"];	
	$idioma = detIdioma($ididioma);		
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="ididioma" id="ididioma" value="<? echo $ididioma; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	
	<label>Nombre del idioma b</label>
	<input type="text" name="nombre" id="nombre" class="validar" value="<? echo $idioma["idioma"][0]; ?>" />
	
	<label>Clave del idioma</label>
	<input type="text" name="clave" id="clave" class="validar" value="<? echo $idioma["claveidioma"][0]; ?>" />
	
	<label>URL</label>
	<input type="text" name="url" id="url" class="validar" value="<? echo $idioma["url"][0]; ?>" />
	
	<label>Estatus</label>
	<select name="estatus" id="estatus" <? if($ididioma == 1){ ?>disabled="disabled" <? } ?>>
		<option value="0" <? echo ($idioma["estatus"][0] == 0) ? 'selected="selected"' : ''; ?> >Inactivo</option>
		<option value="1" <? echo ($idioma["estatus"][0] == 1) ? 'selected="selected"' : ''; ?> >Activo</option>		
	</select>
	
	<label>Bandera</label>
	<div id="labandera">
		<img src="../../imagenes/banderas/<? echo $idioma["bandera"][0]; ?>" />
	</div>	
	
	<div id="uploadfoto">
		<form>
			<div id="queue"></div>
			<input id="file_upload" name="file_upload" type="file" multiple="true">	
		</form>	
	</div>	
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveIdioma()">GUARDAR</button>	
</form>
<? } ?>

	<script type="text/javascript">
		<?php 
		$random =  generateRandomString($length = 10);
		$timestamp = time();
		?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'prefijo' : '<? echo $random; ?>',
					'destino': '/imagenes/banderas/',
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'scripts/uploadify/uploadify.swf',
				'uploader' : 'scripts/uploadify/uploadify.php',
				'buttonText' : 'Seleccione..',
		        'onUploadComplete' : function(file) {
		        	mensaje("La imgagen se ha subido correctamente, por favor espere, estamos agregando la imagen a la base de datos...")
		        	var archivo = '<? echo $random; ?>_'+file.name;		
		        	$.post("ajax-save/add-image-idioma.php", {idioma: '<? echo $ididioma; ?>', file: archivo}, function(e){
		        		var html = '<img src="../../imagenes/banderas/'+archivo+'" />';		        		
		        		$("#labandera").html(html);	
		        	});	        
		        }				
			});
		});
	</script>