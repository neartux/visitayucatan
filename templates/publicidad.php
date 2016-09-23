<?
	$banners= banners($seccion);
	for($b=0; $banners["idbanner"][$b]; $b++){
?>
	<img src="imagenes/banners/<? echo $banners["archivo"][$b]; ?>" class="banner <? if($b==0){ ?> bannerfirst <? } ?>" />
<? } ?>
<!--<img src="imagenes/banner.jpg" class="banner bannerfirst" />
<img src="imagenes/banner2.jpg" class="banner" />-->