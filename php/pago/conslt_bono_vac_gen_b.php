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
				<h1>Vacaciones y Bono Vacacional <?=$_POST['a']?></h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$alto = conslt_bono_vac_rang_gen($cnx_bd,'Personal de Alto Nivel','Fijo');
					$empleado = conslt_bono_vac_rang_gen($cnx_bd,'Personal Empleado','Fijo');
					$obrero = conslt_bono_vac_rang_gen($cnx_bd,'Personal Obrero','Fijo');
					$contratado = conslt_bono_vac_cond_gen($cnx_bd,'Contratado');
					$cnx_bd->close();
					if ($alto->num_rows <= 0 && $empleado->num_rows <= 0 && $obrero->num_rows <= 0 && $contratado->num_rows <= 0) {
				?>
						<div id="msnproceso">
							<h3>No se ha realizado cálculo de bono vacacional para el año<?=' '.$_POST['a']?></h3>
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
								<th>Sueldo Diario</th>
								<th>Inicio Vacaciones</th>
								<th>Fin Vacaciones</th>
								<th>Reincorporación Laboral</th>
								<th>Cantidad Dias Vacaciones</th>
								<th>Cantidad Dias Adicionales</th>
								<th>Total Dias Vacaciones</th>
								<th>Total Dias Adicionales</th>
								<th>Bono Vacacional</th>
							</tr>
							<?php
							if ($alto->num_rows < 1) {
							?>
							<tr>
								<td colspan="13">No hay Personal de Alto Nivel registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $alto->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
									list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
									list($af,$mf,$df) = explode('-',$fila->fin_vacac);
									list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sueldo_dia?></td>
										<td><?=$di.'-'.$mi.'-'.$ai?></td>
										<td><?=$df.'-'.$mf.'-'.$af?></td>
										<td><?=$dr.'-'.$mr.'-'.$ar?></td>
										<td><?=$fila->dia_vacac?></td>
										<td><?=$fila->dia_adicional?></td>
										<td>Bs <?=$fila->total_dia_v?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_a += $fila->total_pagar;
								}
							}
							$alto->free();
							?>
							<tr>
								<td colspan="12">SUB-TOTAL</td>
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
								<th>Sueldo Diario</th>
								<th>Inicio Vacaciones</th>
								<th>Fin Vacaciones</th>
								<th>Reincorporación Laboral</th>
								<th>Cantidad Dias Vacaciones</th>
								<th>Cantidad Dias Adicionales</th>
								<th>Total Dias Vacaciones</th>
								<th>Total Dias Adicionales</th>
								<th>Bono Vacacional</th>
							</tr>
							<?php
							if ($empleado->num_rows < 1) {
							?>
							<tr>
								<td colspan="13">No hay Personal Empleado registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $empleado->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
									list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
									list($af,$mf,$df) = explode('-',$fila->fin_vacac);
									list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sueldo_dia?></td>
										<td><?=$di.'-'.$mi.'-'.$ai?></td>
										<td><?=$df.'-'.$mf.'-'.$af?></td>
										<td><?=$dr.'-'.$mr.'-'.$ar?></td>
										<td><?=$fila->dia_vacac?></td>
										<td><?=$fila->dia_adicional?></td>
										<td>Bs <?=$fila->total_dia_v?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_e += $fila->total_pagar;
								}
							}
							$empleado->free();
							?>
							<tr>
								<td colspan="12">SUB-TOTAL</td>
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
								<th>Sueldo Diario</th>
								<th>Inicio Vacaciones</th>
								<th>Fin Vacaciones</th>
								<th>Reincorporación Laboral</th>
								<th>Cantidad Dias Vacaciones</th>
								<th>Cantidad Dias Adicionales</th>
								<th>Total Dias Vacaciones</th>
								<th>Total Dias Adicionales</th>
								<th>Bono Vacacional</th>
							</tr>
							<?php
							if ($obrero->num_rows < 1) {
							?>
							<tr>
								<td colspan="13">No hay Personal Obrero registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $obrero->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
									list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
									list($af,$mf,$df) = explode('-',$fila->fin_vacac);
									list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sueldo_dia?></td>
										<td><?=$di.'-'.$mi.'-'.$ai?></td>
										<td><?=$df.'-'.$mf.'-'.$af?></td>
										<td><?=$dr.'-'.$mr.'-'.$ar?></td>
										<td><?=$fila->dia_vacac?></td>
										<td><?=$fila->dia_adicional?></td>
										<td>Bs <?=$fila->total_dia_v?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_o += $fila->total_pagar;
								}
							}
							$obrero->free();
							?>
							<tr>
								<td colspan="12">SUB-TOTAL</td>
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
								<th>Sueldo Diario</th>
								<th>Inicio Vacaciones</th>
								<th>Fin Vacaciones</th>
								<th>Reincorporación Laboral</th>
								<th>Cantidad Dias Vacaciones</th>
								<th>Cantidad Dias Adicionales</th>
								<th>Total Dias Vacaciones</th>
								<th>Total Dias Adicionales</th>
								<th>Bono Vacacional</th>
							</tr>
							<?php
							if ($contratado->num_rows < 1) {
							?>
							<tr>
								<td colspan="13">No hay Personal Contratado registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $contratado->fetch_object()){
									list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
									list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
									list($af,$mf,$df) = explode('-',$fila->fin_vacac);
									list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td><?=$d.'-'.$m.'-'.$a?></td>
										<td>Bs <?=$fila->sueldo_mensual?></td>
										<td>Bs <?=$fila->sueldo_dia?></td>
										<td><?=$di.'-'.$mi.'-'.$ai?></td>
										<td><?=$df.'-'.$mf.'-'.$af?></td>
										<td><?=$dr.'-'.$mr.'-'.$ar?></td>
										<td><?=$fila->dia_vacac?></td>
										<td><?=$fila->dia_adicional?></td>
										<td>Bs <?=$fila->total_dia_v?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_c += $fila->total_pagar;
								}
							}
							$contratado->free();
							?>
							<tr>
								<td colspan="12">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_c); ?></td>
							</tr>
							<tr>
								<td colspan="12">TOTAL GENERAL</td>
								<td>Bs <?php printf("%.2f",$subt_a + $subt_e + $subt_o + $subt_c); ?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_bono_vac_gen_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
