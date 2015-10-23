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
					$resultado = conslt_pago($cnx_bd,'salario','inicio_quincena');
					$cnx_bd -> close();
					if ($resultado -> num_rows <= 0) {
						if ($_POST['dia'] == 1) $d = 'primera quincena';
						else $d = 'segunda quincena';
				?>
						<div id="msnproceso">
							<h3>No se ha calculado quincena del trabajador:<?=' '.$_POST['trbj']?></h3>
							<h3>Para la<?=' '.$d.' de '.$_POST['mes'].'-'.$_POST['ano']?></h3>
						</div>
				<?php
					}else{
						$fila = $resultado -> fetch_object();
						$resultado -> free();
						list($ai,$mi,$di) = explode('-',$fila -> inicio_quincena);
						list($af,$mf,$df) = explode('-',$fila -> fin_quincena);
				?>
						<b>NOMBRES Y APELLIDOS:</b><?=' '.$fila -> nombre.' '.$fila -> apellido?>
						<br>
						<b>CARGO:</b><?=' '.$fila -> cargo?>
						<br>
						<b>SUELDO MENSUAL Bs.:</b><?=' '.$fila -> sueldo_mensual?>
						<br><br>
						<b>Quincena del:</b><?=' '.$di.'-'.$mi.'-'.$ai.' '?>
						<b>al:</b><?=' '.$df.'-'.$mf.'-'.$af?>
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
								<td>Bs <?=$fila -> sueldo_quincena?></td>
								<td></td>
							</tr>
							<tr>
								<td>Dia Adicional</td>
								<td><?=$fila -> dia_adicional?></td>
								<td>Bs <?=$fila -> total_dia_adic?></td>
								<td></td>
							</tr>
							<tr>
								<td>Retroactivo Sueldo</td>
								<td></td>
								<td>Bs <?=$fila -> retro_sueldo?></td>
								<td></td>
							</tr>
							<tr>
								<td>Retroactivo Aguinaldo</td>
								<td></td>
								<td>Bs <?=$fila -> retro_vacaciones?></td>
								<td></td>
							</tr>
							<tr>
								<td>Retroactivo Vacaciones</td>
								<td></td>
								<td>Bs <?=$fila -> retro_aguinaldos?></td>
								<td></td>
							</tr>
							<tr>
								<td>S.S.O.</td>
								<td></td>
								<td></td>
								<td>Bs <?=$fila -> sso?></td>
							</tr>
							<tr>
								<td>S.P.F.</td>
								<td></td>
								<td></td>
								<td>Bs <?=$fila -> spf?></td>
							</tr>
							<tr>
								<td>F.A.O.V.</td>
								<td></td>
								<td></td>
								<td>Bs <?=$fila -> faov?></td>
							</tr>
							<tr>
								<td>Inasistencias</td>
								<td><?=$fila -> inasistencias?></td>
								<td></td>
								<td>Bs <?=$fila -> total_inasist?></td>
							</tr>
							<tr>
								<td>Otros (ISLR)</td>
								<td></td>
								<td></td>
								<td>Bs <?=$fila -> islr?></td>
							</tr>
							<tr>
								<td colspan="2">Total</td>
								<td>Bs <?=$fila -> total_asignaciones?></td>
								<td>Bs <?=$fila -> total_deducciones?></td>
							</tr>
							<tr>
								<td colspan="3">TOTAL A PAGAR</td>
								<td>Bs <?=$fila -> total_pagar?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_salario_ind_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
