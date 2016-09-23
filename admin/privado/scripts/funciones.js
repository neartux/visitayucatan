$(document).ready(function(){
	resize();
	window.onresize=resize;	

  $(document).mousemove(function(event){
  		var w = $("body").width() - 150;
	  	var x = event.pageX;
	  	if(x >= w){
	  		$("#menuLeft").fadeIn("fast");
	  		$("#menuRight").fadeIn("fast");
	  		$("#menuRightb").fadeIn("fast");	
	  		$("#menuItinerarios").fadeIn("fast");
	  		$("#menuLeftHabitaciones").fadeIn("fast");
	  	}else{
	  		$("#menuLeft").fadeOut("fast");
	  		$("#menuRight").fadeOut("fast");
	  		$("#menuRightb").fadeOut("fast");
	  		$("#menuItinerarios").fadeOut("fast");
	  		$("#menuLeftHabitaciones").fadeOut("fast");
	  	}
    //$('#informacion').text(event.pageX + ", " + event.pageY);
  });
	
	//Menu principal
	$(".link").click(function(){
		var id = $(this).attr("rel");
		$("#logo").data("link", id);		
		cargaPagina("ajax", id, "loader", "", "1", "1", "1");			
	});
	
	$("#contenedorPral, #contenedor").on("keyup", "input", function(){
		var valor = $(this).val();
		var id = $(this).attr("id"); 
		objeto = $(this);	
						
		if (objeto.hasClass ("alerta") && valor != "") {
			   $(this).removeClass("alerta");
		 }		
	});	
	
	$("#contenedorPral, #contenedor").on("change", "select", function(){
		var valor = $(this).val();
		var id = $(this).attr("id"); 
		objeto = $(this);	
						
		if (objeto.hasClass ("alerta") && valor >= 1) {
			   $(this).removeClass("alerta");
		 }		
	});		
	
});

function resize(){      
     var h = $("body").height();
     var nh = h -162;           
     $("#contenedor").css({
     		height: nh
     });	
     acomodaReloader();
}

function validacion(id, clase) {	
		var total = $('#'+id+' .'+ clase).length;
		var conteo = 0;
		var flag = 1;
		var preflag = 1;			
		
	
		$('#'+id+' .'+ clase).each(function() {			
			conteo++;
			var id = $(this).attr("id");
			var aa = document.getElementById(id).type;			
			var valor = $(this).val();								
			
			if($(this).val() == '' || $(this).val() == null || ($(this).val() == 0 && aa == 'select-one')) {
				flag = 0;				
				$(this).addClass('alerta');					
			}			
			/*if(valor == ""){
				flag = 0;				
				$(this).addClass('alerta');	
			}*/			
		});
		
		if(flag == 0) {		
			return false;
		} else {
			return true;
		}
	}

//Carpeta en la que se encuentra el archivo, archivo a cargar, div en el que se cargará, acomoda acomodara el reloader, scroll indica si se scrollea, editor tiny
function cargaPagina(carpeta, archivo, div, variables, acomoda, scroll, tiny){	    
	$("#loading").fadeIn("fast", function(){
		if(variables == ""){
			$("#"+div).load(carpeta+"/"+archivo, function(){
				$("#loading").fadeOut("fast", function(){
					if(acomoda == 1){ acomodaReloader(); }
					if(scroll == 1){ scrollbar(); }
					if(tiny==1){editor();}
				});
			});
		}else{
			$("#"+div).load(carpeta+"/"+archivo+"?"+variables, function(){
				$("#loading").fadeOut("fast", function(){
					if(acomoda == 1){ acomodaReloader(); }
					if(scroll == 1){ scrollbar(); }
					if(tiny==1){editor();}					
				});
			});			
		}
	});
}

function mensaje(msg){
	$("#mensajes p").html(msg);
	$("#mensajes").animate({
		bottom: "0px" 
	},"slow", function(){
		setTimeout('ocultar()', 3000);
	});
}
		
function ocultar(){
	$("#mensajes").animate({
		bottom: "-45px" 
	},"slow", function(){
		$("#mensajes p").empty();
	});
};


function muestraPopup(){
	$(".popup").fadeIn("fast", function(){
		$("#contenedorPral").animate({
			top: "50%"
		}, "slow", function(){
			
		});
	});	
}

function closePopup(){
	$("#contenedorPral").animate({
		top: "200%"
	}, "slow", function(){
		$(".popup").fadeOut("slow");
		$(".cajaCentral").empty();
		$("#contenedorPral").css("top", "-100%");
	});
}

function acomodaPopup(width, height){
	var mtop = (height/2) - height;
	var mleft = (width/2) - width;
	$("#contenedorPral").css({
		width: width,
		height: height,
		marginTop: mtop,
		marginLeft: mleft
	});	
}

/*IDIOMAS*/
function agregarIdioma(width, height, accion, ididioma){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&ididioma="+ididioma;
	$(".cajaCentral").load("ajax-popup/add-idioma.php?"+vars, function(){
		muestraPopup();	
	});	
}

function saveIdioma(){
	$(".agregarAlgo").hide();		
	mensaje("Por favor espere, estamos guardando los cambios...");
	var variables = $("#forma").serialize();
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-idioma.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});		
	}else{
		mensaje("Complete los campos marcados...");
	}		
}

function delIdioma(ididioma){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el idioma...");
		$.post("ajax-save/delete-idioma.php", {id: ididioma}, function(e){
			switch (e) {
			    case "1":
			        msj = "Se ha eliminado con éxito el idioma seleccionado";
			        break;
			    default:
			        msj = e;
			        break;
			}
			mensaje(msj);
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");				
		});	
    }
    else{    	
        return false;
    }
}

/*ARTICULOS*/
function delArticulo(idarticulo){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el articulo...");
		$.post("ajax-save/delete-articulo.php", {id: idarticulo}, function(e){
			switch (e) {
			    case "1":
			        msj = "Se ha eliminado con éxito el artículo seleccionado";
			        break;
			    default:
			        msj = e;
			        break;
			}
			mensaje(msj);
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");				
		});	
    }
    else{    	
        return false;
    }
}

function agregarArticulo(width, height, accion, idarticulo){
	acomodaPopup(width, height);
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idarticulo="+idarticulo;
	$(".cajaCentral").load("ajax-popup/add-articulo.php?"+vars, function(){
		muestraPopup();	
	});	
}

