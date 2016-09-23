<input type="hidden" name="varIdioma" id="varIdioma" value="<? echo $idioma; ?>" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49932567-1', 'auto');
  ga('send', 'pageview');
</script>

<?
$menu = menu();
$idiomas = idiomas();
$destinos = destinos();
?>
<div class="center centerfull">
	<section id="logo"><a href="index" target="_self" title="Visita Yucatán"><img src="imagenes/logo.png" alt="Visita Yucatán" /></a></section>
		<nav>
			<ul>
				<? for($m=0; $menu["idmenu"][$m]; $m++){
				   if($menu["idmenu"][$m] != 4){	
				 ?>
				   <li class="<? echo $menu["clase"][$m]; ?>"><a href="<? echo $menu["clase"][$m]; ?>" target="_self" title="Visita Yucatán"><? echo $menu["traduccion"][$m]; ?></a></li>
				 <? }else{ if($idioma <= 2){ ?>
					<li class="submenu" onmouseover="showsubmenu(this)">
						<span><? echo $menu["traduccion"][$m]; ?></span>
						<ul class="ulsubmenu" onmouseout="hidesubmenu(this)">
							<? for($d=0; $destinos["iddestino"][$d]; $d++){
								$de = strtolower ($destinos["destino"][$d]); 
								$linkdestino = "hoteles-en-new/".$de."/".$destinos["iddestino"][$d]."/".$idioma."/";
								?>
								<li><a href="<? echo $linkdestino; ?>"><? echo $destinos["destino"][$d]; ?></a></li>	
							<? } ?>
						</ul> 
					</li>				 	
				 <? }} ?> 
				<? } ?>		 				
				<li class="mapas"><a href="mapas" target="_self" title="Visita Yucatán">Mapas</a></li>
			</ul>
		</nav>
		
		
		<div id="banderas">
			<? for($id=0; $idiomas["ididioma"][$id]; $id++){ ?>
				<img src="imagenes/banderas/<? echo $idiomas["bandera"][$id]; ?>" onclick="cambiaidiomabandera('<? echo $idiomas["ididioma"][$id]; ?>')" />
			<? } ?>
		</div>
		
		<div id="navcel" onclick="menucel()">
			<div id="cajamenu">
				<div class="rayanav"></div>
				<div class="rayanav"></div>
				<div class="rayanav"></div>
				<div class="rayanav"></div>
			</div> 
		</div>
</div>

<!-- PRECARGADO DE IMAGENES -->
<!<img src="imagenes/busqueda-hoteles.png" class="oculto" />
<img src="imagenes/busqueda-paquetes.png" class="oculto" />
<img src="imagenes/busqueda-tours.png" class="oculto" />
<img src="imagenes/chat2.png" class="oculto" />
<img src="imagenes/dudas2.png" class="oculto" />
<img src="imagenes/encuentra2.jpg" class="oculto" />
<img src="imagenes/hoteles-pointer.png" class="oculto" />
<img src="imagenes/paquetes-poiter.png" class="oculto" />
<img src="imagenes/tours-pointer.png" class="oculto" />