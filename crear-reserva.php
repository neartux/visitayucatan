<?
include("scripts/consultas.php");

//Recibimos variables
$nombre = $_REQUEST["nombreb"];
$lada = $_REQUEST["ladab"];
$telefono = $_REQUEST["telefonob"];
$email = $_REQUEST["emailb"];
$ciudad = $_REQUEST["ciudadb"];
$combinacion = $_REQUEST["combinacionb"];
$checkin = $_REQUEST["fllegada"];
$checkin = date_create($checkin);
$checkin = date_format($checkin, 'Y-m-d');

$checkout = $_REQUEST["fsalida"];
$checkout = date_create($checkout);
$checkout = date_format($checkout, 'Y-m-d');


$ididioma = $_REQUEST["ididiomita"];

$tipo = $_REQUEST["tipor"];  //1: paquete, 2: tour, 3: hoteles
$tipohab = $_REQUEST["tipohab"]; //1: sencilla, 2: doble, 3: triple, 4: cuadruple
$idpaquete = $_REQUEST["idpaqueteb"];
$adultos = $_REQUEST["adultosb"];
$menores = $_REQUEST["menoresb"];
$importe = $_REQUEST["importeb"];
$sesion = $_REQUEST["sesionb"];
$pickup = $_REQUEST["pickupb"];
$novuelo = $_REQUEST["novuelob"];
$aerolinea = $_REQUEST["aerolineab"];
$llegadaavion = $_REQUEST["llegadaavionb"];
$hora = $_REQUEST["horab"];
$moneda = $_REQUEST["moneda"];
$tcambio = $_REQUEST["tipocambio"];
$totalmostrado = $_REQUEST["totalmostrado"];


$qry="insert into reservaciones
(idtiporeserva, fechareserva, horareserva, checkin, checkout, idvinculo, sesion, adultos, menores, importe, nombre, lada, telefono, email, ciudad, idcombinacion, tipohab, hotelpickup, correoadmin, correousuario, vuelo, aerolinea, llegadaavion, horallegadaavion, moneda, totalmxn, ididioma)
values ('$tipo', curdate(), current_time, '$checkin', '$checkout', '$idpaquete', '$sesion', '$adultos', '$menores', '$importe', '$nombre', '$lada', '$telefono', '$email', '$ciudad', '$combinacion', '$adultos', '$pickup', '2', '2', '$novuelo', '$aerolinea', '$llegadaavion', '$hora', '$moneda', '$totalmostrado', '$ididioma')";
ejecuta($qry);

$qryup ="call actualizaventasPaquetes('$idpaquete')";
ejecuta($qryup);

$id=mysql_insert_id();
$idb =ceros($id, 3);
$clavereserva = "VIYUC".$idb;
$txnref = $clavereserva."+1";
$qryb="update reservaciones set clavereserva = '$clavereserva' where idreserva = '$id'";
ejecuta($qryb);

echo $clavereserva.", ".$txnref;
?>

