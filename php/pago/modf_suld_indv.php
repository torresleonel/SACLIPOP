<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA SUELDO TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$resultado = conslt_laboral_trb($cnx_bd);
					$cnx_bd -> close();
					$fila = $resultado -> fetch_object();
					$resultado -> free();
				?>
				<h1>Modificar Sueldo Mensual</h1>
				<form action="calc_salario_b.php?m=1" method="post">
					<table id="tabla">
						<caption>Modificar sueldo mensual para calcular salario</caption>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Sueldo Mensual</th>
						</tr>
						<tr>
							<td><a href="#"><?php echo $fila -> cedula; ?></a></td>
							<td><a href="#"><?php echo $fila -> nombre; ?></a></td>
							<td><a href="#"><?php echo $fila -> apellido; ?></a></td>
							<td><a href="#"><?php echo $fila -> cargo; ?></a></td>
							<td><input type="text" name="suld_mes" value="<?php echo $fila -> sueldo_mensual; ?>" id="suld_mes" title="Por favor ingrese el nuevo sueldo del trabajador" required /></td>
							<input type="hidden" name="ced_suld" value="<?php echo $fila -> cedula; ?>" />
						</tr>
					</table>
					<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
					<input type="submit" name="modificar" value="Modificar" id="boton" />
				</form>
			</div>
		</div>
	</body>
</html>
