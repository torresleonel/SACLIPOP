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
				<h1>Aguinaldos <?=$_POST['a']?></h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$resultado = conslt_pago($cnx_bd,'aguinaldo','anno_calculo');
					$cnx_bd->close();
					if ($resultado->num_rows <= 0) {
				?>
						<div id="msnproceso">
							<h3>No se han calculado aguinaldos del trabajador:<?=' '.$_POST['trbj']?></h3>
							<h3>Para el año<?=' '.$_POST['a']?></h3>
						</div>
				<?php
					}else{
						$fila = $resultado->fetch_object();
				?>
						<b>NOMBRES Y APPELLIDOS:</b><?=' '.$fila->nombre.' '.$fila->apellido?>
						<br>
						<b>FECHA DE INGRESO:</b><?=' '.$fila->fecha_ingreso?>
						<br>
						<b>SUELDO MENSUAL Bs.:</b><?=' '.$fila->sueldo_mensual?>
						<br><br>
						<table id="tabla">
							<caption>Aguinaldos</caption>
							<tr>
								<th>Cantidad de Meses</th>
								<th>Sueldo Integral Diario</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<tr>
								<td><?=$fila->cantidad_mes?></td>
								<td>Bs <?=$fila->sid?></td>
								<td>Bs <?=$fila->total_pagar?></td>
							</tr>
						</table>
				<?php } ?>
				<a href="conslt_aguinaldo_ind_a.php" class="enlaceboton" title="Click para volver a consultar">Volver</a>
			</div>
		</div>
	</body>
</html>
