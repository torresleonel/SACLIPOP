<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link http-equiv="Content-language" content="es" refresh='8' />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../../js/jquery.mask.js"></script>
		<script type="text/javascript" src="../../js/sliding.form.js"></script>
		<script type="text/javascript" src="../../js/sheepIt.js"></script>
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_reg_trabj.js"></script>
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_trabj.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<div id="content">
					<h1>Registrar Datos del Personal</h1>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected" title="Ingresar datos personales del trabajador">
									<a href="#">Personales</a>
								</li>
								<li title="Ingresar datos familiares del trabajador">
									<a href="#">Familia</a>
								</li>
								<li title="Ingresar datos de estudios del trabajador">
									<a href="#">Estudios</a>
								</li>
								<li title="Ingresar documentación consignada por el trabajador">
									<a href="#">Documentos</a>
								</li>
								<li title="Ingresar referencias personales del trabajador">
									<a href="#">Referencias</a>
								</li>
								<li title="Ingresar datos sobre otras categorias del trabajador">
									<a href="#">Otros</a>
								</li>
								<li title="Registrar todos los datos del trabajador en SACLIPOP">
									<a href="#">Guardar</a>
								</li>
							</ul>
						</div>
						<div id="steps">
							<form id="formElem" name="formElem" action="reg_trabj_b.php" method="post">
								<fieldset class="step">
									<legend>Datos Personales</legend>
									<div class='derecha'>
										<div class='campo'>
											<label for="nombre" class='rotulo' title="Por favor ingrese el nombre completo del trabajador">Nombres</label>
											<input type="text" name="nombre" id="nombre" title="Por favor ingrese el nombre completo del trabajador" required />
										</div>
										<div class='campo'>
											<label for="cedula" class='rotulo' title="Por favor ingrese la cédula de identidad del trabajador">Cédula</label>
											<input type="text" name="cedula" id="cedula" title="Por favor ingrese la cédula de identidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador">Nacionalidad</label>
											<input type="text" name="nacionalidad" id="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador estudia">Estudia</label>
											<select name="estudia" title="Por favor indique si el trabajador estudia" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label for="direccion" class='rotulo' title="Por favor ingrese la dirección de habitación del tabajador">Dirección</label>
											<textarea name="direccion" id="direccion" title="Por favor ingrese la dirección de habitación del tabajador" required></textarea>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el estado civil del tabajador">Estado Civil</label>
											<select name="est_civil" title="Por favor elija el estado civil del tabajador" required>
												<option value=""></option>
												<option value="Soltero">Soltero</option>
												<option value="Casado">Casado</option>
												<option value="Divorsiado">Divorsiado</option>
												<option value="Viudo">Viudo</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el rango laboral del tabajador">Rango</label>
											<select name="rango" title="Por favor elija el rango laboral del tabajador" required>
												<option value=""></option>
												<option value="Personal de Alto Nivel">Personal de Alto Nivel</option>
												<option value="Personal Empleado">Personal Empleado</option>
												<option value="Personal Obrero">Personal Obrero</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la condición laboral del tabajador">Condición Laboral</label>
											<select name="condicion" title="Por favor elija la condición laboral del tabajador" required>
												<option value=""></option>
												<option value="Fijo">Fijo</option>
												<option value="Contratado">Contratado</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor ingrese el cargo del trabajador">Cargo</label>
											<select name="cargo" title="Por favor ingrese el cargo del trabajador" required>
												<option value=""></option>
												<option value="Director(a)">Director(a)</option>
												<option value="Administrador(a)">Administrador(a)</option>
												<option value="Coordinador(a)">Coordinador(a)</option>
												<option value="Fisioterapeuta">Fisioterapeuta</option>
												<option value="Medico Fisiatra">Medico Fisiatra</option>
												<option value="Auxiliar Fisioterapeuta">Auxiliar Fisioterapeuta</option>
												<option value="Auxiliar Esterilizacion">Auxiliar Esterilización</option>
												<option value="Secretaria">Secretaria</option>
												<option value="Recepcionista">Recepcionista</option>
												<option value="Portero(a)">Portero(a)</option>
												<option value="Mantenimiento">Mantenimiento</option>
												<option value="Aseador(a)">Aseador(a)</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el área de desempeño del tabajador">Área de Desempeño</label>
											<select name="area_d" title="Por favor elija el área de desempeño del tabajador" required>
												<option value=""></option>
												<option value="Direccion">Dirección</option>
												<option value="Administracion">Administración</option>
												<option value="Fisiatria">Fisiatria</option>
												<option value="Odontologia">Odontologia</option>
												<option value="Recepcion">Recepción</option>
												<option value="Mantenimiento">Mantenimiento</option>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="apellido" class='rotulo' title="Por favor ingrese los apellidos del trabajador">Apellidos</label>
											<input type="text" name="apellido" id="apellido" title="Por favor ingrese los apellidos del trabajador" required />
										</div>
										<div class='campo'>
											<label for="libreta_militr" class='rotulo' title="Por favor ingrese el número de la libreta militar">Libreta Militar</label>
											<input type="text" name="libreta_militr" id="libreta_militr" title="Por favor ingrese el número de la libreta militar" required />
										</div>
										<div class='campo'>
											<label for="pasaporte" class='rotulo' title="Por favor ingrese los datos del pasaporte">Pasaporte</label>
											<input type="text" name="pasaporte" id="pasaporte" title="Por favor ingrese el número de pasaporte" required />
										</div>
										<div class='campo'>
											<label for="lug_nac" class='rotulo' title="Por favor ingrese el lugar de nacimiento del trabajador">Lugar de Nacimiento</label>
											<input type="text" name="lug_nac" id="lug_nac" title="Por favor ingrese el lugar de nacimiento del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor ingrese la fecha de nacimiento del trabajador">Fecha de Nacimiento</label>
											<select name="dianac" id="dianac" title="Seleccione el dia de nacimiento del trabajador" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mesnac" id="mesnac" title="Seleccione el mes de nacimiento del trabajador" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="anonac" id="anonac" title="Seleccione el año de nacimiento del trabajador" required>
												<option></option>
												<?php for($i=date('o'); $i>=1950; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="telefono" class='rotulo' title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000">Teléfono</label>
											<input name="telefono" type="text" id="telefono" class="tlf_formato" title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label for="telefono_em" class='rotulo' title="Por favor ingrese un número telefónico para caso de emergencia, con formato 0000-0000000">Teléfono Emergencia</label>
											<input name="telefono_em" type="text" id="telefono_em" class="tlf_formato" title="Por favor ingrese un número telefónico para caso de emergencia, con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label for="nconyugue" class='rotulo' title="Por favor ingrese el nombre del conyugue">Nombre del Conyugue</label>
											<input type="text" name="nconyugue"  value='' id="nconyugue" title="Por favor ingrese el nombre del conyugue" />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la fecha en que ingreso el trabajador a la clinica">Fecha de Ingreso</label>
											<select name="diaing" id="diaing" title="Seleccione el dia de ingreso a la clinica" required>
												<option></option>
												<?php for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
											<select name="mesing" id="mesing" title="Seleccione el mes de ingreso a la clinica" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
												?>
											</select>
											<select name="anoing" id="anoing" title="Seleccione el año de ingreso a la clinica" required>
												<option></option>
												<?php for($i=date('o'); $i>=1980; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="resolucion" class='rotulo' title="Por favor ingrese el número de resolucion">Resolución</label>
											<input type="text" name="resolucion" id="resolucion" title="Por favor ingrese el número de resolucion" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la ley bajo la cual esta amparado el tabajador">Amparado Bajo</label>
											<select name="ley" title="Por favor elija la ley bajo la cual esta amparado el tabajador" required>
												<option value=""></option>
												<option value="LOTTT" title="Ley Orgánica del Trabajo, los Trabajadores y Trabajadoras">LOTTT</option>
												<option value="LEFP" title="Ley del Estatuto de la Función Pública">LEFP</option>
											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Familia</legend>
									<div id='sheepItForm'>
										<div id='sheepItForm_template'>
											<div class='division'>
												<h3>Datos Basicos del Familiar</h3>
											</div>
											<div class='derecha'>
												<div class='campo'>
													<label class='rotulo' for="sheepItForm_#index#nombre" title="Por favor ingrese el nombre del familiar del trabajador">Nombres</label>
													<input id='sheepItForm_#index#nombre' name='nombres_fam[#index#]' type='text' title="Por favor ingrese el nombre del familiar del trabajador" required />
												</div>
												<div class='campo'>
													<label class='rotulo' for="sheepItForm_#index#cedula" title="Por favor ingrese el número de cédula del familiar del trabajador">Cédula</label>
													<input id='sheepItForm_#index#cedula' name='cedula_fam[#index#]' type='text' title="Por favor ingrese el número de cédula del familiar del trabajador" required />
												</div>
												<div class='campo'>
													<label class='rotulo' for="sheepItForm_#index#parentesco" title="Por favor indique el parentesco del familiar con el trabajador">Parentesco</label>
													<input id='sheepItForm_#index#parentesco' name='parentesco_fam[#index#]' type='text' title="Por favor indique el parentesco del familiar con el trabajador" required />
												</div>
												<div class='campo'>
													<label class='rotulo' title="Por favor indique si el familiar del trabajador es empleado de la institucion o la alcaldia">Empleado</label>
													<select name="empl_fam[#index#]" title="Por favor indique si el familiar del trabajador es empleado de la institucion o la alcaldia" id="sheepItForm_#index#empl_fam" required>
														<option value=""></option>
														<option value="0">Ninguno</option>
														<option value="1">De la institución</option>
														<option value="2">De la alcaldia</option>
													</select>
												</div>
											</div>
											<div class='izquierda'>
												<div class='campo'>
													<label class='rotulo' for="sheepItForm_#index#apellido" title="Por favor ingrese el apellido del familiar del trabajador">Apellidos</label>
													<input id='sheepItForm_#index#apellido' name='apellidos_fam[#index#]' type="text" title="Por favor ingrese el apellido del familiar del trabajador" required />
												</div>
												<div class='campo'>
													<label class='rotulo' title="Por favor ingrese la fecha de nacimiento del familiar del trabajador">Fecha de Nacimiento</label>
													<select name="dianac_fam[#index#]" id="sheepItForm_#index#dianac_fam" title="Por favor elija el dia de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php
															for($i=1;$i<=31;$i++) echo '<option value='.$i.'>'.$i.'</option>';
														?>
													</select>
													<select name="mesnac_fam[#index#]" id="sheepItForm_#index#mesnac_fam" title="Por favor elija el mes de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php
															$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
															for($i=1;$i<=12;$i++) echo '<option value='.$i.'>'.$meses[$i].'</option>';
														?>
													</select>
													<select name="anonac_fam[#index#]" id="sheepItForm_#index#anonac_fam" title="Por favor elija el año de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php for($i=date('o'); $i>=1950; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
													</select>
												</div>
												<div class='campo'>
													<label class='rotulo' title="Por favor indique si el familiar del trabajador estudia">Estudia</label>
													<select name="estudia_fam[#index#]" title="Por favor indique si el familiar del trabajador estudia" id="sheepItForm_#index#estudia" required>
														<option value=""></option>
														<option value="0">No</option>
														<option value="1">Si</option>
													</select>
												</div>
												<div class='campo'>
													<label class='rotulo' for="sheepItForm_#index#cargo" title="Por favor ingrese el cargo del familiar del trabajador">Cargo</label>
													<input id='sheepItForm_#index#cargo' name='cargo_fam[#index#]' type='text' title="Por favor ingrese el cargo del familiar del trabajador" required />
												</div>
											</div>
											<div class='botoneliminar'>
												<a id='sheepItForm_remove_current' title="Haga click para eliminar los datos del familiar del trabajador">Eliminar Familiar</a>
											</div> 
										</div>
									</div>
									<!-- No forms template -->
									<div id='sheepItForm_noforms_template' class='no_familiar'>
										<h3>No ha registrado ningun familiar</h3>
									</div>
									<!-- /No forms template-->
									<!-- Controls -->
									<div id='sheepItForm_controls'>
										<div id='sheepItForm_add' class='botonagregar'>
											<a title="Haga click para agregar los datos del familiar del trabajador"><span>Agregar Familiar</span></a>
										</div>
									</div>
									<!-- /Controls -->
								</fieldset>
								<fieldset class="step">
									<legend>Educación</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el nivel del estudio del trabajador">Estudios</label>
											<select name="estudio" title="Por favor elija el nivel del estudio del trabajador" id="estudio" required>
												<option value=""></option>
												<option value="Primaria">Primaria</option>
												<option value="Secundaria">Secundaria</option>
												<option value="Universitario">Universitario</option>
												<option value="Postgrado">Post/grado</option>
												<option value="Otros">Otros</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' for="lug_estudio" title="Por favor ingrese el lugar de estudio del trabajador">Lugar de Estudio</label>
											<input type="text" name="lug_estudio" id="lug_estudio" title="Por favor ingrese el lugar de estudio del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ano" title="Por favor ingrese el año de graduación del trabajador">Año</label>
											<select name="ano" id="ano" title="Por favor ingrese el año de graduación del trabajador" required>
												<option></option>
												<?php for($i=date('o'); $i>=1960; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="titulos" title="Por favor ingrese el titulo obtenido del trabajador">Titulo Obtenido</label>
											<input type="text" name="titulos" id="titulos" title="Por favor ingrese el titulo obtenido del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="observacion" title="Por favor ingrese el titulo obtenido del trabajador">Observaciones</label>
											<input type="text" name="observacion" id="observacion" title="Por favor ingrese las observaciones" required />
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Documentación Personal</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno partida de nacimiento">Partida de nacimiento</label>
											<select name="part_nac" title="Por favor indique si el trabajador consigno partida de nacimiento" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno inscripción militar">Inscripción Militar</label>
											<select name="ins_milt" title="Por favor indique si el trabajador consigno inscripción militar" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno cédula de identidad">Cédula de Identidad</label>
											<select name="ced_iden" title="Por favor indique si el trabajador consigno cédula de identidad" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno RIF">RIF</label>
											<select name="rif" title="Por favor indique si el trabajador consigno RIF" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno declaración jurada">Declaración Jurada</label>
											<select name="dec_jur" title="Por favor indique si el trabajador consigno declaración jurada" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno informe medico">Informe Medico</label>
											<select name="inf_med" title="Por favor indique si el trabajador consigno informe medico" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno partida de nacimiento de hijos">Partida de Nacimiento de Hijos</label>
											<select name="part_nac_h" title="Por favor indique si el trabajador consigno partida de nacimiento de hijos" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno acta de matrimonio y/o divorcio">Acta de Matrimonio y/o Divorcio</label>
											<select name="matr_divr" title="Por favor indique si el trabajador consigno acta de matrimonio y/o divorcio" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno defunciones">Defunciones</label>
											<select name="defunc" title="Por favor indique si el trabajador consigno defunciones" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno titulos">Titulos</label>
											<select name="titul" title="Por favor indique si el trabajador consigno titulos" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno certificados">Certificados</label>
											<select name="certf" title="Por favor indique si el trabajador consigno certificados" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno constancias y horarios de estudios">Constancias y Horarios de Estudios</label>
											<select name="const_hora" title="Por favor indique si el trabajador consigno constancias y horarios de estudios" required>
												<option value=""></option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Referencias Personales</legend>
									<div class='division'>
										<h3>Referencia número 1</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp_1" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_1" id="nombre_rp_1" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_1" title="Por favor ingrese la cédula de identidad">Cédula</label>
											<input type="text" name="cedula_rp_1" id="cedula_rp_1" title="Por favor ingrese la cédula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_1" title="Por favor ingrese el número telefónico con formato 0000-0000000">Teléfono</label>
											<input name="telefono_rp_1" type="text" id="telefono_rp_1" class="tlf_formato" title="Por favor ingrese el número telefónico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_1" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_1" id="apellido_rp_1" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_1" title="Por favor ingrese la ocupación">Ocupación</label>
											<input type="text" name="ocupacion_rp_1" id="ocupacion_rp_1" title="Por favor ingrese la ocupación" required />
										</div>
									</div>
									<div class='division'>
										<h3>Referencia número 2</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_2" id="nombre_rp" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_2" title="Por favor ingrese la cédula de identidad">Cédula</label>
											<input type="text" name="cedula_rp_2" id="cedula_rp_2" title="Por favor ingrese la cédula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_2" title="Por favor ingrese el número telefónico con formato 0000-0000000">Teléfono</label>
											<input name="telefono_rp_2" type="text" id="telefono_rp_2" class="tlf_formato" title="Por favor ingrese el número telefónico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_2" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_2" id="apellido_rp_2" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_2" title="Por favor ingrese la ocupación">Ocupación</label>
											<input type="text" name="ocupacion_rp_2" id="ocupacion_rp_2" title="Por favor ingrese la ocupación" required />
										</div>
									</div>
									<div class='division'>
										<h3>Referencia número 3</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp_3" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_3" id="nombre_rp_3" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_3" title="Por favor ingrese la cédula de identidad">Cédula</label>
											<input type="text" name="cedula_rp_3" id="cedula_rp_3" title="Por favor ingrese la cédula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_3" title="Por favor ingrese el número telefónico con formato 0000-0000000">Teléfono</label>
											<input name="telefono_rp_3" type="text" id="telefono_rp_3" class="tlf_formato" title="Por favor ingrese el número telefónico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_3" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_3" id="apellido_rp_3" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_3" title="Por favor ingrese la ocupación">Ocupación</label>
											<input type="text" name="ocupacion_rp_3" id="ocupacion_rp_3" title="Por favor ingrese la ocupación" required />
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Otras Categorias</legend>
									<div class='centro'>
										<div class='campo'>
											<label class='rotulo' for="tall_cam" title="Por favor elija la talla de camisa del trabajador">Talla Camisa</label>
											<select name="tall_cam" id="tall_cam" title="Por favor elija la talla de camisa del trabajador" required>
												<option value=""></option>
												<option value="S">S</option>
												<option value="M">M</option>
												<option value="L">L</option>
												<option value="XL">XL</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' for="tall_pant" title="Por favor ingrese la talla del pantalon del trabajador">Talla Pantalon</label>
											<input type="text" name="tall_pant" id="tall_pant" title="Por favor ingrese la talla del pantalon del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="tall_calz" title="Por favor ingrese la talla del calzado del trabajador">Talla Calzado</label>
											<input name="tall_calz" type="text" id="tall_calz" title="Por favor ingrese la talla del calzado del trabajador" required />
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Guardar</legend>
									<p>Para guardar los datos, debe ingresar todos los datos del formulario correctamente.</p>
									<p class="error" id='errordesact'>
										Por favor, corrija los errores en el formulario
									</p>
									<p class="submit"><button id="registerButton" type="submit" title="Hacer cliclk para registrar todos los datos del trabajador en SACLIPOP">Guardar</button></p>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>