function savearticulo(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		/*$.post("ajax-save/save-articulo.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});*/
		
		$.ajax({
	        type:"POST",
	        url:"ajax-save/save-articulo.php",
	        data:$("#forma").serialize(),
	        success: function(response){              
				mensaje("Se han guardado correctamente los cambios");
				var id = $("#logo").data("link");
				cargaPagina("ajax", id, "loader", "");	
				closePopup();
	        }
	    });			
		
	}else{
		mensaje("Complete los campos marcados...");
	}		
}

function descripcionesArticulos(idarticulo){
	var vars = "idarticulo="+idarticulo;
	cargaPagina("ajax", "articulos-avanzado.php", "loader", vars, "1", "1", "1");	
}


function guardaDescripcionArticulo(id){
	tinyMCE.triggerSave();	
	mensaje("Estamos guardando la información....")		
	var name = $("#formaInfo_"+id+" #nombre_"+id).val();
	var descripcionb = $("#formaInfo_"+id+" #desclarga_"+id).val();
	var idregistrob = $("#formaInfo_"+id+" #idregistro").val();
	var idarticulob = $("#formaInfo_"+id+" #idarticulo").val();
	
		$.ajax({
		  type: "POST",
		  url: "ajax-save/ajax-save-articulo.php",
		  data: {
		  	desclarga: descripcionb,		
			nombre: name,
			idregistro: idregistrob,
			ididioma: id,
			idarticulo: idarticulob	
		  }
		})
		.done(function(e){
		 var idb = parseInt(e);
		 if(idb >= 1){
		 	$("#formaInfo_"+id+" #idregistro").val(idb);	
		 }		 	
		 mensaje("Los cambios se han realizado con éxito....")
	  });		
}
/*ARTICULOS*/

/*BANNERS*/
function deleteImgBanner(idbanner, ididioma){	
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la imagen que ha seleccionado...");
		$.post("ajax-save/delete-imagen-banner.php", {id: idbanner, idioma: ididioma}, function(){
			$("#porta_"+idbanner+"_"+ididioma).empty();
			$("#subefile_"+idbanner+"_"+ididioma).show();
			mensaje("Se ha realizado exitosamente la operación...");			
		});
    }
    else{    	
        return false;
    }	
}

function descripcionesBanners(idbanner){
	var vars = "idbanner="+idbanner;
	cargaPagina("ajax", "banners-avanzado.php", "loader", vars, "1", "1", "1");		
}

function delBanner(idbanner){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el banner...");
		$.post("ajax-save/delete-banner.php", {id: idbanner}, function(e){
			switch (e) {
			    case "1":
			        msj = "Se ha eliminado con éxito el banner seleccionado";
			        break;
			    default:
			        msj = e;
			        break;
			}
			mensaje(msj);
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");				
		});	
    }
    else{    	
        return false;
    }	
}

function delDestino(iddestino){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el destino...");
		$.post("ajax-save/delete-destino.php", {id: iddestino}, function(e){
			switch (e) {
			    case "1":
			        msj = "Se ha eliminado con éxito el destino seleccionado";
			        break;
			    default:
			        msj = e;
			        break;
			}
			mensaje(msj);
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");				
		});	
    }
    else{    	
        return false;
    }	
}

function agregarBanner(width, height, accion, idbanner){
	acomodaPopup(width, height);
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idbanner="+idbanner;
	$(".cajaCentral").load("ajax-popup/add-banner.php?"+vars, function(){
		muestraPopup();	
	});		
}

function agregarDestino(width, height, accion, iddestino){
	acomodaPopup(width, height);
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&iddestino="+iddestino;
	$(".cajaCentral").load("ajax-popup/add-destino.php?"+vars, function(){
		muestraPopup();	
	});		
}

function savebanner(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-banner.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});
	}else{
		mensaje("Complete los campos marcados...");
	}	
}

function savedestino(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-destino.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});
	}else{
		mensaje("Complete los campos marcados...");
	}	
}

function updatebanner(id){
	tinyMCE.triggerSave();	
	mensaje("Estamos guardando la información....")	
	
	var idbanner = $("#idbanner").val();	
	var name = $("#nombre_"+id).val();
	
	if($("#seccionhome_"+id).is(':checked')) {
		var home = 1;
	}else{
		var home = 0;
	}
	
	if($("#seccionpaquetes_"+id).is(':checked')) {
		var paquetes = 1;
	}else{
		var paquetes = 0;
	}
	
	if($("#secciontours_"+id).is(':checked')) {
		var tours = 1;
	}else{
		var tours = 0;
	}		
	
	$.post("ajax-save/update-banner.php", {		
		nombre: name,
		ididioma: id,
		banner: idbanner,
		shome: home, 
		spaquetes: paquetes,
		stours: tours		
		}, function(){
		descripcionesBanners(idbanner);
		mensaje("Los cambios se han realizado con éxito....")		
	});	
}
/*BANNERS*/

/*MONEDAS*/
function agregarMoneda(width, height, accion, idmoneda){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idmoneda="+idmoneda;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-moneda.php?"+vars, function(){
		muestraPopup();	
	});		
}

function saveMoneda(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-moneda.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});		
	}else{
		mensaje("Complete los campos marcados...");
	}
}

function eliminaMoneda(idmoneda){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la moneda...");
		$.post("ajax-save/delete-moneda.php", {id: idmoneda}, function(){
			mensaje("Se ha realizado exitosamente la operación...");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");			
		});	
    }
    else{    	
        return false;
    }
}

/*USUARIOS*/
function agregarUsuario(width, height, accion, idusuario){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idusuario="+idusuario;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-usuario.php?"+vars, function(){
		muestraPopup();	
	});		
}

function saveUsuario(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-usuario.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});		
	}else{
		mensaje("Complete los campos marcados...");
	}	
}

function eliminaUsuario(idusuario){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el usuario...");
		$.post("ajax-save/delete-usuario.php", {id: idusuario}, function(){
			mensaje("Se ha realizado exitosamente la operación...");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");			
		});
    }
    else{    	
        return false;
    }	
}


/*HOTELES*/
function agregarHotel(width, height, accion, idhotel){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idhotel="+idhotel;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-hotel.php?"+vars, function(){
		muestraPopup();	
	});		
}

