<?
$monedas = monedas();
//$idiomas = idiomas();
?>

<footer>
    <div>
        <div class="column columna-uno">
            <h2><? traducciones(30); ?></h2>
            <select name="moneda" id="moneda" onchange="cambiamoneda(this)">
                <? for($m=0; $monedas["idmoneda"][$m]; $m++){ ?>
                    <option value="<? echo $monedas["idmoneda"][$m].", ".$monedas["tipocambio"][$m]; ?>" <? if($monedas["idmoneda"][$m] == $moneda){ ?>selected="selected" <? } ?>>
                        <? echo $monedas["simbolo"][$m]; ?>
                    </option>
                <? } ?>
            </select>

            <h2 class="idioma"><? traducciones(23); ?></h2>
            <select name="idioma" id="idioma" onchange="cambiaidioma(this)">
                <? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
                    <option value="<? echo $idiomas["ididioma"][$i]; ?>" <? if($idiomas["ididioma"][$i] == $idioma){ ?>selected="selected" <? } ?>>
                        <? echo $idiomas["claveidioma"][$i]; ?>
                    </option>
                <? } ?>
            </select>
        </div>
        <div class="column">
            <h2><? traducciones(29); ?></h2>
            <ul class="menu-footer">
                <? for($m=0; $menu["idmenu"][$m]; $m++){ ?>
                    <li><a class="capital" href="<? echo $menu["clase"][$m]; ?>" target="_self" title="Visita Yucatán"><? echo $menu["traduccion"][$m]; ?></a></li>
                <? } ?>
            </ul>
        </div>
        <div class="column">
            <h2><? traducciones(3); ?></h2>
            <ul class="menu-footer">
                <li><a href="contacto"><? traducciones(55); ?></a></li>
                <li><? traducciones(45); ?></li>
                <li><? traducciones(17); ?></li>
                <li><a href="aviso-privacidad" title="Aviso de privacidad"><? traducciones(2); ?></a></li>
                <li><a href="politicas-cancelacion" title="Políticas de cancelación"><? traducciones(37); ?></a></li>
                <li><a href="recomendaciones-generales" title="Recomendaciones generales"><? traducciones(41); ?></a></li>
            </ul>
        </div>
        <div class="column-img">
            <!--<img src="imagenes/sello.png" class="img-footer1">
            <img src="imagenes/yuc-logo-web.png" alt="Yucatán Travel" class="img-footer2">-->
        </div>
    </div>
</footer>