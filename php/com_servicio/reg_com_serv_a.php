<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../../js/jquery.mask.js"></script>
		<script type="text/javascript" src="../../js/sliding.form.js"></script>
		<script type="text/javascript" src="../../js/sheepIt.js"></script>
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_reg_com_serv.js"></script>
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_comi.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="content">
					<h1>Registrar Comision de Servicio</h1>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected" title="Ingresar datos personales del trabajador">
									<a href="#">Datos Personales</a>
								</li>
								<li title="Registrar todos los datos del trabajador en SACLIPOP">
									<a href="#">Guardar</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="reg_com_serv_b.php" method="post">
								<fieldset class="step">
									<legend>Datos Personales</legend>
									<div class='derecha'>
										<div class='campo'>
											<label for="nombre" class='rotulo' title="Por favor ingrese el nombre completo del trabajador">Nombres</label>
											<input type="text" name="nombre" id="nombre" title="Por favor ingrese el nombre completo del trabajador" required />
										</div>
										<div class='campo'>
											<label for="cedula" class='rotulo' title="Por favor ingrese la cédula de identidad del trabajador">Cédula</label>
											<input type="text" name="cedula" id="cedula" title="Por favor ingrese la cédula de identidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador">Nacionalidad</label>
											<input type="text" name="nacionalidad" id="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador estudia">Estudia</label>
											<select name="estudia" title="Por favor indique si el trabajador estudia" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label for="direccion" class='rotulo' title="Por favor ingrese la dirección de habitación del tabajador">Dirección</label>
											<textarea name="direccion" id="direccion" title="Por favor ingrese la dirección de habitación del tabajador" required></textarea>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el estado civil del tabajador">Estado Civil</label>
											<select name="est_civil" title="Por favor elija el estado civil del tabajador" required>
												<option value=""></option>
												<option value="Soltero">Soltero</option>
												<option value="Casado">Casado</option>
												<option value="Divorsiado">Divorsiado</option>
												<option value="Viudo">Viudo</option>
											</select>
										</div>
										<div class='campo'>
											<label for="nconyugue" class='rotulo' title="Por favor ingrese el nombre del conyugue">Nombre del Conyugue</label>
											<input type="text" name="nconyugue"  value='' id="nconyugue" title="Por favor ingrese el nombre del conyugue"  required />
										</div>
										<div class='campo'>
											<label for="dept_env" class='rotulo' title="Por favor ingrese el nombre del departamento que envio el personal">Departamento Envia</label>
											<input type="text" name="dept_env" id="dept_env" title="Por favor ingrese el nombre del departamento que envia al personal" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="apellido" class='rotulo' title="Por favor ingrese los apellidos del trabajador">Apellidos</label>
											<input type="text" name="apellido" id="apellido" title="Por favor ingrese los apellidos del trabajador" required />
										</div>
										<div class='campo'>
											<label for="libreta_militr" class='rotulo' title="Por favor ingrese el número de la libreta militar">Libreta Militar</label>
											<input type="text" name="libreta_militr" id="libreta_militr" title="Por favor ingrese el número de la libreta militar" required />
										</div>
										<div class='campo'>
											<label for="pasaporte" class='rotulo' title="Por favor ingrese los datos del pasaporte">Pasaporte</label>
											<input type="text" name="pasaporte" id="pasaporte" title="Por favor ingrese el número de pasaporte" required />
										</div>
										<div class='campo'>
											<label for="lug_nac" class='rotulo' title="Por favor ingrese el lugar de nacimiento del trabajador">Lugar de Nacimiento</label>
											<input type="text" name="lug_nac" id="lug_nac" title="Por favor ingrese el lugar de nacimiento del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor ingrese la fecha de nacimiento del trabajador">Fecha de Nacimiento</label>
											<select name="dianac" id="dianac" title="Seleccione el dia de nacimiento del trabajador" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mesnac" id="mesnac" title="Seleccione el mes de nacimiento del trabajador" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="anonac" id="anonac" title="Seleccione el año de nacimiento del trabajador" required>
												<option></option>
												<?php for($i=date('o'); $i>=1950; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="telefono" class='rotulo' title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000">Teléfono</label>
											<input name="telefono" type="text" id="telefono" class="tlf_formato" title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cargo">Cargo</label>
											<input type="text" name="cargo" id="cargo" title="Por favor ingrese el cargo del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la fecha en que ingreso el trabajador a la clinica">Fecha de Ingreso</label>
											<select name="diaing" id="diaing" title="Seleccione el dia de ingreso a la clinica" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mesing" id="mesing" title="Seleccione el mes de ingreso a la clinica" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="anoing" id="anoing" title="Seleccione el año de ingreso a la clinica" required>
												<option></option>
												<?php for($i=date('o'); $i>=1980; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="observacion" class='rotulo' title="Por favor ingrese las observaciones sobre el trabajador">Observación</label>
											<textarea name="observacion" id="observacion" title="Por favor ingrese las observaciones sobre el trabajador" required></textarea>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Guardar</legend>
									<p>Para guardar los datos, debe ingresar todos los datos del formulario correctamente.</p>
									<p class="error" id='errordesact'>
										Por favor, corrija los errores en el formulario
									</p>
									<p class="submit"><button id="registerButton" type="submit" title="Hacer cliclk para registrar todos los datos del trabajador en SACLIPOP">Guardar</button></p>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>