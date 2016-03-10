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
				<h1>Consulta Salario Quincenal</h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$alto = conslt_pago_rango_gen($cnx_bd,'salario','Personal de Alto Nivel','Fijo','inicio_quincena');
					$empleado = conslt_pago_rango_gen($cnx_bd,'salario','Personal Empleado','Fijo','inicio_quincena');
					$obrero = conslt_pago_rango_gen($cnx_bd,'salario','Personal Obrero','Fijo','inicio_quincena');
					$contratado = conslt_pago_condicion_gen($cnx_bd,'salario','Contratado','inicio_quincena');
					$cnx_bd->close();
					if ($alto->num_rows <= 0 && $empleado->num_rows <= 0 && $obrero->num_rows <= 0 && $contratado->num_rows <= 0) {
						if ($_POST['dia'] == 1) $d = 'primera quincena';
						else $d = 'segunda quincena';
				?>
						<div id="msnproceso">
							<h3>No se ha realizado calculado para la<?=' '.$d.' de '.nombre_fecha('mes',$_POST['mes']).' de '.$_POST['ano']?></h3>
						</div>
				<?php
					}else{
						$inicio_quincena = $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'];
						if ($_POST['dia'] == 1) $dia_f = 15;
						elseif ($_POST['dia'] == 16) $dia_f = date('t',strtotime($inicio_quincena));
						$fin_quincena = $dia_f.'-'.$_POST['mes'].'-'.$_POST['ano'];
						$subt_a = 0;
						$subt_e = 0;
						$subt_o = 0;
						$subt_c = 0;
				?>
						<h2>Quincena del:<?=' '.$inicio_quincena.' '?>al:<?=' '.$fin_quincena?></h2>
						<table id="tabla">
							<caption>PERSONAL DE ALTO NIVEL</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Sueldo Quincenal</th>
								<th>Asignación Dias Adicionales</th>
								<th>Retroactivo Sueldo</th>
								<th>Retroactivo Vacaciones</th>
								<th>Retroactivo Aguinaldos</th>
								<th>S.S.O.</th>
								<th>S.P.F.</th>
								<th>F.A.O.V.</th>
								<th>I.S.L.R.</th>
								<th>Deducciones Inasistencias</th>
								<th>Total Asignaciones</th>
								<th>Total Deducciones</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<?php
							if ($alto->num_rows < 1) {
							?>
							<tr>
								<td colspan="15">No hay Personal de Alto Nivel registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $alto->fetch_object()){
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td>Bs <?=$fila->sueldo_quincena?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->retro_sueldo?></td>
										<td>Bs <?=$fila->retro_vacaciones?></td>
										<td>Bs <?=$fila->retro_aguinaldos?></td>
										<td>Bs <?=$fila->sso?></td>
										<td>Bs <?=$fila->spf?></td>
										<td>Bs <?=$fila->faov?></td>
										<td>Bs <?=$fila->islr?></td>
										<td>Bs <?=$fila->total_inasist?></td>
										<td>Bs <?=$fila->total_asignaciones?></td>
										<td>Bs <?=$fila->total_deducciones?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_a += $fila->total_pagar;
								}
							}
							$alto->free();
							?>
							<tr>
								<td colspan="14">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_a); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL EMPLEADO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Sueldo Quincenal</th>
								<th>Asignación Dias Adicionales</th>
								<th>Retroactivo Sueldo</th>
								<th>Retroactivo Vacaciones</th>
								<th>Retroactivo Aguinaldos</th>
								<th>S.S.O.</th>
								<th>S.P.F.</th>
								<th>F.A.O.V.</th>
								<th>I.S.L.R.</th>
								<th>Deducciones Inasistencias</th>
								<th>Total Asignaciones</th>
								<th>Total Deducciones</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<?php
							if ($empleado->num_rows < 1) {
							?>
							<tr>
								<td colspan="15">No hay Personal Empleado registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $empleado->fetch_object()){
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td>Bs <?=$fila->sueldo_quincena?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->retro_sueldo?></td>
										<td>Bs <?=$fila->retro_vacaciones?></td>
										<td>Bs <?=$fila->retro_aguinaldos?></td>
										<td>Bs <?=$fila->sso?></td>
										<td>Bs <?=$fila->spf?></td>
										<td>Bs <?=$fila->faov?></td>
										<td>Bs <?=$fila->islr?></td>
										<td>Bs <?=$fila->total_inasist?></td>
										<td>Bs <?=$fila->total_asignaciones?></td>
										<td>Bs <?=$fila->total_deducciones?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_e += $fila->total_pagar;
								}
							}
							$empleado->free();
							?>
							<tr>
								<td colspan="14">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_e); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL OBRERO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Sueldo Quincenal</th>
								<th>Asignación Dias Adicionales</th>
								<th>Retroactivo Sueldo</th>
								<th>Retroactivo Vacaciones</th>
								<th>Retroactivo Aguinaldos</th>
								<th>S.S.O.</th>
								<th>S.P.F.</th>
								<th>F.A.O.V.</th>
								<th>I.S.L.R.</th>
								<th>Deducciones Inasistencias</th>
								<th>Total Asignaciones</th>
								<th>Total Deducciones</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<?php
							if ($obrero->num_rows < 1) {
							?>
							<tr>
								<td colspan="15">No hay Personal Obrero registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $obrero->fetch_object()){
							?>
										<tr>
											<td><?=$fila->nombre.' '.$fila->apellido?></td>
											<td><?=$fila->cedula?></td>
											<td>Bs <?=$fila->sueldo_quincena?></td>
											<td>Bs <?=$fila->total_dia_adic?></td>
											<td>Bs <?=$fila->retro_sueldo?></td>
											<td>Bs <?=$fila->retro_vacaciones?></td>
											<td>Bs <?=$fila->retro_aguinaldos?></td>
											<td>Bs <?=$fila->sso?></td>
											<td>Bs <?=$fila->spf?></td>
											<td>Bs <?=$fila->faov?></td>
											<td>Bs <?=$fila->islr?></td>
											<td>Bs <?=$fila->total_inasist?></td>
											<td>Bs <?=$fila->total_asignaciones?></td>
											<td>Bs <?=$fila->total_deducciones?></td>
											<td>Bs <?=$fila->total_pagar?></td>
										</tr>
							<?php
									$subt_o += $fila->total_pagar;
								}
							}
							$obrero->free();
							?>
							<tr>
								<td colspan="14">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_o); ?></td>
							</tr>
						</table>
						<table id="tabla">
							<caption>PERSONAL CONTRATADO</caption>
							<tr>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Sueldo Quincenal</th>
								<th>Asignación Dias Adicionales</th>
								<th>Retroactivo Sueldo</th>
								<th>Retroactivo Vacaciones</th>
								<th>Retroactivo Aguinaldos</th>
								<th>S.S.O.</th>
								<th>S.P.F.</th>
								<th>F.A.O.V.</th>
								<th>I.S.L.R.</th>
								<th>Deducciones Inasistencias</th>
								<th>Total Asignaciones</th>
								<th>Total Deducciones</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<?php
							if ($contratado->num_rows < 1) {
							?>
							<tr>
								<td colspan="15">No hay Personal Contratado registrado</td>
							</tr>
							<?php
							}else{
								while($fila = $contratado->fetch_object()){
							?>
									<tr>
										<td><?=$fila->nombre.' '.$fila->apellido?></td>
										<td><?=$fila->cedula?></td>
										<td>Bs <?=$fila->sueldo_quincena?></td>
										<td>Bs <?=$fila->total_dia_adic?></td>
										<td>Bs <?=$fila->retro_sueldo?></td>
										<td>Bs <?=$fila->retro_vacaciones?></td>
										<td>Bs <?=$fila->retro_aguinaldos?></td>
										<td>Bs <?=$fila->sso?></td>
										<td>Bs <?=$fila->spf?></td>
										<td>Bs <?=$fila->faov?></td>
										<td>Bs <?=$fila->islr?></td>
										<td>Bs <?=$fila->total_inasist?></td>
										<td>Bs <?=$fila->total_asignaciones?></td>
										<td>Bs <?=$fila->total_deducciones?></td>
										<td>Bs <?=$fila->total_pagar?></td>
									</tr>
							<?php
									$subt_c += $fila->total_pagar;
								}
							}
							$contratado->free();
							?>
							<tr>
								<td colspan="14">SUB-TOTAL</td>
								<td>Bs <?php printf("%.2f",$subt_c); ?></td>
							</tr>
							<tr>
								<td colspan="14">TOTAL GENERAL</td>
								<td>Bs <?php printf("%.2f",$subt_a + $subt_e + $subt_o + $subt_c); ?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_salario_gen_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
