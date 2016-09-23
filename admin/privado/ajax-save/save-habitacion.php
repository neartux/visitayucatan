<?
	include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
	$idhotel = $_REQUEST["idhotel"];
	$idhabitacion = $_REQUEST["idhabitacion"];
	$accion = $_REQUEST["accion"];	
	$nhabitacion = $_REQUEST["nhabitacion"];
	$allotment = $_REQUEST["allotment"];
	$descripcionroom = $_REQUEST["descripcionroom"];
	$infantes = $_REQUEST["infantes"];
	$menores = $_REQUEST["menores"];
	$juniors = $_REQUEST["juniors"];
	$adultos = $_REQUEST["adultos"];
	$maxroom = $_REQUEST["maxroom"];
	if($accion == 1){
		//alta de nueva habitacion
		$qry="insert into habitaciones_hoteles (idhotel, nombre, descripcion, maxinfantes, maxmenores, maxjuniors, maxadultos, capmaxima, allotment) values 
		('$idhotel', '$nhabitacion', '$descripcionroom', '$infantes', '$menores', '$juniors', '$adultos', '$maxroom', '$allotment')";
		ejecuta($qry);		
		$id = mysql_insert_id();
		echo $id;
	}else{
		//Editamos habitacion
		$qry="update habitaciones_hoteles set
		nombre = '$nhabitacion',
		descripcion = '$descripcionroom',
		maxinfantes = '$infantes',
		maxmenores = '$menores',
		maxjuniors = '$juniors',
		maxadultos = '$adultos',
		capmaxima = '$maxroom',
		allotment = '$allotment'
		where idhabitacion = '$idhabitacion'";
		ejecuta($qry);			
		echo $idhabitacion;
			
	}
	

?>