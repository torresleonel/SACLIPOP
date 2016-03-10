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
					<?php include('../_menu/menu_reporte.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="content">
					<h1>Constancia de Trabajo</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="constancia_trbj.php" method="post" target="_blank">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class="derecha">
										<div class="campo">
											<input type="hidden" name="ced_suld" value="<?=$_GET['c']?>" />
											<label for="dirigida" class='rotulo' title="Por favor ingrese el nombre para quien va dirigida la constancia de trabajado">Dirigida</label>
											<input type="text" name="dirigida" id="dirigida" title="Por favor ingrese el nombre para quien va dirigida la constancia de trabajado" required />
										</div>
									</div>
									<div class="izquierda">
										<div class="campo">
											<label for="motivo" class='rotulo' title="Por favor ingrese el motivo por el cual fue solicitada la constancia de trabajado">Motivo</label>
											<input type="text" name="motivo" id="motivo" title="Por favor ingrese el motivo por el cual fue solicitada la constancia de trabajado" required />
										</div>
									</div>
								</fieldset>
								<div class="boton_centro">
									<input type="submit" name="generar" value="Generar" id="boton" title="Click para generar la constancia de trabajo" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
