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
		<script type="text/javascript" src="../../js/valida_reg_usuario.js"></script>
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_usuario.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="content">
					<h1>Registrar Usuario</h1>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected">
									<a href="#">Datos del Usuario</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="reg_usuario_b.php" method="post">
								<fieldset class="step">
									<legend>Datos del Usuario</legend>
									<div class='derecha'>
										<div class='campo'>
											<label for="usuario" class='rotulo' title="Por favor ingrese el nombre de usuario con el que ingresara a SACLIPOP">Usuario</label>
											<input type="text" name="usuario" id="usuario" title="Por favor ingrese el nombre de usuario con el que ingresara a SACLIPOP" required />
										</div>
										<div class='campo'>
											<label for="clave" class='rotulo' title="Por favor ingrese la clave con la que ingresara a SACLIPOP">Clave</label>
											<input type="password" name="clave" id="clave" title="Por favor ingrese la clave con la que ingresara a SACLIPOP" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP">Repita Clave</label>
											<input type="password" name="rep_clave" id="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="nombre" class='rotulo' title="Por favor ingrese el nombre del usuario">Nombres</label>
											<input type="text" name="nombre" id="nombre" title="Por favor ingrese el nombre del usuario" required />
										</div>
										<div class='campo'>
											<label for="apellido" class='rotulo' title="Por favor ingrese los apellidos del usuario">Apellidos</label>
											<input type="text" name="apellido" id="apellido" title="Por favor ingrese los apellidos del usuario" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique el nivel de acceso del usuario">Nivel</label>
											<select name="nivel" title="Por favor indique el nivel de acceso del usuario" required>
												<option value=""></option>
												<option value="1">Administrador</option>
												<option value="2">Básico</option>
											</select>
										</div>
									</div>
									<div class="bot_cent">
										<button id="registerButton" type="submit" title="Hacer cliclk para registrar todos los datos del usuario en SACLIPOP">Guardar</button>
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