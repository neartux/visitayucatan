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


<div class="top-header">
</div>
<div class="body-header">
    <div class="movil">
        <a href="#"><? traducciones(29); ?></a><span id="nav-mobile" class="icon-menu"></span>

        <div class="limpiar"></div>
    </div>
    <nav>
        <div class="limpiar"></div>
        <ul class="menu" id="menuL">

            <? for($m=0; $menu["idmenu"][$m]; $m++){
                if($menu["idmenu"][$m] != 4){
                    ?>
                    <li class="<? echo $menu["clase"][$m]; ?>"><a href="<? echo $menu["clase"][$m]; ?>" target="_self" title="Visita Yucatán"><? echo $menu["traduccion"][$m]; ?></a></li>
                <? }else{ if($idioma <= 2){ ?>
                    <li class="subMenu" onmouseover="showsubmenu(this)">
                        <a><? echo $menu["traduccion"][$m]; ?></a>
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
        <div class="limpiar"></div>
    </nav>
</div>