function saveHotel(){
	$(".agregarAlgo").hide();	
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();
	if(validacion('forma', 'validar')){		
		$.ajax({
	        type:"POST",
	        url:"ajax-save/save-hotel.php",
	        data:$("#forma").serialize(),
	        success: function(response){              
				mensaje("Se han guardado correctamente los cambios");
				var id = $("#logo").data("link");
				cargaPagina("ajax", id, "loader", "");	
				closePopup();
	        }
	    });			
		/*
		$.post("ajax-save/save-hotel.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});*/
	}else{
		mensaje("Complete los campos marcados...");
	}	
}

function deleteHotel(idhotel){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el hotel seleccionado...");
		$.post("ajax-save/delete-hotel.php", {id: idhotel}, function(e){
			if(e== "OK"){
				mensaje("Se ha realizado exitosamente la operación...");
				var id = $("#logo").data("link");
				cargaPagina("ajax", id, "loader", "");				
			}else{
				mensaje("No se puede eliminar el hotel, existen "+e+" combinaciones que estan ligados a el.");
			}
			
		});	
    }
    else{    	
        return false;
    }			
}

function detalleHotel(id){
	var vars = "idhotel="+id;
	cargaPagina("ajax", "hoteles-avanzado", "loader", vars, "1", "1", "1");
	//Carpeta en la que se encuentra el archivo, archivo a cargar, div en el que se cargará, acomoda acomodara el reloader, scroll indica si se scrollea, editor tiny	
}

/*TOURS*/
function agregarTour(width, height, accion, idtour){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idtour="+idtour;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-tour.php?"+vars, function(){
		muestraPopup();	
	});		
}

function saveTour(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-tour.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});
	}else{
		mensaje("Complete los campos marcados...");
	}
}

function deleteTour(idtour){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el tour seleccionado...");
		$.post("ajax-save/delete-tour.php", {id: idtour}, function(e){
			if(e=="OK"){
				mensaje("Se ha realizado exitosamente la operación...");
				var id = $("#logo").data("link");
				cargaPagina("ajax", id, "loader", "");				
			}else{
				mensaje("Existen "+e+" reservaciones con este tour. Si desea que el tour deje de verse, pruebe deshabilitándolo.");
			}			
		});
    }
    else{    	
        return false;
    }			
}


/*PAQUETES*/
function asignapral(idimagen, idpaquete){
	$.post("ajax-save/imgpral.php", {id: idimagen, paquete: idpaquete}, function(){		
		$(".imgpral").remove();
		$("#objectfile_"+idimagen).append('<img src="imagenes/paloma.png" class="imgpral">');
	});
}

function deleteImgPaquete(idimagen){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la imagen que ha seleccionado...");
		$.post("ajax-save/delete-imagen-paquete.php", {id: idimagen}, function(){			
			$("#objectfile_"+idimagen).fadeOut("fast", function(){
				mensaje("Se ha realizado exitosamente la operación...");
			});			
		});
    }
    else{    	
        return false;
    }		
}

function agregarPaquete(width, height, accion, idpaquete){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idpaquete="+idpaquete;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-paquete.php?"+vars, function(){
		muestraPopup();	
	});		
}

function savePaquete(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-paquete.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});
	}else{
		mensaje("Complete los campos marcados...");
	}	
}

function deletePaquete(idpaquete){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el paquete seleccionado...");
		$.post("ajax-save/delete-paquete.php", {id: idpaquete}, function(e){
			if(e=="OK"){
				mensaje("Se ha realizado exitosamente la operación...");
				var id = $("#logo").data("link");
				cargaPagina("ajax", id, "loader", "");				
			}else{
				mensaje("Existen "+e+" reservaciones ligadas a este paquete. No se puede eliminar.");
			}
			
		});
    }
    else{    	
        return false;
    }				
}

function deleteReserva(idreserva){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la reserva seleccionada...");
		$.post("ajax-save/delete-reserva.php", {id: idreserva}, function(e){
			mensaje("Se ha realizado exitosamente la operación...");
			$("#fila_"+idreserva).hide();						
		});
    }
    else{    	
        return false;
    }	
}

function descripcionesPaquete(idpaquete){	
	var vars = "idpaquete="+idpaquete;
	cargaPagina("ajax", "paquetes-avanzado.php", "loader", vars, "1", "1", "1");	
}

function acomodaReloader(){	
	var contenedor = $("#contenedor").height();
	var alto = contenedor - 45;
	$("#reload").css("height", alto);
		
}

/*PAQUETES AVANZADO*/
function cargaPanel(panel){
	$("#submenu li.menuActivo").removeClass("menuActivo");
	$(".panelInfo:visible").slideUp("fast", function(){
		$("#"+panel).fadeIn("fast");
		$("#submenu li."+panel).addClass("menuActivo");
	});
}

function descripcionesIdioma(id){
	$("#menuLeft li.idiomaActivo").removeClass("idiomaActivo");
	$(".descripIdiomas:visible").slideUp("fast", function(){
		$("#"+id).fadeIn("fast");
		$("#b_"+id).addClass("idiomaActivo");
	});
}

function descripcionesHabIdioma(id){
	$("#menuLeftHabitaciones li.menuhabactivo").removeClass("menuhabactivo");
	$(".descripIdiomas:visible").slideUp("fast", function(){
		$("#"+id).fadeIn("fast");
		$("#b_"+id).addClass("menuhabactivo");
	});	
}

function descripcionesItinerarios(id){
	$("#menuItinerarios li.itinerarioactivo").removeClass("itinerarioactivo");
	$(".descripItinerarios:visible").slideUp("fast", function(){
		$("#itin_"+id).fadeIn("fast");
		$("#iti_idioma_"+id).addClass("itinerarioactivo");
	});	
}

function muestraItinerario(dias, paquete, idioma){
	$(".btniti_"+idioma).removeClass("menuItiActivo");
	var id = "cont_"+dias+"_"+paquete+"_"+idioma;
	var btn = "btniti_"+dias+"_"+paquete+"_"+idioma;
	$(".cajondesitinerario:visible").slideUp("fast", function(){
		$("#"+id).fadeIn("fast");
		$("#"+btn).addClass("menuItiActivo");		
	});
}

