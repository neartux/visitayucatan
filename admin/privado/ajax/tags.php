<? 
include("../scripts/consultas.php");
$termino = $_REQUEST["q"];
$idioma = $_REQUEST["ididioma"];
$res = buscarTags($termino, $idioma); 

for($i=0; $res["idtag"][$i]; $i++){
	$arr[$i]=$res["tag"][$i];	
}
echo json_encode($arr);	
?>


