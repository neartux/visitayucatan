<? 
include("templates/sessions.php"); 
include("scripts/consultas.php");
$paquetes = paquetesIndex();
$seccion = 1;
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>		
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Visita yucatan</title>
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<!-- STYLE -->
		<link type="text/css" rel="stylesheet" href="css/estilosnew.css">
		
		<!-- JQUERY -->
		<script type="text/javascript" src="scripts/jquery.js"></script>
		
		<!-- JQUERY UI -->
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<link type="text/css" rel="stylesheet" href="scripts/jquery-ui.min.css">
		
		<!-- FANCY BOX -->
		<script type="text/javascript" src="scripts/fancybox.js"></script>
		<link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />   
		
		<!-- FUNCTIONS -->
		<script src="scripts/funciones.js"></script>
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
		
		<!-- SLIDES -->
		<script src="scripts/slides/jquery.slides.min.js"></script>
	</head>
	<body>
		<?
			$menu = menu();
			$destinos = destinos();
			$idiomas = idiomas();	
			$paquetes = paquetesIndex();	
			$tours =  tourshome();	
		?>
		<header class="left full">
			<div id="logo" class="left"><img src="imagenesnew/logo.png" class="imgresponsive" /></div>
			<nav id="navpc" class="celoculto right">
				<ul>
					<? for($m=0; $menu["idmenu"][$m]; $m++){
					   if($menu["idmenu"][$m] != 4){	
					 ?>
					   <li class="<? echo $menu["clase"][$m]; ?>"><a href="<? echo $menu["clase"][$m]; ?>" target="_self" title="Visita Yucatán" class="mayusculas"><? echo $menu["traduccion"][$m]; ?></a></li>
					 <? }else{ if($idioma <= 2){ ?>
						<li class="submenu">
							<span class="letrablanca mayusculas pointer"><? echo $menu["traduccion"][$m]; ?></span>
							<ul>
								<? for($d=0; $destinos["iddestino"][$d]; $d++){
									$de = strtolower ($destinos["destino"][$d]); 
									$linkdestino = "hoteles-en/".$de."/".$destinos["iddestino"][$d]."/".$idioma."/";
									?>
									<li><a href="<? echo $linkdestino; ?>"><? echo $destinos["destino"][$d]; ?></a></li>	
								<? } ?>
							</ul> 
						</li>				 	
					 <? }} ?> 
					<? } ?>		 				
					<li class="mapas mayusculas"><a href="mapas" target="_self" title="Visita Yucatán">Mapas</a></li>
					<li>
						<div class="cajabandera pointer" onclick="muestraidiomas()">
							<? for($id=0; $idiomas["ididioma"][$id]; $id++){
								 if($idioma == $idiomas["ididioma"][$id]){
								 	$clase = "banactiva";
								 }else{
								 	$clase = "oculto";
								 }
								 ?>								
								<div class="banderita <? echo $clase; ?>"><img src="imagenes/banderas/<? echo $idiomas["bandera"][$id]; ?>" onclick="cambiaidiomabandera('<? echo $idiomas["ididioma"][$id]; ?>')"  /></div>
							<? } ?>
						</div>
					</li>
				</ul>
			</nav>
			
			<div class="pcoculto portamenumovil" onclick="muestramenu()">
				<div class="rayamenu"></div>
				<div class="rayamenu"></div>
				<div class="rayamenu"></div>
				<div class="rayamenu"></div>
				<div class="rayamenu"></div>
			</div>
			
			<div id="menumovil" class="oculto">
					<h2 id="titulomenu" class="left full letrablanca mleft fontnormal mbottom2">Menú</h2>
					<ul>
						<? for($m=0; $menu["idmenu"][$m]; $m++){
						   if($menu["idmenu"][$m] != 4){	
						 ?>						   	
							<li class="table">
								<div class="tablecell">								
									<a href="<? echo $menu["clase"][$m]; ?>" class="pointer letrablanca mayusculas"><? echo $menu["traduccion"][$m]; ?></a>
								</div>
							</li>						   	
						   	
						 <? }else{ if($idioma <= 2){ ?>
							<li class="table">
								<span class="letrablanca mayusculas pointer tablecell" onclick="muestrasubmenucel()"><? echo $menu["traduccion"][$m]; ?></span>
									<ul id="ulsubmenu" class="oculto">
										<? for($d=0; $destinos["iddestino"][$d]; $d++){
											$de = strtolower ($destinos["destino"][$d]); 
											$linkdestino = "hoteles-en/".$de."/".$destinos["iddestino"][$d]."/".$idioma."/";
											?>
											<li class="table"><a class="tablecell mayusculas letranegra" href="<? echo $linkdestino; ?>"><? echo $destinos["destino"][$d]; ?></a></li>	
										<? } ?>
									</ul>
							</li>		 	
						 <? }} ?> 
						<? } ?>	
						
						
						<li class="table mapas"><a class="tablecell letrablanca mayusculas" href="mapas" target="_self" title="Visita Yucatán">Mapas</a></li>
						
					</ul>
			</div>						
			
		</header>
		<section id="contenido" class="contenido-home left full">
			<div class="left full textcenter"><img src="imagenesnew/bienvenidos.png" class="imgresponsive" /></div>			
			<div id="cajitaspromo" class="table">				
			
				
				<? for($i=0; $paquetes["idpaquete"][$i]; $i++){
					 $n = $i + 1; 
					 $desde = number_format($paquetes["sencilla"][$i]);
					 $monedita = $paquetes["simbolo"][$i];
					 $link = "paseos-en-yucatan/".string2url($paquetes["nombre"][$i])."/".$paquetes["idpaquete"][$i]."/".$idioma."/";
				?>
				<a href="<? echo $link; ?>" title="<? echo $paquetes["nombre"][$i]; ?>">								
					<div class="cajitasdepromo relative view view-sixth">
						<img src="imagenes/paquetes/<? echo $paquetes["archivo"][$i]; ?>" class="ocultos imgresponsive" />
						<div class="mask oscuro absolute descripcionpromo">
							<div class="nombrepromo"><? echo $paquetes["nombre"][$i]; ?></div>
							<div class="full left transpverde titulopromocion"><h2 class="mayusculas full left">¡<? traducciones(40); ?>!</h2></div>
							<div class="right mtop elpreciopaquete">
								<span class="desde"><? traducciones(10); ?></span>
								<span class="preciopaquete"><? echo "$ ".$desde; ?></span>
								<span class="moneda"><? echo $monedita; ?></span>
							</div>
						</div>
					</div>
				</a>
				<? } if($n < 8){ 
					for($i=0; $tours["idtour"][$i]; $i++){
					$link= "tours-en-yucatan/".string2url($tours["nombre"][$i])."/".$tours["idtour"][$i]."/".$idioma."/";
					$nc = $i + 1;	
					$nn = $n + 	$nc;
					if($nn <= 8){
				?>
				<a href="<? echo $link; ?>" title="<? echo $tours["nombre"][$i]; ?>">
					<div class="cajitasdepromo relative view view-sixth">
						<img src="imagenes/tours/<? echo $tours["archivo"][$i]; ?>" class="ocultos imgresponsive" />
						<div class="mask oscuro absolute descripcionpromo">
							<div class="nombrepromo"><? echo $tours["nombretour"][$i]; ?></div>
							<div class="full left transpverde titulopromocion"><h2 class="mayusculas full left">¡<? traducciones(40); ?>!</h2></div>
							<div class="right mtop elpreciopaquete">							
								<span class="preciopaquete"><? echo "$ ".ceil($tours["tadulto"][$i]); ?></span>
								<span class="moneda"><? echo $tours["simbolo"][$i]; ?></span>
							</div>
						</div>
					</div>		
				</a>		
				<? }}} ?>	
				
				<div class="left mtop2 full textcenter oscuro"><h2 class="letrablanca"><? traducciones(59); ?></h2></div>
				
			</div>
			
		</section>
		<footer><? include("templates/footer.php"); ?></footer>
		<script>
			bandera = 1;
			function muestraidiomas(){
				if(bandera == 1){
					$(".banderita").show();
					bandera = 0;
				}else{
					$(".banderita:not(.banactiva)").hide();
					bandera = 1;
				}
			}
			$(document).ready(function(){
				var w = $(window).width();
				console.log(w);
			});
		</script>
	</body>
</html>