function guardaDescripcionItinerario(id){
	tinyMCE.triggerSave();	
	$("#loading").show();
	var iditinerariob= $("#iditinerario_"+id).val();
	var paqueteb= $("#paquete_"+id).val();
	var losdiasb= $("#losdias_"+id).val();
	var itinerariob= $("#itinerario_"+id).val();
	var ididioma= $("#ididioma_"+id).val();
	
	/*var valores = $("#frmitinerario_"+id).serialize();
	$.post("ajax-save/save-itinerario.php?"+valores, function(){
		mensaje("El itinerario se ha guardado exitosamente...");	
	});*/
	
	$.ajax({
	  type: "POST",
	  url: "ajax-save/save-itinerario.php",
	  data: {iditinerario: iditinerariob, paquete: paqueteb, losdias: losdiasb, itinerario: itinerariob, idioma: ididioma}
	})
	.done(function(e) {
	 $("#loading").hide();
	 $("#iditinerario_"+id).val(e);
     mensaje("El itinerario se ha guardado exitosamente...")
  });	
}

function scrollbar(){
     $(".scrollear").mCustomScrollbar({
	     horizontalScroll:false,
	     autoDraggerLength:false,
		 advanced:{
		     updateOnContentResize: true
		   } 
      }); 	
}

function estanciasNoches(id){
	$("#menuRight li.nocheActiva").removeClass("nocheActiva");
	$(".muestranoches:visible").fadeOut("fast", function(){
		$("#"+id).slideDown("fast", function(){
			$("#b_"+id).addClass("nocheActiva");
		});
	});
}

function eliminarcombinacion(idcombinacion){
	mensaje("Eliminando combinación...");
	$("#comb_"+idcombinacion+" .loadingcombinacion").fadeIn("fast", function(){
		$.post("ajax-save/delete-combinacion.php", {id: idcombinacion}, function(){
			$("#comb_"+idcombinacion).slideUp("fast");
		});
	});
}

function guardarcombinacion(id){
	mensaje("Guardando cambios...");
	var valores = $("#forma_"+id).serialize();
	$("#comb_"+id+" .loadingcombinacion").fadeIn("fast", function(){
		$.post("ajax-save/save-combinacion.php?"+valores, function(){
			$("#comb_"+id+" .loadingcombinacion").fadeOut("fast", function(){
				mensaje("Cambios guardados con exito...");			
			});
		});
	});	
}

function agregarcombinacion(idpaquete){
	mensaje("Guardando cambios...");
	if(validacion("filaAddcombina", "validar")){
		var valores = $("#formaaddcombinacion").serialize();
		$("#filaAddcombina .loadingcombinacion").fadeIn("fast", function(){
			$.post("ajax-save/add-combinacion.php?"+valores, function(e){
					switch(e){
					    case "0":
					        var msj = 'Ya existe una combinación con el hotel, dias y noches seleccionados. Modifique la seleccion o edite la combinación desde la pestaña "Combinaciones"';
					        break;
					    case "1":
					        var msj = "La combinación se ha agregado con éxito";
					        descripcionesPaquete(idpaquete);
					        break;
					}				
				$("#filaAddcombina .loadingcombinacion").fadeOut("fast", function(){
					mensaje(msj);								
				});
			});
		});
	}else{
		mensaje("Complete los campos marcados");
	}	
}

function guardaDescripcion(id){
	tinyMCE.triggerSave();	
	mensaje("Estamos guardando la información....")		
	var descripcion = $("#formaInfo_"+id+" #desclarga_"+id).val();
	var name = $("#formaInfo_"+id+" #nombre").val();
	var descripcionc = $("#formaInfo_"+id+" #desccorta_"+id).val();
	var incluyeb = $("#formaInfo_"+id+" #incluye_"+id).val();
	var itinerariob = $("#formaInfo_"+id+" #itinerario_"+id).val();
	var idpaqueteb = $("#formaInfo_"+id+" #idpaquete").val();
	var ididiomab = $("#formaInfo_"+id+" #ididioma").val();
	var idregistrob = $("#formaInfo_"+id+" #idregistro").val();
	var tagsb = $("#formaInfo_"+id+" #tags_"+id).val();		
	var supertags = $("#formaInfo_"+id+" input[name*='tags']").val();
	
		
	$.post("ajax-save/save-informacion.php", {
		desclarga: descripcion,
		desccorta: descripcionc,
		nombre: name,
		incluye: incluyeb,
		itinerario: itinerariob,
		idpaquete: idpaqueteb,
		ididioma: ididiomab,
		tags: supertags,
		idregistro: idregistrob		
		}, function(e){
		var idn = parseInt(e);
		if(idn>=1){ 
			$("#idioma_"+id+" #idregistro").val(e); 
		}
		mensaje("Los cambios se han realizado con éxito....")		
	});	
}

function guardaDescripcionHotel(id){
	tinyMCE.triggerSave();	
	mensaje("Estamos guardando la información....")		
	var descripcion = $("#formaInfo_"+id+" #desclarga_"+id).val();
	var ididiomab = $("#formaInfo_"+id+" #ididioma").val();
	var idregistrob = $("#formaInfo_"+id+" #idregistro").val();
	var idhotelb = $("#formaInfo_"+id+" #idhotel").val();
		
	$.post("ajax-save/save-descripcion-hotel.php", {
		desclarga: descripcion,
		idhotel: idhotelb,
		ididioma: ididiomab,
		idregistro: idregistrob		
		}, function(){		
		mensaje("Los cambios se han realizado con éxito....")		
	}, function(e){
		$("#idregistro").val(e);
	});		
}

/*TOURS AVANZADO*/
function eliminarPrecioOrigen(id){
	mensaje("Eliminando tarifa...");
	$("#prorigenes_"+id+" .loadingcombinacion").fadeIn("fast", function(){
		$.post("ajax-save/delete-tarifa-origenes.php", {idorigen: id}, function(){
			$("#prorigenes_"+id).slideUp("fast");
		});
	});	
}

function guardarPrecioOrigen(id){
	mensaje("Guardando cambios...");
	var valores = $("#precioorigen_"+id).serialize();
	$("#prorigenes_"+id+" .loadingcombinacion").fadeIn("fast", function(){
		$.post("ajax-save/save-precioorigen.php?"+valores, function(){
			$("#prorigenes_"+id+" .loadingcombinacion").fadeOut("fast", function(){
				mensaje("Cambios guardados con exito...");			
			});
		});
	});		
}

