<!DOCTYPE html>
<html>
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
     <style type="text/css">
.view {
    overflow: hidden;
    position: relative;
    text-align: center;
    box-shadow: 1px 1px 2px #e6e6e6;
    cursor: default;
}
.view .mask, .view .content {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;1
}
.view img {
    display: block;
    position: relative;
}
.view h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
   padding: 7px 14px;
    background: hsla(0,0%,0%,0.4);
   margin-top: 40%;
}

.view img {
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    -o-transition: all 0.2s ease-in;
    -ms-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
}
.view .mask {
    opacity: 0;
    background-color: hsla(0,0%,0%,0.6);
    -webkit-transition: all 0.2s 0.4s ease-in-out;
    -moz-transition: all 0.2s 0.4s ease-in-out;
    -o-transition: all 0.2s 0.4s ease-in-out;
    -ms-transition: all 0.2s 0.4s ease-in-out;
    transition: all 0.2s 0.4s ease-in-out;
    -webkit-transform: translate(460px, -100px) rotate(180deg);
    -moz-transform: translate(460px, -100px) rotate(180deg);
    -o-transform: translate(460px, -100px) rotate(180deg);
    -ms-transform: translate(460px, -100px) rotate(180deg);
    transform: translate(460px, -100px) rotate(180deg);
}
.view h2 {
   -webkit-transform: translateY(-400px);
    -moz-transform: translateY(-400px);
    -o-transform: translateY(-400px);
    -ms-transform: translateY(-400px);
    transform: translateY(-400px);
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}



.view:hover .mask { 
    opacity: 1;
    -webkit-transform: translate(0px, 0px);
    -moz-transform: translate(0px, 0px);
    -o-transform: translate(0px, 0px);
    -ms-transform: translate(0px, 0px);
    transform: translate(0px, 0px);
    -webkit-transition-delay: 0s;
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    -ms-transition-delay: 0s;
    transition-delay: 0s;
}
.view:hover h2 { 
    -webkit-transform: translateY(0px); 
    -moz-transform: translateY(0px); 
    -o-transform: translateY(0px); 
    -ms-transform: translateY(0px); 
    transform: translateY(0px); 
    -webkit-transition-delay: 0.5s;
    -moz-transition-delay: 0.5s;
    -o-transition-delay: 0.5s;
    -ms-transition-delay: 0.5s;
    transition-delay: 0.5s;
}
/****************/
#contenedor{

    display: block;
    width: 100%;
    min-height: 1000px;
}
#contenedor img{
  display: block;
  width: 100%;
  height: 100%;
  bottom: 0;
  position: absolute;
}
#top-arriba{
  width: 100%;
  height: 40px;
  display: block;
}

#img-prueba{
     width: 100%;
    height: 100%;
    background: url("files-new-design/images/fondo-.png") center no-repeat;
    background-size: 100% 100%;
    position: relative;
}
#contenidos{
  width: 76%;
  height: auto;
  display: block;
  margin: auto;
}



#img-titulos{
  position: relative;
  display: block;
  width: 80%;
  left: 10%;
  height: 220px;
  background: url("files-new-design/images/text-portada.png") no-repeat;
background-size: 90% 220px;

}
#detalles{
  width: 85%;
  height: auto;
  display: block;
  /*background: red;*/
  margin: auto;
  margin-top: -4.5%;
  padding-bottom: 4%;
}
.pie-central{
  width: 65%;
  height: auto;
  display: block;
  margin: auto;
}
.productos{
  width: 28%;
  height: 350px;
  margin-right: 5%;
  float: left;
  position: relative;
}
.producto-tours{
   background: url("files-new-design/images/img-tours.png") no-repeat;
background-size: 100% 100%;
}
.producto-tours div{
position: relative;
top: 75%;
width: 96%;
display: block;
  margin: 0 4%;
}
.producto-hoteles{
   background: url("files-new-design/images/img-hoteles.png") no-repeat;
background-size: 100% 100%;
}
.producto-peninsula{
   background: url("files-new-design/images/img-peninsula.png") no-repeat;
background-size: 100% 100%;
}
.producto-peninsula div{
  width: 96%;
  margin: 0 4%;
  top:40%;
  height: 45%;
  position: relative;
}

