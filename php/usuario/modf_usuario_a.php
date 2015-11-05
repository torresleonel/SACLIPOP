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
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA USUARIO*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/usuario_sql.php');
					$resultado = conslt_usuario($cnx_bd);
					$cnx_bd->close();
					$fila = $resultado->fetch_object();
				?>
				<div id="content">
					<h1>Modificar Perfil de Usuario</h1>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected">
									<a href="#">Datos del Usuario</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="modf_usuario_b.php" method="post">
								<fieldset class="step">
									<legend>Datos del Usuario</legend>
									<div class='derecha'>
										<div class='campo'>
											<label for="usuario" class='rotulo' title="Por favor ingrese el nombre de usuario con el que ingresara a SACLIPOP">Usuario</label>
											<input type="text" name="usuario" value="<?php echo $fila->id_usuario; ?>" id="usuario" title="Por favor ingrese el nombre de usuario con el que ingresara a SACLIPOP" required />
										</div>
										<div class='campo'>
											<label for="clave" class='rotulo' title="Por favor ingrese la nueva clave con la que ingresara a SACLIPOP">Nueva Clave</label>
											<input type="password" name="clave" id="clave" title="Por favor ingrese la nueva clave con la que ingresara a SACLIPOP" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP">Repita Clave</label>
											<input type="password" name="rep_clave" id="rep_clave" title="Por favor ingrese nuevamente la clave con la que ingresara a SACLIPOP" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="nombre" class='rotulo' title="Por favor ingrese el nombre del usuario">Nombres</label>
											<input type="text" name="nombre" value="<?php echo $fila->nombre; ?>" id="nombre" title="Por favor ingrese el nombre del usuario" required />
										</div>
										<div class='campo'>
											<label for="apellido" class='rotulo' title="Por favor ingrese los apellidos del usuario">Apellidos</label>
											<input type="text" name="apellido" value="<?php echo $fila->apellido; ?>" id="apellido" title="Por favor ingrese los apellidos del usuario" required />
										</div>
											<?php if(isset($fila->respuesta)){ ?>
													<div class='campo'>
														<div class="select_prgunta">
															<label class='rotulo_cent' title="Pregunta de seguridad">Pregunta de seguridad</label>
															<select name="preg_seg" title="Por favor elija una pregunta de seguridad" required>
																<option value=""></option>
																<option value="1" <?php if($fila->pregunta == 1) echo 'selected="selected"'; ?>>¿Nombre de su primera mascota?</option>
																<option value="2" <?php if($fila->pregunta == 2) echo 'selected="selected"'; ?>>¿Nombre de su mejor amigo de la infancia?</option>
																<option value="3" <?php if($fila->pregunta == 3) echo 'selected="selected"'; ?>>¿Lugar de nacimiento de la madre?</option>
																<option value="4" <?php if($fila->pregunta == 4) echo 'selected="selected"'; ?>>¿Nombre de su primera escuela?</option>
																<option value="5" <?php if($fila->pregunta == 5) echo 'selected="selected"'; ?>>¿En que año egreso de la escuela?</option>
															</select>
														</div>
													</div>
													<div class='campo'>
														<label for="respuesta" class='rotulo' title="Por favor ingrese la respuesta de seguridad">Respuesta</label>
														<input type="text" name="respuesta" id="respuesta" title="Por favor ingrese la respuesta de seguridad" required />
													</div>
											<?php }else{ ?>
													<div class='campo'>
														<div class="select_prgunta">
															<label class='rotulo_cent' title="Pregunta de seguridad">Pregunta de seguridad</label>
															<select name="preg_seg" title="Por favor elija una pregunta de seguridad" required>
																<option value=""></option>
																<option value="1">¿Nombre de su primera mascota?</option>
																<option value="2">¿Nombre de su mejor amigo de la infancia?</option>
																<option value="3">¿Lugar de nacimiento de la madre?</option>
																<option value="4">¿Nombre de su primera escuela?</option>
																<option value="5">¿En que año egreso de la escuela?</option>
															</select>
														</div>
													</div>
													<div class='campo'>
														<label for="respuesta" class='rotulo' title="Por favor ingrese la respuesta de seguridad">Respuesta</label>
														<input type="text" name="respuesta" id="respuesta" title="Por favor ingrese la respuesta de seguridad" required />
													</div>
											<?php } ?>
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