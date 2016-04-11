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
						<?php
						if ($alto->num_rows < 1) {
						?>
						<tr>
							<td colspan="5">No hay Personal de Alto Nivel registrado</td>
						</tr>
						<?php
						}else{
							while ($fila = $alto->fetch_object()){
						?>
								<tr>
									<td><a href="#"><?=$fila->cedula?></a></td>
									<td><a href="#"><?=$fila->nombre?></a></td>
									<td><a href="#"><?=$fila->apellido?></a></td>
									<td><a href="#"><?=$fila->cargo?></a></td>
								$sueldo_mensual = floatval($fila->sueldo_mensual);
									<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
								</tr>
						<?php
							}
						}
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
						<?php
						if ($empleado->num_rows < 1) {
						?>
						<tr>
							<td colspan="5">No hay Personal Empleado registrado</td>
						</tr>
						<?php
						}else{
							while ($fila = $empleado->fetch_object()){
						?>
								<tr>
									<td><a href="#"><?=$fila->cedula?></a></td>
									<td><a href="#"><?=$fila->nombre?></a></td>
									<td><a href="#"><?=$fila->apellido?></a></td>
									<td><a href="#"><?=$fila->cargo?></a></td>
								$sueldo_mensual = floatval($fila->sueldo_mensual);
									<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
								</tr>
						<?php
							}
						}
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
						<?php
						if ($obrero->num_rows < 1) {
						?>
						<tr>
							<td colspan="5">No hay Personal Obrero registrado</td>
						</tr>
						<?php
						}else{
							while ($fila = $obrero->fetch_object()){
						?>
								<tr>
									<td><a href="#"><?=$fila->cedula?></a></td>
									<td><a href="#"><?=$fila->nombre?></a></td>
									<td><a href="#"><?=$fila->apellido?></a></td>
									<td><a href="#"><?=$fila->cargo?></a></td>
								$sueldo_mensual = floatval($fila->sueldo_mensual);
									<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
								</tr>
						<?php
							}
						}
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
						<?php
						if ($contratado->num_rows < 1) {
						?>
						<tr>
							<td colspan="5">No hay Personal Contratado registrado</td>
						</tr>
						<?php
						}else{
							while ($fila = $contratado->fetch_object()){
						?>
								<tr>
									<td><a href="#"><?=$fila->cedula?></a></td>
									<td><a href="#"><?=$fila->nombre?></a></td>
									<td><a href="#"><?=$fila->apellido?></a></td>
									<td><a href="#"><?=$fila->cargo?></a></td>
								$sueldo_mensual = floatval($fila->sueldo_mensual);
									<input type="hidden" name="ced_suld[]" value="<?=$fila->cedula?>" />
								</tr>
						<?php
							}
						}
						?>
					</table>
					<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
					<?php
					if ($alto->num_rows > 0 || $empleado->num_rows > 0 || $obrero->num_rows > 0 || $contratado->num_rows > 0) {
					?>
					<input type="submit" name="modificar" value="Modificar" id="boton" />
					<?php
					}
					$alto->free();
					$empleado->free();
					$obrero->free();
					$contratado->free();
					?>
				</form>
			</div>
		</div>
	</body>
</html>
