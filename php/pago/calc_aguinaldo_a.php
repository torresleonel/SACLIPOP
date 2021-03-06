﻿<?php include('../_sesion/verifica_sesion.php'); ?>
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
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA DE TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$alto = conslt_rango_trb($cnx_bd,'Personal de Alto Nivel','Fijo');
					$empleado = conslt_rango_trb($cnx_bd,'Personal Empleado','Fijo');
					$obrero = conslt_rango_trb($cnx_bd,'Personal Obrero','Fijo');
					$contratado = conslt_condicion_trb($cnx_bd,'Contratado');
				?>
				<h1>Cálculo de Aguinaldos</h1>
				<table id="tabla">
					<caption>Personal Alto Nivel</caption>
					<tr>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Cargo</th>
						<th>Sueldo Mensual</th>
						<th>Ultimo Año Aguinaldos</th>
					</tr>
					<?php
					if ($alto->num_rows < 1) {
					?>
					<tr>
						<td colspan="6">No hay Personal de Alto Nivel registrado</td>
					</tr>
					<?php
					}else{
						while ($fila = $alto->fetch_object()){
							$fcha = conslt_fch($cnx_bd,'anno_calculo','aguinaldo',$fila->cedula);
							$fch_fila = $fcha->fetch_object();
							$a='0000';
							if (isset($fch_fila)) $a = $fch_fila->anno_calculo;
					?>
							<tr>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->apellido?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cargo?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->sueldo_mensual?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$a?></a></td>
							</tr>
					<?php
							$fcha->free();
						}
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
						<th>Ultimo Año Aguinaldos</th>
					</tr>
					<?php
					if ($empleado->num_rows < 1) {
					?>
					<tr>
						<td colspan="6">No hay Personal Empleado registrado</td>
					</tr>
					<?php
					}else{
						while ($fila = $empleado->fetch_object()){
							$fcha = conslt_fch($cnx_bd,'anno_calculo','aguinaldo',$fila->cedula);
							$fch_fila = $fcha->fetch_object();
							$a='0000';
							if (isset($fch_fila)) $a = $fch_fila->anno_calculo;
					?>
							<tr>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->apellido?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cargo?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->sueldo_mensual?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$a?></a></td>
							</tr>
					<?php
							$fcha->free();
						}
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
						<th>Ultimo Año Aguinaldos</th>
					</tr>
					<?php
					if ($obrero->num_rows < 1) {
					?>
					<tr>
						<td colspan="6">No hay Personal Obrero registrado</td>
					</tr>
					<?php
					}else{ 
						while ($fila = $obrero->fetch_object()){
							$fcha = conslt_fch($cnx_bd,'anno_calculo','aguinaldo',$fila->cedula);
							$fch_fila = $fcha->fetch_object();
							$a='0000';
							if (isset($fch_fila)) $a = $fch_fila->anno_calculo;
					?>
							<tr>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->apellido?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cargo?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->sueldo_mensual?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$a?></a></td>
							</tr>
					<?php
							$fcha->free();
						}
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
						<th>Ultimo Año Aguinaldos</th>
					</tr>
					<?php
					if ($contratado->num_rows < 1) {
					?>
					<tr>
						<td colspan="6">No hay Personal Contratado registrado</td>
					</tr>
					<?php
					}else{
						while ($fila = $contratado->fetch_object()){
							$fcha = conslt_fch($cnx_bd,'anno_calculo','aguinaldo',$fila->cedula);
							$fch_fila = $fcha->fetch_object();
							$a='0000';
							if (isset($fch_fila)) $a = $fch_fila->anno_calculo;
					?>
							<tr>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->apellido?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->cargo?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$fila->sueldo_mensual?></a></td>
								<td><a href="calc_aguinaldo_b.php?c=<?=$fila->cedula?>" title="Click para calcular los aguinaldos del trabajador"><?=$a?></a></td>
							</tr>
					<?php
							$fcha->free();
						}
					}
					$contratado->free();
					$cnx_bd->close();
					?>
				</table>
				<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
			</div>
		</div>
	</body>
</html>
