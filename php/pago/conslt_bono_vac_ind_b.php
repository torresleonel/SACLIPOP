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
					$resultado = conslt_bono_vac($cnx_bd);
					$cnx_bd->close();
					if ($resultado->num_rows <= 0) {
				?>
						<div id="msnproceso">
							<h3>No se ha calculado bono vacacional del trabajador:<?=' '.$_POST['trbj']?></h3>
							<h3>Para el año<?=' '.$_POST['a']?></h3>
						</div>
				<?php
					}else{
						$fila = $resultado->fetch_object();
						list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
						list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
						list($af,$mf,$df) = explode('-',$fila->fin_vacac);
						list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
				?>
						<b>NOMBRES Y APPELLIDOS:</b><?=' '.$fila->nombre.' '.$fila->apellido?>
						<br>
						<b>FECHA DE INGRESO:</b><?=' '.$d.'-'.$m.'-'.$a.' '?>
						<br>
						<b>SUELDO MENSUAL Bs.:</b><?=' '.$fila->sueldo_mensual?>
						<br><br>
						<b>Periodo de vacaciones desde:</b><?=' '.$di.'-'.$mi.'-'.$ai.' '?><b>hasta:</b><?=' '.$df.'-'.$mf.'-'.$af?>
						<br>
						<b>Fecha de reincorporación:</b><?=' '.$dr.'-'.$mr.'-'.$ar?>
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
								<td><?=$fila->dia_vacac?></td>
								<td>Bs <?=$fila->sueldo_dia?></td>
								<td>Bs <?=$fila->total_dia_v?></td>
							</tr>
							<tr>
								<td>Dias Adicionales</td>
								<td><?=$fila->dia_adicional?></td>
								<?php if($fila->dia_adicional == 0) $fila->sueldo_dia = 0; ?>
								<td>Bs <?php printf("%.2f",$fila->sueldo_dia); ?></td>
								<td>Bs <?=$fila->total_dia_adic?></td>
							</tr>
							<tr>
								<td colspan="3">TOTAL A PAGAR</td>
								<td>Bs <?=$fila->total_pagar?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_bono_vac_ind_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
