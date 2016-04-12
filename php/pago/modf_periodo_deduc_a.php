<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../../js/sliding.form.js"></script>
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
				<div id="content">
					<?php
						/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
						include('../_conexion/conexion_funcion.php');
						$cnx_bd = conexion();
						include('../_sql/calculo_pago_sql.php');
						$fila = conslt_periodo_deduccion($cnx_bd);
						$cnx_bd->close();
						if ($fila->periodo_deduccion == 1)
							$periodo = 'Ultima quincena';
						else
							$periodo = 'Ambas quincenas';
					?>
					<h1>Periodo Deducción Salarial</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="modf_periodo_deduc_b.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class='centro'>
										<h3>Periodo actual: <?=$periodo?></h3>
										<div class='campo'>
											<label class='rotulo' title="Elija el periodo para realizar las deducciones">Periodo</label>
											<select name="periodo" title="Elija el periodo para realizar las deducciones" required>
												<option value="2"<?php if ($fila->periodo_deduccion == 2) echo 'selected="selected"';?>>Ambas quincenas</option>
												<option value="1"<?php if ($fila->periodo_deduccion == 1) echo 'selected="selected"';?>>Ultima quincena</option>
											</select>
										</div>
									</div>
									<div class="bot_cent">
										<input type="submit" name="modificar" value="Modificar" id="boton" title="Click para modificar el periodo para deducciones" />
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>