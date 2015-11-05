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
					<h3>COMPROBANTE DE PAGO</h3>
					</br>
					<?php
						/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
						include('../_conexion/conexion_funcion.php');
						$cnx_bd = conexion();
						include('../_sql/conslt_trabj_sql.php');
						$resultado = conslt_pago($cnx_bd,'salario','inicio_quincena');
						$cnx_bd->close();
						if ($resultado->num_rows <= 0) {
							if ($_POST['dia'] == 1) $d = 'primera quincena';
							else $d = 'segunda quincena';
					?>
							<div id="msnproceso">
								<h3>No se ha calculado quincena del trabajador:<?=' '.$_POST['trbj']?></h3>
								<h3>Para la<?=' '.$d.' de '.$_POST['mes'].'-'.$_POST['ano']?></h3>
								<a href="gen_rcb_qui.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
							</div>
					<?php
							exit();
						}else{
							$fila = $resultado->fetch_object();
							$resultado->free();
							list($ai,$mi,$di) = explode('-',$fila->inicio_quincena);
							list($af,$mf,$df) = explode('-',$fila->fin_quincena);
					?>
							<b>NOMBRES Y APELLIDOS:</b><?=' '.$fila->nombre.' '.$fila->apellido?> <b>CEDULA:</b><?=' '.$fila->cedula?> <b>CARGO:</b><?=' '.$fila->cargo?>
							<br><br>
							<b>Quincena del:</b><?=' '.$di.'-'.nombre_fecha('mes',intval($mi)).'-'.$ai.' '?>
							<b>al:</b><?=' '.$df.'-'.nombre_fecha('mes',intval($mf)).'-'.$af?>
							<table class="cel_vaci">
								<tr>
									<th><span class="dato">Descripción</span></th>
									<th><span class="dato">Dias</span></th>
									<th><span class="dato">Asignaciones</span></th>
									<th><span class="dato">Deducciones</span></th>
								</tr>
								<tr>
									<td><span class="dato">Sueldo</span></td>
									<td><span class="dato">15</span></td>
									<td><span class="dato">Bs <?=$fila->sueldo_quincena?></span></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span class="dato">Dia Adicional</span></td>
									<td><span class="dato"><?=$fila->dia_adicional?></span></td>
									<td><span class="dato">Bs <?=$fila->total_dia_adic?></span></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span class="dato">Retroactivo Sueldo</span></td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->retro_sueldo?></span></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span class="dato">Retroactivo Aguinaldo</span></td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->retro_vacaciones?></span></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span class="dato">Retroactivo Vacaciones</span></td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->retro_aguinaldos?></span></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span class="dato">S.S.O.</span></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->sso?></span></td>
								</tr>
								<tr>
									<td><span class="dato">S.P.F.</span></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->spf?></span></td>
								</tr>
								<tr>
									<td><span class="dato">F.A.O.V.</span></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->faov?></span></td>
								</tr>
								<tr>
									<td><span class="dato">Inasistencias</span></td>
									<td><span class="dato"><?=$fila->inasistencias?></span></td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->total_inasist?></span></td>
								</tr>
								<tr>
									<td><span class="dato">Otros (ISLR)</span></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span class="dato">Bs <?=$fila->islr?></span></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><span class="dato">Bs <?=$fila->total_asignaciones?></span></td>
									<td><span class="dato">Bs <?=$fila->total_deducciones?></span></td>
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
					<p class="n">He recibido conforme el total indicado, en pago a mis servicios prestados durante la quincena arriba indicada
						después de haber sido efectuadas las deducciones correspondientes según descripción adjunta.</p>
					<br />
					<p class="c n">Recibi conforme.</p>
					<br />
					<br />
					<br />
					<p class="c n">_________________________________</p>
					<p class="c n"><span class="dato"><?=$fila->nombre.' '.$fila->apellido?></span></p>
				</div>
				<div class="boton_centro">
					<input type="button" name="imprimir" value="Imprimir" id="boton" title="Click para imprimir el recibo de pago de quincena" />
				</div>
			</div>
		</div>
	</body>
</html>