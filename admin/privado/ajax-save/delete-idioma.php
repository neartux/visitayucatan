<?
include_once($_SERVER['DOCUMENT_ROOT']."/admin/privado/scripts/mysql.php");
$ididioma = $_REQUEST["id"];

$qryBanners="select count(idregistro) as encontrados from banners_descripciones where ididioma = '$ididioma'";
$resBanner = consulta($qryBanners);

$qryArticulos = "select count(idregistro) as encontrados from articulos_descripciones where ididioma = '$ididioma'";
$resArticulos = consulta($qryArticulos);

$qryHoteles = "select count(idregistro) as encontrados from hoteles_descripciones where ididioma = '$ididioma'";
$resHoteles = consulta($qryHoteles);

$qryMenu = "select count(idregistro) as encontrados from menu_descripciones where ididioma = '$ididioma'";
$resMenu = consulta($qryMenu);

$qryPaginas ="select count(idpage) as encontrados from paginas_descripciones where ididioma = '$ididioma'";
$resPaginas = consulta($qryPaginas);

$qrySlides = "select count(idregistro) as encontrados from slides_descripciones where ididioma = '$ididioma'";
$resSlides = consulta($qrySlides);

$qryTours = "select count(iddescripcion) as encontrados from tours_descripciones where ididioma = '$ididioma'";
$resTours = consulta($qryTours);

$banners = $resBanner["encontrados"][0];
$articulos = $resArticulos["encontrados"][0];
$hoteles = $resHoteles["encontrados"][0];
$menu = $resMenu["encontrados"][0];
$paginas = $resPaginas["encontrados"][0];
$slides = $resSlides["encontrados"][0];
$tours = $resTours["encontrados"][0];

$qryDelete = "delete from idiomas where ididioma = '$ididioma'";

$total = $banners + $articulos + $hoteles + $menu + $paginas + $slides + $tours;
if($total == 0){
	echo "1";
	ejecuta($qryDelete);
}else{
	if($banners == 0){
		if($articulos == 0){
			if($hoteles == 0){
				if($menu == 0){
					if($paginas == 0){
						if($slides == 0){
							if($tours == 0){
								echo "1";
								ejecuta($qryDelete);
							}else{
								echo "No se puede eliminar el idioma, aún existen tours ligados a este idioma.";	
							}
						}else{
							echo "No se puede eliminar el idioma, aún existen slides ligados a este idioma.";
						}
					}else{
						echo "No se puede eliminar el idioma, aún existen páginas ligadas a este idioma.";
					}
				}else{
					echo "No se puede eliminar el idioma, aún existen links en el menu ligados a este idioma.";	
				}
			}else{
				echo "No se puede eliminar el idioma, aún existen hoteles ligados a este idioma.";				
			}
		}else{
			echo "No se puede eliminar el idioma, aún existen artículos en la pagina 'PENINSULA' ligados a este idioma.";	
		}
	}else{
		echo "No se puede eliminar el idioma, aún existen banners ligados a este idioma.";
	}	
}



?>