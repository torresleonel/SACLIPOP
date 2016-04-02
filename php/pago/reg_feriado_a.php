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
					<h1>Registro de Dias Feridos</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="reg_feriado_b.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class="derecha">
										<div class="campo">
											<label class='rotulo' title="Por favor elija la fecha del nuevo dia feriado">Dia Feriado</label>
											<select name="dia" id="dia" title="Seleccione el dia" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mes" id="mes" title="Seleccione el mes" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="descripcion" class='rotulo' title="Ingrese la descripcion del dia feriado">Descripción</label>
											<input type="text" name="descripcion" id="descripcion" title="Ingrese la descripcion del dia feriado" required />
										</div>
									</div>
									<div class="bot_cent">
										<input type="submit" name="guardar" value="Guardar" id="boton" title="Click para registrar el nuevo dia feriado" />
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