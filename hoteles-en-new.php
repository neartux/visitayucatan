<?
include("templates/sessions.php");
include("scripts/consultas.php");
error_reporting(0);
$iddestino = $_REQUEST["iddestino"];
$pagina = paginaDescripcion("hoteles");
$hoteles = hoteles($iddestino);
$paquetes = paquetes();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
    <title>Hoteles</title>
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <meta charset="utf-8">
    <base href="http://localhost/visitayucatan/">
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
        <a href="index"><img src="files-new-design/images/logo1.png" alt="logo"/></a>
    </figure>
        <figure class="titulo-img">
        <!--  <a href="hoteles-en-new/merida/1/1/">-->
            <img src="files-new-design/images/titulo-hoteles.png" alt="logo">

        <!--  </a>-->
      </figure>
    <!--
   <div class="detalles-header">
<p>HOTELES Y <br/> 
   PROMOCIONES <a href="#"><span class="icon-play3 cir"></span></a></p>
   </div>-->
    <div class="top-header">
</div>
<div class="body-header img-hoteles">
    <? include("general-templates/header.php"); ?>
</div>
</header>
<section>
<div id="content">
           <div class="introduccion">
<div id="izquierdo">
<img src="http://www.visitayucatan.com/imagenes/hoteles1.png">
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
  <? for($p=0; $hoteles["idhotel"][$p]; $p++){

            $tarifa = calculatarifa($hoteles["tarifamin"][$p], $hoteles["idhotel"][$p], $hoteles["idcontrato"][$p]);
            $desde = number_format(round($tarifa, 2))." ".$hoteles["simbolo"][$p];              
            $link = "hoteles-en-yucatan/".string2url($hoteles["hotel"][$p])."/".$hoteles["idhotel"][$p]."/".$idioma."/";            
            $texto = cortarTexto($hoteles["descripcion"][$p], $tamano=200, $colilla="...");
              ?>

<article id="hotel" class="<? if($p==0){ ?>registrofirst <? } ?>">
<div class="border-top"></div>
    <div class="section-left">
     <h2 class="titulo-top">  <? echo $hoteles["hotel"][$p]; ?></h2>
<div class="img1 view">
  <a href="<? echo $link; ?>" title="<? echo $hoteles["hotel"][$p]; ?>"><img src="imagenes/hoteles/<? echo $hoteles["imagen"][$p]; ?>" /></a>
 <div class="mask">  
<a href="<? echo $link; ?>"><h2>¡Reserva Ahora!</h2></a>  
</div>  
 </div>
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
<h2><? echo $hoteles["hotel"][$p]; ?> </h2>
</hgroup>
<p class="descripciones">
<? echo $texto; 
?>
</p>

  </div>
  <div class="img3">
    <div class="detalles-precio">
      <div class="content-precios">
      <div class="precios-hotel">
      <p class="precio-top texto-top"><? traducciones(10); ?>:</p>
      <p class="precio">$<? echo $desde; ?></p>
         
      <div class="uno">
        <p style="line-height: 1 !important;"><? traducciones(71); ?></p>
      </div>
      </div>
      </div>
      <div class="informacion-detalles">
        <a href="<? echo $link; ?>" title="Ver más información"><p class="first-texto"><? traducciones(56); ?></p>
        <p class="second-texto">
          <span class="icon-play3"></span>
        </p>
        </a>
    </div>
    </div>
  </div>
</article>
<? }  ?>
</div>
<aside>
  <div class="top-aside">
  </div>
     <div class="limpiar"></div>
<div class="cajas redes-sociales">
  <div class="redes">
    <div class="red-left">
    <a href="" class="icon-red efecto-hover"><span class="icon-facebook"></span><p>FACEBOOK</p></a>
</div>
    <div class="red-right">
  <span class="icon-twitter cxp"></span>
 <p>TWITTER</p>
 </div>
  </div>
</div>
 <div class="limpiar"></div>
</aside>
</section>
<? include("general-templates/footer.php"); ?>
</body>
</html>