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
								<li title="Ingresar documentaci�n consignada por el trabajador">
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
											<label for="cedula" class='rotulo' title="Por favor ingrese la c�dula de identidad del trabajador">C�dula</label>
											<input type="text" name="cedula" id="cedula" title="Por favor ingrese la c�dula de identidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador">Nacionalidad</label>
											<input type="text" name="nacionalidad" id="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador estudia">Estudia</label>
											<input type="radio" name="estudia" value="1" id="estudia_s" title="Si estudia" />
											<label for="estudia_s" title="Si estudia" class="rotulo_r">Si</label>
											<input type="radio" name="estudia" value="0" id="estudia_n" title="No estudia" />
											<label for="estudia_n" title="No estudia" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label for="direccion" class='rotulo' title="Por favor ingrese la direcci�n de habitaci�n del tabajador">Direcci�n</label>
											<textarea name="direccion" id="direccion" title="Por favor ingrese la direcci�n de habitaci�n del tabajador" required></textarea>
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
											<label class='rotulo' title="Por favor elija la condici�n laboral del tabajador">Condici�n Laboral</label>
											<select name="condicion" title="Por favor elija la condici�n laboral del tabajador" required>
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
												<option value="Auxiliar Esterilizacion">Auxiliar Esterilizaci�n</option>
												<option value="Secretaria">Secretaria</option>
												<option value="Recepcionista">Recepcionista</option>
												<option value="Portero(a)">Portero(a)</option>
												<option value="Mantenimiento">Mantenimiento</option>
												<option value="Aseador(a)">Aseador(a)</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el �rea de desempe�o del tabajador">�rea de Desempe�o</label>
											<select name="area_d" title="Por favor elija el �rea de desempe�o del tabajador" required>
												<option value=""></option>
												<option value="Direccion">Direcci�n</option>
												<option value="Administracion">Administraci�n</option>
												<option value="Fisiatria">Fisiatria</option>
												<option value="Odontologia">Odontologia</option>
												<option value="Recepcion">Recepci�n</option>
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
											<label for="libreta_militr" class='rotulo' title="Por favor ingrese el n�mero de la libreta militar">Libreta Militar</label>
											<input type="text" name="libreta_militr" id="libreta_militr" title="Por favor ingrese el n�mero de la libreta militar" required />
										</div>
										<div class='campo'>
											<label for="pasaporte" class='rotulo' title="Por favor ingrese los datos del pasaporte">Pasaporte</label>
											<input type="text" name="pasaporte" id="pasaporte" title="Por favor ingrese el n�mero de pasaporte" required />
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
											<select name="anonac" id="anonac" title="Seleccione el a�o de nacimiento del trabajador" required>
												<option></option>
												<?php for($i=date('o'); $i>=1950; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="telefono" class='rotulo' title="Por favor ingrese el n�mero telef�nico del trabajador con formato 0000-0000000">Tel�fono</label>
											<input name="telefono" type="text" id="telefono" title="Por favor ingrese el n�mero telef�nico del trabajador con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label for="telefono_em" class='rotulo' title="Por favor ingrese un n�mero telef�nico para caso de emergencia, con formato 0000-0000000">Tel�fono Emergencia</label>
											<input name="telefono_em" type="text" id="telefono_em" title="Por favor ingrese un n�mero telef�nico para caso de emergencia, con formato 0000-0000000" size="20" maxlength="12"  required />
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
											<select name="anoing" id="anoing" title="Seleccione el a�o de ingreso a la clinica" required>
												<option></option>
												<?php for($i=date('o'); $i>=1980; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
											</select>
										</div>
										<div class='campo'>
											<label for="resolucion" class='rotulo' title="Por favor ingrese el n�mero de resolucion">Resoluci�n</label>
											<input type="text" name="resolucion" id="resolucion" title="Por favor ingrese el n�mero de resolucion" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la ley bajo la cual esta amparado el tabajador">Amparado Bajo</label>
											<select name="ley" title="Por favor elija la ley bajo la cual esta amparado el tabajador" required>
												<option value=""></option>
												<option value="LOTTT" title="Ley Org�nica del Trabajo, los Trabajadores y Trabajadoras">LOTTT</option>
												<option value="LEFP" title="Ley del Estatuto de la Funci�n P�blica">LEFP</option>
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
													<label class='rotulo' for="sheepItForm_#index#cedula" title="Por favor ingrese el n�mero de c�dula del familiar del trabajador">C�dula</label>
													<input id='sheepItForm_#index#cedula' name='cedula_fam[#index#]' type='text' title="Por favor ingrese el n�mero de c�dula del familiar del trabajador" required />
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
														<option value="1">De la instituci�n</option>
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
													<select name="anonac_fam[#index#]" id="sheepItForm_#index#anonac_fam" title="Por favor elija el a�o de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php for($i=date('o'); $i>=1950; $i--) echo '<option value='.$i.'>'.$i.'</option>'; ?>
													</select>
												</div>
												<div class='campo'>
													<label class='rotulo' title="Por favor indique si el familiar del trabajador estudia">Estudia</label>
													<input type="radio" name="estudia_fam[#index#]" value="1" id="sheepItForm_#index#estudia_s" title="Si estudia" />
													<label for="sheepItForm_#index#estudia_s" title="Si estudia" class="rotulo_r">Si</label>
													<input type="radio" name="estudia_fam[#index#]" value="0" id="sheepItForm_#index#estudia_n" title="No estudia" />
													<label for="sheepItForm_#index#estudia_n" title="No estudia" class="rotulo_r">No</label>
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
									<legend>Educaci�n</legend>
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
											<label class='rotulo' for="ano" title="Por favor ingrese el a�o de graduaci�n del trabajador">A�o</label>
											<input type="text" name="ano" id="ano" title="Por favor ingrese el a�o de graduaci�n del trabajador" required />
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
									<legend>Documentaci�n Personal</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno partida de nacimiento">Partida de nacimiento</label>
											<input type="radio" name="part_nac" value="1" id="part_nac_si" title="Si consigno partida de nacimiento" />
											<label for="part_nac_si" title="Si consigno partida de nacimiento" class="rotulo_r">Si</label>
											<input type="radio" name="part_nac" value="0" id="part_nac_no" title="No consigno partida de nacimineto" />
											<label for="part_nac_no" title="No consigno partida de nacimiento" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno inscripci�n militar">Inscripci�n Militar</label>
											<input type="radio" name="ins_milt" value="1" id="ins_milt_si" title="Si consigno inscripci�n militar" />
											<label for="ins_milt_si" title="Si consigno inscripci�n militar" class="rotulo_r">Si</label>
											<input type="radio" name="ins_milt" value="0" id="ins_milt_no" title="No consigno inscripci�n militar" />
											<label for="ins_milt_no" title="No consigno inscripci�n militar" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno c�dula de identidad">C�dula de Identidad</label>
											<input type="radio" name="ced_iden" value="1" id="ced_iden_si" title="Si consigno c�dula de identidad" />
											<label for="ced_iden_si" title="Si consigno c�dula de identidad" class="rotulo_r">Si</label>
											<input type="radio" name="ced_iden" value="0" id="ced_iden_no" title="No consigno c�dula de identidad" />
											<label for="ced_iden_no" title="No consigno c�dula de identidad" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno RIF">RIF</label>
											<input type="radio" name="rif" value="1" id="rif_si" title="Si consigno RIF" />
											<label for="rif_si" title="Si consigno RIF" class="rotulo_r">Si</label>
											<input type="radio" name="rif" value="0" id="rif_no" title="No consigno RIF" />
											<label for="rif_no" title="No consigno RIF" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno declaraci�n jurada">Declaraci�n Jurada</label>
											<input type="radio" name="dec_jur" value="1" id="dec_jur_si" title="Si consigno declaraci�n jurada" />
											<label for="dec_jur_si" title="Si consigno declaraci�n jurada" class="rotulo_r">Si</label>
											<input type="radio" name="dec_jur" value="0" id="dec_jur_no" title="No consigno declaraci�n jurada" />
											<label for="dec_jur_no" title="No consigno declaraci�n jurada" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno informe medico">Informe Medico</label>
											<input type="radio" name="inf_med" value="1" id="inf_med_si" title="Si consigno informe medico" />
											<label for="inf_med_si" title="Si consigno informe medico" class="rotulo_r">Si</label>
											<input type="radio" name="inf_med" value="0" id="inf_med_no" title="No consigno informe medico" />
											<label for="inf_med_no" title="No consigno informe medico" class="rotulo_r">No</label>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno partida de nacimiento de hijos">Partida de Nacimiento de Hijos</label>
											<input type="radio" name="part_nac_h" value="1" id="part_nac_h_si" title="Si consigno partida de nacimiento de hijos" />
											<label for="part_nac_h_si" title="Si consigno partida de nacimiento de hijos" class="rotulo_r">Si</label>
											<input type="radio" name="part_nac_h" value="0" id="part_nac_h_no" title="No consigno partida de nacimiento de hijos" />
											<label for="part_nac_h_no" title="No consigno partida de nacimiento de hijos" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno acta de matrimonio y/o divorcio">Acta de Matrimonio y/o Divorcio</label>
											<input type="radio" name="matr_divr" value="1" id="matr_divr_si" title="Si consigno acta de matrimonio y/o divorcio" />
											<label for="matr_divr_si" title="Si consigno acta de matrimonio y/o divorcio" class="rotulo_r">Si</label>
											<input type="radio" name="matr_divr" value="0" id="matr_divr_no" title="No consigno acta de matrimonio y/o divorcio" />
											<label for="matr_divr_no" title="No consigno acta de matrimonio y/o divorcio" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno defunciones">Defunciones</label>
											<input type="radio" name="defunc" value="1" id="defunc_si" title="Si consigno defunciones" />
											<label for="defunc_si" title="Si consigno defunciones" class="rotulo_r">Si</label>
											<input type="radio" name="defunc" value="0" id="defunc_no" title="No consigno defunciones" />
											<label for="defunc_no" title="No consigno defunciones" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno titulos">Titulos</label>
											<input type="radio" name="titul" value="1" id="titul_si" title="Si consigno titulos" />
											<label for="titul_si" title="Si consigno titulos" class="rotulo_r">Si</label>
											<input type="radio" name="titul" value="0" id="titul_no" title="No consigno titulos" />
											<label for="titul_no" title="No consigno titulos" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno certificados">Certificados</label>
											<input type="radio" name="certf" value="1" id="certf_si" title="Si consigno certificados" />
											<label for="certf_si" title="Si consigno certificados" class="rotulo_r">Si</label>
											<input type="radio" name="certf" value="0" id="certf_no" title="No consigno certificados" />
											<label for="certf_no" title="No consigno certificados" class="rotulo_r">No</label>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno constancias y horarios de estudios">Constancias y Horarios de Estudios</label>
											<input type="radio" name="const_hora" value="1" id="const_hora_si" title="Si consigno constancias y horarios de estudios" />
											<label for="const_hora_si" title="Si consigno constancias y horarios de estudios" class="rotulo_r">Si</label>
											<input type="radio" name="const_hora" value="0" id="const_hora_no" title="No consigno constancias y horarios de estudios" />
											<label for="const_hora_no" title="No consigno constancias y horarios de estudios" class="rotulo_r">No</label>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Referencias Personales</legend>
									<div class='division'>
										<h3>Referencia n�mero 1</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp_1" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_1" id="nombre_rp_1" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_1" title="Por favor ingrese la c�dula de identidad">C�dula</label>
											<input type="text" name="cedula_rp_1" id="cedula_rp_1" title="Por favor ingrese la c�dula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_1" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000">Tel�fono</label>
											<input name="telefono_rp_1" type="text" id="telefono_rp_1" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_1" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_1" id="apellido_rp_1" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_1" title="Por favor ingrese la ocupaci�n">Ocupaci�n</label>
											<input type="text" name="ocupacion_rp_1" id="ocupacion_rp_1" title="Por favor ingrese la ocupaci�n" required />
										</div>
									</div>
									<div class='division'>
										<h3>Referencia n�mero 2</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_2" id="nombre_rp" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_2" title="Por favor ingrese la c�dula de identidad">C�dula</label>
											<input type="text" name="cedula_rp_2" id="cedula_rp_2" title="Por favor ingrese la c�dula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_2" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000">Tel�fono</label>
											<input name="telefono_rp_2" type="text" id="telefono_rp_2" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_2" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_2" id="apellido_rp_2" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_2" title="Por favor ingrese la ocupaci�n">Ocupaci�n</label>
											<input type="text" name="ocupacion_rp_2" id="ocupacion_rp_2" title="Por favor ingrese la ocupaci�n" required />
										</div>
									</div>
									<div class='division'>
										<h3>Referencia n�mero 3</h3>
									</div>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo' for="nombre_rp_3" title="Por favor ingrese el nombre completo">Nombres</label>
											<input type="text" name="nombre_rp_3" id="nombre_rp_3" title="Por favor ingrese el nombre completo" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="cedula_rp_3" title="Por favor ingrese la c�dula de identidad">C�dula</label>
											<input type="text" name="cedula_rp_3" id="cedula_rp_3" title="Por favor ingrese la c�dula de identidad" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="telefono_rp_3" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000">Tel�fono</label>
											<input name="telefono_rp_3" type="text" id="telefono_rp_3" title="Por favor ingrese el n�mero telef�nico con formato 0000-0000000" size="20" maxlength="12" required />
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="apellido_rp_3" title="Por favor ingrese los apellidos">Apellidos</label>
											<input type="text" name="apellido_rp_3" id="apellido_rp_3" title="Por favor ingrese los apellidos" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ocupacion_rp_3" title="Por favor ingrese la ocupaci�n">Ocupaci�n</label>
											<input type="text" name="ocupacion_rp_3" id="ocupacion_rp_3" title="Por favor ingrese la ocupaci�n" required />
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