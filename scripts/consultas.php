<?
include_once($_SERVER['DOCUMENT_ROOT']."/visitayucatan/scripts/mysql.php");

function traducciones($palabra){
	global $idioma;
	if($idioma >= 2){
		$subqry = "and dd.ididioma = '$idioma'";
	}
	$qry="select d.idpalabra, d.palabra, dd.traduccion
	from diccionario d
	left join diccionario_descripciones dd on dd.idpalabra = d.idpalabra where d.idpalabra = '$palabra' $subqry";
	$res = consulta($qry);

	if($idioma == 1){
		echo $res["palabra"][0];
	}else{
		echo $res["traduccion"][0];
	}
	
}

function imagenesHotel($idhotel){
	$qry="select * from hoteles_imagenes where idhotel = '$idhotel'";
	$res = consulta($qry);
	return $res;	
}

function fechasCerradas($idhotel){
	$qry="select * from hoteles_fechas_cierre where idhotel = '$idhotel' order by finicio asc";
	$res = consulta($qry);
	$arreglo="";
	$superarreglo="";
	//["2014-12-10", "2014-12-11"];
	//var disabledDays = ["3-27-2015", '3-28-2015']; --- correcto	
	for($i=0; $res["idcierre"][$i]; $i++){
		$finicio = $res["finicio"][$i];
		$finiciob = explode("-",$finicio);
		$year=$finiciob[0];
		$mes=$finiciob[1];
		$dia=$finiciob[2];		
		
		$ffinal = $res["ffinal"][$i];
		$ffinalb = explode("-",$ffinal);
		$yearb=$ffinalb[0];
		$mesb=$ffinalb[1];
		$diab=$ffinalb[2];
		
		$finicioc = $dia."-".$mes."-".$year;
		$ffinalc = $diab."-".$mesb."-".$yearb;
		
		
		$diferencia = restaFechas($finicioc, $ffinalc);
		for($f=0; $f<= $diferencia; $f++){
		   $lafecha = sumadiass($finicio, $f);
			if($f==0){
				$arreglo = "'".$lafecha."', ";
			}else{
				$arreglo = $arreglo." '".$lafecha."', ";	
			}
		}
		$superarreglo = $superarreglo." ".$arreglo;	
	}
	return $superarreglo;
}

function fechasCerradasb($idhotel){
	$qry="select * from hoteles_fechas_cierre where idhotel = '$idhotel' order by finicio asc";
	$res = consulta($qry);
	$arreglo="";
	$superarreglo="";
	//["2014-12-10", "2014-12-11"];
	//var disabledDays = ["3-27-2015", '3-28-2015']; --- correcto	
	for($i=0; $res["idcierre"][$i]; $i++){
		$finicio = $res["finicio"][$i];
		$finiciob = explode("-",$finicio);
		$year=$finiciob[0];
		$mes=$finiciob[1];
		$dia=$finiciob[2];		
		
		$ffinal = $res["ffinal"][$i];
		$ffinalb = explode("-",$ffinal);
		$yearb=$ffinalb[0];
		$mesb=$ffinalb[1];
		$diab=$ffinalb[2];
		
		$finicioc = $dia."-".$mes."-".$year;
		$ffinalc = $diab."-".$mesb."-".$yearb;		
		
		$diferencia = restaFechas($finicioc, $ffinalc);
		for($f=0; $f<= $diferencia; $f++){
		   $lafecha = sumadias($finicio, $f);
			
			$array[$f] = $lafecha; 
			/*if($f==0){
				$arreglo = "'".$lafecha."', ";
			}else{
				$arreglo = $arreglo." '".$lafecha."', ";	
			}*/
		}
		//$superarreglo = $superarreglo." ".$arreglo;	
	}
	return $array;
}


function paquetesSimilares($idpaquete){
	global $moneda, $tcambio;
	$qry="select p.idpaquete, p.idestatus, p.nombre, p.vendidos, p.visitas, p.circuito, pf.archivo, (min(pc.sencilla)/$tcambio) as sencilla, m.simbolo
	from paquetes p
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1
	left join paquetes_combinaciones pc on pc.idpaquete = p.idpaquete
	left join moneda m on m.idmoneda = $moneda
	where p.idpaquete != '$idpaquete'
	group by pc.idpaquete
	order by rand() limit 5";
	$res = consulta($qry);
	return $res;	
}

