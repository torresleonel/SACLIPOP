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
					<h3>Aguinaldos <?=$_POST['a']?></h3>
					<?php
						/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
						include('../_conexion/conexion_funcion.php');
						$cnx_bd = conexion();
						include('../_sql/conslt_trabj_sql.php');
						$resultado = conslt_pago($cnx_bd,'aguinaldo','anno_calculo');
						$cnx_bd -> close();
						if ($resultado->num_rows <= 0) {
					?>
							<div id="msnproceso">
								<h3>No se han calculado aguinaldos del trabajador:<?=' '.$_POST['trbj']?></h3>
								<h3>Para el año<?=' '.$_POST['a']?></h3>
								<a href="gen_rcb_agu.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
							</div>
					<?php
							exit();
						}else{
							$fila = $resultado -> fetch_object();
							list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
					?>
							<b>NOMBRES Y APPELLIDOS:</b><?=' '.$fila->nombre.' '.$fila->apellido?>
							<br>
							<b>CEDULA:</b><?=' '.$fila->cedula?>
							<br>
							<b>FECHA DE INGRESO:</b><?=' '.$d.'-'.$m.'-'.$a.' '?>
							<br>
							<b>SUELDO MENSUAL Bs.:</b><?=' '.$fila->sueldo_mensual?>
							<br><br>
							<table class="cel_vaci">
								<caption>Aguinaldos</caption>
								<tr>
									<th>Cantidad de Meses</th>
									<th>Sueldo Integral Diario</th>
									<th>TOTAL A PAGAR</th>
								</tr>
								<tr>
									<td><span class="dato"><?=$fila->cantidad_mes?></span></td>
									<td><span class="dato">Bs <?=$fila->sid?></span></td>
									<td><span class="dato">Bs <?=$fila->total_pagar?></span></td>
								</tr>
							</table>
					<?php } ?>
					<br />
					<br />
					<br />
					<p class="c n">Recibi conforme.</p>
					<br />
					<br />
					<br />
					<p class="c n">_________________________________</p>
					<p class="c n"><span class="dato"><?=$fila->nombre.' '.$fila->apellido?></span></p>
				</div>
				<div class="boton_centro">
					<input type="button" name="imprimir" value="Imprimir" id="boton" title="Click para imprimir el recibo de aguinaldos" />
				</div>
			</div>
		</div>
	</body>
</html>