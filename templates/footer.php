<? 
$monedas = monedas();
//$idiomas = idiomas();
?>
<div class="center">
	<div class="columnaFooter moviloculto">
		<h2><? traducciones(46); ?></h2>
		<div class="separadorFooter"></div>

		<a href="https://www.facebook.com/visitayucatan?ref=br_rs" target="_blank"><img src="imagenes/face-footer1.jpg" class="logosocial" /><h3 class="tituloSocial">Facebook</h3></a>
		<a href="https://twitter.com/VisitYucatan" target="_blank"><img src="imagenes/twitter-footer.jpg" class="logosocial" /><h3 class="tituloSocial">Twitter</h3></a>
		<img src="imagenes/googlemas-footer.jpg" class="logosocial" /><h3 class="tituloSocial">Google +</h3>

	</div>
	<div class="columnaFooter">
		<h2><? traducciones(30); ?></h2>
		<div class="separadorFooter"></div>
			
		<select name="moneda" id="moneda" onchange="cambiamoneda(this)">
			<? for($m=0; $monedas["idmoneda"][$m]; $m++){ ?>
				<option value="<? echo $monedas["idmoneda"][$m].", ".$monedas["tipocambio"][$m]; ?>" <? if($monedas["idmoneda"][$m] == $moneda){ ?>selected="selected" <? } ?>>
					<? echo $monedas["simbolo"][$m]; ?>
				</option>
			<? } ?>
		</select>
		
		<h2 id="titleidioma"><? traducciones(23); ?></h2>
		<div class="separadorFooter"></div>		

		<select name="idioma" id="idioma" onchange="cambiaidioma(this)">
			<? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
				<option value="<? echo $idiomas["ididioma"][$i]; ?>" <? if($idiomas["ididioma"][$i] == $idioma){ ?>selected="selected" <? } ?>>
					<? echo $idiomas["claveidioma"][$i]; ?>
				</option>
			<? } ?>
		</select>		

	</div>
	<div class="columnaFooter moviloculto">
		<h2><? traducciones(29); ?></h2>
		<div class="separadorFooter"></div>
		<ul>
			<? for($m=0; $menu["idmenu"][$m]; $m++){ ?>
				<li><a class="capital" href="<? echo $menu["clase"][$m]; ?>" target="_self" title="Visita Yucatán"><? echo $menu["traduccion"][$m]; ?></a></li>
			<? } ?>
		</ul>
	</div>
	<div class="columnaFooter">
		<h2><? traducciones(3); ?></h2>
		<div class="separadorFooter"></div>
		<ul>
			<li><a href="contacto"><? traducciones(55); ?></a></li>
			<li><? traducciones(45); ?></li>
			<li><? traducciones(17); ?></li>
			<li><a href="aviso-privacidad" title="Aviso de privacidad"><? traducciones(2); ?></a></li>
			<li><a href="politicas-cancelacion" title="Políticas de cancelación"><? traducciones(37); ?></a></li>
			<li><a href="recomendaciones-generales" title="Recomendaciones generales"><? traducciones(41); ?></a></li>
		</ul>
	</div>
	<div class="columnaFooter columnaimagenes topparaipad">
		<!--<img src="imagenes/sello.png" class="sellos" />
		<img src="imagenes/yuc-logo-web.png" alt="Yucatán Travel" class="sellos" />-->
	</div>
</div>

<div id="mensajes"><p></p></div>