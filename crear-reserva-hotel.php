<?
include("scripts/consultas.php");

//Recibiendo variables
$sesion = $_REQUEST["lasesion"];
$grantotal = $_REQUEST["grantotal"];
$grantotalb = $_REQUEST["grantotalb"];
$idhotel = $_REQUEST["idhotel"];
$idhabitacion = $_REQUEST["idhabitacion"];
$nombre = $_REQUEST["nombre"];
$lada = $_REQUEST["lada"];
$telefono = $_REQUEST["telefono"];
$email = $_REQUEST["email"];
$ciudad = $_REQUEST["ciudad"];
$checkin = $_REQUEST["checkin"];
$checkin = $_REQUEST["checkin"];
$checkout = $_REQUEST["checkout"];
$adultosc = $_REQUEST["adultosc"];
$menoresc = $_REQUEST["menoresc"];
$novuelo = $_REQUEST["novuelo"];
$aerolinea = $_REQUEST["aerolinea"];
$llegadaavion = $_REQUEST["llegadaavionb"];
$horallegada = $_REQUEST["horallegada"];
$tipo = 3;  //1: paquete, 2: tour, 3: hoteles
$moneda = $_REQUEST["moneda"];
$tcambio = $_REQUEST["tipocambio"];
$idioma = $_REQUEST["idioma"];
$totalmxn = $grantotal/$tcambio;

//Insertando la reservacion
$qry="insert into reservaciones 
(idtiporeserva, fechareserva, horareserva, checkin, checkout, idvinculo, sesion, pagado, adultos, menores, importe, 
nombre, lada, telefono, email, ciudad, correoadmin, correousuario, tipohab, vuelo, aerolinea, llegadaavion, horallegadaavion, moneda, totalmxn, ididioma)
values('$tipo', curdate(), current_time, '$checkin', '$checkout', '$idhotel', '$sesion', 0, '$adultosc', '$menoresc', '$grantotalb', 
'$nombre', '$lada', '$telefono', '$email', '$ciudad',  '2', '2', '$idhabitacion', '$novuelo', '$aerolinea', '$llegadaavion', '$horallegada', '$moneda', '$totalmxn', '$idioma')";
ejecuta($qry);

//Actualizando numero de reserva
$id=mysql_insert_id();
$idb =ceros($id, 3);
$clavereserva = "VIYUCHTL".$idb;
$txnref = $clavereserva."+1";
$qryb="update reservaciones set clavereserva = '$clavereserva' where idreserva = '$id'";
ejecuta($qryb);

echo $clavereserva.", ".$txnref;

?>