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
					<h1>Consulta Aguinaldos</h1>
					<div id="wrapper">
						<div id="steps">
							<form id="formElem" name="formElem" action="conslt_aguinaldo_gen_b.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class='centro'>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el año de aguinaldos">Año</label>
											<select name="a" id="a" title="Seleccione el año de aguinaldos" required>
												<option></option>
												<?php for($i=date('Y'); $i>=2000; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
									</div>
									<div class="bot_cent">
										<input type="submit" name="consultar" value="Consultar" id="boton" title="Click para consultar los datos de los aguinaldos en general" />
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