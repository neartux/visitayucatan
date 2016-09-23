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
			$('.img-main').magnificPopup({
				type:'image',
				gallery:{
					enabled:true
				}
			});
			$('.img-main-package').magnificPopup({
				type:'image'
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

			$("#optionDbleSelected").prop("selected", true);

		});
	</script>
	<!-- Este bloque nuevo de css y js -->

</head>
<body>
<form id="reservaPaquete" name="reservaPaquete" action="reserva-paquetes" method="post" style="display: none;">
	<input type="text" name="idtipo" id="idtipo" class="oculto" />
	<input type="text" name="idpaquete" id="idpaquete" class="oculto" />
	<input type="text" name="idcombinacion" id="idcombinacion" class="oculto" />
</form>

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
							<a href="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" class="img-main-package">
								<img src="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" class="img-thumbnail imgprincipal-package" />
							</a>
						<? } } ?>
					</div>
					<div class="col-sm-6  title-second text-right" style="padding: 0;margin-top: 112px;margin-left: -5px;">
						<h3 class="color-red-pck text-bold text-center nameElPaquete" style="margin-bottom: 0;"><? echo $elpaquete["nombre"][0]; ?></h3>


						</h1>
						<div class="box-circuit">
							<div class="first-part-box">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="second-part-box">
								<? echo $elpaquete["circuito"][0]; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-xs-12 text-right" style="padding: 0;margin-top: 60px;">
					<div class="col-sm-12 col-md-12 col-xs-12 parent-container" style="padding: 10px;">
						<? for($f=0; $fotos["idfoto"][$f]; $f++){  ?>
							<a href="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" class="img-main">
								<img src="imagenes/paquetes/<? echo $fotos["archivo"][$f]; ?>" class="img-thumbnail img-preview-package"/>
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
					<div class="select-package text-center">
						<h6 class="color-pink text-uppercase"><? traducciones(14); ?></h6>
						<hr style="border-top: 1px solid rgb(239, 182, 78) !important;">
						<h6 class="color-pink">
							<? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){ ?>
								<? echo $estancia["dias"][$pe]; ?> <? traducciones(11); ?> <? traducciones(52); ?> <? echo $estancia["noches"][$pe]; ?> <? traducciones(31); ?>
							<? } ?>
						</h6>
					</div>
				</div>
				<div class="col-sm-8 contend-body-packages">
					<h4 class="color-pink text-bold text-uppercase"><? traducciones(9); ?></h4>
					<hr style="border-top: 1px solid rgb(239, 182, 78) !important;">
					<? echo $elpaquete["nombre"][0]; ?> <br>
					<? echo $elpaquete["circuito"][0]; ?>
					<br> <br>
					<div style="font-size: 12px;" class="descriptin-product">
						<? echo $elpaquete["descripcion"][0]; ?>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12 background-pink">
							<div class="col-sm-6 color-white text-bold text-uppercase text-italic p-sm"><? traducciones(21); ?>:</div>
							<div class="col-sm-6 color-white text-bold p-sm">
								<div class="col-sm-4 text-uppercase text-italic">
									<? traducciones(20); ?>:
								</div>
								<div class="col-sm-8">
									<select name="seleccciondehabitacion" class="form-control seleccciondehabitacion-new">
										<option value="sencilla"><? traducciones(44); ?></option>
										<option value="doble" id="optionDbleSelected"><? traducciones(12); ?></option>
										<option value="triple"><? traducciones(50); ?></option>
										<option value="cuadruple"><? traducciones(8); ?></option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						<? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){
							$tabla = paqueteEstanciaHotel($idpaquete, $estancia["noches"][$pe], $estancia["dias"][$pe]);
							?>
							<div id="paquete_<? echo $estancia["idcombinacion"][$pe]; ?>" class="supercaja <? if($pe==0){ ?> current <? } ?>">
								<div id="" class="cajitapaquetes">
									<div class="tableroPrecios">
										<table cellpadding="0" cellspacing="0">
											<? for($t=0; $tabla["idcombinacion"][$t]; $t++){
												$fotohoteles = imagenesHotel($tabla["idhotel"][$t]);

												?>

												<div class="col-sm-12 package-item tableroPrecios">
													<div class="col-sm-8 text-left">
														<h4 class="text-bold color-pink" id="nH_<? echo $tabla["idcombinacion"][$t]; ?>"><? echo $tabla["hotel"][$t]; ?>
															<? for($s=1; $s <= $tabla["stars"][$t]; $s++){ ?>
																<span class="fa fa-star"></span>
															<? } ?>
														</h4>
														<? if(count($fotohoteles["idimagen"]) > 0) {?>
															<div class="well well-sm view-gallery-package group-img hover-gallery">
																<? for($fh=0; $fotohoteles["idimagen"][$fh]; $fh++){
																	if($fh == 0){
																		?>
																		<a href="imagenes/hoteles/<? echo $fotohoteles["imagen"][$fh]; ?>" style="color: #9e9e9e;font-weight: bold;font-size: 11px;">
																			VER GALERIA <i class="fa fa-play" style="float: right;"></i>
																		</a>
																	<? }else { ?>
																		<a class="oculto" href="imagenes/hoteles/<? echo $fotohoteles["imagen"][$fh]; ?>">
																			<img src="imagenes/hoteles/<? echo $fotohoteles["imagen"][$fh]; ?>">
																		</a>
																	<? } } ?>
															</div>
														<? } ?>
													</div>
													<div class="col-sm-4" style="padding: 0px;">
														<div class="col-sm-12 box-price-package text-center btnReservaPaquete precio_sencilla oculto"
															 onclick="reservaPaqueteOn('1', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["sencilla"][$t]; ?>')">
															<h4 class="color-pink text-bold" id="<? echo $tabla["idcombinacion"][$t]; ?>">
																<? if($tabla["sencilla"][$t]>1){ ?>
																	$<? echo number_format($tabla["sencilla"][$t])." ".$tabla["simbolo"][$t]; ?>
																<? } else { echo "No aplica"; } ?>
															</h4>
															<span class="color-pink text-italic" style="font-size: 12;">Precio por persona por noche</span>
														</div>

														<div class="col-sm-12 box-price-package text-center btnReservaPaquete precio_doble"
															 onclick="reservaPaqueteOn('2', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["doble"][$t]; ?>')">
															<h4 class="color-pink text-bold" id="<? echo $tabla["idcombinacion"][$t]; ?>">
																<? if($tabla["doble"][$t]>1){ ?>
																	$<? echo number_format($tabla["doble"][$t])." ".$tabla["simbolo"][$t]; ?>
																<? } else { echo "No aplica"; } ?>
															</h4>
															<span class="color-pink text-italic" style="font-size: 12;">Precio por persona por noche</span>
														</div>

														<div class="col-sm-12 box-price-package text-center btnReservaPaquete precio_triple oculto"
															 onclick="reservaPaqueteOn('3', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["triple"][$t]; ?>')">
															<h4 class="color-pink text-bold" id="<? echo $tabla["idcombinacion"][$t]; ?>">
																<? if($tabla["triple"][$t]>1){ ?>
																	$<? echo number_format($tabla["triple"][$t])." ".$tabla["simbolo"][$t]; ?>
																<? } else { ?>
																	<? echo "No aplica"; } ?>
															</h4>
															<span class="color-pink text-italic" style="font-size: 12;">Precio por persona por noche</span>
														</div>

														<div class="col-sm-12 box-price-package text-center btnReservaPaquete precio_cuadruple oculto"
															 onclick="reservaPaqueteOn('4', '<? echo $tabla["idcombinacion"][$t]; ?>', '<? echo $idpaquete; ?>', '<? echo $tabla["cuadruple"][$t]; ?>')">
															<h4 class="color-pink text-bold" id="<? echo $tabla["idcombinacion"][$t]; ?>">
																<? if($tabla["cuadruple"][$t]>1){ ?>
																	$<? echo number_format($tabla["cuadruple"][$t])." ".$tabla["simbolo"][$t]; ?>
																<? } else { ?>
																	<? echo "No aplica"; } ?>
															</h4>
															<span class="color-pink text-italic" style="font-size: 12;">Precio por persona por noche</span>
														</div>
													</div>
												</div>
											<? } ?>
										</table>
									</div>
								</div>
							</div>
						<? } ?>

					</div>


				</div>
				<div class="col-sm-2">
					<? include ('aside-bar-new.php') ?>
				</div>

				<div class="row">
					<div class="col-sm-12" style="margin-top: 50px">
						<? for($pe=0; $estancia["idcombinacion"][$pe]; $pe++){
							$itinerario = descripcionItinerarios($idpaquete, $estancia["dias"][$pe]);
							?>
							<div class="cajitasecundariapaquetes <? if($pe ==0){ ?> current <? } ?>" style="font-size: 12px;">
								<div class="cajitadetalles">
									<div class="col-sm-6">
										<div id="cajaitinerario_<? echo $estancia["idcombinacion"][$pe];  ?>" class="cajitaitinerario <? if($pe >= 1){ echo "oculto"; } ?>">
											<? echo $itinerario["itinerario"][0]; ?>
										</div>
									</div>
									<div class="col-sm-6 descriptin-product">
										<? echo $elpaquete["incluye"][0]; ?>
										<div class="datoscontacto">
											<span class="eltelefonito">01 (999) 289.56.44</span>
											<a href="mailto: gmartinez@visitayucatan.com"><span class="dudasdatos"></span></a>
											<!--<span class="chatdatos"></span>-->
										</div>
									</div>
								</div>
							</div>
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