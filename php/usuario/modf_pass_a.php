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
					<h1>Modificar Contraseña de Usuario</h1>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected">
									<a href="#">Datos del Usuario</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="modf_pass_b.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class='derecha'>
										<div class='campo'>
											<label for="clave" class='rotulo' title="Por favor ingrese la nueva clave con la que ingresara a SACLIPOP">Nueva Clave</label>
											<input type="password" name="clave" id="clave" title="Por favor ingrese la nueva clave con la que ingresara a SACLIPOP" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP">Repita Clave</label>
											<input type="password" name="rep_clave" id="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP" required />
										</div>
									</div>
									<div class="bot_cent">
										<br>
										<button id="registerButton" type="submit" title="Hacer cliclk para modificar los datos del usuario en SACLIPOP">Modificar</button>
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