function guardarTarifaNueva(){
	mensaje("Guardando cambios...");
	if(validacion("agregarprecioorigennuevo", "validar")){
		var valores = $("#nuevoprecio").serialize();
		$("#agregarprecioorigennuevo .loadingcombinacion").fadeIn("fast", function(){
			$.post("ajax-save/add-precioorigen.php?"+valores, function(e){
					switch(e){
					    case "0":
					        var msj = 'Ya existe una tarifa dada de alta con ese origen. Elimine la tarifa o modifiquela en la pestaña "PRECIOS POR ORIGEN"';
					        break;
					    case "1":
					        var msj = "La tarifa se ha agregado con éxito";
					        break;
					    case "2":
					        var msj = "Seleccione un origen";
					        $("#agregarprecioorigennuevo #idorigen").addClass("alerta").focus();
					        break;					        
					}				
				$("#agregarprecioorigennuevo .loadingcombinacion").fadeOut("fast", function(){
					mensaje(msj);								
				});
			});
		});			
	}else{
		mensaje("Complete los campos marcados");
	}		
}

function descripcionesTours(idtour){
	var vars = "idtour="+idtour;
	cargaPagina("ajax", "tours-avanzado.php", "loader", vars, "1", "1", "1");	
}

function guardaDescripcionTour(id){
	tinyMCE.triggerSave();	
	mensaje("Estamos guardando la información....")		
	var name = $("#formaInfo_"+id+" #nombre_"+id).val();
	var msjtourb = $("#formaInfo_"+id+" #mensajetour_"+id).val();
	var circuitob = $("#formaInfo_"+id+" #circuito_"+id).val();
	var descripcionb = $("#formaInfo_"+id+" #desclarga_"+id).val();
	var idtourb = $("#formaInfo_"+id+" #idtour").val();
	var ididiomab = $("#formaInfo_"+id+" #ididioma").val();
	var iddescripcionb = $("#formaInfo_"+id+" #iddescripcion").val();
	var supertags = $("#formaInfo_"+id+" input[name*='tags']").val();
	
	$.post("ajax-save/ajax-save-tour.php", {
		desclarga: descripcionb,		
		nombre: name,
		circuito: circuitob,
		idtour: idtourb,		
		ididioma: ididiomab,
		iddescripcion: iddescripcionb,
		tags: supertags,
		msjtour: msjtourb
		}, function(){
		mensaje("Los cambios se han realizado con éxito....")		
	});		
}

function asignapraltour(idimagen, idtour){
	$.post("ajax-save/imgpraltour.php", {id: idimagen, tour: idtour}, function(){		
		$(".imgpral").remove();
		$("#objectfile_"+idimagen).append('<img src="imagenes/paloma.png" class="imgpral">');
	});
}

function deleteImgTour(idimagen){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la imagen que ha seleccionado...");
		$.post("ajax-save/delete-imagen-tour.php", {id: idimagen}, function(){			
			$("#objectfile_"+idimagen).fadeOut("fast", function(){
				mensaje("Se ha realizado exitosamente la operación...");
			});			
		});
    }
    else{    	
        return false;
    }			
}

function editor(){
	tinyMCE.init({
		// General options
		add_form_submit_trigger : true,		
		//mode : "exact",
		//elements : "desclarga, desccorta, incluye, itinerario",
		width: "680",
		height: "480",
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect",
		theme_advanced_buttons2 : "link,unlink,anchor,image,cleanup,code,|,bullist,numlist,|",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/estilos.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	})	
	tinymce.triggerSave();
}

function cargaPosiciones(id){
	$(".cajadivisorab .currentseccion").removeClass("currentseccion");
	$(".cajonmuestra:visible").fadeOut("fast", function(){
		$(".cajadivisorab #"+id).addClass("currentseccion");
		$("#contseccion_"+id).fadeIn("fast", function(){
			
		});
	});
}

//id:es la posicion actual del elemento seleccionado. div: sirve para identificar los elementos y tb como id de la posicion (1.home, 2.paquetes, 3.tours). idioma: ya no se usa
function bajar(id, div, idioma, idbanner){
	$("#loadingposicion").fadeIn("fast", function(){
		var filas = $("#contseccion_"+div+"  .filita_"+div).length;
		var sig = parseInt(id) + 1;
		
		//Establecemos nuevas posiciones para enviar a la base de datos
		//Id del banner bajado: idbanner, nuevaposicion: sig
		
		//Datos del banner que subio de posicion
		var idbannerb = $("#contseccion_"+div+" #lugar_"+sig).attr("data"); //primero: posicion, segundo: idbanner
		
		//alert("banner seleccionado: "+idbanner+", posicion nueva: "+sig+" - banner cambiado: "+idbannerb+", posicion nueva:  "+id);				
			
		$("#contseccion_"+div+" #lugar_"+sig).after($("#contseccion_"+div+" #lugar_"+id).clone().attr("id", "lugar_"+sig)).attr("id", "lugar_"+id);
		$("#contseccion_"+div+" #lugar_"+id+":first").hide();
		$("#contseccion_"+div+" #lugar_"+id+":hidden").remove();
		
		if(sig < filas){
			$("#contseccion_"+div+" #lugar_"+sig+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+sig+', '+div+', '+idioma+', '+idbanner+')"><img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+sig+', '+div+', '+idioma+', '+idbanner+')">');
		}else{
			$("#contseccion_"+div+" #lugar_"+sig+" .portalugares").html('<img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+sig+', '+div+', '+idioma+', '+idbanner+')">');
		}
		
		if(id>1){
			$("#contseccion_"+div+" #lugar_"+id+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+id+', '+div+', '+idioma+', '+idbanner+')"><img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+id+', '+div+', '+idioma+', '+idbanner+')">');
		}else{
			$("#contseccion_"+div+" #lugar_"+id+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+id+', '+div+', '+idioma+', '+idbanner+')">');
		}
		
		$.post("ajax-save/intercambio-banners.php", {
			bannera: idbanner, 
			posiciona: sig,
			bannerb: idbannerb,
			posicionb: id,
			seccion: div
		}, function(){
			$("#loadingposicion").fadeOut("fast");	
		});
		
				
	});	
}