.producto-contacto{
   background: url("files-new-design/images/img-contacto.png") no-repeat;
background-size: 100% 100%;
}
.producto-mapas{
   background: url("files-new-design/images/img-mapas.png") no-repeat;
background-size: 100% 100%;
}
.producto-mapas div{
  width: 96%;
  margin: 0 4%;
  position: relative;
top: 75%;
display: block;
}
.producto-paquetes{
   background: url("files-new-design/images/img-paquetes.png") no-repeat;
background-size: 100% 100%;
}
.margen-top{
  margin-top: 50px;
}
.contacto{
  width: 100%;
  font-size: 28px;
  color: #fff;
  text-align: center;
  font-weight: bold;
  padding-top: 5%;
  padding-bottom: 5%;
}
.contacto2{
  width: 100%;
  font-size: 28px;
  color: #fff;
  text-align: left;
  font-weight: bold;

}
.texto-tours{
  width: 100%;
  font-size: 16px;
  color: #fff;
  text-align: left;
  font-weight: bold;
}
.detail-paquete{
  padding: 4%;
  font-size: 16px;
  text-shadow: 2px 2px 3px rgba(0,0,0,0.4);
  font-weight: bold;
  color: #fff;
    -moz-transform: rotate(-15deg); /* IE 9 */
    -o-transform: rotate(-15deg); /* IE 9 */
    -ms-transform: rotate(-15deg); /* IE 9 */
    -webkit-transform: rotate(-15deg); /* Chrome, Safari, Opera */
    transform: rotate(-15deg);
}

.producto-hoteles div{
position: relative;
top: 40%;
width: 100%;
color: #fff;
width: 96%;
margin: 0% 4%;
}
.texto-title{
  font-size: 30px;
  font-weight: bold;
  color: #FFF;
  text-shadow: 2px 2px 3px rgba(0,0,0,0.4);

}
.texto-detail{
  font-size: 16px;
  font-weight: bold;
  color: #FFF;
  text-shadow: 2px 2px 3px rgba(0,0,0,0.4);
}

.pie-pagina{
  position: relative;
  display: block;
  width: 100%;
  height: 140px;
  background: #5492d1;
}
.wrap-pie{
     width: 100%;
    height: 100%;
    background: url("files-new-design/images/fondo-footer.png") center no-repeat;
    background-size: 100% 100%;
    position: relative;

}


.renglon1,.renglon2{
display: block;
width: 16%;
height: 100%;
float: left;
 border-width:0 2px;
-moz-border-image: url('files-new-design/images/divisor.png') 0 0 0 50 repeat;
border-image: url('files-new-design/images/divisor.png') 0 0 0 50;

}
.renglon3{
border-width:0 2px;
-moz-border-image: url('files-new-design/images/divisor.png') 0 0 0 50 repeat;
border-image: url('files-new-design/images/divisor.png') 0 0 0 50;
width: 38%;
height: 100%;
float: left;

}

.renglon3 div{
  display: block;
  height: 100%;
  width: 100%;
}

.renglon1 .linea{
  display: block;
  width: 30px;
  height: 100%;
  float: left;
}
.menu-footer{
  margin: 0;
  padding: 0;
  list-style: none;
}

.menu-footer li{
  display: block;
  text-align: center;
  color: #fff;
}
.menu-footer a{
  color: #fff;
  font-size: 14px;
  padding: 12px 0px 12px 15px;
}

.icon-facebook:before {
    content: "\e900";
    color: #fff;
    font-size: 26.5px;
    background-color: #17c9c7;
    padding: 5px;
    border-radius: 2px;
     -webkit-box-shadow: 0px 0px 3px 2px #fff;
-moz-box-shadow: 0px 0px 3px 2px #fff;
box-shadow: 0px 0px 3px 2px #fff;

}

