<?
switch ($cardType) {
	//ttarjeta para la base de datos. 1: visa, 2: mastercard, 3: amex, ....
    case "VC":
        $tipotarjeta="VISA";
		$ttarjeta = 1;
        break;
    case "MC":
        $tipotarjeta="MASTERCARD";
		$ttarjeta = 2;
        break;		
}

switch ($message) {
    case "Aprobado":
        $resultado="APROBADA";
		$pagado = 1;
        break;
    case "Referred":
        $resultado="RECHAZADA";
		$pagado = 0;
        break;	
    case "Rechazado":
        $resultado="RECHAZADA";
		$pagado = 0;
        break;				
}

switch ($tipohab) {
    case "1":
        $habitacion = "Sencilla";
        break;
    case "2":
        $habitacion = "Doble";
        break;	
    case "3":
        $habitacion = "Triple";
        break;
    case "4":
        $habitacion = "Cuádruple";
        break;						
}





?>