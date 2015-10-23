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
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_bitacora.js"></script>
	</head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_respaldo.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="content">
					<h1>Bitacora</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<?php
										/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CALCULOS*/
										include('../_conexion/conexion_funcion.php');
										$cnx_bd = conexion();
										include('../_sql/usuario_sql.php');
										$user = conslt_usuario_all($cnx_bd);
										$cnx_bd -> close();
									?>
									<div class="derecha">
										<div class="campo">
											<label class='rotulo' title="Por favor elija el periodo para consultar la bitacora de SACLIPOP">Periodo</label>
											<select name="mes" id="mes" title="Seleccione el mes" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="ano" id="ano" title="Seleccione el año" required>
												<option></option>
												<?php for($i=date('Y'); $i>=2000; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
									</div>
									<div class="izquierda">
										<div class="campo">
											<label class='rotulo' title="Por favor elija el nombre de usuario que desea consultar">Usuario</label>
											<select name="u" id="u" title="Por favor elija el nombre de usuario que desea consultar" required>
												<option value="Todos los usuarios">Todos los usuarios</option>
												<?php
													while ($fila = $user -> fetch_object()) echo '<option value="'.$fila -> id_usuario.'">'.$fila -> id_usuario.'</option>';
													$user -> free();
												?>
											</select>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<!-- DIV DONDE SE CARGARA LA CONSULTA DE LA BITACORA -->
						<div id="tabla_bitacora">
						</div>
						<div class="boton_centro">
							<a href="../inicio.php" class="enlaceboton" title="Click para volver al inicio de SACLIPOP">Inicio</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
