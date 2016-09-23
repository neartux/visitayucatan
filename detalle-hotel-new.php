<?
$fllegada = $_REQUEST["llegada"];
$fsalida = $_REQUEST["salida"];
$adultoshtl = $_REQUEST["adultoshtl"];
$menoreshtl = $_REQUEST["menoreshtl"];
$resultados = 2;
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
//ini_set("display_errors", 1);
$idpaquete = $_REQUEST["idhotel"];

$elidioma = $_REQUEST["lang"];
$idhotel = $_REQUEST["idhotel"];

$dethotel = hoteldetalle($idhotel, $elidioma);
$imgs = imagenesHotel($idhotel);
$habs = habitaciones($idhotel);
$fechascerradas = fechasCerradasb($idhotel);
$edadmax = $dethotel["edadmenor"][0]; //Edad maxima de los menores

if(isset($fllegada)){
    $desde = $fllegada;
}else{
    $desde = date('Y-m-d');
    $desde = sumadias($desde, 4);
}

if(isset($fsalida)){
    $hasta = $fsalida;
}else{
    //$hoy = date('Y-m-d');
    $hasta = sumadias($desde, 4);
}

//Edades de los menores
$ctosmenores = $_REQUEST["menoreshtl"];
$menor1 = $_REQUEST["menor1"];
$menor2 = $_REQUEST["menor2"];
$menor3 = $_REQUEST["menor3"];
$menor4 = $_REQUEST["menor4"];

if(isset($adultoshtl)){
    $adultoshtl = $adultoshtl;
}else{
    $adultoshtl = 2;
}

if(isset($menoreshtl)){
    $menoreshtl = $menoreshtl;
}else{
    $menoreshtl = 0;
}

