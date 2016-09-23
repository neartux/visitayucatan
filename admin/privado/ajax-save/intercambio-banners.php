<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$bannera = $_REQUEST["bannera"];
$posiciona = $_REQUEST["posiciona"];
$bannerb = $_REQUEST["bannerb"];
$posicionb = $_REQUEST["posicionb"];
$seccion = $_REQUEST["seccion"];


$qrya="update banners_posiciones set lugar = '$posiciona', upd='1' where idposicion = '$seccion' and idbanner = '$bannera'";
$qryb="update banners_posiciones set lugar = '$posicionb' where idposicion = '$seccion' and idbanner = '$bannerb' and upd= '0'";
$qryc="update banners_posiciones set upd='0' where idposicion = '$seccion' and idbanner = '$bannera' and upd= '1'";

ejecuta($qrya);
ejecuta($qryb);
ejecuta($qryc);


?>