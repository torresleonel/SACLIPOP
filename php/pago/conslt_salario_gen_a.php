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
					<h1>Consulta Salario Quincenal</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="conslt_salario_gen_b.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class='centro'>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el periodo de quincena para el trabajador">Periodo Quincena</label>
											<select name="dia" id="dia" title="Seleccione el periodo de quincena" required>
												<option></option>
												<option value="1">1°</option>
												<option value="16">2°</option>
											</select>
											<select name="mes" id="mes" title="Seleccione el mes de quincena" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="ano" id="ano" title="Seleccione el año de quincena" required>
												<option></option>
												<?php for($i=date('Y'); $i>=2000; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
									</div>
									<div class="bot_cent">
										<input type="submit" name="consultar" value="Consultar" id="boton" title="Click para consultar los datos del salario quincenal en general" />
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