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
				<h1>Consulta Aguinaldos <?=$_POST['a']?></h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$alto = conslt_pago_rango_gen($cnx_bd,'aguinaldo','Personal de Alto Nivel','Fijo','anno_calculo');
					$empleado = conslt_pago_rango_gen($cnx_bd,'aguinaldo','Personal Empleado','Fijo','anno_calculo');
					$obrero = conslt_pago_rango_gen($cnx_bd,'aguinaldo','Personal Obrero','Fijo','anno_calculo');
					$contratado = conslt_pago_condicion_gen($cnx_bd,'aguinaldo','Contratado','anno_calculo');
					$cnx_bd->close();
					if ($alto->num_rows <= 0 && $empleado->num_rows <= 0 && $obrero->num_rows <= 0 && $contratado->num_rows <= 0) {
				?>
						<div id="msnproceso">
							<h3>No se ha realizado calculado de aguinaldos para el año<?=' '.$_POST['a']?></h3>
						</div>
				<?php
					}else{
						$subt_a = 0;
						$subt_e = 0;
						$subt_o = 0;
						$subt_c = 0;
				?>
						<table id="tabla">
							<caption>PERSONAL DE ALTO NIVEL</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Fecha Ingreso</th>
								<th>Sueldo Mensual</th>
								<th>Sueldo Integral Diario</th>
								<th>Aguinaldos</th>
							</tr>
							<?php
								while($fila = $alto->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sid?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_a += $fila->total_pagar;
								}
								$alto->free();
							?>
							<tr>
								<td colspan="5">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_a); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL EMPLEADO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Fecha Ingreso</th>
								<th>Sueldo Mensual</th>
								<th>Sueldo Integral Diario</th>
								<th>Aguinaldos</th>
							</tr>
							<?php
								while($fila = $empleado->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sid?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_e += $fila->total_pagar;
								}
								$empleado->free();
							?>
							<tr>
								<td colspan="5">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_e); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL OBRERO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Fecha Ingreso</th>
								<th>Sueldo Mensual</th>
								<th>Sueldo Integral Diario</th>
								<th>Aguinaldos</th>
							</tr>
							<?php
								while($fila = $obrero->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sid?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_o += $fila->total_pagar;
								}
								$obrero->free();
							?>
							<tr>
								<td colspan="5">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_o); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL CONTRATADO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Fecha Ingreso</th>
								<th>Sueldo Mensual</th>
								<th>Sueldo Integral Diario</th>
								<th>Aguinaldos</th>
							</tr>
							<?php
								while($fila = $contratado->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sid?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_c += $fila->total_pagar;
								}
								$contratado->free();
							?>
							<tr>
								<td colspan="5">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_c); ?></td>
							</tr>
							<tr>
								<td colspan="5">TOTAL GENERAL</td>
								<td>Bs <?php printf("%.2f",$subt_a + $subt_e + $subt_o + $subt_c); ?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_aguinaldo_gen_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
