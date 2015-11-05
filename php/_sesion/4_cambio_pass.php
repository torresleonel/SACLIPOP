<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon">
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen">
		<script type="text/javascript" src="js/funcion_general.js"></script>
		<script type="text/javascript" src="js/valida_sesion.js"></script>
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<ul>
						<li><a href="../../index.php" title="Click para ir al inicio de SACLIPOP"><span>Inicio</span></a></li>
					</ul>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					$usuario = $_POST['usuario'];
					include("../_conexion/conexion_funcion.php");
					$cnx_bd = conexion();
					include('recuperar_pass_sql.php');
					cambio_pass($cnx_bd);
					$cnx_bd->close();
				?>
				<div id="imgsesion">
				</div>
				<form name="usuario" action="recuperar_pass_c.php" method="POST" autocomplete="off" class="sesion">
					<h2>Contraseña cambiada satisfactoriamente</h2>
					<br>
					<a href="../../index.php" class="enlaceboton" title="Haga click para regresar a la pantalla principal e iniciar sesión">Iniciar sesión</a>
				</form>
			</div>
		</div>
	</body>
</html>