function actualizavisitasPaquetes($idpaquete){
	$qry="call visitasPaquetes('$idpaquete')";
	$res = ejecuta($qry);
}

function actualizavisitasTours($idtour){
	$qry="call visitasTours('$idtour')";
	$res = ejecuta($qry);
}

function buscaTags($tag){
	$qry="select * from tags where tag like '%".$tag."%'";
	$res = consulta($qry);
	return $res;	
}

function descripcionItinerarios($paquete, $dias){
	global $idioma;
	$qry="select * from paquetes_itinerarios where idpaquete = '$paquete' and dias = '$dias' and ididioma = '$idioma'";		
	$res = consulta($qry);
	return $res;		
}

function combinaciones($idcombinacion){
	$qry="select * from paquetes_combinaciones where idcombinacion = '$idcombinacion'";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function actualizaReserva($tipotarjeta, $pagado, $autorizacionBMX, $operacionBMX, $session, $voucherBMX){
	//Buscamos el ID mas alto
	$qryfind = "select * from reservaciones where sesion = '$session' order by 1 desc limit 1";
	$resq = consulta($qryfind);
	$id = $resq["idreserva"][0];
	
	$sessionb= $session."_";
	$qry="update reservaciones 
	set idtipotarjeta = '$tipotarjeta',
	pagado = '$pagado',
	autorizacionBMX = '$autorizacionBMX',
	operacionBMX = '$operacionBMX',
	voucherBMX= '$voucherBMX',
	sesion= '$sessionb',
	correoadmin = '0',
	correousuario = '0'
	where idreserva = '$id'";
	ejecuta($qry);
}

function buscaReserva($sesion){
	$qry="select * from reservaciones where sesion = '$sesion'";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function combinacion($idcombinacion){	
	global $moneda, $tcambio;
	$qry="select pc.idcombinacion, pc.idpaquete, pc.idhotel, pc.noches, pc.dias, (pc.sencilla/$tcambio) as sencilla, 
	(pc.doble/$tcambio) as doble, 
	(pc.triple/$tcambio) as triple, 
	(pc.cuadruple/$tcambio) as cuadruple, 
	(pc.menor/$tcambio) as menor,
	m.simbolo,
	h.hotel, p.nombre
	from paquetes_combinaciones pc 
	left join hoteles h on h.idhotel = pc.idhotel
	left join paquetes p on p.idpaquete = pc.idpaquete
	left join moneda m on m.idmoneda = $moneda
	where pc.idcombinacion = '$idcombinacion'";	
	$res = consulta($qry);
	return $res;	
}

function otrosTours($idtour){
	global $idioma, $moneda, $tcambio;
	$qry="select t.idtour, t.nombre, t.tadulto/$tcambio as tadulto, t.tmenor/$tcambio as tmenor, 
	tf.archivo, m.simbolo
	from tours t
	left join tours_fotos tf on tf.idtour = t.idtour and tf.principal =  1
	left join moneda m on m.idmoneda = 1
	where t.idtour != '$idtour' and t.estatus = 1
	order by rand() limit 3";
	$res = consulta($qry);
	return $res;	
}

function fotosTour($idtour){
	//$qry="select * from tours_fotos where idtour = '$idtour'";
	$qry="select * from tours_fotos where idtour = '$idtour' and principal = 0 limit 3
	union 
	select * from tours_fotos where idtour = '$idtour' and principal = 1 
	order by rand() limit 4";
	$res = consulta($qry);
	return $res;	
}

function precioOrigenes($idtour){
	global $idioma, $moneda, $tcambio;
	$qry="select tor.idregistro, tor.idorigen, tor.idtour, tor.adulto/$tcambio as tadulto, tor.menor/$tcambio as tmenor,
	o.origen, m.simbolo
	from tours_origenes tor 
	left join origenes o on o.idorigen = tor.idorigen
	left join moneda m on m.idmoneda = $moneda
	where tor.idtour = $idtour";
	$res = consulta($qry);
	return $res;	
}

function mensajes(){
	global $idioma, $moneda, $tcambio;
	$qry="select * from mensajes_contacto where ididioma = $idioma";
	$res = consulta($qry);
	echo $res["mensaje"][0];
}

function paqueteEstanciaHotel($idpaquete, $noches, $dias){
	global $idioma, $moneda, $tcambio;
	$qry="select pc.idcombinacion, pc.noches, pc.dias, pc.sencilla/$tcambio as sencilla,
	pc.doble/$tcambio as doble, pc.triple/$tcambio as triple, pc.cuadruple/$tcambio as cuadruple, pc.menor/$tcambio as menor,
	h.hotel, h.stars, m.simbolo, h.idhotel
	from paquetes_combinaciones pc
	left join hoteles h on h.idhotel = pc.idhotel
	left join moneda m on m.idmoneda = '$moneda'
	where pc.idpaquete = '$idpaquete' and pc.noches = '$noches' and pc.dias = '$dias' and h.idestatus = 1 order by pc.sencilla";
	$res = consulta($qry);
	return $res;
}

function paquetesEstancia($idpaquete){
	$qry="select idcombinacion, noches, dias from paquetes_combinaciones where idpaquete = '$idpaquete' group by noches";	
	$res = consulta($qry);
	return $res;
}

function precioPaquete($idpaquete){
	global $moneda, $tcambio;
	$qry="select (sencilla/$tcambio ) as sencilla, m.simbolo,(doble/$tcambio ) as doble
	from paquetes_combinaciones 
	left join moneda m on m.idmoneda = $moneda
	where idpaquete = '$idpaquete' 
	order by sencilla asc limit 1";
	$res = consulta($qry);
	return number_format(round($res["doble"][0], 2))." ".$res["simbolo"][0];
}

function paquetes($idpaquete=0, $orden=0){
	global $idioma;	
	//echo "El paquete consultado es: ".$idpaquete;
	if($idpaquete >= 1){
		$subqry="and p.idpaquete = ".$idpaquete;
	}
	if($orden == 1){
		$orden = "order by pd.nombre asc";
	}
	$qry="select p.idpaquete, pd.descripcion, pd.incluye, pd.nombre, p.circuito, pd.intro, pd.itinerario, pf.archivo
	from paquetes p
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1
	where p.idestatus = 1 and pd.ididioma = '$idioma' $subqry order by p.nombre asc";	
	//echo $qry;	 
	$res = consulta($qry);
	return $res;
}

function listapaquetes(){
	global $idioma;	
	$qry="select p.idpaquete, pd.descripcion, pd.incluye, pd.nombre, p.circuito, pd.intro, pd.itinerario, pf.archivo,
	(select min(sencilla) from paquetes_combinaciones where idpaquete = p.idpaquete) as sencilla
	from paquetes p
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1
	where p.idestatus = 1 and pd.ididioma = '$idioma'  
	order by sencilla";
	$res = consulta($qry);
	return $res;	
}

function unpaquete($idpaquete, $idioma){
	$qry="select p.idpaquete, pd.descripcion, pd.incluye, pd.nombre, p.circuito, pd.intro, pd.itinerario, pf.archivo,
	(select min(sencilla) from paquetes_combinaciones where idpaquete = p.idpaquete) as sencilla
	from paquetes p
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1
	where p.idestatus = 1 and pd.ididioma = '$idioma'  and  p.idpaquete = '$idpaquete'
	order by sencilla";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function paquetesBusqueda($termino=0){	
	global $idioma;	
	if($termino >= 1){
		$subqry ="and p.idpaquete = '$termino'";
	}
	/*
	if($termino != "" and $termino != "(Ejemplo: aventura, jungla, descanso)"){
		$subqry ="and pd.tags like '%".$termino."%'";
	}*/
	
	$qry="select p.idpaquete, pd.descripcion, pd.incluye, pd.nombre, p.circuito, pd.intro, pd.itinerario, pf.archivo, pd.tags
	from paquetes p
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1
	where p.idestatus = 1 and pd.ididioma = '$idioma' $subqry";	
	$res = consulta($qry);
	return $res;
}
function toursBusqueda($termino=0){	
	global $idioma, $moneda, $tcambio;
	
	/*if($termino != "" and $termino != "(Ejemplo: aventura, jungla, descanso)"){
		$subqry ="and td.tags like '%".$termino."%'";
	}*/
	if($termino >= 1){
		$subqry = "and t.idtour = '$termino'";	
	}	
	
	$qry="select t.idtour, t.nombre, (tor.adulto / $tcambio) as tadulto, (tor.menor / $tcambio) as tmenor, t.vendidos, 
	t.visitas, td.descripcion, m.tipocambio, m.simbolo, t.circuito, td.tourmsj, tf.archivo 
	from tours t 
	left join tours_descripciones td on td.idtour = t.idtour and td.ididioma = $idioma
	left join moneda m on m.idmoneda = $moneda
	left join tours_fotos tf on tf.idtour = t.idtour and tf.principal = 1 
	left join tours_origenes tor on tor.idtour = t.idtour and tor.idorigen = 2
	where t.estatus = 1 $subqry order by tor.adulto asc";		
	$res = consulta($qry);
	return $res;
}

function compartetour($termino=0, $idioma){	
	if($termino >= 1){
		$subqry = "and t.idtour = '$termino'";	
	}	
	
	$qry="select t.idtour, t.nombre, t.vendidos, 
	t.visitas, td.descripcion, t.circuito, td.tourmsj, tf.archivo 
	from tours t 
	left join tours_descripciones td on td.idtour = t.idtour and td.ididioma = $idioma
	left join tours_fotos tf on tf.idtour = t.idtour and tf.principal = 1 
	left join tours_origenes tor on tor.idtour = t.idtour and tor.idorigen = 2
	where t.estatus = 1 $subqry order by tor.adulto asc";	
	$res = consulta($qry);
	return $res;
}

function paquetesIndex(){
	global $moneda, $tcambio, $idioma;
	$qry="select p.idpaquete, pd.descripcion, pd.incluye, pd.nombre, p.circuito, pd.intro, pd.itinerario, pf.archivo, m.simbolo, (min(pc.sencilla)/$tcambio) as sencilla
	from paquetes p 
	left join paquetes_descripciones pd on pd.idpaquete = p.idpaquete 
	left join paquetes_fotos pf on pf.idpaquete = p.idpaquete and pf.principal = 1 
	left join moneda m on m.idmoneda = $moneda
	left join paquetes_combinaciones pc on pc.idpaquete = p.idpaquete
	where p.idestatus = 1 and pd.ididioma = '$idioma' and p.promovido = 1 group by pc.idpaquete order by pc.sencilla $subqry";
	$res = consulta($qry);
	return $res;	
}

function menu(){
	global $idioma;
    $qry="select m.idmenu, m.clase, md.traduccion
	from menu m
	left join menu_descripciones md on md.idmenu = m.idmenu
	where md.ididioma = '$idioma' and m.activo = 1";	
	$res = consulta($qry);
	return $res;
}

function slides(){
	global $idioma;	
	$qry="select s.idslide, sd.archivo
	from slides s
	left join slides_descripciones sd on sd.idslide = s.idslide
	where s.idestatus = 1 and sd.ididioma = '$idioma'";
	$res = consulta($qry);
	return $res;
}

function banners($idseccion){
	global $idioma;	
	$qry="select b.idbanner, b.clics, b.nombre, bp.lugar, bd.archivo
	from banners b
	inner join banners_posiciones bp on bp.idbanner = b.idbanner and bp.idposicion = '$idseccion'
	inner join banners_descripciones bd on bd.idbanner = b.idbanner and bd.ididioma = '$idioma'
	where b.idestatus = 1
	order by bp.lugar asc";
	$res = consulta($qry);
	return $res;
}

function articulosPeninsula(){
	global $idioma;	
	$qry="select ap.idarticulo, ad.nombre, ad.descripcion
	from articulos_peninsula ap
	left join articulos_descripciones ad on ad.idarticulo = ap.idarticulo
	where ap.idestatus = 1 and ad.ididioma = '$idioma'";
	$res = consulta($qry);
	return $res;
}

function paginaDescripcion($pagina){
	global $idioma;
	$qry="select * from paginas_descripciones where pagina = '$pagina' and ididioma = '$idioma'";
	$res = consulta($qry);	
	return $res;	
}

function fotospaquete($idpaquete){
	global $idioma;	
	$qry="select * from paquetes_fotos where idpaquete = '$idpaquete' and principal = 0 limit 3
	UNION
	select * from paquetes_fotos where idpaquete = '$idpaquete' and principal = 1
	order by rand() limit 4";
	$res = consulta($qry);
	return $res;		
}

function fotopaqueteprincipal($idpaquete){
	$qry="select * from paquetes_fotos where idpaquete = '$idpaquete' and principal = 1 limit 1";
	$res = consulta($qry);
	return $res;			
}

function tours($idtour=0, $orden=0, $max){
	$subqry = "";
	if($idtour >= 1){
		$subqry="and t.idtour = ".$idtour;
	}
	
	if($orden==0){
		$orden = "tor.adulto asc";
	}else{
		$orden = "t.nombre asc";
	}		
	
	if($max >= 1){
		$subqryb="limit $max";
	}	
	
	global $idioma, $moneda, $tcambio;
	$qry="select t.idtour, t.nombre, td.nombretour, (tor.adulto / $tcambio) as tadulto, (tor.menor / $tcambio) as tmenor, t.vendidos, 
	t.visitas, td.descripcion, m.tipocambio, m.simbolo, t.circuito, td.tourmsj, tf.archivo ,t.minimopersonas
	from tours t 
	left join tours_descripciones td on td.idtour = t.idtour and td.ididioma = $idioma
	left join moneda m on m.idmoneda = $moneda
	left join tours_fotos tf on tf.idtour = t.idtour and tf.principal = 1 
	left join tours_origenes tor on tor.idtour = t.idtour and tor.idorigen = 2
	where t.estatus = 1 and td.descripcion is not null $subqry 
	order by $orden $subqryb";	
			
	$res = consulta($qry);
	return $res;
}

function tourshome(){
		if($orden==0){
		$orden = "tor.adulto asc";
	}else{
		$orden = "t.nombre asc";
	}
		
	
	
	global $idioma, $moneda, $tcambio;
	$qry="select t.idtour, t.nombre, td.nombretour, (tor.adulto / $tcambio) as tadulto, (tor.menor / $tcambio) as tmenor, t.vendidos, 
	t.visitas, td.descripcion, m.tipocambio, m.simbolo, t.circuito, td.tourmsj, tf.archivo 
	from tours t 
	left join tours_descripciones td on td.idtour = t.idtour and td.ididioma = $idioma
	left join moneda m on m.idmoneda = $moneda
	left join tours_fotos tf on tf.idtour = t.idtour and tf.principal = 1 
	left join tours_origenes tor on tor.idtour = t.idtour and tor.idorigen = 2
	where t.estatus = 1 and t.promovido = 1 and td.descripcion is not null $subqry 
	order by $orden $subqryb";	
			
	$res = consulta($qry);
	return $res;
}

function calculatarifa($tarifa, $idhotel, $idcontrato){
	global $moneda, $tcambio;
	$qry="select * from contratos_hoteles where idcontrato = '$idcontrato'";
	$res = consulta($qry);
	//echo $tarifa;
	$ish = $res["ish"][0];
	$markup = $res["markup"][0];
	$iva = $res["iva"][0];
	$fee = $res["fee"][0];
	$estatus = $res["impuestos"][0];
	
	if($estatus == 0){
		//Sumatoria de porcentajes
		$porc = $iva + $ish;
		
		//Sumamos el ISH
		//$tarifafinal = $tarifa + ($tarifa * ($ish / 100));
		
		//Sumamos el iva
		//$tarifafinal = $tarifafinal + ($tarifafinal * ($iva / 100));
		$tarifafinal = $tarifa + ($tarifa * ($porc / 100));
		
	}else{
		$tarifafinal = $tarifa;
	}
	
	//Sumamos el markup
	$markupb = $markup/100;
	$tarifafinal = $tarifafinal / (1-$markupb);	
	
	return $tarifafinal;	
}

function hoteles($iddestino){
	global $moneda, $tcambio, $idioma;
	$qry="select ht.*, (min(ht.doble)/$tcambio) as tarifamin, h.hotel, h.stars, hd.descripcion, hi.imagen, m.simbolo
	from hoteles_tarifas ht
	left join hoteles h on h.idhotel = ht.idhotel
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel and hd.ididioma = '$idioma'
	left join moneda m on m.idmoneda = $moneda
	left join hoteles_imagenes hi on hi.idhotel = ht.idhotel
	where ht.fecha = curdate() and h.idestatus = 1 and h.iddestino = '$iddestino'
	group by idhotel order by tarifa asc";
	//echo $qry;
	$res = consulta($qry);
	return $res;	
}

function destinos(){
	$qry="select * from destinos where estatus = 1 order by destino";
	$res = consulta($qry);
	return $res;
}

function hoteldetalle($idhotel, $idioma){
	global $moneda, $tcambio;
	if($moneda >= 1){
		$moneda = $moneda;
	}else{
		$moneda = 1;
	}	
	$qry="select ht.*, h.hotel, h.stars, hd.descripcion, m.simbolo, ch.edadmenor, p.plan
	from hoteles_tarifas ht
	left join hoteles h on h.idhotel = ht.idhotel
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel and hd.ididioma = '$idioma'
	left join moneda m on m.idmoneda = $moneda	
	left join contratos_hoteles ch on ch.idcontrato = ht.idcontrato	
	left join planes p on p.idplan = ch.idplan
	where ht.idhotel = '$idhotel' and fecha = curdate()";	
	//echo $qry;
	$res = consulta($qry);
	return $res;		
}

function lahabitacion($idhabitacion){
	global $moneda, $tcambio;
	$qry="select * from habitaciones_hoteles where idhabitacion = '$idhabitacion'";
	$res = consulta($qry);
	return $res;		
}

function hoteldetallecompra($idhotel, $idhabitacion, $checkin){
	global $moneda, $tcambio;
	$qry="select ht.idtarifa, (ht.tarifa/$tcambio) as tarifa, (ht.doble/$tcambio) as doble, (ht.triple/$tcambio) as triple, (ht.cuadruple/$tcambio) as cuadruple, ht.idcontrato, ht.idhabitacion, 
	h.hotel, h.stars, hd.descripcion, m.simbolo, ch.edadmenor, hh.nombre
	from hoteles_tarifas ht
	left join hoteles h on h.idhotel = ht.idhotel
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel
	left join moneda m on m.idmoneda = $moneda
	left join contratos_hoteles ch on ch.idcontrato = ht.idcontrato
	left join habitaciones_hoteles hh on hh.idhabitacion = ht.idhabitacion
	where ht.idhotel = '$idhotel' and ht.idhabitacion = '$idhabitacion' and ht.fecha = '$checkin'";
	$res = consulta($qry);
	return $res;		
}

function habitaciones($idhotel){
	global $idioma;
	$qry="select hh.*, hd.descripcion as descrihab
	from habitaciones_hoteles hh
	left join habitaciones_descripciones hd on hd.idhabitacion = hh.idhabitacion
	where hh.idhotel = '$idhotel' and hd.ididioma = '$idioma'";	
	$res = consulta($qry);
	return $res;			
}

function tarifas($idhotel, $idhabitacion, $desde, $hasta){
	global $moneda, $tcambio;
	$qry="select ht.idtarifa, ht.idhotel, ht.idcontrato, ht.idhabitacion, ht.fecha, hh.allotment,
	(ht.tarifa/$tcambio) as tarifa, (ht.doble/$tcambio) as doble, (ht.triple/$tcambio)  as triple, (ht.cuadruple/$tcambio) as cuadruple,
	m.simbolo, hh.capmaxima , ch.edadmenor
	from hoteles_tarifas ht 
	left join moneda m on m.idmoneda = $moneda
	left join habitaciones_hoteles hh on hh.idhabitacion = ht.idhabitacion
	left join contratos_hoteles ch on ch.idcontrato = ht.idcontrato 
	where ht.idhotel = '$idhotel' and ht.idhabitacion = '$idhabitacion' and ht.fecha between '$desde' and '$hasta'";
	//echo $qry;	
	$res = consulta($qry);
	return $res;				
}

function tarifatotal($idhotel, $idhabitacion, $desde, $hasta){
	global $moneda, $tcambio;
	$qry="select sum(ht.tarifa) as total, m.simbolo, hh.capmaxima
	from hoteles_tarifas ht 
	left join moneda m on m.idmoneda = $moneda
	left join habitaciones_hoteles hh on hh.idhabitacion = ht.idhabitacion
	where ht.idhotel = '$idhotel' and ht.idhabitacion = '$idhabitacion' and ht.fecha between '$desde' and '$hasta'";
	$res = consulta($qry);
	return $res;				
}

function monedas(){	
	$qry="select * from moneda where estatus = 1 order by moneda";
	$res = consulta($qry);
	return $res;
}

function idiomas(){
	$qry="select * from idiomas where estatus = 1 order by idioma";
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

function string2urlb($cadena){
	$cadena = trim($cadena);
	$cadena = strtr($cadena, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn-");
	$cadena = strtr($cadena,"ABCDEFGHIJKLMNOPQRSTUVWXYZ ","abcdefghijklmnopqrstuvwxyz-");
	
	/*$cadena = preg_replace('#([^.a-z0-9]+)#i', '-', $cadena);
    $cadena = preg_replace('#-{2,}#','-',$cadena);
    $cadena = preg_replace('#-$#','',$cadena);
    $cadena = preg_replace('#^-#','',$cadena);*/
	return $cadena;
}
function string2url($cadena){
	$no_permitidas= array ("'", '’', 'ñ', '', ' ', 'á', 'é', 'í', 'ó', 'ú');
	$permitidas= array ("-", "-","-", "-", "-", 'a', 'e', 'i', 'o', 'u',);
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}  

function cortarTexto($texto, $tamano=200, $colilla="...") {
	$texto=substr($texto, 0, $tamano);
	$index=strrpos($texto, " ");
	$texto=substr($texto, 0,$index); 
	$texto.=$colilla;
	return $texto;
}

function ceros($numero, $ceros=2){
    return sprintf("%0".$ceros."s", $numero );
}

function uncodedbmx($numero){
	$myString = substr($numero, 0, -2);
	echo number_format(round($myString, 2))." MXN";
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

function nombre_mesabr($mes){
   switch($mes) {
       case 1: return 'Ene'; break;
       case 2: return 'Feb'; break;
       case 3: return 'Mar'; break;
       case 4: return 'Abr'; break;
       case 5: return 'May'; break;
       case 6: return 'Jun'; break;
       case 7: return 'Jul'; break;
       case 8: return 'Ago'; break;
       case 9: return 'Sept'; break;
       case 10: return 'Oct'; break;
       case 11: return 'Nov'; break;
       case 12: return 'Dic'; break;
   }	
}

function restaFechas($dFecIni, $dFecFin)
//dia. mes año
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
	$fecha = explode("-",$fec_emision);  
	$dyh = getdate(mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]) + 24*60*60*$can_dias); 
	//$fec_vencimiento = $dyh['mday']."-".$dyh['mon']."-".$dyh['year'];
	$fec_vencimiento = $dyh['year']."-".ceros($dyh['mon'])."-".ceros($dyh['mday']);
	return ($fec_vencimiento);  
}
function restadias($fec_emision, $can_dias){
	$fecha = explode("-",$fec_emision);  
	$dyh = getdate(mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]) - 24*60*60*$can_dias); 
	//$fec_vencimiento = $dyh['mday']."-".$dyh['mon']."-".$dyh['year'];
	$fec_vencimiento = $dyh['year']."-".ceros($dyh['mon'])."-".ceros($dyh['mday']);
	return ($fec_vencimiento);  
}
function sumadiass($fec_emision, $can_dias){
	$fecha = explode("-",$fec_emision);  
	$dyh = getdate(mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]) + 24*60*60*$can_dias); 
	//$fec_vencimiento = $dyh['mday']."-".$dyh['mon']."-".$dyh['year'];
	$fec_vencimiento = $dyh['year']."-".$dyh['mon']."-".$dyh['mday'];
	return ($fec_vencimiento);  
}
function limpia($cadena) {
	$no_permitidas= array ("'", '’', 'ñ', '', ' ');
	$permitidas= array ("-", "-","-", "-", "-");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}   

// todo esta seccion nuevo agregado por Ricardo Dzul
function existTour($idTour){
	$qry="SELECT COUNT(tours.idtour) AS existour
			FROM tours
			WHERE tours.idtour = ".$idTour;
	$res = consulta($qry);
	return $res;
}

?>
