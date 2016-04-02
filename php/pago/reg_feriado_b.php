<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>..::SACLIPOP::..</title>
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_pago.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/calculo_pago_sql.php');
					reg_dias_feriados($cnx_bd);
					$cnx_bd->close();
				?>
				<div id="msnproceso">
					<h3>LOS DATOS HAN SIDO REGISTRADOS</h3>
				</div>
			</div>
		</div>
	</body>
</html>