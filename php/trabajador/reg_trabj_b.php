﻿<?php include('../_sesion/verifica_sesion.php'); ?>
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
					<?php include('../_menu/menu_trabj.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/reg_trabj_sql.php');
					$cnx_bd->close();
					$mensaje = ($error) ? 'LOS DATOS DEL TRABAJADOR NO SE REGISTRARON DEBIDO A UN ERROR, POR FAVOR INTENTELO DE NUEVO' : 'REGISTRO DE DATOS DEL TRABAJADOR CORRECTOS';
				?>
				<div id="msnproceso">
					<h3><?=$mensaje?></h3>
				</div>
			</div>
		</div>
	</body>
</html>
