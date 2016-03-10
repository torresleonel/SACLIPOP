<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon">
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen">
		<script type="text/javascript" src="js/funcion_general.js"></script>
		<script type="text/javascript" src="js/valida_sesion.js"></script>
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<ul>
						<li><a href="../../index.php" title="Click para ir al inicio de SACLIPOP"><span>Inicio</span></a></li>
					</ul>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					include("../_conexion/conexion_funcion.php");
					$cnx_bd = conexion();
					include('recuperar_pass_sql.php');
					$fila = verifica_usuario($cnx_bd);
					$cnx_bd->close();
				?>
				<div id="imgsesion">
				</div>
				<form name="usuario" action="3_new_pass.php" method="POST" autocomplete="off" class="sesion">
					<h2>Recuperar contraseña</h2>
					<br>
					<div>
						<label title="Pregunta de seguridad">Pregunta de seguridad</label>
						<?php
							if($fila->pregunta == 1) $resp = '¿Nombre de su primera mascota?';
							if($fila->pregunta == 2) $resp = '¿Nombre de su mejor amigo de la infancia?';
							if($fila->pregunta == 3) $resp = '¿Lugar de nacimiento de la madre?';
							if($fila->pregunta == 4) $resp = '¿Nombre de su primera escuela?';
							if($fila->pregunta == 5) $resp = '¿En que año egreso de la escuela?';
						?>
						<input type="text" name="pregunta" value="<?php echo $resp; ?>" class="input-pregunta" title="Pregunta de Seguridad" size="41" readonly>
					</div>
					<br>
					<div>
						<input type="hidden" name="usuario" value="<?php echo $fila->id_usuario; ?>">
						<input type="text" name="respuesta" size="30" placeholder="Respuesta" class="input-pregunta" title="Ingrese aqui la respuesta a su pregunta de seguridad" required>
					</div>
					<INPUT type="submit" value="Verificar" id="boton" title="Click para verificar la respuesta a su pregunta de seguridad">
				</form>
			</div>
		</div>
	</body>
</html>