function subir(id, div, idioma, idbanner){
	$("#loadingposicion").fadeIn("fast", function(){
		var filas = $("#contseccion_"+div+" .filita_"+div).length;
		var ant = parseInt(id) - 1;
		
		//Establecemos nuevas posiciones para enviar a la base de datos
		//Id del banner subido: idbanner, nuevaposicion: ant
		
		//Datos del banner que subio de posicion
		var idbannerb = $("#contseccion_"+div+" #lugar_"+ant).attr("data"); //primero: posicion, segundo: idbanner
		
		//alert("banner seleccionado: "+idbanner+", posicion nueva: "+ant+" - banner cambiado: "+idbannerb+", posicion nueva:  "+id);			
		
		
		$("#contseccion_"+div+" #lugar_"+ant).before($("#contseccion_"+div+" #lugar_"+id).clone().attr("id", "lugar_"+ant)).attr("id", "lugar_"+id).addClass("movido");
		
		$("#contseccion_"+div+" .filita_"+div).each(function(){		
			objeto = $(this);
			var ids = objeto.attr("id");
			var clase = objeto.attr("class").split(" ");			
			if(ids == 'lugar_'+id  && clase[1] == undefined){
				objeto.remove();
				$(".movido").removeClass("movido");			
			}		
		});		
		
		if(id < filas){
			$("#contseccion_"+div+" #lugar_"+id+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+id+', '+div+', '+idioma+', '+idbanner+')"><img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+id+', '+div+', '+idioma+', '+idbanner+')">');
		}else{
			$("#contseccion_"+div+" #lugar_"+id+" .portalugares").html('<img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+id+', '+div+', '+idioma+', '+idbanner+')">');
		}
		
		if(ant > 1){
			$("#contseccion_"+div+" #lugar_"+ant+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+ant+', '+div+', '+idioma+', '+idbanner+')"><img src="imagenes/arriba.png" class="flechaarriba" onclick="subir('+ant+', '+div+', '+idioma+', '+idbanner+')">');
		}else{
			$("#contseccion_"+div+" #lugar_"+ant+" .portalugares").html('<img src="imagenes/abajo.png" class="flechaabajo" onclick="bajar('+ant+', '+div+', '+idioma+', '+idbanner+')">');
		}	
		
		$.post("ajax-save/intercambio-banners.php", {
			bannera: idbanner, 
			posiciona: ant,
			bannerb: idbannerb,
			posicionb: id,
			seccion: div
		}, function(){
			$("#loadingposicion").fadeOut("fast");	
		});
	});		
}

/*TAGS*/
function agregarTag(width, height, accion, idtag, idioma){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idtag="+idtag+"&ididioma="+idioma;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-tag.php?"+vars, function(){
		muestraPopup();	
	});		
}

function saveTag(){
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-tag.php?"+variables, function(){
			mensaje("Se han guardado correctamente los cambios");
			var id = $("#logo").data("link");
			cargaPagina("ajax", id, "loader", "");	
			closePopup();	
		});		
	}else{
		mensaje("Complete los campos marcados...");
	}
}

function eliminaTag(idtag, tag){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la moneda...");
		$.post("ajax-save/delete-tag.php", {id: idtag, tagname: tag}, function(e){
			mensaje(e);
			$("#fila_"+idtag).hide();
			//var id = $("#logo").data("link");
			//cargaPagina("ajax", id, "loader", "");			
		});	
    }
    else{    	
        return false;
    }
}
/*PAGINAS*/
function ptoursDescripciones(id){
	$("#menuRight li.nocheActiva").removeClass("nocheActiva");	
	$(".muestranoches:visible").fadeOut("fast", function(){
		$("#bb_"+id).slideDown("fast", function(){
			$("#c_"+id).addClass("nocheActiva");
		});
	});
}

function hospedajeDescripciones(id){
	$("#menuRightb li.hospedajeactivo").removeClass("hospedajeactivo");	
	$(".muestranoches:visible").fadeOut("fast", function(){
		$("#dd_"+id).slideDown("fast", function(){
			$("#d_"+id).addClass("hospedajeactivo");
		});
	});	
}

function guardaDescripcionPage(id){
	tinyMCE.triggerSave();
	$("#loading").show();	
	var valores = $("#forma_"+id).serialize();
	
	$.ajax({
        type:"POST",
        url:"ajax-save/save-page-descripcion.php",
        data:$("#forma_"+id).serialize(),
        success: function(response){              
			mensaje("Los cambios se han realizado con éxito...");
			$("#loading").hide();	
        }
    });		
	
	/*$.post("ajax-save/save-page-descripcion.php?"+valores, function(){
		mensaje("Los cambios se han realizado con éxito...");
		$("#loading").hide();	
	});	*/
}

function guardaDescripcionPageTours(id){
	tinyMCE.triggerSave();
	$("#loading").show();
	var valores = $("#formatour_"+id).serialize();
	/*$.post("ajax-save/save-page-descripcion.php?"+valores, function(){
		mensaje("Los cambios se han realizado con éxito...");
		$("#loading").hide();	
	});*/	
	
	$.ajax({
        type:"POST",
        url:"ajax-save/save-page-descripcion.php",
        data:$("#formatour_"+id).serialize(),
        success: function(response){              
			mensaje("Los cambios se han realizado con éxito...");
			$("#loading").hide();	
        }
    });			
}

function guardaDescripcionPageHoteles(id){
	tinyMCE.triggerSave();
	$("#loading").show();
	var valores = $("#formatour_"+id).serialize();
	$.ajax({
        type:"POST",
        url:"ajax-save/save-page-descripcion.php",
        data:$("#formahotel_"+id).serialize(),
        success: function(response){              
			mensaje("Los cambios se han realizado con éxito...");
			$("#loading").hide();	
        }
    });			
}

function detalleReserva(id){
	var vars = "idreserva="+id;
	cargaPagina("ajax", "ver-reserva.php", "loader", vars, "1", "0", "0");
	//Carpeta en la que se encuentra el archivo, archivo a cargar, div en el que se cargará, acomoda acomodara el reloader, scroll indica si se scrollea, editor tiny		
}