//echo "Llegada: ".$desde." - Salida: ".$hasta." - Adultos: ".$adultoshtl." - Menores: ".$menoreshtl." - Edad maxima menores: ".$dethotel["edadmenor"][0];
$nuevafecha = strtotime ( '-1 day' , strtotime ( $hasta)) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
$link = "http://www.visitayucatan.com/comparte-hotel.php?idhotel=".$idhotel."&lang=".$idioma."&r=1";
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

                        <a href="imagenes/hoteles/<? echo $imgs["imagen"][0]; ?>" class="img-main-package">
                            <img src="imagenes/hoteles/<? echo $imgs["imagen"][0]; ?>" class="img-thumbnail imgprincipal-package"/>
                        </a>
                    </div>
                    <div class="col-sm-6  title-second text-right" style="padding: 0;margin-top: 112px;margin-left: -5px;">
                        <h3 class="color-red-pck text-bold text-center" style="margin-bottom: 0;"><? echo $dethotel["hotel"][0]; ?></h3>
                        <div class="box-circuit">
                            <div class="first-part-box">
                                <? for($s=1; $s <= $dethotel["stars"][0]; $s++){ ?>
                                    <i class="fa fa-star"></i>
                                <? } ?>
                            </div>
                            <div class="second-part-box">
                                <span class="compartir"><img src="imagenes/compartir-facebook.png" style="padding: 5px;"/></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12 text-right" style="padding: 0;margin-top: 60px;">
                    <div class="col-sm-12 col-md-12 col-xs-12 parent-container" style="padding: 10px;">
                        <? for($f=0; $imgs["idimagen"][$f]; $f++){  ?>
                            <a href="imagenes/hoteles/<? echo $imgs["imagen"][$f]; ?>" class="img-main">
                                <img src="imagenes/hoteles/<? echo $imgs["imagen"][$f]; ?>" class="img-thumbnail img-preview-package"/>
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
                    <? echo $dethotel["hotel"][0]; ?> <br>
                    <br> <br>
                    <div style="font-size: 12px;" class="descriptin-product">
                        <? echo $dethotel["descripcion"][0]; ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 background-pink">
                            <div class="col-sm-6 color-white text-bold text-uppercase text-italic p-sm" style="font-size: 20px">Tarifas</div>
                            <div class="col-sm-6 color-white text-bold p-sm">
                                <span class="updateprecio">
							        <img class="imgleft" src="imagenes/ajax-loader.gif" />
							            Actualizando precios / Updating prices
							        <img class="imgright" src="imagenes/ajax-loader.gif" />
						        </span>
                            </div>
                        </div>
                    </div>

                    <hr style="border-bottom: 1px solid #EFB64E;">

                    <div class="row" style="margin-top: 15px;">
                        <form name="frmfechashotel" id="frmfechashotel" method="post" action="">
                            <input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />

                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <label class="oswaldo color-pink"><? traducciones(54); ?>:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                    <select name="adultoshtl" class="form-control">
                                        <option value="1" <? if($adultoshtl == 1){ ?> selected="selected" <? } ?>>1</option>
                                        <option value="2" <? if($adultoshtl == 2){ ?> selected="selected" <? } ?>>2</option>
                                        <option value="3" <? if($adultoshtl == 3){ ?> selected="selected" <? } ?>>3</option>
                                        <option value="4" <? if($adultoshtl == 4){ ?> selected="selected" <? } ?>>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="oswaldo color-pink"><? traducciones(28); ?>:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                    <select name="menoreshtl" onchange="pideedades(this)" class="form-control">
                                        <option value="0" <? if($menoreshtl == 0){ ?> selected="selected" <? } ?>>0</option>
                                        <option value="1" <? if($menoreshtl == 1){ ?> selected="selected" <? } ?>>1</option>
                                        <option value="2" <? if($menoreshtl == 2){ ?> selected="selected" <? } ?>>2</option>
                                        <option value="3" <? if($menoreshtl == 3){ ?> selected="selected" <? } ?>>3</option>
                                        <option value="4" <? if($menoreshtl == 4){ ?> selected="selected" <? } ?>>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                            <div class="col-sm-12" style="margin-top: 15px;">
                                <div id="edadesmenores">
                                    <div class="col-sm-3">
                                        <div id="menor1" class="grupal">
                                            <label>Edad Menor 1</label>
                                            <input type="text" name="menor1" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor1; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div id="menor2" class="grupal">
                                            <label>Edad Menor 2</label>
                                            <input type="text" name="menor2" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor2; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div id="menor3" class="grupal">
                                            <label>Edad Menor 3</label>
                                            <input type="text" name="menor3" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor3; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div id="menor3" class="grupal">
                                            <label>Edad Menor 3</label>
                                            <input type="text" name="menor3" onfocusout="validaedad('<? echo $edadmax; ?>', this)" value="<? echo $menor3; ?>" class="form-control"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <label>Desde</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" name="llegada" id="hoteldesde" value="<? echo $desde; ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Hasta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" name="salida" id="hotelhasta" value="<? echo $hasta; ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="btn btn-default btnbuscarfechas" onclick="buscafechashotel()" style="margin-top: 28px;"><span>Buscar</span></div>
                                </div>
                            </div>

                        </form>

                        <form class="oculto" id="frmreservahtl" action="reserva-hoteles.php" method="post">
                            <input type="hidden" name="idhotel" value="<? echo $idhotel; ?>" />
                            <input type="hidden" name="adultos" value="<? echo $adultoshtl; ?>" />
                            <input type="hidden" name="menores" value="<? echo $menoreshtl; ?>" />
                            <input type="hidden" name="checkin" value="<? echo $desde; ?>" />
                            <input type="hidden" name="checkout" value="<? echo $hasta; ?>" />
                            <input type="hidden" name="total" id="grantotal" />
                            <input type="hidden" name="idhabitacion" id="idhabitacion" />
                        </form>

                    </div>

                    <hr style="border-bottom: 1px solid #EFB64E;margin-bottom: 0;">
                    <div class="btn btn-warning" id="eltipodeplan"><span><b><? echo traducciones(57); ?>: </b> <? echo $dethotel["plan"][0]; ?></span></div>

                    <div class="row">
                        <? for($i=0; $habs["idhabitacion"][$i]; $i++){
                            $tarifario = tarifas($idhotel, $habs["idhabitacion"][$i], $desde, $nuevafecha);
                            if($tarifario["idtarifa"][$i] >= 1){
                                $allotment = $tarifario["allotment"][$i];
                                ?>
                                <div class="portaprecios col-sm-12">
                                    <!-- NOMBRE DEL TIPO DE HABITACION -->
                                    <h4 style="margin-bottom: 0px;"><? echo "Habitación ".$habs["nombre"][$i]; ?></h4>
                                    <div class="descripthotel"><? echo $habs["descrihab"][$i]; ?></div>
                                    <?
                                    //CALCULO DE LA TARIFA
                                    $eltotal = 0;
                                    $adultos = 0;
                                    for($t=0; $tarifario["idtarifa"][$t]; $t++){

                                        //Determinar la ocupación máxima de la habitacion comparada con la cantidad de adultos y menores que dice el sistema
                                        $capmaxima = $tarifario["capmaxima"][$t];
                                        $personas = $adultoshtl + $menoreshtl; //Determinamos la cantidad de personas que quieren reservar
                                        $rooms = ceil($personas / $capmaxima);

                                        if($t==0){
                                            echo "<i style='float: left; clear: both;'><b>Ocupación máxima por habitación:</b> ".$capmaxima. " personas (Incluyendo menores)</i>";
                                            echo "<div class='full clear'></div><br>";
                                        }


                                        if($rooms > 1){
                                            //Acomodamos las personas en las habitaciones que hayan sido necesarias para la reservacion

                                            //Adultos. Determinamos cuantos iran en cada habitacion
                                            $adultosbyroom = ceil($adultoshtl / $rooms);

                                            //Menores. Determinamos cuantos iran en cada habitacion
                                            $menoresbyroom = round($menoreshtl / $rooms);

                                            $quedanadultos = $adultoshtl;
                                            $quedanmenores = $menoreshtl;
                                            $tarifapordia = 0;
                                            for($r=1; $r<= $rooms; $r++){
                                                if($r==1){
                                                    //Primera vuelta
                                                    $calculoadultos = $adultosbyroom;
                                                    $calculomenores = $menoresbyroom;

                                                    $quedanadultos = $adultoshtl - $calculoadultos;
                                                    $quedanmenores = $menoreshtl - $calculomenores;

                                                }else{
                                                    //Segunda y demas vueltas...
                                                }

                                                switch ($calculoadultos){
                                                    case 1:
                                                        $latarifa = $tarifario["tarifa"][$t];
                                                        break;
                                                    case 2:
                                                        $latarifa = $tarifario["doble"][$t];
                                                        break;
                                                    case 3:
                                                        $latarifa = $tarifario["triple"][$t];
                                                        break;
                                                    case 4:
                                                        $latarifa = $tarifario["cuadruple"][$t];
                                                        break;
                                                }
                                                $tarifapordia = $latarifa;
                                            }
                                            $tarifa = calculatarifa($tarifapordia, $tarifario["idhotel"][$t], $tarifario["idcontrato"][$t]);
                                            //Termina si hay mas de una habitacion

                                        }else{
                                            //ESTA ES LA SECCION VALIDA POR AHORA
                                            //Si solo es una habitacion
                                            switch ($adultoshtl){
                                                //switch ($personas){
                                                case 1:
                                                    $latarifa = $tarifario["tarifa"][$t];
                                                    break;
                                                case 2:
                                                    $latarifa = $tarifario["doble"][$t];
                                                    break;
                                                case 3:
                                                    $latarifa = $tarifario["triple"][$t];
                                                    break;
                                                case 4:
                                                    $latarifa = $tarifario["cuadruple"][$t];
                                                    break;
                                            }
                                            $tarifa = calculatarifa($latarifa, $tarifario["idhotel"][$t], $tarifario["idcontrato"][$t]);
                                            $lafecha = $tarifario["fecha"][$t];
                                            $lafechab = explode('-', $lafecha);
                                            $mes = nombre_mesabr($lafechab[1]);
                                            $lafechac = $lafechab[2]." ".$mes;


                                            if(in_array($lafecha, $fechascerradas) or $allotment == 0){ ?>
                                                <div class="col-sm-2 day text-center <? if($t % 2){ echo 'cambio'; } ?>">
                                                    <span class="lafecha"><? echo $lafechac; ?></span> <br>
                                                    <span class="elprecio">No disponible</span>
                                                </div>

                                            <? }else{ $eltotal = $eltotal + $tarifa; ?>
                                                <div class="col-sm-2 day text-center <? if($t % 2){ echo 'cambio'; } ?>">
                                                    <span class="lafecha"><? echo $lafechac; ?></span> <br>
                                                    <span class="elprecio"><? echo "$ ".number_format($tarifa, 2, '.', ''); ?></span>
                                                    <span class="monedahtl"><? echo $tarifario["simbolo"][$t]; ?></span>
                                                </div>
                                            <? }
                                        }//Termina si solo es una habitacion
                                    } //Termina for ?>

                                    <? if($rooms == 1){ ?>
                                        <br><br><br><br>
                                        <div class="clear left full mtop mbottom">
                                            <b>Habitaciones requeridas:</b> <? echo $rooms; ?>
                                            <br />
                                            <? if($tarifario["edadmenor"][0] >= 1){ ?>
                                                <b>Edad máxima del menor:</b> <? echo $tarifario["edadmenor"][0]." años"; ?>
                                            <? } ?>
                                        </div>
                                        <?
                                        //El gran total se multiplicará por la cantidad de habitaciones que hayan resultado ser necesarias
                                        $grantotal =  $eltotal * $rooms;
                                        ?>

                                        <? if($grantotal >= 1){ ?>
                                            <div class="vermasinfohtl" onclick="reservahotelA('<? echo $grantotal ?>', '<? echo $habs["idhabitacion"][$i]; ?>')">
                                                <span class="btn btn-warning">Reserva ahora por sólo:  $ <? echo number_format($grantotal).".00 ".$total["simbolo"][0]; ?></span>
                                            </div>
                                        <? } ?>
                                    <? }else{  ?>
                                        <br /><br /><h4 style="font-weight: bold;">
                                            Lo sentimos, no hay habitaciones disponibles con las condiciones especificadas. Por favor comuníquese al teléfono (999)2895644 desde el
                                            interior de la República Mexicana o al (+52) 999.2895644 desde cualquier parte del mundo, para buscar una solución.
                                        </h4>
                                    <? } ?>
                                </div>
                            <? }} ?>
                    </div>

                    <div class="row mb"></div>

                </div>
                <div class="col-sm-2">
                    <? include ('aside-bar-new.php') ?>
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
<script>
    $(document).ready(function(){
        var menores = '<? echo $menoreshtl ?>';
        if(menores >= 1){
            if($("#edadesmenores").is(":visible")){
                $(".grupal").hide();
                for(i=1; i<=menores; i++){
                    $("#menor"+i).show();
                }
            }else{
                $("#edadesmenores").show();
                for(i=1; i<=menores; i++){
                    $("#menor"+i).show();
                }
            }
        }else{
            $("#edadesmenores").hide();
            $(".grupal").hide();
        }

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
</html>