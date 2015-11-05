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
					<h1>Cálculo de Salario</h1>
					<div id="wrapper">
						<?php
							/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
							include('../_conexion/conexion_funcion.php');
							$cnx_bd = conexion();
							include('../_sql/conslt_trabj_sql.php');
							if (isset($_GET['m']) && $_GET['m'] == 1) modf_suld_indv($cnx_bd);
							$resultado = conslt_laboral_trb($cnx_bd);
							$cnx_bd->close();
							$fila = $resultado->fetch_object();
							$resultado->free();
							echo 'NOMBRES Y APPELLIDOS: '.$fila->nombre.' '.$fila->apellido.'<br>CARGO: '.$fila->cargo.'<br>SUELDO MENSUAL Bs.: '.$fila->sueldo_mensual;
						?>
						<div id="steps">
							<form id="formElem" name="formElem" action="calc_salario_c.php" method="post">
								<fieldset class="step">
									<legend>Datos salariales quincena</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador declara y paga ISLR">Genera ISLR</label>
											<input type="radio" name="gen_islr" value="1" id="islr_s" title="Si genera ISLR" />
											<label for="islr_s" title="Si genera ISLR" class="rotulo_r">Si</label>
											<input type="radio" name="gen_islr" value="0" id="islr_n" title="No genera ISLR" />
											<label for="islr_n" title="No genera ISLR" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label for="d_adicional" class='rotulo' title="Por favor ingrese la cantidad de dias adicionales">Dias Adicionales</label>
											<input type="text" name="d_adicional" id="d_adicional" title="Por favor ingrese la cantidad de dias adicionales" required />
										</div>
										<div class='campo'>
											<label for="inasistencia" class='rotulo' title="Por favor ingrese la cantidad de inasistencias del trabajador">Inasistencias</label>
											<input type="text" name="inasistencia" id="inasistencia" title="Por favor ingrese la cantidad de inasistencias del trabajador" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="retro_suld" class='rotulo' title="Por favor ingrese el retroactivo de sueldo del trabajador">Retroactivo Sueldo</label>
											<input type="text" name="retro_suld" id="retro_suld" title="Por favor ingrese el retroactivo del trabajador" required />
										</div>
										<div class='campo'>
											<label for="retro_agin" class='rotulo' title="Por favor ingrese el retroactivo de aguinaldos del trabajador">Retroactivo Aguinaldos</label>
											<input type="text" name="retro_agin" id="retro_agin" title="Por favor ingrese el retroactivo del trabajador" required />
										</div>
										<div class='campo'>
											<label for="retro_vaci" class='rotulo' title="Por favor ingrese el retroactivo de vacaciones del trabajador">Retroactivo Vacaciones</label>
											<input type="text" name="retro_vaci" id="retro_vaci" title="Por favor ingrese el retroactivo del trabajador" required />
										</div>
									</div>
									<input type="hidden" name="cargo" value="<?=$fila->cargo?>" />
									<input type="hidden" name="ley" value="<?=$fila->ley?>" />
									<input type="hidden" name="fch_ing" value="<?=$fila->fecha_ingreso?>" />
									<input type="hidden" name="salr_mes" value="<?=$fila->sueldo_mensual?>" />
									<input type="hidden" name="nombre" value="<?=$fila->nombre?>" />
									<input type="hidden" name="apellido" value="<?=$fila->apellido?>" />
									<input type="hidden" name="cedula" value="<?=$fila->cedula?>" />
									<div class="bot_cent">
										<br/>
										<br/>
										<input type="submit" name="calcular" value="Calcular" id="boton" title="Click para calcular el salario del trabajador" />
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