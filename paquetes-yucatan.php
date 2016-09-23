<?
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$pagina = paginaDescripcion("paquetes");
$paquetes = listapaquetes();
$seccion = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
    <title></title>
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <link rel="stylesheet" type="text/css" href="files-new-design/css/estilos.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="files-new-design/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="files-new-design/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="files-new-design/js/scriptJS.js"></script>
    <script type="text/javascript" src="scripts/funciones.js"></script>
    <!-- JQUERY UI -->
    <script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
    <link type="text/css" rel="stylesheet" href="scripts/jquery-ui.min.css">
    <!-- FANCY BOX -->
    <script type="text/javascript" src="scripts/fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />
    <script src="files-new-design/js/jquery.expander.js"></script>
</head>
<body>
<header>
    <figure class="logo">
        <a href="visitayucatan"><img src="files-new-design/images/logo1.png" alt="logo"/></a>
    </figure>
      <figure class="titulo-img">
         <!-- <a href="paquetes-yucatan">-->
            <img src="files-new-design/images/titulo-paquetes.png" alt="logo">
       <!-- </a>-->
      </figure>
    <!--<div class="detalles-header logo-tours">
        <p class="textcenter">
            <a href="paquetes-yucatan"> ── Paquetes ── <span class="icon-play3 cir"></span></a>
            <br><br>
        </p>
    </div>-->
    <div class="top-header">
</div>
<div class="body-header img-paquetes">
    <? include("general-templates/header.php"); ?>
</div>
</header>
<section>
    <div id="content">
  <div class="introduccion">
<div id="izquierdo">
<img src="http://localhost/visitayucatan/imagenes/paquetes-adorno.png">
</div>
<div id="read-left">
<? $texto = cortarTexto($pagina["descripcion"][0], $tamano=200, $colilla="..."); ?>
<div class="publireportaje">
    <div>
<? echo $texto; ?>
</div>
<span id="btnleermas" class="lectura">Leer más</span>  
</div>

     <div  id="contenedorreportajeb" class="publireportajeb" style="display:none;">
      <div>
  <? echo $pagina["descripcion"][0]; ?>
   </div>
  <span id="btnleermenos" class="lectura">Leer menos</span>
    </div>


</div>     

</div>

        <? for($p=0; $paquetes["idpaquete"][$p]; $p++){
            $desde = precioPaquete($paquetes["idpaquete"][$p]);
            $link = "paseos-en-yucatan/".string2url($paquetes["nombre"][$p])."/".$paquetes["idpaquete"][$p]."/".$idioma."/";
            $paquete = $paquetes["idpaquete"][$p];
            ?>

            <article class="<? if($p==0){ ?>registrofirst <? } ?>"">
                <div class="border-top"></div>
                <div class="section-left">
                    <h2 class="titulo-top"><? echo $paquetes["nombre"][$p];  ?></h2>
                    <figure class="img1 view">
                        <a href="<? echo $link; ?>" title="<? echo $paquetes["nombre"][$p]; ?>">
                            <img src="imagenes/paquetes/<? echo $paquetes["archivo"][$p]; ?>" />
                        </a>
                        <div class="mask">  
                        <a href="<? echo $link; ?>"><h2>¡Más Información!</h2></a>  
                        </div>  
                    </figure>
                    <!--<figure class="img2">
                        <img src="files-new-design/images/seccion-estrellas.png">
                        <figcaption class="fondo-stars">
                            <span class="estrella texto">3</span>
                            <span class="estrella icon-star-full estrella1"></span>
                            <span class="estrella icon-star-full estrella2"></span>
                            <span class="estrella icon-star-full estrella3"></span>
                            <span class="estrella icon-star-full estrella4"></span>
                            <span class="estrella icon-star-full estrella5"></span>
                        </figcaption>
                    </figure>-->
                </div>
                <div class="detalles">
                    <hgroup class="titulos">
                        <h2><? echo $paquetes["nombre"][$p]; ?></h2>

                        <h3><? echo $paquetes["circuito"][$p]; ?></h3>
                    </hgroup>
                    <p class="descripciones">
                        <? echo $paquetes["intro"][$p]; ?>
                    </p>

                </div>
                <div class="img3">
                    <div class="detalles-precio">
                        <p class="parrafo-detalle arriba"><? traducciones(10); ?>:</p>

                        <p class="parrafo-detalle abajo">
                            $<? echo $desde; ?>
                        </p>

                        <div style="margin-top: 15px;">
                            <p><? traducciones(67); ?></p>
                        </div>
                        <div class="informacion-detalles">
                            <p class="first-texto">
                                <a href="<? echo $link; ?>"><? traducciones(56); ?></a>
                            </p>

                            <p class="second-texto"><span class="icon-play3"></span></p>
                        </div>
                    </div>
                </div>
            </article>


        <? } ?>
    </div>

    <aside>
        <div class="top-aside">
        </div>
        <div class="limpiar"></div>
        <div class="caja-aside-right">
            <? include("templates/publicidad.php"); ?>
        </div>
        <div class="cajas redes-sociales">
            <div class="redes">
                <div class="red-left">
                    <a href="https://www.facebook.com/visitayucatan/?fref=ts">
                        <span class="icon-facebook"></span>

                        <p>FACEBOOK</p>
                    </a>
                </div>
                <div class="red-right">
                    <a href="https://twitter.com/VisitYucatan">
                        <span class="icon-twitter"></span>

                        <p>TWITTER</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="limpiar"></div>
    </aside>
</section>
<? include("general-templates/footer.php"); ?>
</body>
</html>