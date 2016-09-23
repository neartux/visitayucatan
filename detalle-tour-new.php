<?
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
//ini_set("display_errors", 1);
$idtour = $_REQUEST["idtour"];
//actualizavisitasTours($idtour);
$eltour =  tours($idtour, 0, 0);
$origenes =precioOrigenes($idtour);
$fotos = fotosTour($idtour);
$otros = otrosTours($idtour);

$menu = menu();
$idiomas = idiomas();
$destinos = destinos();
$monedas = monedas();
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
    <? include ("libs-new.php"); ?>
    <script>
        $(function () {
            $('.img-main-package').magnificPopup({
                type:'image'
            });
            $('.img-main').magnificPopup({
                type:'image',
                gallery:{
                    enabled:true
                }
            });

            $('.group-img').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{
                        enabled:true,
                        tPrev: '',
                        tNext: ''
                    },
                    tClose: '',
                    fixedContentPos: false
                });
            });
        });
    </script>
</head>
<body>
<header>
    <figure class="logo">
        <a href=""><img src="files-new-design/detail/logo_web.png" class="img-responsive" alt="Visita Yucatan"/></a>
    </figure>
    <div class="row">
        <div class="col-sm-12 mark-blue-header"></div>
    </div>
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-sm-12 mark-menu-header">
            <? include("general-templates/header.php"); ?>
        </div>
    </div>
</header>

