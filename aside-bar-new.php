<h3 class="text-center" style="color: #EFB64E;font-weight: bold;"><? traducciones(36); ?></h3>
<div class="row">
    <? $paquetes = paquetesSimilares($idpaquete);
    for($i=0; $paquetes["idpaquete"][$i]; $i++){
        ?>
        <div class="col-sm-12 text-center mt-xs">
            <a href="detalle-paquete?idpaquete=1" target="_self">
                <img src="imagenes/paquetes/<? echo $paquetes["archivo"][$i]; ?>" class="img-thumbnail" width="140" height="100"/>
            </a>
            <h8><? echo $paquetes["nombre"][$i]; ?></h8>
            <div class="cajitaestrellas">
                <img src="imagenes/estrella-blanca.png" />
                <img src="imagenes/estrella-blanca.png" />
                <img src="imagenes/estrella-blanca.png" />
                <img src="imagenes/estrella-blanca.png" />
            </div>
            <h5>$<? echo number_format($paquetes["sencilla"][$i])." ".$paquetes["simbolo"][$i]; ?></h5>
        </div>

        <hr style="border-bottom-color: #0A246A;">

    <? } ?>
</div>