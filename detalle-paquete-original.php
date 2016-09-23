<?
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$idpaquete = $_REQUEST["idpaquete"];
$elidioma = $_REQUEST["lang"];
//actualizavisitasPaquetes($idpaquete);
$estancia = paquetesEstancia($idpaquete);
$elpaquete =  paquetes($idpaquete);
$fotos = fotospaquete($idpaquete);
?>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
    <base href="http://localhost/visitayucatan/">
    <title></title>
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <? include ("templates/snipped-header.php"); ?>
</head>
<body>
<form id="reservaPaquete" name="reservaPaquete" action="reserva-paquetes" method="post">
    <input type="text" name="idtipo" id="idtipo" class="oculto" />
    <input type="text" name="idpaquete" id="idpaquete" class="oculto" />
    <input type="text" name="idcombinacion" id="idcombinacion" class="oculto" />
</form>
<header><? include("templates/header.php"); ?></header>
<section id="contenido">
    <div class="center">
        <section id="contenidoLeft">
            <div id="galeria">
                <div id="fotoPral">
                    <? for($f=0; $fotos["idfoto"][$f]; $f++){ if($fotos["principal"][$f] == 1){ ?>
                        <img src="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" alt="" />
                    <? } } ?>
                </div>
                <div class="nombrepaquete">
                    <h1 class="oswaldo"><? echo $elpaquete["nombre"][0]; ?></h1>
                    <div class="cajitaestrellas">
                        <img src="imagenes/estrella.png" />
                        <img src="imagenes/estrella.png" />
                        <img src="imagenes/estrella.png" />
                        <img src="imagenes/estrella.png" />
                    </div>
                    <h3><? echo $elpaquete["circuito"][0]; ?></h3>
                    <?
                    $linkface = "http://www.visitayucatan.com/comparte-paquete.php?lang=".$idioma."&r=1&idpaquete=".$idpaquete;
                    //$linkface = "http://www.visitayucatan.com/paquetes-yucatan";
                    ?>
                    <!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<? echo $linkface; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
									<span class="compartirlistahoteles"><img src="imagenes/compartir-facebook.png" /></span>
								</a>-->
                </div>
                <div class="minifotospaquete">
                    <? for($f=0; $fotos["idfoto"][$f]; $f++){  ?>
                        <img onclick="cargafotoPaquete(this)" src="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" alt="" />
                    <? } ?>
                </div>
            </div>

            <div id="descripciontitle">
                <h2 class="oswaldo"><? traducciones(9); ?></h2>
                <img src="imagenes/flecha-paquetes.png" class="flechaPaquetes" />
            </div>

            <div class="descripcionpaquete"><? echo $elpaquete["descripcion"][0]; ?></div>

            <div id="portadorpaquetes">
                <div id="paquetesLeft">
                    <div class="escogepaquete"><h3><? traducciones(14); ?></h3></div>
                    <div class="listapaquetes">
                        <ul>
                            <? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){ ?>
                                <li <? if($pe==0){ ?> class="currentpe" <? } ?> onclick="showPaquete('<? echo $estancia["idcombinacion"][$pe]; ?>', this)"><span><? echo $estancia["dias"][$pe]; ?> <? traducciones(11); ?> <? traducciones(52); ?> <? echo $estancia["noches"][$pe]; ?> <? traducciones(31); ?></span></li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <div id="paquetesRight">
                    <? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){
                        $tabla = paqueteEstanciaHotel($idpaquete, $estancia["noches"][$pe], $estancia["dias"][$pe]);
                        ?>
                        <div id="paquete_<? echo $estancia["idcombinacion"][$pe]; ?>" class="supercaja <? if($pe==0){ ?> current <? } ?>">
                            <h2 class="selectHotel"><? traducciones(21); ?></h2>
                            <h2 class="selectRoom"><? traducciones(20); ?></h2>
                            <select name="seleccciondehabitacion" class="seleccciondehabitacion">
                                <option value="sencilla"><? traducciones(44); ?></option>
                                <option value="doble"><? traducciones(12); ?></option>
                                <option value="triple"><? traducciones(50); ?></option>
                                <option value="cuadruple"><? traducciones(8); ?></option>
                            </select>
                            <h3 class="booknowtitle"><? traducciones(40); ?></h3>
                            <div id="" class="cajitapaquetes">
                                <div class="tableroPrecios">
                                    <table cellpadding="0" cellspacing="0">
                                        <? for($t=0; $tabla["idcombinacion"][$t]; $t++){
                                            $fotohoteles = imagenesHotel($tabla["idhotel"][$t]);

                                            ?>
                                            <tr>
                                                <td class="tdhotel">
                                                    <h4 class="nombrehotel oswaldo"><? echo $tabla["hotel"][$t]; ?></h4>
                                                    <div class="cajitaestrellas">
                                                        <? for($s=1; $s <= $tabla["stars"][$t]; $s++){ ?>
                                                            <img src="imagenes/estrella.png" />
                                                        <? } ?>
                                                    </div>
                                                    <br />
                                                    <? for($fh=0; $fotohoteles["idimagen"][$fh]; $fh++){
                                                        $fgrupo = $fotohoteles["idhotel"][$fh];
                                                        if($fh == 0){
                                                            ?>
                                                            <a class="fancyone" href="imagenes/hoteles/<? echo $fotohoteles["imagen"][$fh]; ?>" data-fancybox-group="grupo_<? echo $fgrupo; ?>">VER GALERIA</a>
                                                        <? }else { ?>
                                                            <a class="fancyone oculto" href="imagenes/hoteles/<? echo $fotohoteles["imagen"][$fh]; ?>" data-fancybox-group="grupo_<? echo $fgrupo; ?>"></a>
                                                        <? } } ?>

                                                </td>
                                                <td>
                                                    <button type="button" class="btnReservaPaquete precio_sencilla" onclick="reservaPaqueteOn('1', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["sencilla"][$t]; ?>')">
                                                        <? if($tabla["sencilla"][$t]>1){ ?>
                                                            $<? echo number_format($tabla["sencilla"][$t])." ".$tabla["simbolo"][$t]; ?>
                                                        <? } else { echo "No aplica"; } ?>
                                                        <br /><? traducciones(59); ?>
                                                    </button>

                                                    <button type="button" class="btnReservaPaquete precio_doble oculto" onclick="reservaPaqueteOn('2', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["doble"][$t]; ?>')">
                                                        <? if($tabla["doble"][$t]>1){ ?>
                                                            $<? echo number_format($tabla["doble"][$t])." ".$tabla["simbolo"][$t]; ?>
                                                        <? } else { ?>
                                                            <? echo "No aplica"; } ?>
                                                        <br /><? traducciones(59); ?>
                                                    </button>

                                                    <button type="button" class="btnReservaPaquete precio_triple oculto" onclick="reservaPaqueteOn('3', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["triple"][$t]; ?>')">
                                                        <? if($tabla["triple"][$t]>1){ ?>
                                                            $<? echo number_format($tabla["triple"][$t])." ".$tabla["simbolo"][$t]; ?>
                                                        <? } else { ?>
                                                            <? echo "No aplica"; } ?>
                                                        <br /><? traducciones(59); ?>
                                                    </button>

                                                    <button type="button" class="btnReservaPaquete precio_cuadruple oculto" onclick="reservaPaqueteOn('4', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["cuadruple"][$t]; ?>')">
                                                        <? if($tabla["cuadruple"][$t]>1){ ?>
                                                            $<? echo number_format($tabla["cuadruple"][$t])." ".$tabla["simbolo"][$t]; ?>
                                                        <? } else { ?>
                                                            <? echo "No aplica"; } ?>
                                                        <br /><? traducciones(59); ?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>

                <? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){
                    $itinerario = descripcionItinerarios($idpaquete, $estancia["dias"][$pe]);
                    ?>
                    <div id="secundaria_<? echo $estancia["idcombinacion"][$pe]; ?>" class="cajitasecundariapaquetes <? if($pe ==0){ ?> current <? } ?>">
                        <div id="cajaitinerario_<? echo $estancia["idcombinacion"][$pe];  ?>" class="cajitaitinerario <? if($pe >= 1){ echo "oculto"; } ?>">
                            <? echo $itinerario["itinerario"][0]; ?>
                            <br /><hr />
                        </div>


                        <div class="cajitadetalles">
                            <? echo $elpaquete["incluye"][0]; ?>
                            <div class="datoscontacto">
                                <span class="eltelefonito">01 (999) 289.56.44</span>
                                <a href="mailto: gmartinez@visitayucatan.com"><span class="dudasdatos"></span></a>
                                <!--<span class="chatdatos"></span>-->
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </section>
        <section id="contenidoRight">
            <div id="otrosPaquetes">
                <h2><? traducciones(36); ?></h2>

                <div class="minipaquetes">
                    <? $paquetes = paquetesSimilares($idpaquete);
                    for($i=0; $paquetes["idpaquete"][$i]; $i++){
                        ?>
                        <div class="miniregistro">
                            <a href="detalle-paquete?idpaquete=1" target="_self"><img src="imagenes/paquetes/<? echo $paquetes["archivo"][$i]; ?>" class="minifoto" /></a>
                            <div class="miniinfo">
                                <h2><? echo $paquetes["nombre"][$i]; ?></h2>
                                <div class="cajitaestrellas">
                                    <img src="imagenes/estrella-blanca.png" />
                                    <img src="imagenes/estrella-blanca.png" />
                                    <img src="imagenes/estrella-blanca.png" />
                                    <img src="imagenes/estrella-blanca.png" />
                                </div>
                                <h3>$<? echo number_format($paquetes["sencilla"][$i])." ".$paquetes["simbolo"][$i]; ?></h3>
                            </div>
                        </div>
                        <div class="separadormini"></div>
                    <? } ?>
                </div>
            </div>
            <? include("templates/publicidad.php"); ?>
        </section>
    </div>
</section>
<footer><? include("templates/footer.php"); ?></footer>
</body>
</html>