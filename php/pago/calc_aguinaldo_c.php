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
				<h1>Aguinaldos <?=date('Y')?></h1>
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/calculo_pago_sql.php');
					list($ai,$mi,$di) = explode('-',$_POST['fch_ing']);
					echo '
						NOMBRES Y APPELLIDOS: '.$_POST['nombre'].' '.$_POST['apellido'].
						'<br>FECHA DE INGRESO: '.$di.'-'.$mi.'-'.$ai.
						'<br>SUELDO MENSUAL Bs.: '.$_POST['salr_mes'];
					$aguin = calc_aguinaldos($cnx_bd);
					$cnx_bd->close();
					if (!$aguin) {
						echo '
							<div id="msnproceso">
								<h3>El periodo minimo laboral es de tres (3) meses para disfrutar de los aguinaldos.</h3>
							</div>
							<br>
							<a href="calc_aguinaldo_a.php" class="enlaceboton" title="Click para volver a la lista de trabajadores">Volver</a>';
					}else{
						list($meses,$sid,$aguinaldos) = $aguin;
				?>
						<table id="tabla">
							<caption>Aguinaldos</caption>
							<tr>
								<th>Cantidad de Meses</th>
								<th>Sueldo Integral Diario</th>
								<th>TOTAL A PAGAR</th>
							</tr>
							<tr>
								<td><?=$meses?></td>
								<td>Bs <?php printf("%.2f",$sid); ?></td>
								<td>Bs <?php printf("%.2f",$aguinaldos); ?></td>
							</tr>
						</table>
						<a href="calc_aguinaldo_a.php" class="enlaceboton" title="Click para volver a la lista de trabajadores">Volver</a>
				<?php } ?>
			</div>
		</div>
	</body>
</html>
