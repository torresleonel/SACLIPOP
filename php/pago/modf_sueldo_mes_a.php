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
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$alto = conslt_rango_trb($cnx_bd,'Personal de Alto Nivel','Fijo');
					$empleado = conslt_rango_trb($cnx_bd,'Personal Empleado','Fijo');
					$obrero = conslt_rango_trb($cnx_bd,'Personal Obrero','Fijo');
					$contratado = conslt_condicion_trb($cnx_bd,'Contratado');
					$cnx_bd->close();
				?>
				<h1>Modificar Sueldo Mensual</h1>
				<form action="modf_sueldo_mes_b.php" method="post">
					<table id="tabla">
						<caption>Personal Alto Nivel</caption>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Sueldo Mensual</th>
						</tr>
						<?php while ($fila = $alto->fetch_object()){ ?>
							<tr>
								<td><a href="#"><?=$fila->cedula?></a></td>
								<td><a href="#"><?=$fila->nombre?></a></td>
								<td><a href="#"><?=$fila->apellido?></a></td>
								<td><a href="#"><?=$fila->cargo?></a></td>
								<td><input type="text" name="suld_mes[]" value="<?=$fila->sueldo_mensual?>" id="suld_mes" title="Por favor ingrese el nuevo sueldo del trabajador" required /></td>
								<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
							</tr>
						<?php
							}
							$alto->free();
						?>
					</table>
					<table id="tabla">
						<caption>Personal Empleado</caption>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Sueldo Mensual</th>
						</tr>
						<?php while ($fila = $empleado->fetch_object()){ ?>
							<tr>
								<td><a href="#"><?=$fila->cedula?></a></td>
								<td><a href="#"><?=$fila->nombre?></a></td>
								<td><a href="#"><?=$fila->apellido?></a></td>
								<td><a href="#"><?=$fila->cargo?></a></td>
								<td><input type="text" name="suld_mes[]" value="<?=$fila->sueldo_mensual?>" id="suld_mes" title="Por favor ingrese el nuevo sueldo del trabajador" required /></td>
								<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
							</tr>
						<?php
							}
							$empleado->free();
						?>
					</table>
					<table id="tabla">
						<caption>Personal Obrero</caption>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Sueldo Mensual</th>
						</tr>
						<?php while ($fila = $obrero->fetch_object()){ ?>
							<tr>
								<td><a href="#"><?=$fila->cedula?></a></td>
								<td><a href="#"><?=$fila->nombre?></a></td>
								<td><a href="#"><?=$fila->apellido?></a></td>
								<td><a href="#"><?=$fila->cargo?></a></td>
								<td><input type="text" name="suld_mes[]" value="<?=$fila->sueldo_mensual?>" id="suld_mes" title="Por favor ingrese el nuevo sueldo del trabajador" required /></td>
								<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
							</tr>
						<?php
							}
							$obrero->free();
						?>
					</table>
					<table id="tabla">
						<caption>Personal Contratado</caption>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Sueldo Mensual</th>
						</tr>
						<?php while ($fila = $contratado->fetch_object()){ ?>
							<tr>
								<td><a href="#"><?=$fila->cedula?></a></td>
								<td><a href="#"><?=$fila->nombre?></a></td>
								<td><a href="#"><?=$fila->apellido?></a></td>
								<td><a href="#"><?=$fila->cargo?></a></td>
								<td><input type="text" name="suld_mes[]" value="<?=$fila->sueldo_mensual?>" id="suld_mes" title="Por favor ingrese el nuevo sueldo del trabajador" required /></td>
								<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
							</tr>
						<?php
							}
							$contratado->free();
						?>
					</table>
					<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
					<input type="submit" name="modificar" value="Modificar" id="boton" />
				</form>
			</div>
		</div>
	</body>
</html>
