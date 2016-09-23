<?
session_start();
$idiomacampaign = isset($_REQUEST["lang"]) ? $_REQUEST["lang"] : "";
$moneda = $_SESSION['moneda'];
$idioma = $_SESSION['idioma'];
$tcambio = $_SESSION['tcambio'];
$session = $_SESSION['idsesion'];
$losadultos = $_SESSION['adultos'];
$losmenores = isset($_SESSION['menores']) ? $_SESSION['menores'] : "";

$laaventura = isset($_SESSION['aventura']) ? $_SESSION['aventura'] : "";
$llegada = isset($_SESSION['fllegada']) ? $_SESSION['fllegada'] : "";
$salida = isset($_SESSION['fsalida']) ? $_SESSION['fsalida'] : "";

if($_SESSION['login']){
	if($moneda == ""){
		$_SESSION[moneda] = 1;
		header('Location: '.$_SERVER['PHP_SELF']);
	}
	if($idioma == ""){
		if($idiomacampaign >= 1){
			$_SESSION[idioma] = $idiomacampaign;
		}else{
			$_SESSION[idioma] = 1;
		}
		header('Location: '.$_SERVER['PHP_SELF']);
	}else{
		if($idiomacampaign >= 1){
			$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$url = explode('?', $url);
			$url = $url[0];
			if($idiomacampaign != $_SESSION['idioma']){
				$_SESSION[idioma] = $idiomacampaign;
				header('Location: '.$url);
			}
		}
	}
	if($tcambio == ""){
		$_SESSION[tcambio] = 1;
		header('Location: '.$_SERVER['PHP_SELF']);
	}

	if($session == ""){
		$_SESSION[idsesion] = generateRandomStringb();
		header('Location: '.$_SERVER['PHP_SELF']);
	}
	$resultados = "";
	if($resultados == 1 and $llegada == ""){
		$_SESSION[fllegada] = $fllegada;
		$_SESSION[fsalida] = $fsalida;
		header('Location: '.$_SERVER['PHP_SELF'].'?aventura='.$aventura.'&adultos='.$adultos.'&menores='.$menores.'&llegada='.$llegada.'&salida='.$salida);
	}

	if($resultados == 1 and ($llegada != $fllegada or $salida != $fsalida)){
		$_SESSION[fllegada] = $fllegada;
		$_SESSION[fsalida] = $fsalida;
		header('Location: '.$_SERVER['PHP_SELF'].'?aventura='.$aventura.'&adultos='.$adultos.'&menores='.$menores.'&llegada='.$fllegada.'&salida='.$fsalida);
	}

	if($resultados == 1 and ($aventura >= 1 and $aventura != $laaventura)){
		$_SESSION[aventura] = $aventura;
		header('Location: '.$_SERVER['PHP_SELF'].'?aventura='.$aventura.'&adultos='.$adultos.'&menores='.$menores.'&llegada='.$fllegada.'&salida='.$fsalida);
	}

	if($losadultos == 0){
		$_SESSION[adultos] = 2;
		header('Location: '.$_SERVER['PHP_SELF']);
	}

}else{
	$_SESSION[login] = true;
	$_SESSION[moneda] = 1;
	$_SESSION[idioma] = 1;
	$_SESSION[tcambio] = 1;
	$_SESSION[idsesion] = generateRandomStringb();
	header('Location: '.$_SERVER['PHP_SELF']);
}

function generateRandomStringb($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}
?>
