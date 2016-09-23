<?
include_once("mysql.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/admin/privado/scripts/mysql.php");

function contratos($idhotel){
	$qry="select * from contratos_hoteles where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;		
}

function cuerposCorreos($ididioma){
	$qry="select * from cuerpos_correo where ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;		
}

function imagenesHotel($idhotel){
	$qry="select * from hoteles_imagenes where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;	
}

function detalleFechaCierre($idcierre){
	$qry="select * from hoteles_fechas_cierre where idcierre = '$idcierre'";
	$res = consulta($qry);
	return $res;	
}

function cierreHoteles($idhotel){
	$qry="select * from hoteles_fechas_cierre where idhotel = '$idhotel' order by finicio asc";
	$res = consulta($qry);
	return $res;		
}

function contactosHotel($idhotel){
	$qry="select * from hoteles_contactos where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;		
}

function diccionario($idpalabra, $idioma){
	$qry="select * from diccionario_descripciones where idpalabra = '$idpalabra' and ididioma = '$idioma'";
	$res = consulta($qry);
	return $res["traduccion"][0];		
}

function menuIdioma($idmenu, $idioma){
	$qry="select * from menu_descripciones where idmenu = $idmenu and ididioma = $idioma";
	$res = consulta($qry);
	return $res["traduccion"][0];		
}

function descripcionItinerarios($paquete, $dias, $ididioma){
	$qry="select * from paquetes_itinerarios where idpaquete = '$paquete' and dias = '$dias' and ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;		
}

function descripcionPaginas($paginas, $ididioma){
	$qry="select * from paginas_descripciones where pagina = '$paginas' and ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;	
}

function buscarTags($termino, $idioma=1){
	if($termino != ""){
		$qry="select * from tags where tag = '$termino' order by tag";
	}else{
		$qry="select * from tags where ididioma = '$idioma' order by tag";
	}
	$res = consulta($qry);
	return $res;		
}

function detalleTag($idtag){
	$qry="select * from tags where idtag = '$idtag'";
	$res = consulta($qry);
	return $res;	
}

function combinaciones($idcombinacion){
	$qry="select * from paquetes_combinaciones where idcombinacion = '$idcombinacion'";
	$res = consulta($qry);
	return $res;	
}

