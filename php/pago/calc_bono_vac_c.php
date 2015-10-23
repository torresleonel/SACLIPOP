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
				<h1>Vacaciones y Bono Vacacional <?=$_POST['ano']?></h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/calculo_pago_sql.php');
					list($ai,$mi,$di) = explode('-',$_POST['fch_ing']);
					echo '
						NOMBRES Y APPELLIDOS: '.$_POST['nombre'].' '.$_POST['apellido'].
						'<br>FECHA DE INGRESO: '.$di.'-'.$mi.'-'.$ai.
						'<br>SUELDO MENSUAL Bs.: '.$_POST['salr_mes'].
						'<br><br>';
					$bono = genera_bono_vac($cnx_bd);
					if (!$bono) {
						echo '
							<div id="msnproceso">
								<h3>El periodo minimo laboral es de un (1) año para disfrutar de las vacaciones.</h3>
							</div>
							<br>
							<a href="calc_bono_vac_a.php" class="enlaceboton" title="Click para volver a la lista de trabajadores">Volver</a>';
					}else{
						list($fin_vacac,$fecha_rein,$dias_vacac,$dias_adic,$salr_dia,$total_dia_v,$total_dia_adic,$bono_vacac) = $bono;
						list($af,$mf,$df) = explode('-',$fin_vacac);
						list($ar,$mr,$dr) = explode('-',$fecha_rein);
						echo '
							Periodo de vacaciones desde: '.$_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['ano'].' hasta: '.$df.'-'.$mf.'-'.$af.
							'<br>
							Fecha de reincorporación: '.$dr.'-'.$mr.'-'.$ar;
				?>
						<table id="tabla">
							<caption>Bono Vacacional</caption>
							<tr>
								<th>Descripción</th>
								<th>Cantidad Dias Bonificación</th>
								<th>Sueldo Diario</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>Vacaciones</a></td>
								<td><?=$dias_vacac?></td>
								<td>Bs <?php printf("%.2f",$salr_dia); ?></td>
								<td>Bs <?php printf("%.2f",$total_dia_v); ?></td>
							</tr>
							<tr>
								<td>Dias Adicionales</td>
								<td><?=$dias_adic?></td>
								<?php if($dias_adic == 0) $salr_dia = 0; ?>
								<td>Bs <?php printf("%.2f",$salr_dia); ?></td>
								<td>Bs <?php printf("%.2f",$total_dia_adic); ?></td>
							</tr>
							<tr>
								<td colspan="3">TOTAL A PAGAR</td>
								<td>Bs <?php printf("%.2f",$bono_vacac); ?></td>
							</tr>
						</table>
						<a href="calc_bono_vac_a.php" class="enlaceboton" title="Click para volver a la lista de los trabajadores">Volver</a>
				<?php
					}
					$cnx_bd -> close();
				?>
			</div>
		</div>
	</body>
</html>
