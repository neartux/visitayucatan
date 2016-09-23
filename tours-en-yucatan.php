<?
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
//ini_set("display_errors", 1);
$tours = tours();
$pagina = paginaDescripcion("tours");
$seccion = 3;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
    <title>Tours</title>
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
</head>
<body>
<header>
    <figure class="logo">
        <a href="index"><img src="files-new-design/images/logo1.png" alt="logo"/></a>
    </figure>
    <figure class="titulo-img">
        <!--  <a href="tours-en-yucatan">-->
            <img src="files-new-design/images/titulo-tours.png" alt="logo">
      <!--  </a>-->
      </figure>
   <!-- <div class="detalles-header">
        <p class="textcenter">
            <a href="tours-en-yucatan">-Tours-</span></a>
            <br><br>
        </p>
    </div>-->
    <div class="top-header">
</div>
<div class="body-header img-tours">
    <? include("general-templates/header.php"); ?>
</div>
</header>
<section>
    <div id="content">
          <div class="introduccion">
<div id="izquierdo">
<img src="http://www.visitayucatan.com/imagenes/tours-adorno.png">
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
        <? for($t=0; $tours["idtour"][$t]; $t++){
            $descripcion = cortarTexto($tours["descripcion"][$t]);
            $descripcion = strip_tags($descripcion, '<p><a>');
            $idtour = $tours["idtour"][$t];
            $link= "tours-en-yucatan/".string2url($tours["nombre"][$t])."/".$tours["idtour"][$t]."/".$idioma."/";
            ?>

            <article class="<? if($t==0){ ?>registrofirst <? } ?>"">
                <div class="border-top"></div>
                <div class="section-left">
                    <h2 class="titulo-top"><? echo $tours["nombretour"][$t]; ?></h2>
                    <figure class="img1 view">
                        <a href="<? echo $link; ?>">
                            <img src="imagenes/tours/<? echo $tours["archivo"][$t]; ?>">
                        </a>
                        <div class="mask">  
                        <a href="<? echo $link; ?>"><h2>¡Reserva Ahora!</h2></a>  
                        </div>  
                    </figure>
                    <figure class="img2">
                        <img src="files-new-design/images/seccion-estrellas.png">
                        <figcaption class="fondo-stars">
                            <span class="estrella texto"></span>
                            <span class="estrella icon-star-full estrella1"></span>
                            <span class="estrella icon-star-full estrella2"></span>
                            <span class="estrella icon-star-full estrella3"></span>
                            <span class="estrella icon-star-full estrella4"></span>
                            <span class="estrella icon-star-full estrella5"></span>
                        </figcaption>
                    </figure>
                </div>
                <div class="detalles">
                    <hgroup class="titulos">
                        <h2><? echo $tours["nombretour"][$t]; ?></h2>

                        <h3><? echo $tours["circuito"][$t]; ?></h3>
                    </hgroup>
                    <p class="descripciones">
                        <? echo $descripcion; ?>
                    </p>

                </div>
                <div class="img3">
                    <div class="detalles-precio">
                        <div class="content-precios">
                           <div class="precios-tours">
                             <p class="precio-top"><? traducciones(54); ?>:</p>
                               <p class="precio">
                              $<? echo ceil($tours["tadulto"][$t])." ".$tours["simbolo"][$t]; ?></p>
                            </div> 
                            <div class="precios-tours">
                              <? if(round($tours["tmenor"][$t], 2) >= 1){ ?>
                                    <p class="precio-top"><? traducciones(28); ?>:</p>
                                    <p class="precio">$<? echo ceil($tours["tmenor"][$t])." ".$tours["simbolo"][$t]; ?></p>
                                    <? }else{
                                        if ($tour["tourmsj"][$t] != ""){
                                         ?>
                                        <p class="precio"><b>(<? echo $tours["tourmsj"][$t]; ?>)</b></p></h2>
                                    <? }else{ ?>
                                        <p class="precio-top"><b>(NA)</b></p></h2>
                                    <? }} ?>
                            </div>  
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