function cuerpomail($ididioma){
	$qry="select * from cuerpos_correo where ididioma = '$ididioma'";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function reservaciones(){
	$qry="select * from reservaciones where correoadmin = 0 and correousuario = 0 limit 1";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function reservacionesCount(){
	$qry="select count(1) as encontrados from reservaciones where correoadmin = 0 and correousuario = 0 limit 1";	
	$res = consulta($qry);
	return $res["encontrados"][0];	
}

function todaslasreservas(){
	$qry="select count(1) as encontrados from reservaciones";
	$res = consulta($qry);
	return $res["encontrados"][0];	
}

function reservacionesLista($idreservacion=0, $inicia=0, $termina=10){
	$limite = '';
	if($idreservacion >= 1){
		$qryb="where idreserva = '$idreservacion'";
	}else{
		$limite = "limit $inicia, $termina";
	}
	$qry="select * from reservaciones $qryb order by 1 desc $limite";		
	$res = consulta($qry);
	return $res;		
}

function emailsAdmins(){
	$qry="select * from email_admins";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function bannerSection($section){
	$qry="select bp.idregistro, bp.idposicion, bp.idbanner, bp.lugar, b.nombre
	from banners_posiciones bp
	left join banners b on b.idbanner = bp.idbanner
	where bp.idposicion = '$section' order by bp.lugar asc";
	$res = consulta($qry);
	return $res;	
}

function bannerPosiciones($idbanner){
	$qry="select idposicion from banners_posiciones where idbanner = '$idbanner'";
	$res = consulta($qry);
	for($i=0; $res["idposicion"][$i]; $i++){
		 $valor[$i] = $res["idposicion"][$i];
	}
	return $valor;
}

function porigenes($idtour){
	$qry="select tor.idregistro, tor.idtour, tor.idorigen, tor.adulto, tor.menor, o.origen
	from tours_origenes tor
	left join origenes o on o.idorigen = tor.idorigen
	where tor.idtour = '$idtour' and tor.idorigen != 2";
	$res = consulta($qry);
	return $res;		
}

function origenes(){
	$qry="select * from origenes where idorigen != 2 order by origen asc";
	$res = consulta($qry);
	return $res;	
}

function bannersDescripciones($idbanner, $ididioma){
	$qry="select b.idbanner, b.nombre, bd.idregistro,
	case when bd.archivo is null then 'no' else bd.archivo end archivo
	from banners b
	left join banners_descripciones bd on bd.idbanner = b.idbanner and bd.ididioma = '$ididioma'
	where b.idbanner = '$idbanner'";
	$res = consulta($qry);
	return $res;	
}

function detBanner($idbanner){
	$qry="select * from banners where idbanner = '$idbanner'";
	$res = consulta($qry);
	return $res;	
}

function banners(){
	$qry="select b.idbanner, b.clics, b.nombre,
	case when b.idestatus=1 then 'paloma.png' else 'tacha.png' end estatus
	from banners b";
	$res = consulta($qry);
	return $res;	
}

function articulosDescripciones($idarticulo, $ididioma){
	$qry="select * from articulos_descripciones where idarticulo = '$idarticulo' and ididioma =  '$ididioma';";
	$res = consulta($qry);
	return $res;		
}

function detArticulo($idarticulo){
	$qry="select ap.idarticulo, ap.idestatus, ad.nombre
	from articulos_peninsula ap
	left join articulos_descripciones ad on ad.idarticulo = ap.idarticulo and ad.ididioma =  1
	where ap.idarticulo = '$idarticulo'";
	$res = consulta($qry);
	return $res;	
}

function articulos(){
	$qry="select ap.*, ad.nombre, ad.descripcion,
	case when ap.idestatus=1 then 'paloma.png' else 'tacha.png' end estatus
	from articulos_peninsula ap
	left join articulos_descripciones ad on ad.idarticulo = ap.idarticulo and ididioma =  1
	order by ad.nombre asc;";
	$res = consulta($qry);
	return $res;	
}
	
function imgsPaquetes($idpaquete){
	$qry="select * from paquetes_fotos where idpaquete = '$idpaquete'";
	$res = consulta($qry);
	return $res;		
}	
	
function paquetes($ididioma=1, $idpaquete=0){
	 if($idpaquete >= 1){
	 	$condicion ="where p.idpaquete = ".$idpaquete;
	 }	 
	 $qry="select p.idpaquete, p.idestatus, pd.nombre, pd.descripcion, p.vendidos, p.visitas, p.circuito, pd.intro, pd.incluye, pd.itinerario, pd.idregistro, p.promovido,
	 case when p.idestatus=1 then 'paloma.png' else 'tacha.png' end estatus,
	 case when pd.tags = '' or pd.tags is null then '0' else pd.tags end tags
	 from paquetes p 
	 left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete and pd.ididioma = '$ididioma' $condicion";
	 //echo $qry;
	 $res = consulta($qry);
	 return $res;	
}

function paqueteReserva($idpaquete){
	$qry="select * from paquetes where idpaquete = '$idpaquete'";
	$res = consulta($qry);
	return $res;		
}

function infohotel($idhotel){
	$qry="select * from hoteles where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;			
}

function paqueteTour($idtour){
	$qry="select * from tours where idtour = '$idtour'";
	$res = consulta($qry);
	return $res;			
}

function paqueteHoteles($idhotel){
	$qry="select idhotel, idestatus, hotel as nombre, stars, paquete, direccion  
	from hoteles where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;	
}

function descripcionHabitacion($idhab, $ididioma){
	$qry="select * from habitaciones_descripciones where idhabitacion = '$idhab' and ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;
}

function paquetesHoteles($idpaquete, $noches, $dias){
	$qry="select pq.idcombinacion, pq.idhotel, pq.noches, pq.dias, pq.sencilla, pq.doble, pq.triple, pq.cuadruple, pq.menor
	from paquetes_combinaciones pq
	where pq.idpaquete = '$idpaquete' and noches = '$noches' and dias = '$dias'";
	$res = consulta($qry);
	return $res;		
}

function menunochesdias($idpaquete){	
	$qry="select idcombinacion, noches, dias from paquetes_combinaciones 
	where idpaquete = '$idpaquete' group by dias";
	$res = consulta($qry);
	return $res;	
}

function imgsTours($idtour){
	$qry="select * from tours_fotos where idtour = '$idtour'";
	$res = consulta($qry);
	return $res;		
}	

function tours($ididioma=1, $idtour=0){
	 if($idtour >= 1){
	 	$condicion ="where t.idtour = ".$idtour;
	 }	
	$qry="select t.idtour, t.nombre, t.visitas, t.vendidos, t.circuito, td.descripcion, td.tourmsj, t.promovido,
	tor.adulto as tadulto, tor.menor as tmenor,
	case when t.estatus=1 then 'paloma.png' else 'tacha.png' end estatus,t.minimopersonas
	from tours t
	left join tours_descripciones td on td.idtour = t.idtour and td.ididioma =  '$ididioma' 
	left join tours_origenes tor on tor.idtour = t.idtour and tor.idorigen = 2
	$condicion
	order by t.nombre asc";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function toursDescripciones($idtour, $ididioma){
	$qry="select td.iddescripcion, td.idtour, td.descripcion, td.tourmsj, t.nombre, t.circuito, td.nombretour,
	case when td.tags = '' or td.tags is null then '0' else td.tags end tags
	from tours_descripciones td
	left join tours t on t.idtour = td.idtour
	where td.idtour = '$idtour' and td.ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;	
}

function hoteles(){
	$qry="select h.idhotel, h.hotel, h.stars,
	case when h.idestatus=1 then 'paloma.png' else 'tacha.png' end estatus 
	from hoteles h order by h.hotel asc";
	$res = consulta($qry);
	return $res;	
}

function usuarios(){
	$qry="select idusuario, email, nivel, nombre, apellido,
	case when activo=1 then 'paloma.png' else 'tacha.png' end estatus
	from usuarios";
	$res = consulta($qry);
	return $res;		
}

function monedas(){
	$qry="select idmoneda, moneda, simbolo, tipocambio, 
	case when estatus=1 then 'paloma.png' else 'tacha.png' end estatus
	from moneda order by moneda asc";
	$res = consulta($qry);
	return $res;			
}

function idiomas(){
	$qry="select ididioma, idioma, claveidioma, url, bandera,
	case when estatus=1 then 'paloma.png' else 'tacha.png' end estatus
	from idiomas";
	$res = consulta($qry);
	return $res;		
}

function detIdioma($ididioma){
	$qry="select * from idiomas where ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;			
}

function detMoneda($idmoneda){
	$qry="select * from moneda where idmoneda = '$idmoneda'";
	$res = consulta($qry);
	return $res;				
}

function detUsuario($idusuario){
	$qry="select * from usuarios where idusuario = '$idusuario'";
	$res = consulta($qry);
	return $res;					
}

function detHotel($idhotel){
	$qry="select * from hoteles where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;	
}

function hotelesdet($ididioma, $idhotel){
	$qry="select hd.idregistro, h.idhotel, h.idestatus, h.hotel, h.stars, h.direccion, h.telefono,
	hd.descripcion, hd.ididioma
	from hoteles h
	left join hoteles_descripciones hd on hd.idhotel = h.idhotel
	where h.idhotel = '$idhotel' and hd.ididioma = '$ididioma'";
	$res = consulta($qry);
	return $res;	
}

function detTour($idtour){
	$qry="select t.idtour, t.nombre, t.estatus, t.vendidos, t.visitas, t.circuito, tor.adulto as tadulto, tor.menor as tmenor, t.minimopersonas
	from tours t
	left join tours_origenes tor on tor.idtour = t.idtour  and tor.idorigen = 2
	where t.idtour = '$idtour'";
	$res = consulta($qry);
	return $res;	
}

function detPaquete($idpaquete){
	$qry="select p.idpaquete, p.idestatus, p.circuito, pd.nombre
	from paquetes p
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete and pd.ididioma = 1
	where p.idpaquete ='$idpaquete'";
	$res = consulta($qry);
	return $res;	
}

function habitaciones($idhotel){
	$qry="select * from habitaciones_hoteles where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;		
}

function tarifas($idhotel, $idcontrato, $idhabitacion, $desde, $hasta){
	$qry="select * from hoteles_tarifas where idhotel = '$idhotel' and idcontrato = '$idcontrato' and idhabitacion = '$idhabitacion' and fecha between '$desde' and '$hasta' order by fecha";
	//echo $qry;
	$res = consulta($qry);
	return $res;		
}

function cortarTexto($texto, $tamano=100, $colilla="...") {
	$texto=substr($texto, 0,$tamano);
	$index=strrpos($texto, " ");
	$texto=substr($texto, 0,$index); $texto.=$colilla;
	return $texto;
}

function hoteldetalle($idhotel, $idhabitacion, $checkin){
	$moneda = 1;
	$tcambio = 1;
	//global $moneda, $tcambio;
	/*$qry="select ht.*, h.hotel, h.stars, hd.descripcion, m.simbolo, ch.edadmenor, p.plan
	from hoteles_tarifas ht
	left join hoteles h on h.idhotel = ht.idhotel
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel
	left join moneda m on m.idmoneda = $moneda	
	left join contratos_hoteles ch on ch.idcontrato = ht.idcontrato	
	left join planes p on p.idplan = ch.idplan
	where ht.idhotel = '$idhotel' and fecha = curdate()";*/
	$qry="select ht.*, h.hotel, h.stars, hd.descripcion, m.simbolo, ch.edadmenor, p.plan, hh.nombre
	from hoteles_tarifas ht 
	left join hoteles h on h.idhotel = ht.idhotel 
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel 
	left join moneda m on m.idmoneda = 1	
	left join contratos_hoteles ch on ch.idcontrato = ht.idcontrato	
	left join planes p on p.idplan = ch.idplan 
	left join habitaciones_hoteles hh on hh.idhabitacion = ht.idhabitacion
	where ht.idhotel = '$idhotel' and hh.idhabitacion = '$idhabitacion' and fecha = curdate()";
	//echo $qry;
	$res = consulta($qry);
	return $res;		
}

function lahabitacion($idhabitacion){
	$qry="select * from habitaciones_hoteles where idhabitacion = '$idhabitacion'";
	$res = consulta($qry);
	return $res;		
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function ceros($numero, $ceros=2){
    return sprintf("%0".$ceros."s", $numero );
}

function uncodedbmx($numero){
	$myString = substr($numero, 0, -2);
	return number_format(round($myString, 2))." MXN";
}

function formatofecha($fecha){
	$fecha = explode("-",$fecha);  
	$mes = nombre_mes($fecha[1]);
	$cadena = $fecha[2]." de ".$mes." de ".$fecha[0];
	return $cadena;
}

function nombre_mes($mes){
   switch($mes) {
       case 1: return 'Enero'; break;
       case 2: return 'Febrero'; break;
       case 3: return 'Marzo'; break;
       case 4: return 'Abril'; break;
       case 5: return 'Mayo'; break;
       case 6: return 'Junio'; break;
       case 7: return 'Julio'; break;
       case 8: return 'Agosto'; break;
       case 9: return 'Septiembre'; break;
       case 10: return 'Octubre'; break;
       case 11: return 'Noviembre'; break;
       case 12: return 'Diciembre'; break;
   }	
}

function planes(){
	$qry="select * from planes order by plan";
	$res = consulta($qry);
	return $res;		
}

function restaFechas($dFecIni, $dFecFin)
{
    $dFecIni = str_replace("-","",$dFecIni);
    $dFecIni = str_replace("/","",$dFecIni);
    $dFecFin = str_replace("-","",$dFecFin);
    $dFecFin = str_replace("/","",$dFecFin);

    ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecIni, $aFecIni);
    ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecFin, $aFecFin);

    $date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[1], $aFecIni[3]);
    $date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[1], $aFecFin[3]);

    return round(($date2 - $date1) / (60 * 60 * 24));
}

function sumadias($fec_emision, $can_dias){
	//mm-dd-yy
	$fecha = explode("-",$fec_emision);  
	$dyh = getdate(mktime(0, 0, 0, $fecha[0], $fecha[1], $fecha[2]) + 24*60*60*$can_dias); 
	$fec_vencimiento = $dyh['year']."-".$dyh['mon']."-".$dyh['mday'];
	return ($fec_vencimiento);  
}

function destinos($iddestino=0){
	if($iddestino >= 1){
		$subqry="where iddestino = '$iddestino'";
	}
	$qry="select * from destinos $subqry order by destino";
	$res = consulta($qry);
	return $res;
}
?>