.icon-twitter:before {
    content: "\e901";
    color: #fff;
    font-size: 27px;
    background-color: #17c9c7;
    padding: 5px;
    border-radius: 2px;
   /* box-shadow: 0 0 10px #fff;*/
   -webkit-box-shadow: 0px 0px 3px 2px #fff;
-moz-box-shadow: 0px 0px 3px 2px #fff;
box-shadow: 0px 0px 3px 2px #fff;
}

.renglon3 a{
  margin-top: 5%;
  display: inline-block;
  vertical-align: top;
  color: #fff;
  text-align: center;
  padding: 5% 8% 5% 8%;
}

.social{
  font-size: 10px;
  padding: 15% 0%;
}
.social2{
  font-size: 10px;
  padding: 18% 0%;
}
.redesSociales{
-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;
}
.renglon4{
  width: 24%;
  height: 100%;
  float: left;
  
}
.renglon4 div{
  margin-top: 14%;
  position: relative;
}

@media screen and (max-width: 860px) {
  
  #contenedor{
    width: 100%;
    min-height: auto;
}
#contenedor img{
  width: 100%;
  height: 100%;
}

#contenidos{
  width: 95%;
}
 
 #img-titulos{
  margin: auto;
  width: 95%;
  left: 3%;
  height: 200px;
background-size: 95% 200px;

}

#detalles{
  width: 100%;
  margin-top: -4.5%;
  padding-bottom: 4%;
}
.first{
margin-left: 4.5%;
}
.productos{
  width: 27%;
   height: 290px;
   margin-right: 4.5%;
}

.margen-top{
  margin-top: 5%;
}

.pie-pagina{
  width: 100%;
  height: auto;
}
.wrap-pie{
     width: 100%;
    height: 100%;
}
.pie-central{
  width: 95%;
  height: 100%;
}

  }
@media screen and (max-width: 760px) {
.producto-mapas div{
top: 65%;
}
.producto-tours div{
position: relative;
top: 65%;
}
.texto-title{
  font-size: 25px;

}
.texto-detail,.detail-paquete{
  font-size: 14px;
}


}


@media screen and (max-width: 480px) {

  .first{
    margin-left: 0%;
  }
  .productos{
  width: 60%;
  height: 250px;
    float: none;
  display: block;
  position: relative;
  margin:2% auto;
}
.renglon1,.renglon2,.renglon3,.renglon4{
  width: 60%;
  margin: auto;
  float: none;
  position: relative;
}

.renglon3 a{
  padding: 0%;
}

  }
  .logo {
    left: 15%;
    position: absolute;
    z-index: 40;
    height: 130%; /*113px;*/
    width: 16%; /*220px;*/
}

     </style>
</head>
<body>
  <div id="contenedor">
   <div id="img-prueba">
    <header>
 <figure class="logo">
  <img src="files-new-design/images/logo1.png" alt="logo"/>
   </figure>
  <div id="top-arriba">
  </div>
<div>
    <div class="movil">
      <a href="#">MENU</a><span id="nav-mobile" class="icon-menu"></span>
     <div class="limpiar"></div>
    </div>
<nav>
  <div class="limpiar"></div>
   <ul class="menu" id="menuL">
        <li><a href="index.php">INICIO</a></li><!--
     --><li><a href="http://localhost/visitayucatan/paquetes-yucatan">PAQUETES</a></li><!--
     --><li><a href="http://localhost/visitayucatan/tours-en-yucatan">TOURS</a></li><!--
     --><li class="subMenu">
          <a href="#">HOTELES
           <!-- <span class="icon-keyboard_arrow_down"></span>-->
         </a>
     <ul>
    <li><a href="http://localhost/visitayucatan/hoteles-en-new/merida/1/1/">CANCÚN</a><li>
    <li><a href="http://localhost/visitayucatan/hoteles-en-new/merida/1/1/">MÉRIDA</a><li>
     </ul>
      </li><!--
      --><li><a href="http://localhost/visitayucatan/yucatan-mexico">LA PENINSULA</a></li><!--
      --><li  class="ultimo"><a href="contacto">CONTACTO</a></li><!--
       --><li  class="ultimo"><a href="mapas">MAPAS</a></li>
     </ul>
     <div class="limpiar"></div>
