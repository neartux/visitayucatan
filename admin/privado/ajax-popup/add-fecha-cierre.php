<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include("../scripts/consultas.php");
$accion = $_REQUEST["accion"];
$idhotel = $_REQUEST["idhotel"];
$idcierre = $_REQUEST["idcierre"];
if($accion == 0){	
?>
<form name="forma" id="forma" class="formageneral">
	<input type="text" name="accion" id="accion" value="0" class="oculto" />
	<input type="text" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" class="oculto" />
	<label>Fecha inicial</label>
	<input type="text" name="finicial" id="finicial" class="validar" />
	
	<label>Fecha final</label>
	<input type="text" name="ffinal" id="ffinal" class="validar" />
	
	<button class="btnFormas agregarAlgo" type="button" onclick="saveFechaCierre()">GUARDAR</button>	
</form>
<? }else {	
	$detalle = detalleFechaCierre($idcierre);
	?>
	<form name="forma" id="forma" class="formageneral">
	<input type="text" name="idcierre" id="idcierre" value="<? echo $idcierre; ?>" class="oculto" />
	<input type="text" name="idhotel" id="idhotel" value="<? echo $idhotel; ?>" class="oculto" />
	<input type="text" name="accion" id="accion" value="1" class="oculto" />
	
	<label>Fecha inicial</label>
	<input type="text" name="finicial" id="finicial" class="validar" value="<? echo $detalle["finicio"][0]; ?>" />
	
	<label>Fecha final</label>
	<input type="text" name="ffinal" id="ffinal" class="validar" value="<? echo $detalle["ffinal"][0]; ?>" />
	<button class="btnFormas agregarAlgo" type="button" onclick="saveFechaCierre()">GUARDAR</button>	
</form>
<? } ?>

<script>
	$(document).ready(function(){
		$("#finicial").datepicker({
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
	            $("#ffinal").datepicker( "option", "minDate", fechab);            
	         }	       		
		});
		$("#ffinal").datepicker({
			minDate: 0,
			dateFormat: "yy-mm-dd",
		    closeText: 'Cerrar',
		    changeMonth: true,
		    changeYear: true,
		    prevText: '<Ant',
		    nextText: 'Sig>',	       		
		});		
	});
</script>