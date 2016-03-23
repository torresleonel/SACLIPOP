<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link http-equiv="Content-language" content="es" refresh='8' />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php
					if ($_POST['usuario'] != $_SESSION["usuario"] || $_POST['nombre'] != $_SESSION["nombre"] || $_POST['apellido'] != $_SESSION["apellido"]) {
					?>
					<ul>
						<li><a href="../../index.php" title="Click para ir al inicio de SACLIPOP"><span>Inicio</span></a></li>
					</ul>
					<?php
					} else {
						include('../_menu/menu_usuario.php');
					}
					?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/usuario_sql.php');
					modf_perfil($cnx_bd);
					$cnx_bd->close();
				?>
				<div id="msnproceso">
					<h3>SE HAN MODIFICADO CON EXITO EL PERFIL DEL USUARIO</h3>
					<?php
					if ($_POST['usuario'] != $_SESSION["usuario"] || $_POST['nombre'] != $_SESSION["nombre"] || $_POST['apellido'] != $_SESSION["apellido"]) {
						session_unset();
						session_destroy();
					?>
						<h4>Debe iniciar sesión nuevamente</h4>
						<div>
							<a href="../../index.php" class="enlaceboton" title="Click para iniciar sesión nuevamente en SACLIPOP">Ingresar</a>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</body>
</html>