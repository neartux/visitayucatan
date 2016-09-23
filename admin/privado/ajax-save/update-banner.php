<?
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
$nombre = $_REQUEST["nombre"];
$ididioma = $_REQUEST["ididioma"];
$idbanner = $_REQUEST["banner"];
$shome = $_REQUEST["shome"];
$spaquetes = $_REQUEST["spaquetes"];
$stours = $_REQUEST["stours"];
echo "shome: ".$shome." - spaquetes: ".$spaquetes." - stours: ".$stours." - idbanner: ".$idbanner."<br />";


//Actualizando tabla banners
$qry="update banners set nombre = '$nombre' where idbanner = '$idbanner'";
ejecuta($qry);


//Actualizando banners en posiciones (no lugares)
$qryb="delete from banners_posiciones where idbanner = '$idbanner'";
ejecuta($qryb);

$procedure = "call reacomodaLugares('1')";
$procedureb = "call reacomodaLugares('2')";
$procedurec = "call reacomodaLugares('3')";
ejecuta($procedure);
ejecuta($procedureb);
ejecuta($procedurec);


//Insertando banners en posiciones
if($shome == 1){	
	//Primero averiguamos cuantos hay para indicar la posicion que ocupara, la cual será la ultima
	$ctosc = "select count(1) as encontrados from banners_posiciones where idposicion = 1";
	$resc = consulta($ctosc);
	
	$encontrados = $resc["encontrados"][0];
	$lugar = $encontrados + 1;
	
	$qryc="insert into banners_posiciones (idposicion, idbanner, lugar) values ('1', '$idbanner', '$lugar')";
	ejecuta($qryc);	
}

if($spaquetes == 1){
	//Primero averiguamos cuantos hay para indicar la posicion que ocupara, la cual será la ultima
	$ctosd = "select count(1) as encontrados from banners_posiciones where idposicion = 2";
	$resd = consulta($ctosd);
	
	$encontrados = $resd["encontrados"][0];
	$lugar = $encontrados + 1;

	$qryd="insert into banners_posiciones (idposicion, idbanner, lugar) values ('2', '$idbanner', '$lugar')";
	ejecuta($qryd);	
}

if($stours == 1){
	//Primero averiguamos cuantos hay para indicar la posicion que ocupara, la cual será la ultima
	$ctose = "select count(1) as encontrados from banners_posiciones where idposicion = 3";
	$rese = consulta($ctose);
	
	$encontrados = $rese["encontrados"][0];
	$lugar = $encontrados + 1;	
	
	$qrye="insert into banners_posiciones (idposicion, idbanner, lugar) values ('3', '$idbanner', '$lugar')";
	ejecuta($qrye);	
}

?>