function ReenviarReserva(idreserva){
	$("#loading").show();
	$.post("ajax-save/renviar-reserva.php", {id: idreserva}, function(){
		mensaje("El correo se ha puesto en la fila de espera...");
		$("#loading").hide();	
	});	
}

function imprimir(){
	window.print();
}

function guardaTraducciones(){
	var valores = $("#frmTraducciones").serialize();
	$("#loading").show();
	$.post("ajax-save/menu.php?"+valores, function(){
		$("#loading").hide();	
	});
}

function guardaDiccionario(){
	var valores = $("#frmDiccionario").serialize();
	$("#loading").show();	
	$.ajax({
        type:"POST",
        url:"ajax-save/diccionario.php",
        data:$("#frmDiccionario").serialize(),
        success: function(response){              
            $("#loading").hide();
        }
    });	
}

function addContactoHotel(){
	var html='<div class="filaCorreos"><label>Nombre: </label><input type="text" name="nombreContacto[]" /><label>Correo: </label><input type="text" name="correoContacto[]" /></div>';
	$("#contenedorCorreos").append(html);
}

function guardarInfoHotel(){
	$("#loading").show();
	mensaje("Guardando cambios...");
	$.ajax({
        type:"POST",
        url:"ajax-save/save-info-hotel.php",
        data:$("#frmInfoHotel").serialize(),
        success: function(response){
            $("#loading").hide();
        }
    });	
}

function deleteContactoHotel(elem){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el contacto seleccionado...");
		$(elem).parent(".filaCorreos").remove();
    }
    else{    	
        return false;
    }	
}

function agregarFechaCierre(width, height, accion, idcierre, idhotel){
	//Accion 0: Agregar - Accion 1: Editar	
	var vars = "accion="+accion+"&idhotel="+idhotel+"&idcierre="+idcierre;
	acomodaPopup(width, height);
	$(".cajaCentral").load("ajax-popup/add-fecha-cierre.php?"+vars, function(){
		muestraPopup();	
	});		
}

function deletefechacierre(idcierre, num){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando el registro seleccionado...");
		$.post("ajax-save/delete-fecha-cierre.php", {id: idcierre}, function(e){
			mensaje("Se ha realizado exitosamente la operación...");
			$("#filita_"+num).remove();
		});
    }
    else{    	
        return false;
    }		
}

function saveFechaCierre(){
	var accion = $("#accion").val();
	var idhotel = $("#idhotel").val();
	var finicial = $("#finicial").val();
	var ffinal = $("#ffinal").val();
	var filas = parseInt($("#tablaRegistros tbody tr").length);
	var nfila = filas + 1;
	$(".agregarAlgo").hide();
	mensaje("Por favor espere, estamos guardando los cambios...");	
	var variables = $("#forma").serialize();	
	if(validacion('forma', 'validar')){
		$.post("ajax-save/save-fecha-cierre.php?"+variables, function(e){
			if(accion == 0){
				var html='<tr id="filita_'+nfila+'"><td>'+nfila+'</td><td>'+finicial+'</td><td>'+ffinal+'</td><td><img class="icon" src="imagenes/edit-clientes.png" onclick="agregarFechaCierre(248, 150, 1, '+e+', '+idhotel+')"><img class="icon"" src="imagenes/eliminar.png" onclick="deletefechacierre('+e+', '+nfila+')"></td></tr>';				
				$("#tablaRegistros tbody").append(html);
			}
			mensaje("Se han guardado correctamente los cambios");		
			closePopup();
			$(".agregarAlgo").show();	
		});
	}else{
		mensaje("Complete los campos marcados...");
	}	
}


function deleteImgHotel(idimg){
  if(confirm("Esta operacion es irreversible. ¿Desea continuar?")){
		mensaje("Por favor espere, estamos eliminando la imagen que ha seleccionado...");
		$.post("ajax-save/delete-imagen-hotel.php", {id: idimg}, function(){			
			$("#objectFile_"+idimg).remove();
			mensaje("Se ha eliminado exitósamente la imagen seleccionada...");			
		});
    }
    else{    	
        return false;
    }		
}

function guardarCuerpoCorreos(){
	tinyMCE.triggerSave();	
	$("#loading").show();
	mensaje("Guardando cambios...");
	$.ajax({
        type:"POST",
        url:"ajax-save/save-correos.php",
        data:$("#frmCorreos").serialize(),
        success: function(response){
            //console.log(response);  
            $("#loading").hide();
        }
    });		
}

function showtarifas(id){
	$(".currenttarifa").removeClass("currenttarifa");		
	$(".ocultartarifa:visible").fadeOut("fast", function(){
		$("#resumentarifas_"+id).fadeIn("fast", function(){
			$("#tarifas_"+id).addClass("currenttarifa");
		});
	});
}

function showroomtarifas(id, superid){
	$("#resumentarifas_"+superid+" .currentroomtarifa").removeClass("currentroomtarifa");		
	$(".ocultarsubcajon:visible").fadeOut("fast", function(){
		$("#resumentarifas_"+superid+" #resumenroomtarifas_"+id).fadeIn("fast", function(){
			$("#resumentarifas_"+superid+" #roomtarifas_"+id).addClass("currentroomtarifa");
		});
	});	
}

function showcontrato(id){
	var ctos = $(".ocultarcontrato:visible").length;
	if(id==0){
		$(".currentcontrato").removeClass("currentcontrato");
		if(ctos >= 1){
			$(".ocultarcontrato:visible").fadeOut("fast", function(){
				$("#agregarcontrato").fadeIn("fast", function(){
					$("#btnaddcontrato").addClass("currentcontrato");
				});
			});
		}else{
			$(".ocultarcontrato").fadeOut("fast", function(){
				$("#agregarcontrato").fadeIn("fast", function(){
					$("#btnaddcontrato").addClass("currentcontrato");
				});
			});			
		}		
	}else{
		$(".currentcontrato").removeClass("currentcontrato");		
		$(".ocultarcontrato:visible").fadeOut("fast", function(){
			$("#resumencontrato_"+id).fadeIn("fast", function(){
				$("#contrato_"+id).addClass("currentcontrato");
			});
		});
	}
}

function guardarcontrato(idcontrato){
	$("#loading").show();
	var valores = $("#formacontrato_"+idcontrato).serialize();
	$.post("ajax-save/save-contrato.php?"+valores, function(){
		$("#loading").hide();
		mensaje("El contrato se ha editado exitósamente.");		
	});
}