<section>
    <div class="row">
        <div class="col-sm-12 background-gray">
            <div class="col-sm-1">&nbsp;</div>
            <div class="col-sm-10 background-principal-inf">
                <div class="col-sm-6" style="padding: 0;">
                    <div class="col-sm-6" style="padding: 0;">
                        <? for($f=0; $fotos["idfoto"][$f]; $f++){ if($fotos["principal"][$f] == 1){ ?>
                            <a href="imagenes/tours/<? echo $fotos["archivo"][0]; ?>" class="img-main-package">
                                <img src="imagenes/tours/<? echo $fotos["archivo"][0]; ?>" class="img-thumbnail imgprincipal-package"/>
                            </a>
                        <? } } ?>
                    </div>
                    <div class="col-sm-6  title-second text-right" style="padding: 0;margin-top: 112px;margin-left: -5px;">
                        <h3 class="color-red-pck text-bold text-center" style="margin-bottom: 0;"><? echo $eltour["nombretour"][0]; ?></h3>


                        </h1>
                        <div class="box-circuit">
                            <div class="first-part-box">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="second-part-box">
                                <? echo $eltour["circuito"][0]; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12 text-right" style="padding: 0;margin-top: 60px;">
                    <div class="col-sm-12 col-md-12 col-xs-12 parent-container" style="padding: 10px;">
                        <? for($f=0; $fotos["idfoto"][$f]; $f++){  ?>
                            <a href="imagenes/tours/<? echo $fotos["archivo"][$f]; ?>" class="img-main">
                                <img src="imagenes/tours/<? echo $fotos["archivo"][$f] ?>" class="img-thumbnail img-preview-package"/>
                            </a>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="col-md-1"></div>
            <div class="col-md-10 background-gray-bold">
                <div class="col-sm-2" style="padding: 6px;">
                </div>
                <div class="col-sm-8 contend-body-packages">
                    <h4 class="color-pink text-bold text-uppercase"><? traducciones(9); ?></h4>
                    <hr style="border-top: 1px solid rgb(239, 182, 78) !important;">
                    <? echo $eltour["nombretour"][0]; ?> <br>
                    <? echo $eltour["circuito"][0]; ?>
                    <br> <br>
                    <div style="font-size: 12px;" class="descriptin-product">
                        <? echo $eltour["descripcion"][0]; ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 background-pink">
                            <div class="col-sm-6 color-white text-bold text-uppercase text-italic p-sm" style="font-size: 20px"><? traducciones(40); ?></div>
                            <div class="col-sm-6 color-white text-bold p-sm">
                                <span class="updateprecio">
							        <img class="imgleft" src="imagenes/ajax-loader.gif" />
							            Actualizando precios / Updating prices
							        <img class="imgright" src="imagenes/ajax-loader.gif" />
						        </span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-xxl">

                        <div class="col-sm-4">
                            <label class="oswaldo color-pink"><? traducciones(58); ?>:</label>
                            <form id="reservaPaquete" name="reservaPaquete" action="reserva-tours" method="post">
                                <input type="text" name="idtipo" id="idtipo" class="oculto" value="2" />
                                <input type="text" name="idtour" id="idtour" class="oculto" value="<? echo $idtour; ?>" />
                                <input type="text" name="idorigen" id="idorigen" class="oculto" />
                                <input type="text" name="idregistroorigen" id="idregistroorigen" class="oculto" />
                                <input type="text" name="cantadultos" id="cantadultos" class="oculto" />
                                <input type="text" name="cantmenores" id="cantmenores" class="oculto" />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="fecha" id="fecha" class="datepicker form-control"/>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <label class="oswaldo color-pink"><? traducciones(28); ?>:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                <select name="menores" id="menores" onchange="tarifaAdultosTours(this)" class="form-control">
                                    <? if($eltour["tmenor"][0] >= 1){ ?>
                                        <option value="0" selected="selected">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    <? }else{ ?>
                                        <option value="0" selected="selected">NA</option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="oswaldo color-pink"><? traducciones(54); ?>:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                <select name="adultos" id="adultos" class="form-control" onchange="tarifaAdultosTours(this)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2" selected="selected">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row text-right">
                        <h2 class="oswaldo titulorestour text-bold" style="margin-bottom: 0;color: #E9AC1A;font-size: 20px;"><? traducciones(40); ?></h2>
                        <? for($i=0; $origenes["idregistro"][$i]; $i++){
                            $tarifa = ($origenes["tadulto"][$i] * 2);
                            $tarifa = number_format(round($tarifa, 2));
                            ?>

                            <!-- TARIFAS PARA JQUERY -->
                            <input type="text" class="tarifaorigen oculto" name="origen_<? echo $origenes["idregistro"][$i]; ?>" id="<? echo $origenes["idregistro"][$i]; ?>" />
                            <input type="text" name="tadulto" id="tadulto_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["tadulto"][$i]; ?>" class="oculto" />
                            <input type="text" name="tmenor" id="tmenor_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["tmenor"][$i]; ?>" class="oculto" />
                            <input type="text" name="simbolo" id="simbolo_<? echo $origenes["idregistro"][$i]; ?>" value="<? echo $origenes["simbolo"][$i]; ?>" class="oculto" />



                            <div class="precioTours" id="tarifa_<? echo $origenes["idregistro"][$i]; ?>">
                                <label class="apunteReserva text-italic" style="margin-bottom: 0;"><span>2</span> <? traducciones(54); ?>, <? traducciones(25); ?></label>
                                <h4 class="text-bold" style="margin-bottom: 0;margin-top: 0;"><? traducciones(51); ?> <? echo utf8_encode($origenes["origen"][$i]); ?></h4>
                                <button type="button" style="clear: both;background-color: #E9AC1A;color: #FFF;border-style: none;padding: 8px;"
                                        onclick="reservaTour('<? echo $idtour; ?>', '<? echo  $origenes["idorigen"][$i]; ?>', '<? echo $origenes["idregistro"][$i]; ?>')"><? echo "$ ".$tarifa." ".$origenes["simbolo"][$i]; ?></button>
                                <div class="clearheight"></div>
                            </div>
                        <? } ?>
                    </div>

                    <div class="row mt-xxl text-right">
                        <div class="footerReserva"><span class="italica">Para reservar presione el boton del importe a pagar / <br />To book press the button of the amount payable</span></div>
                    </div>

                    <div class="row mt-xxl text-right"></div>

                </div>
                <div class="col-sm-2">
                    <h3 class="text-center" style="color: #EFB64E;font-weight: bold;"><? traducciones(34); ?></h3>
                    <div class="row">
                        <? for($o=0; $otros["idtour"][$o]; $o++){
                            $link= "tours-en-yucatan/".string2url($otros["nombre"][$o])."/".$otros["idtour"][$o]."/".$idioma."/";
                            ?>
                            <div class="col-sm-12 text-center mt-xs">
                                <a href="<? echo $link; ?>" target="_self">
                                    <img src="imagenes/tours/<? echo $otros["archivo"][$o]; ?>" class="img-thumbnail" style="width: 140px;height: 100px;"/>
                                </a>
                                <h8><? echo $otros["nombre"][$i]; ?></h8>
                                <div class="cajitaestrellas">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h5 style="font-size: 10px;" class="titulopreciotour"><? traducciones(54); ?>: <? echo "$ ".number_format(round($otros["tadulto"][$o]), 2)." ".$otros["simbolo"][$o]; ?></h5>
                                <? if($otros["tmenor"][$o] >= 1){ ?>
                                    <h5 style="font-size: 10px;" class="titulopreciotour"><? traducciones(28); ?>: <? echo "$ ".number_format(round($otros["tmenor"][$o]), 2)." ".$otros["simbolo"][$o]; ?></h5>
                                <? } ?>
                            </div>

                            <hr style="border-bottom-color: #0A246A;">

                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>


<section>

    <? include("footer-new.php"); ?>

</section>
</body>
</html>