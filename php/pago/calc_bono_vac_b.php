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
					<h1>Cálculo Bono Vacacional</h1>
					<div id="wrapper">
						<?php
							/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
							include('../_conexion/conexion_funcion.php');
							$cnx_bd = conexion();
							include('../_sql/conslt_trabj_sql.php');
							$resultado = conslt_laboral_trb($cnx_bd);
							$cnx_bd->close();
							$fila = $resultado->fetch_object();
							$resultado->free();
							list($a,$m,$d) = explode('-',$fila->fecha_ingreso);
							echo 'NOMBRES Y APPELLIDOS: '.$fila->nombre.' '.$fila->apellido.'<br>CARGO: '.$fila->cargo.'<br>SUELDO MENSUAL Bs.: '.$fila->sueldo_mensual.'<br>FECHA DE INGRESO: '.$d.'-'.$m.'-'.$a;
						?>
						<div id="steps">
							<form id="formElem" name="formElem" action="calc_bono_vac_c.php" method="post">
								<fieldset class="step">
									<legend>Datos</legend>
									<div class='centro'>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la fecha de inicio de las vacaciones para el trabajador">Fecha de Inicio</label>
											<select name="dia" id="dia" title="Seleccione el dia de inicio de vacaciones" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mes" id="mes" title="Seleccione el mes de inicio de vacaciones" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="ano" id="ano" title="Seleccione el año de inicio de vacaciones" required>
												<option></option>
												<?php $i=date('Y'); echo '<option value='.$i.'>'.$i.'</option><option value='.++$i.'>'.$i.'</option>'; ?>
											</select>
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
										<input type="submit" name="calcular" value="Calcular" id="boton" title="Click para calcular el bono vacacional del trabajdor" />
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