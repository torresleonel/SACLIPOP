<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/funcion_general.js"></script>
		<script type="text/javascript" src="js/valida_sesion.js"></script>
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<ul>
						<li><a href="index.php" title="Click para ir al inicio de SACLIPOP"><span>Inicio</span></a></li>
					</ul>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="imgsesion">
				</div>
				<form name="usuario" action="php/_sesion/autentifica_sesion.php" method="POST" autocomplete="off" class="sesion">
					<h1>Iniciar sesión</h1>
					<div class="alerta">
						<?php include('php/_sesion/error_sesion.php'); ?>
					</div>
					<INPUT TYPE="TEXT" NAME="user" SIZE="10" placeholder="Usuario" class="input-sesion" id="user" title="Ingrese aqui su nombre de usuario" required />
					<br>
					<INPUT TYPE="password" NAME="pass" SIZE="10" placeholder="Contraseña" class="input-sesion" id="pass" title="Ingrese aqui su contraseña de usuario" required />
					<br>
					<a href="php/_sesion/1_conslt_user.php" title="Click para recuperar su contraseña"><span>¿Olvido su contraseña?</span></a>
					<br>
					<br>
					<INPUT TYPE="submit" value="Ingresar" class="boton" id="boton" title="Click para ingresar en el sistema SACLIPOP" />
				</form>
			</div>
		</div>
	</body>
</html>