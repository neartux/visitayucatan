<? error_reporting(E_ALL);
ini_set("display_errors", 1); ?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<link rel="icon" type="image/png" href="imagenes/favicon.ico"/>
		<base href="http://localhost/visitayucatan/" target="_self">
		<title></title>
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<? include("../templates/snipped-header.php"); ?>
	</head>
	<body>
		<div id="mensajes"><p></p></div>
		<header>
		<div class="center">
			<section id="logo"><a href="index" target="_self" title="Visita Yucatán"><img src="imagenes/logo.png" alt="Visita Yucatán" /></a></section>
		</div>			
		</header>
			
		<section id="contenido">
			<div class="center centerlogin">							
					<div id="cajalogin">
						<label>Usuario</label>
						<input type="text" name="usuario" id="usuario" />
						
						<label>Password</label>
						<input type="password" name="password" id="password" />
						
						<button type="button" id="btnLogin">ENTRAR</button>						
					</div>		
			</div>
		</section>
		<footer></footer>
	</body>
</html>