<?
	include_once($_SERVER['DOCUMENT_ROOT']."/scripts/mysql.php");
	$desclarga = $_REQUEST["desclarga"];
	$idhotel = $_REQUEST["idhotel"];
	$ididioma = $_REQUEST["ididioma"];
	$idregistro = $_REQUEST["idregistro"];

	if($idregistro >= 1){
		//Actualizamos
		$qry="update hoteles_descripciones set descripcion = '$desclarga' where idregistro = '$idregistro'";
		ejecuta($qry);
		echo $idregistro;
	}else{
		//Insertamos
		$qry="insert into hoteles_descripciones (idhotel, ididioma, descripcion) values ('$idhotel', '$ididioma', '$desclarga')";
		ejecuta($qry);
		$id = mysql_insert_id();
		echo $id;
	}
	
	

?>



