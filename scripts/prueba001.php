<? 
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");

function hoteles1($iddestino){
	global $moneda, $tcambio, $idioma;
	$qry="select ht.*, (min(ht.doble)/$tcambio) as tarifamin, h.hotel, h.stars, hd.descripcion, hi.imagen, m.simbolo
	from hoteles_tarifas ht
	left join hoteles h on h.idhotel = ht.idhotel
	left join hoteles_descripciones hd on hd.idhotel = ht.idhotel and hd.ididioma = '$idioma'
	left join moneda m on m.idmoneda = $moneda
	left join hoteles_imagenes hi on hi.idhotel = ht.idhotel
	where ht.fecha = curdate() and h.idestatus = 1 and h.iddestino = '$iddestino'
	group by idhotel order by tarifa asc";
	echo $qry;
	$res = consulta($qry);
	return $res;	
}
 ?>