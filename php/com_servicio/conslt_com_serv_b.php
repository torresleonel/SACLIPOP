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
		<script type="text/javascript" src="../../js/sheepIt.js"></script>	
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
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA COMISION DE SERVICIO*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$resultado = conslt_completa_coms($cnx_bd);
					$cnx_bd->close();
					$fila = $resultado->fetch_object();
					list($a,$m,$d) = explode("-",$fila->actualizado);
					list($an,$mn,$dn) = explode("-",$fila->fe_nac);
					list($ai,$mi,$di) = explode("-",$fila->fecha_ingreso);
					if ($fila->estudia == 0) $estud = 'No'; else $estud = 'Si';
				?>
				<div id="content">
					<h1>Detalles del Personal</h1>
					<h4>Ultima Actualización: <?php echo $d.'-'.$m.'-'.$a; ?></h4>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected" title="Datos personales del trabajador">
									<a href="#">Datos Personales</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="#" method="post">
								<fieldset class="step">
									<legend>Datos Personales</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo'>Nombres</label>
											<span class="text_cons"><?php echo $fila->nombre; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Cédula</label>
											<span class="text_cons"><?php echo $fila->cedula; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Nacionalidad</label>
											<span class="text_cons"><?php echo $fila->ciudadania; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Estudia</label>
											<span class="text_cons"><?php echo $estud; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Dirección</label>
											<span class="text_cons"><?php echo $fila->direccion; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Estado Civil</label>
											<span class="text_cons"><?php echo $fila->est_civil; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Nombre del Conyugue</label>
											<span class="text_cons"><?php echo $fila->nconyugue; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Departamento Envia</label>
											<span class="text_cons"><?php echo $fila->dpt_envia; ?></span>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo'>Apellidos</label>
											<span class="text_cons"><?php echo $fila->apellido; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Libreta Militar</label>
											<span class="text_cons"><?php echo $fila->libreta_militr; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Pasaporte</label>
											<span class="text_cons"><?php echo $fila->pasaporte; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Lugar de Nacimiento</label>
											<span class="text_cons"><?php echo $fila->lug_nac; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Fecha de Nacimiento</label>
											<span class="text_cons"><?php echo $dn.'-'.$mn.'-'.$an; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Teléfono</label>
											<span class="text_cons"><?php echo $fila->telefono; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Cargo</label>
											<span class="text_cons"><?php echo $fila->cargo; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Fecha de Ingreso</label>
											<span class="text_cons"><?php echo $di.'-'.$mi.'-'.$ai; ?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Observación</label>
											<span class="text_cons"><?php echo $fila->observacion; ?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<?php
										$resultado->free();
									?>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>