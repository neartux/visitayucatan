<? $slides = slides(); ?>
<div id="superslide" class="solopc">
	<? for($s=0; $slides["idslide"][$s]; $s++){ $num = $s+1; ?>
		<img src="imagenes/slides/<? echo $slides["archivo"][$s]; ?>" alt="Paquetes Riviera Maya" class="imgslide <? if($s>= 1){ ?> oculto <? } ?>" id="cont_<? echo $num; ?>" />
	<? } ?>
</div>