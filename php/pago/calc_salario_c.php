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
				<h1>Salario Quincena</h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/calculo_pago_sql.php');
					list($inicio_quincena, $fin_quincena, $salr_quincena, $d_adicional, $t_dia_adic, $retro_suld, $retro_agin, $retro_vaci, $sso, $spf, $faov, $inasistencia, $t_inasist, $islr, $t_deduccion, $t_asign, $total_pagar, $prima_antiguedad, $prima_hijo, $prima_hogar, $prima_pro_cor, $prima_pro_lar) = calc_salario($cnx_bd);
					$cnx_bd->close();
					list($ai,$mi,$di) = explode('-',$inicio_quincena);
					list($af,$mf,$df) = explode('-',$fin_quincena);
					echo '
						NOMBRES Y APPELLIDOS: '.$_POST['nombre'].
						' '.$_POST['apellido'].
						'<br>CARGO: '.$_POST['cargo'].
						'<br>SUELDO MENSUAL Bs.: '.$_POST['salr_mes'].
						'<br><br>
						Quincena del: '.$di.'-'.$mi.'-'.$ai.' al: '.$df.'-'.$mf.'-'.$af;
				?>
				<table id="tabla">
					<tr>
						<th>Descripción</th>
						<th>Dias</th>
						<th>Asignaciones</th>
						<th>Deducciones</th>
					</tr>
					<tr>
						<td>Sueldo</td>
						<td>15</td>
						<td>Bs <?php printf("%.2f",$salr_quincena); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Dia Adicional</td>
						<td><?php echo $d_adicional; ?></td>
						<td>Bs <?php printf("%.2f",$t_dia_adic); ?></td>
						<td></td>
					</tr>
					<?php
					if ($prima_antiguedad > 0) {
					?>
						<tr>
							<td>Prima Antigüdad</td>
							<td></td>
							<td>Bs <?php printf("%.2f",$prima_antiguedad); ?></td>
							<td></td>
						</tr>
					<?php
					}
					if ($prima_hijo > 0) {
					?>
						<tr>
							<td>Prima Hijos</td>
							<td></td>
							<td>Bs <?php printf("%.2f",$prima_hijo); ?></td>
							<td></td>
						</tr>
					<?php
					}
					if ($prima_hogar > 0) {
					?>
						<tr>
							<td>Prima Hogar</td>
							<td></td>
							<td>Bs <?php printf("%.2f",$prima_hogar); ?></td>
							<td></td>
						</tr>
					<?php
					}
					if ($prima_pro_cor > 0 || $prima_pro_lar > 0) {
					?>
						<tr>
							<td>Prima Profesionalización</td>
							<td></td>
							<?php
							if ($prima_pro_cor > 0) {
							?>
								<td>Bs <?php printf("%.2f",$prima_pro_cor); ?></td>
							<?php
							} else {
							?>
								<td>Bs <?php printf("%.2f",$prima_pro_lar); ?></td>
							<?php
							}
							?>
							<td></td>
						</tr>
					<?php
					}
					?>
					<tr>
						<td>Retroactivo Sueldo</td>
						<td></td>
						<td>Bs <?php printf("%.2f",$retro_suld); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Retroactivo Aguinaldo</td>
						<td></td>
						<td>Bs <?php printf("%.2f",$retro_agin); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Retroactivo Vacaciones</td>
						<td></td>
						<td>Bs <?php printf("%.2f",$retro_vaci); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>S.S.O.</td>
						<td></td>
						<td></td>
						<td>Bs <?php printf("%.2f",$sso); ?></td>
					</tr>
					<tr>
						<td>S.P.F.</td>
						<td></td>
						<td></td>
						<td>Bs <?php printf("%.2f",$spf); ?></td>
					</tr>
					<tr>
						<td>F.A.O.V.</td>
						<td></td>
						<td></td>
						<td>Bs <?php printf("%.2f",$faov); ?></td>
					</tr>
					<tr>
						<td>Inasistencias</td>
						<td><?php echo $inasistencia; ?></td>
						<td></td>
						<td>Bs <?php printf("%.2f",$t_inasist); ?></td>
					</tr>
					<tr>
						<td>Otros (ISLR)</td>
						<td></td>
						<td></td>
						<td>Bs <?php printf("%.2f",$islr); ?></td>
					</tr>
					<tr>
						<td colspan="2">Total</td>
						<td>Bs <?php printf("%.2f",$t_asign); ?></td>
						<td>Bs <?php printf("%.2f",$t_deduccion); ?></td>
					</tr>
					<tr>
						<td colspan="3">TOTAL A PAGAR</td>
						<td>Bs <?php printf("%.2f",$total_pagar); ?></td>
					</tr>
				</table>
				<a href="calc_salario_a.php" class="enlaceboton" title="Click para volver a la lista de los trabajadores">Volver</a>
			</div>
		</div>
	</body>
</html>