function agregarcontrato(idhotel){
	$("#loading").show();
	var valores = $("#frmnuevocontrato").serialize();
	$.post("ajax-save/save-contrato.php?"+valores, function(){
		$("#loading").hide();
		mensaje("El contrato se ha agregado exitósamente.");
		detalleHotel(idhotel);		
	});	
}

function isNumberKey(evt)
{  
    var charCode = (evt.which) ? evt.which : event.keyCode   
    if (charCode > 31 && (charCode < 48 || charCode > 57))   
        return false;
    return true;  
} 

function showhabitacion(id){
	var ctos = $(".ocultarhabitacion:visible").length;
	if(id==0){
		$(".currenthabitacion").removeClass("currenthabitacion");
		if(ctos >= 1){
			$(".ocultarhabitacion:visible").fadeOut("fast", function(){
				$("#agregarhabitacion").fadeIn("fast", function(){
					$("#btnaddhabitacion").addClass("currenthabitacion");
				});
			});			
		}else{
			$(".ocultarhabitacion").fadeOut("fast", function(){
				$("#agregarhabitacion").fadeIn("fast", function(){
					$("#btnaddhabitacion").addClass("currenthabitacion");
				});
			});			
		}		
	}else{
		$(".currenthabitacion").removeClass("currenthabitacion");		
		$(".ocultarhabitacion:visible").fadeOut("fast", function(){
			$("#resumenhabitacion_"+id).fadeIn("fast", function(){
				$("#habitacion_"+id).addClass("currenthabitacion");
			});
		});
	}
}

function guardarcontrato(idcontrato){
	$("#loading").show();
	var valores = $("#formacontrato_"+idcontrato).serialize();
	$.post("ajax-save/save-contrato.php?"+valores, function(){
		$("#loading").hide();
		mensaje("El contrato se ha editado exitósamente.");		
	});
}

function agregarcontrato(){
	$("#loading").show();
	var valores = $("#frmnuevocontrato").serialize();
	$.post("ajax-save/save-contrato.php?"+valores, function(){
		$("#loading").hide();
		mensaje("El contrato se ha agregado exitósamente.");		
	});	
}

function editahabitacion(idhabitacion){
	tinyMCE.triggerSave();
	$("#loading").show();
	var valores = $("#frmhabitacion_"+idhabitacion).serialize();
	$.post("ajax-save/save-habitacion.php?"+valores, function(){
		$("#loading").hide();
		mensaje("La habitación se ha modificado exitósamente.");		
	});	
}

function agregarhabitacion(idhotel){
	tinyMCE.triggerSave();
	$("#loading").show();
	var valores = $("#frmaddhabitacion").serialize();
	$.post("ajax-save/save-habitacion.php?"+valores, function(e){		
		$("#loading").hide();
		mensaje("La habitación se ha agregado exitósamente.");
		detalleHotel(idhotel);		
	});		
}

function buscatarifas(idcontrato, idhabitacion, idfrm){
	$("#action_"+idfrm).val(0);
	var valores = $("#frmbuscatarifa_"+idfrm).serialize();
	$("#loading").show();
	$("#body_"+idfrm).load("ajax/tabla-tarifas.php?"+valores, {contrato: idcontrato, habitacion: idhabitacion}, function(){
		$("#loading").hide();
		$("#action_"+idfrm).val(1);
	});
}

function modificatarifas(superid, id){
	$("#resumentarifas_"+superid+" #resumenroomtarifas_"+id+" #modificatarifas .cajon").toggle();	
}

function savetarifa(id){
	$("#loading").show();
	var valores = $("#frmtarifa_"+id).serialize();
	var desde = $("#desde_"+id).val();
	var hasta = $("#hasta_"+id).val();
	var actione = $("#action_"+id).val();
	if(desde != ""){
		if(hasta != ""){
			$.post("ajax-save/save-tarifas.php?"+valores, {d: desde, h: hasta}, function(){
				$("#body_"+id).load("ajax/tabla-tarifas.php?"+valores, {action: actione}, function(){
					$("#loading").hide();
				});
			});
			
		}else{
			$("#hasta_"+id).focus();
			$("#loading").hide();
			mensaje("Indique la fecha.");		
		}
	}else{
		$("#desde_"+id).focus();
		$("#loading").hide();
		mensaje("Indique la fecha.");
	}
}

function cargadeshahbitacion(){	
	var idhab = $("#habitacajon").val();
	var ididioma = $("#idiomacajon").val();
	if(idhab != 0){
		if(ididioma != 0){
			$.ajax({
		        type:"POST",
		        url:"ajax/carga-descripcion-habitacion.php",
		        data: {hab: idhab, idioma: ididioma},		        
		        success: function(response){             
					$("#ladescripcionhabitacion").html(response);
		        }
		    });			
		}else{
			mensaje("Seleccione un idioma");
		}
	}else{
		mensaje("Seleccione una habitación");
	}
}

function guardaDescripcionHahbitacion(){
	//mensaje("Estamos guardando la información....")
			$.ajax({
			  type: "POST",
			  url: "ajax-save/descripcion-habitacion.php",
			  data: $("#frmdeshabitacion").serialize()	 
			})
			.done(function(texto) {
				if(parseInt(texto)==0){
					var accion = parseInt(texto); 
					$("#deshabitaciones #ladescripcionhabitacion #accion").val(accion);	
				}
   	     	  mensaje("Se guardaron los cambios correctamente"); 	    	     	     	
		  	})
		  	.fail(function(){  		

		  	})
		  	.always(function() {
		    	//alert( "complete" );
		  	});			
}

function promovertour(elem, idtour){
        if($(elem).is(':checked')) {  
        	var st = 1;
        } else {
        	var st = 0;   
        }  
            $.post("ajax-save/promueve-tours.php", {id: idtour, estatus: st}, function(){
            	mensaje("Se guardaron los cambios correctamente");
            });          
}

function promoverpaquete(elem, idpaquete){
        if($(elem).is(':checked')) {  
        	var st = 1;
        } else {
        	var st = 0;   
        }  
            $.post("ajax-save/promueve-paquetes.php", {id: idpaquete, estatus: st}, function(){
            	mensaje("Se guardaron los cambios correctamente");
            });	
}
