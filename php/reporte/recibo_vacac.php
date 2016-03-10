<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../../css/reporte.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_ficha.js"></script>
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_reporte.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="ficha">
					<div class="membrete">
					</div>
					<h3>Vacaciones y Bono Vacacional <?=$_POST['a']?></h3>
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
								<a href="gen_rcb_vac.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
							</div>
					<?php
							exit();
						}else{
							$fila = $resultado->fetch_object();
							list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							list($ai,$mi,$di) = explode('-',$fila->ini_vacac);
							list($af,$mf,$df) = explode('-',$fila->fin_vacac);
							list($ar,$mr,$dr) = explode('-',$fila->reincorpor);
					?>
							<b>NOMBRES Y APPELLIDOS:</b><?=' '.$fila->nombre.' '.$fila->apellido?>
							<br>
							<b>CEDULA:</b><?=' '.$fila->cedula?>
							<br>
							<b>FECHA DE INGRESO:</b><?=' '.$d.'-'.$m.'-'.$a.' '?>
							<br>
							<b>SUELDO MENSUAL Bs.:</b><?=' '.$fila->sueldo_mensual?>
							<br>
							<b>SALARIO DIARIO Bs.:</b><?=' '.$fila->sueldo_mensual/30?>
							<br><br>
							<b>Disfrute de vacaciones desde:</b><?=' '.$di.' de '.nombre_fecha('mes',intval($mi)).' de '.$ai.' '?><b>hasta:</b><?=' '.$df.' de '.nombre_fecha('mes',intval($mf)).' de '.$af?>
							<br>
							<b>Fecha de reincorporación:</b><?=' '.$dr.' de '.nombre_fecha('mes',intval($mr)).' de '.$ar?>
							<table class="cel_vaci">
								<caption>Bono Vacacional</caption>
								<tr>
									<th>Descripción</th>
									<th>Cantidad Dias Bonificación</th>
									<th>Sueldo Diario</th>
									<th>Total</th>
								</tr>
								<tr>
									<td><span class="dato">Vacaciones</a></span></td>
									<td><span class="dato"><?=$fila->dia_vacac?></span></td>
									<td><span class="dato">Bs <?=$fila->sueldo_dia?></span></td>
									<td><span class="dato">Bs <?=$fila->total_dia_v?></span></td>
								</tr>
								<tr>
									<td><span class="dato">Dias Adicionales</span></td>
									<td><span class="dato"><?=$fila->dia_adicional?></span></td>
									<?php if($fila->dia_adicional == 0) $fila->sueldo_dia = 0; ?>
									<td><span class="dato">Bs <?php printf("%.2f",$fila->sueldo_dia); ?></span></td>
									<td><span class="dato">Bs <?=$fila->total_dia_adic?></span></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><span class="dato">TOTAL A PAGAR</span></td>
									<td><span class="dato">Bs <?=$fila->total_pagar?></span></td>
								</tr>
							</table>
					<?php } ?>
					<br />
					<br />
					<p class="n">Art. 192 LOTTT: "Los Patronos y Patronas pagarán a el trabajador o trbajadora en la oportunidad de sus vacaciones,
						además del salario correspondiente, una bonificación especial para su disfrute equivalente a un minimo de quince dias de salario
						normal más un dia por cada año de servicio hasta un total de treinta dias de salario normal. Este bono vacacional tiene carácter salarial".</p>
					<br />
					<p class="c n">Recibi conforme.</p>
					<br />
					<br />
					<br />
					<p class="c n">_________________________________</p>
					<p class="c n"><span class="dato"><?=$fila->nombre.' '.$fila->apellido?></span></p>
				</div>
				<div class="boton_centro">
					<input type="button" name="imprimir" value="Imprimir" id="boton" title="Click para imprimir el recibo de bono vacacional" />
				</div>
			</div>
		</div>
	</body>
</html>