</nav>
</div>
</header>
<div id="contenidos">
<div id="img-titulos">

</div>

<div id="detalles">
<a href="http://localhost/visitayucatan/paquetes-yucatan">
<div class="productos producto-paquetes first">
<div class="contacto">
<p class="texto-title">PAQUETES</p>
</div>
<div class="detail-paquete">
<p>TU VIAJE</p>
<p>PERFECTAMENTE</p>
<p>PLANEADO</p>
</div>
</div>
</a>

<a href="http://localhost/visitayucatan/tours-en-yucatan">
<div class="productos producto-tours">
  <div >
<p class="texto-title">TOURS</p>
<p class="texto-detail">CONOZCA LUGARES REALMENTE INCREIBLES</p>
</div>
</div>
</a>

<a href="http://localhost/visitayucatan/hoteles-en-new/merida/1/1/">
<div class="productos producto-hoteles">
<div>
<p class="texto-title">HOTELES</p>
<p class="texto-detail">CONVENIENTEMENTE
UBICADOS A PRECIOS INCREIBLES
</p>
</div>
</div>
</a>

<a href="http://localhost/visitayucatan/yucatan-mexico">
<div class="productos margen-top producto-peninsula first">
<div>
<p class="texto-title">LA <br> PENINSULA</p>
</div>
<div><p class="texto-detail" >DESCUBRE LA MAGIA DE 
YUCATÁN</p></div>
</div>
</a>

<a href="http://localhost/visitayucatan/contacto">
<div class="productos margen-top producto-contacto">
<div class="contacto">
<p class="texto-title">CONTACTO</p>
</div>
</div>
</a>

<a href="http://localhost/visitayucatan/mapas">
<div class="productos margen-top producto-mapas">
<div >
<p class="texto-title">MAPAS</p>
<p class="texto-detail">UBICA LOS SITIOS DE INTERES EN YUCATAN</p>
</div>
</div>
</a>
     <div class="limpiar"></div>
</div>
</div>
   </div>

  </div>
   <div class="limpiar"></div>
<div class="pie-pagina">
<div class="wrap-pie">
  <div class="pie-central">

  <div class="renglon1">
     <div class="linea">
    </div>
    <ul class="menu-footer">
      <li><a href="index.php">INICIO</a></li>
       <li><a href="paquetes-yucatan">PAQUETES</a></li>
        <li><a href="tours-en-yucatan">TOURS</a></li>
    </ul>
  </div>
   <div class="renglon2">
    <ul class="menu-footer">
      <li><a href="hoteles-en-new/merida/1/1/">HOTELES</a></li>
       <li><a href="yucatan-mexico">LA PENINSULA</a></li>
        <li><a href="contacto">CONTACTO</a></li>
    </ul>
  </div>
  <div class="renglon3">
    
    <div>

    <a href="https://www.facebook.com/visitayucatan?ref=br_rs" target="_blank" class="">
      <span class="icon-facebook redesSociales">
      </span>
      <p class="social">FACEBOOK</p>
    </a>
    <a href="https://twitter.com/VisitYucatan" target="_blank" class="">
      <span class="icon-twitter">
      </span>
      <p class="social2">TWITTER</p></a>
    </div>
  </div>
  <div class="renglon4">
    <div>
     <img src="files-new-design/images/logo-pie.png">
    </div>
  </div>
   <div class="limpiar"></div>
</div>
</div>
</div>
</body>
</html>