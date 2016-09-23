<?
error_reporting(0);
include("scripts/consultas.php");

//Recibimos variables
$nombre = $_REQUEST["nombreb"];
$lada = $_REQUEST["ladab"];
$telefono = $_REQUEST["telefonob"];
$email = $_REQUEST["emailb"];
$ciudad = $_REQUEST["ciudadb"];
$checkin = $_REQUEST["fllegada"];
$checkin = date_create($checkin);
$checkin = date_format($checkin, 'Y-m-d');

$idregistroorigen = isset($_REQUEST["idregistroorigen"]) ? $_REQUEST["idregistroorigen"] : 0;
$pickup = $_REQUEST["pickupb"];
$novuelo = $_REQUEST["novuelob"];
$aerolinea = $_REQUEST["aerolineab"];
$llegadaavion = $_REQUEST["llegadaavionb"];
$hora = $_REQUEST["horab"];
$ididioma = $_REQUEST["ididiomita"];
if($ididioma < 1){
	$ididioma = 1;
}

$tipo = $_REQUEST["tipor"];  //1: paquete, 2: tour, 3: hoteles
$idtour = $_REQUEST["idtourb"];
$adultos = $_REQUEST["adultosb"];
$menores = $_REQUEST["menoresb"];
$importe = $_REQUEST["importeb"];
$sesion = $_REQUEST["sesionb"];

$moneda = $_REQUEST["moneda"];
$tcambio = $_REQUEST["tipocambio"];
$totalmostrado = $_REQUEST["totalmostrado"];

// todo, se agrega validacion para no inserte registros en el que no existe el tour, preferible no inserte a que genere conflictos al guardar
$existe = "";
$existe = existTour($idtour);
if($existe["existour"][0] == 0){
	echo 0;
	return;
}
// todo, termina validacion

$qry="insert into reservaciones
(idtiporeserva, fechareserva, horareserva, checkin, idvinculo, sesion, adultos, menores, importe, nombre, lada, telefono, email, ciudad, idcombinacion, hotelpickup, correoadmin, correousuario, vuelo, aerolinea, llegadaavion, horallegadaavion, moneda, totalmxn, ididioma)
values ('$tipo', curdate(), current_time, '$checkin', '$idtour', '$sesion', '$adultos', '$menores', '$importe', '$nombre', '$lada', '$telefono', '$email', '$ciudad', '$idregistroorigen', '$pickup', '2', '2', '$novuelo', '$aerolinea', '$llegadaavion', '$hora', '$moneda', '$totalmostrado', '$ididioma')";
ejecuta($qry);

//$qryup ="call actualizaventasTours('$idtour');";
//ejecuta($qryup);

$id=mysql_insert_id();
$idb =ceros($id, 3);
$clavereserva = "VIYUC".$idb;
$txnref = $clavereserva."+1";
$qryb="update reservaciones set clavereserva = '$clavereserva' where idreserva = '$id'";
ejecuta($qryb);

echo $clavereserva.", ".$txnref;
?>

