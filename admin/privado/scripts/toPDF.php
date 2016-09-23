<?php 
require_once("/home/visityuc/public_html/admin/privado/scripts/dompdf/dompdf_config.inc.php");
function doPDF($path='',$content='',$body=false,$style='',$mode=false,$paper_1='a4',$paper_2='portrait') 
{    
    if( $body!=true and $body!=false ) $body=false; 
    if( $mode!=true and $mode!=false ) $mode=false; 
     
    if( $body == true ) 
    {
		$estilo= "/home/visityuc/public_html/admin/privado/attachments/".$style;
        $content=' 
        <!doctype html> 
        <html> 
        <head>
        	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
            <link rel="stylesheet" href="'.$estilo.'" type="text/css" /> 
        </head> 
        <body>' 
            .$content. 
        '</body> 
        </html>'; 
    } 
     
    if( $content!='' ) 
    {         
        //A�adimos la extensi�n del archivo. Si est� vac�o el nombre lo creamos 
        $path!='' ? $path .='.pdf' : $path = crearNombre(10);   

        //Las opciones del papel del PDF. Si no existen se asignan las siguientes:[*] 
        if( $paper_1=='' ) $paper_1='a4'; 
        if( $paper_2=='' ) $paper_2='portrait'; 
             
        $dompdf =  new DOMPDF(); 
        $dompdf -> set_paper($paper_1,$paper_2); 
        $dompdf -> load_html($content); 		
		//header( 'Content-type: text/html; charset=iso-8859-1' );
        ini_set("memory_limit","32M"); //opcional  
        $dompdf -> render(); 
         
        //Creamos el pdf 
        if($mode==false) 
            $dompdf->stream($path); 
             
        //Lo guardamos en un directorio y lo mostramos 
        if($mode==true)
		file_put_contents($path, $dompdf->output()); 
          // if( file_put_contents($path, $dompdf->output()) ) header('Location: '.$path); 
    } 
} 

function crearNombre($length) 
{ 
    if( ! isset($length) or ! is_numeric($length) ) $length=6; 
     
    $str  = "0123456789abcdefghijklmnopqrstuvwxyz"; 
    $path = ''; 
     
    for($i=1 ; $i<$length ; $i++) 
      $path .= $str{rand(0,strlen($str)-1)}; 

    return $path.'_'.date("d-m-Y_H-i-s").'.pdf';     
} 

?>