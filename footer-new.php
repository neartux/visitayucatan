<div class="row footer-main">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-sm-1 col-md-1 col-xs-1"></div>
        <div class="col-sm-10 col-md-10 col-xs-10">
            <div class="col-sm-3 col-md-3 col-xs-3">
                <ul class="footer-section1">
                    <li><a href="" class="no-style-a"><? traducciones(61); ?></a></li>
                    <li><a class="no-style-a" href="paquetes-yucatan"><? traducciones(62); ?></a></li>
                    <li><a href="tours-en-yucatan.php" class="no-style-a"><? traducciones(63); ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3">
                <ul class="footer-section2">
                    <li><a href="hoteles-en-merida.php" class="no-style-a"><? traducciones(64); ?></a></li>
                    <li><a href="yucatan-mexico.php" class="no-style-a"><? traducciones(65); ?></a></li>
                    <li><a href="contacto.php" class="no-style-a"><? traducciones(66); ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3 text-center">
                <span class="text-bold fnt-size-16">Moneda</span>
                <select name="moneda" id="moneda" onchange="cambiamoneda(this)" class="form-control">
                    <? for($m=0; $monedas["idmoneda"][$m]; $m++){ ?>
                        <option value="<? echo $monedas["idmoneda"][$m].", ".$monedas["tipocambio"][$m]; ?>" <? if($monedas["idmoneda"][$m] == $moneda){ ?>selected="selected" <? } ?>>
                            <? echo $monedas["simbolo"][$m]; ?>
                        </option>
                    <? } ?>
                </select>
                <span class="text-bold fnt-size-16">Idioma</span>
                <select name="idioma" id="idioma" onchange="cambiaidioma(this)" class="form-control">
                    <? for($i=0; $idiomas["ididioma"][$i]; $i++){ ?>
                        <option value="<? echo $idiomas["ididioma"][$i]; ?>" <? if($idiomas["ididioma"][$i] == $idioma){ ?>selected="selected" <? } ?>>
                            <? echo $idiomas["claveidioma"][$i]; ?>
                        </option>
                    <? } ?>
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3">
                <img src="files-new-design/detail/logo-pie.png" class="img-footer img-responsive"/>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>