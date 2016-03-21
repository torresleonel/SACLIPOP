<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../../js/jquery.mask.js"></script>
		<script type="text/javascript" src="../../js/sliding.form.js"></script>
		<script type="text/javascript" src="../../js/sheepIt.js"></script>
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_modf_trabj.js"></script>
		<script type="text/javascript">  
	       
			$(document).ready(function() {
				$('.tlf_formato').mask('9999-9999999');
				var sheepItForm = $('#sheepItForm').sheepIt({
					separator: '',
					allowRemoveLast: true,
					allowRemoveCurrent: true,
					allowRemoveAll: true,
					allowAdd: true,
					allowAddN: true,
					maxFormsCount: 0,
					minFormsCount: 0,
					iniFormsCount: 0,
					removeLastConfirmation: false,
					removeCurrentConfirmation: true,
					removeAllConfirmation: true,
					removeLastConfirmationMsg: '¿Está seguro que desea eliminar el familiar?',
					removeCurrentConfirmationMsg: '¿Está seguro que desea eliminar el familiar?',
					removeAllConfirmationMsg: '¿Está seguro que desea eliminar el familiar?',
					<?php
						/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
						include('../_conexion/conexion_funcion.php');
						$cnx_bd = conexion();
						include('../_sql/conslt_trabj_sql.php');
						$familia = conslt_familia($cnx_bd);
						$cont_fam=0;
						WHILE($fila_f = $familia->fetch_object()){
							$RES4[$cont_fam]['fecha_nacf']=$fila_f->fecha_nacf;
							$RES4[$cont_fam]['empleadof']=$fila_f->empleadof;
							$RES4[$cont_fam]['estudiaf']=$fila_f->estudiaf;
							if($cont_fam==0) echo "data: [";
							echo "
								{
									'sheepItForm_#index#nombre': '$fila_f->nombref',
									'sheepItForm_#index#apellido': '$fila_f->apellidof',
									'sheepItForm_#index#cedula': '$fila_f->cedulaf',
									'sheepItForm_#index#parentesco': '$fila_f->parentescof',
									'sheepItForm_#index#cargo': '$fila_f->cargof',
								},
							";
							$cont_fam++;
						}
						if($cont_fam!=0) echo "]";
					?>
				});
			});
		</script>
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
				<?php
					$resultado = conslt_completa_trb($cnx_bd);
					$referencia = conslt_referencia($cnx_bd);
					$cnx_bd->close();
					$fila = $resultado->fetch_object();
					list($a,$m,$d) = explode("-",$fila->actualizado);
					list($an,$mn,$dn) = explode("-",$fila->fe_nac);
					list($ai,$mi,$di) = explode("-",$fila->fecha_ingreso);
					if($cont_fam!=0){
						for($i=0;$i<$cont_fam;$i++){
							$fecha_nac_temp=$RES4[$i]['fecha_nacf'];
							list($ano_temp,$mes_temp,$dia_temp) = explode("-",$fecha_nac_temp);
							$ano_temp=(int) $ano_temp;
							$mes_temp=(int) $mes_temp;
							$dia_temp=(int) $dia_temp;
							$perte_temp=$RES4[$i]['empleadof'];
							$est_temp=$RES4[$i]['estudiaf'];

							echo "
								<script type='text/javascript'>  

								$(document).ready(function() {
								var dianac_fam = '#sheepItForm_'+$i+'dianac_fam';
								var mesnac_fam = '#sheepItForm_'+$i+'mesnac_fam';
								var anonac_fam = '#sheepItForm_'+$i+'anonac_fam';
								var estudia = '#sheepItForm_'+$i+'estudia';
								var empleado = '#sheepItForm_'+$i+'empl_fam';

								
								$(dianac_fam).val('$dia_temp');
								$(mesnac_fam).val('$mes_temp');
								$(anonac_fam).val('$ano_temp');
								$(estudia).val('$est_temp');
								$(empleado).val('$perte_temp');

								});	
								</script>";
						}
					}
				?>
				<div id="content">
					<h1>Modificar Personal</h1>
					<h4>Ultima Actualización: <?php echo $d.'-'.$m.'-'.$a; ?></h4>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected" title="Ingresar datos personales del trabajador">
									<a href="#">Datos Personales</a>
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
							<form id="formElem" name="formElem" action="modf_trabj_b.php" method="post">
								<fieldset class="step">
									<legend>Datos Personales</legend>
									<p>
		                                <label class='rotulo' for="Estado">Estado</label>
										<select name="estado" id='estado' required>
											<option value="1" <?php if($fila->estado == 1) echo 'selected="selected"'; ?>>Activo</option>
											<option value="0" <?php if($fila->estado == 0) echo 'selected="selected"'; ?>>Inactivo</option>
										</select>
										<?php 
											if($fila->estado == 1) $sty = 'activo';
											else $sty = 'inactivo';
										?>
											<span id="color" class="<?php echo $sty; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>
		                            </p>
									<div class='derecha'>
										<div class='campo'>
											<label for="nombre" class='rotulo' title="Por favor ingrese el nombre completo del trabajador">Nombres</label>
											<input type="text" name="nombre" value="<?php echo $fila->nombre; ?>" id="nombre" title="Por favor ingrese el nombre completo del trabajador" required />
										</div>
										<div class='campo'>
											<label for="cedula" class='rotulo' title="Por favor ingrese la cédula de identidad del trabajador">Cédula</label>
											<input type="text" name="cedula" value="<?php echo $fila->cedula; ?>" id="cedula" title="Por favor ingrese la cédula de identidad del trabajador" required />
											<input type="hidden" name="cedula_o" value="<?=$fila->cedula?>" />
										</div>
										<div class='campo'>
											<label class='rotulo' for="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador">Nacionalidad</label>
											<input type="text" name="nacionalidad" value="<?php echo $fila->ciudadania; ?>" id="nacionalidad" title="Por favor ingrese la nacionalidad del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador estudia">Estudia</label>
											<select name="estudia_t" title="Por favor indique si el trabajador estudia" required>
												<option value=""></option>
												<option value="1" <?php if($fila->estudia == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->estudia == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label for="direccion" class='rotulo' title="Por favor ingrese la dirección de habitación del tabajador">Dirección</label>
											<textarea name="direccion" id="direccion" title="Por favor ingrese la dirección de habitación del tabajador" required><?php echo $fila->direccion; ?></textarea>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el estado civil del tabajador">Estado Civil</label>
											<select name="est_civil" title="Por favor elija el estado civil del tabajador" required>
												<option value=""></option>
												<option value="Soltero" <?php if($fila->est_civil == 'Soltero') echo 'selected="selected"'; ?>>Soltero</option>
												<option value="Casado" <?php if($fila->est_civil == 'Casado') echo 'selected="selected"'; ?>>Casado</option>
												<option value="Divorsiado" <?php if($fila->est_civil == 'Divorsiado') echo 'selected="selected"'; ?>>Divorsiado</option>
												<option value="Viudo" <?php if($fila->est_civil == 'Viudo') echo 'selected="selected"'; ?>>Viudo</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el rango laboral del tabajador">Rango</label>
											<select name="rango" title="Por favor elija el rango laboral del tabajador" required>
												<option value=""></option>
												<option value="Personal de Alto Nivel" <?php if($fila->rango == 'Personal de Alto Nivel') echo 'selected="selected"'; ?>>Personal de Alto Nivel</option>
												<option value="Personal Empleado" <?php if($fila->rango == 'Personal Empleado') echo 'selected="selected"'; ?>>Personal Empleado</option>
												<option value="Personal Obrero" <?php if($fila->rango == 'Personal Obrero') echo 'selected="selected"'; ?>>Personal Obrero</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la condición laboral del tabajador">Condición Laboral</label>
											<select name="condicion" title="Por favor elija la condición laboral del tabajador" required>
												<option value=""></option>
												<option value="Fijo" <?php if($fila->condicion == 'Fijo') echo 'selected="selected"'; ?>>Fijo</option>
												<option value="Contratado" <?php if($fila->condicion == 'Contratado') echo 'selected="selected"'; ?>>Contratado</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor ingrese el cargo del trabajador">Cargo</label>
											<select name="cargo" title="Por favor ingrese el cargo del trabajador" required>
												<option value=""></option>
												<option value="Director(a)" <?php if($fila->cargo == 'Director(a)') echo 'selected="selected"'; ?>>Director(a)</option>
												<option value="Administrador(a)" <?php if($fila->cargo == 'Administrador(a)') echo 'selected="selected"'; ?>>Administrador(a)</option>
												<option value="Coordinador(a)" <?php if($fila->cargo == 'Coordinador(a)') echo 'selected="selected"'; ?>>Coordinador(a)</option>
												<option value="Fisioterapeuta" <?php if($fila->cargo == 'Fisioterapeuta') echo 'selected="selected"'; ?>>Fisioterapeuta</option>
												<option value="Medico Fisiatra" <?php if($fila->cargo == 'Medico Fisiatra') echo 'selected="selected"'; ?>>Medico Fisiatra</option>
												<option value="Auxiliar Fisioterapeuta" <?php if($fila->cargo == 'Auxiliar Fisioterapeuta') echo 'selected="selected"'; ?>>Auxiliar Fisioterapeuta</option>
												<option value="Auxiliar Esterilizacion" <?php if($fila->cargo == 'Auxiliar Esterilizacion') echo 'selected="selected"'; ?>>Auxiliar Esterilización</option>
												<option value="Secretaria" <?php if($fila->cargo == 'Secretaria') echo 'selected="selected"'; ?>>Secretaria</option>
												<option value="Recepcionista" <?php if($fila->cargo == 'Recepcionista') echo 'selected="selected"'; ?>>Recepcionista</option>
												<option value="Portero(a)" <?php if($fila->cargo == 'Portero(a)') echo 'selected="selected"'; ?>>Portero(a)</option>
												<option value="Mantenimiento" <?php if($fila->cargo == 'Mantenimiento') echo 'selected="selected"'; ?>>Mantenimiento</option>
												<option value="Aseador(a)" <?php if($fila->cargo == 'Aseador(a)') echo 'selected="selected"'; ?>>Aseador(a)</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija el área de desempeño del tabajador">Área de Desempeño</label>
											<select name="area_d" title="Por favor elija el área de desempeño del tabajador" required>
												<option value=""></option>
												<option value="Direccion" <?php if($fila->area_desemp == 'Direccion') echo 'selected="selected"'; ?>>Dirección</option>
												<option value="Administracion" <?php if($fila->area_desemp == 'Administracion') echo 'selected="selected"'; ?>>Administración</option>
												<option value="Fisiatria" <?php if($fila->area_desemp == 'Fisiatria') echo 'selected="selected"'; ?>>Fisiatria</option>
												<option value="Odontologia" <?php if($fila->area_desemp == 'Odontologia') echo 'selected="selected"'; ?>>Odontologia</option>
												<option value="Recepcion" <?php if($fila->area_desemp == 'Recepcion') echo 'selected="selected"'; ?>>Recepción</option>
												<option value="Mantenimiento" <?php if($fila->area_desemp == 'Mantenimiento') echo 'selected="selected"'; ?>>Mantenimiento</option>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label for="apellido" class='rotulo' title="Por favor ingrese los apellidos del trabajador">Apellidos</label>
											<input type="text" name="apellido" value="<?php echo $fila->apellido; ?>" id="apellido" title="Por favor ingrese los apellidos del trabajador" required />
										</div>
										<div class='campo'>
											<label for="libreta_militr" class='rotulo' title="Por favor ingrese el número de la libreta militar">Libreta Militar</label>
											<input type="text" name="libreta_militr" value="<?php echo $fila->libreta_militr; ?>" id="libreta_militr" title="Por favor ingrese el número de la libreta militar" required />
										</div>
										<div class='campo'>
											<label for="pasaporte" class='rotulo' title="Por favor ingrese los datos del pasaporte">Pasaporte</label>
											<input type="text" name="pasaporte" value="<?php echo $fila->pasaporte; ?>" id="pasaporte" title="Por favor ingrese el número de pasaporte" required />
										</div>
										<div class='campo'>
											<label for="lug_nac" class='rotulo' title="Por favor ingrese el lugar de nacimiento del trabajador">Lugar de Nacimiento</label>
											<input type="text" name="lug_nac" value="<?php echo $fila->lug_nac; ?>" id="lug_nac" title="Por favor ingrese el lugar de nacimiento del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor ingrese la fecha de nacimiento del trabajador">Fecha de Nacimiento</label>
											<select name="dianac" id="dianac" title="Seleccione el dia de nacimiento del trabajador" >
												<option></option>
												<?php 
													for($i=1;$i<=31;$i++){
														echo "<option value='".$i."'"; 
								                        if($dn == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$i."</option>";
													}
												?>
											</select>
											<select name="mesnac" id="mesnac" title="Seleccione el mes de nacimiento del trabajador" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++){
														echo "<option value='".$i."'"; 
								                        if($mn == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$meses[$i]."</option>";
													}
												?>
											</select>
											<select name="anonac" id="anonac" title="Seleccione el año de nacimiento del trabajador" required>
												<option></option>
												<?php 
													for($i=date('o'); $i>=1950; $i--){
														echo "<option value='".$i."'"; 
								                        if($an == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$i."</option>";
													}
												?>
											</select>
										</div>
										<div class='campo'>
											<label for="telefono" class='rotulo' title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000">Teléfono</label>
											<input name="telefono" value="<?php echo $fila->telefono; ?>" type="text" id="telefono" class="tlf_formato" title="Por favor ingrese el número telefónico del trabajador con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label for="telefono_em" class='rotulo' title="Por favor ingrese un número telefónico para caso de emergencia, con formato 0000-0000000">Teléfono Emergencia</label>
											<input name="telefono_em" value="<?php echo $fila->telefono_em; ?>" type="text" id="telefono_em" class="tlf_formato" title="Por favor ingrese un número telefónico para caso de emergencia, con formato 0000-0000000" size="20" maxlength="12"  required />
										</div>
										<div class='campo'>
											<label for="nconyugue" class='rotulo' title="Por favor ingrese el nombre del conyugue">Nombre del Conyugue</label>
											<input type="text" name="nconyugue" value="<?php echo $fila->nconyugue; ?>" id="nconyugue" title="Por favor ingrese el nombre del conyugue" />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la fecha en que ingreso el trabajador a la clinica">Fecha de Ingreso</label>
											<select name="diaing" id="diaing" title="Seleccione el dia de ingreso a la clinica" required>
												<option></option>
												<?php 
													for($i=1;$i<=31;$i++){
														echo "<option value='".$i."'"; 
								                        if($di == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$i."</option>";
													}
												?>
											</select>
											<select name="mesing" id="mesing" title="Seleccione el mes de ingreso a la clinica" required>
												<option></option>
												<?php
													$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
													for($i=1;$i<=12;$i++){
														echo "<option value='".$i."'"; 
								                        if($mi == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$meses[$i]."</option>";
													}
												?>
											</select>
											<select name="anoing" id="anoing" title="Seleccione el año de ingreso a la clinica" required>
												<option></option>
												<?php 
													for($i=date('o'); $i>=1980; $i--){
														echo "<option value='".$i."'"; 
								                        if($ai == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$i."</option>";
													}
												?>
											</select>
										</div>
										<div class='campo'>
											<label for="resolucion" class='rotulo' title="Por favor ingrese el número de resolucion">Resolución</label>
											<input type="text" name="resolucion" value="<?php echo $fila->resolucion; ?>" id="resolucion" title="Por favor ingrese el número de resolucion" required />
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor elija la ley bajo la cual esta amparado el tabajador">Amparado Bajo</label>
											<select name="ley" title="Por favor elija la ley bajo la cual esta amparado el tabajador" required>
												<option value=""></option>
												<option value="LOTTT" <?php if($fila->ley == 'LOTTT') echo 'selected="selected"'; ?> title="Ley Orgánica del Trabajo, los Trabajadores y Trabajadoras">LOTTT</option>
												<option value="LEFP" <?php if($fila->ley == 'LEFP') echo 'selected="selected"'; ?> title="Ley del Estatuto de la Función Pública">LEFP</option>
											</select>
										</div>
									</div>
								</fieldset>
								<!-- FIELDSET PARA DATOS FAMILIARES -->
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
													<select name="empl_fam[#index#]" title="Por favor indique si el familiar del trabajador es empleado de la institucion o la alcaldia" id="sheepItForm_#index#empl_fam" required />
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
															for($i=1;$i<=31;$i++) echo "<option value='$i'>$i</option>";
														?>
													</select>
													<select name="mesnac_fam[#index#]" id="sheepItForm_#index#mesnac_fam" title="Por favor elija el mes de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php
															$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
															for($i=1;$i<=12;$i++) echo "<option value='$i'>$meses[$i]</option>";
														?>
													</select>
													<select name="anonac_fam[#index#]" id="sheepItForm_#index#anonac_fam" title="Por favor elija el año de nacimiento del familiar del trabajador" required>
														<option></option>
														<?php 
															for($i=date('o'); $i>=1900; $i--) echo '<option value="'.$i.'">'.$i.'</option>';
														?>
													</select>
												</div>
												<div class='campo'>
				                                	<label class='rotulo' >Estudia</label>
													<select id='sheepItForm_#index#estudia' name='estudia[#index#]'>
														<option></option>
														<option value='1'>Si</option>
														<option value='0'>No</option>
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
										<div id="sheepItForm_noforms_template" class="no_familiar">
											<h3>Ningun familiar registrado</h3>
										</div>
									</div>
									<!-- Controls -->
									<div id='sheepItForm_controls'>
										<div id='sheepItForm_add' class='botonagregar'>
											<a id="agregar" title="Haga click para agregar los datos del familiar del trabajador"><span>Agregar Familiar</span></a>
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
												<option value="Primaria" <?php if($fila->estudios == 'Primaria') echo 'selected="selected"'; ?>>Primaria</option>
												<option value="Secundaria" <?php if($fila->estudios == 'Secundaria') echo 'selected="selected"'; ?>>Secundaria</option>
												<option value="Universitario" <?php if($fila->estudios == 'Universitario') echo 'selected="selected"'; ?>>Universitario</option>
												<option value="Postgrado" <?php if($fila->estudios == 'Postgrado') echo 'selected="selected"'; ?>>Post/grado</option>
												<option value="Otros" <?php if($fila->estudios == 'Otros') echo 'selected="selected"'; ?>>Otros</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' for="lug_estudio" title="Por favor ingrese el lugar de estudio del trabajador">Lugar de Estudio</label>
											<input type="text" name="lug_estudio" value="<?php echo $fila->lugar_estudio; ?>" id="lug_estudio" title="Por favor ingrese el lugar de estudio del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="ano" title="Por favor ingrese el año de graduación del trabajador">Año</label>
											<select name="ano" id="ano" title="Por favor ingrese el año de graduación del trabajador" required>
												<option></option>
												<?php 
													for($i=date('o'); $i>=1960; $i--){
														echo "<option value='".$i."'"; 
								                        if($fila->anno == $i){ 
								                            echo " selected=\"selected\"";
								                        }
								                        echo ">".$i."</option>";
													}
												?>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' for="titulos" title="Por favor ingrese el titulo obtenido del trabajador">Titulo Obtenido</label>
											<input type="text" name="titulos" value="<?php echo $fila->titulo; ?>" id="titulos" title="Por favor ingrese el titulo obtenido del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="observacion" title="Por favor ingrese el titulo obtenido del trabajador">Observaciones</label>
											<input type="text" name="observacion" value="<?php echo $fila->observacion; ?>" id="observacion" title="Por favor ingrese las observaciones" required />
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
												<option value="1" <?php if($fila->partida_naci == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->partida_naci == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno inscripción militar">Inscripción Militar</label>
											<select name="ins_milt" title="Por favor indique si el trabajador consigno inscripción militar" required>
												<option value=""></option>
												<option value="1" <?php if($fila->inscrip_militar == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->inscrip_militar == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno cédula de identidad">Cédula de Identidad</label>
											<select name="ced_iden" title="Por favor indique si el trabajador consigno cédula de identidad" required>
												<option value=""></option>
												<option value="1" <?php if($fila->cedula_ident == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->cedula_ident == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno RIF">RIF</label>
											<select name="rif" title="Por favor indique si el trabajador consigno RIF" required>
												<option value=""></option>
												<option value="1" <?php if($fila->rif == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->rif == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno declaración jurada">Declaración Jurada</label>
											<select name="dec_jur" title="Por favor indique si el trabajador consigno declaración jurada" required>
												<option value=""></option>
												<option value="1" <?php if($fila->declaracion_jurada == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->declaracion_jurada == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno informe medico">Informe Medico</label>
											<select name="inf_med" title="Por favor indique si el trabajador consigno informe medico" required>
												<option value=""></option>
												<option value="1" <?php if($fila->informe_medico == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->informe_medico == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno partida de nacimiento de hijos">Partida de Nacimiento de Hijos</label>
											<select name="part_nac_h" title="Por favor indique si el trabajador consigno partida de nacimiento de hijos" required>
												<option value=""></option>
												<option value="1" <?php if($fila->parti_nac_h == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->parti_nac_h == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno acta de matrimonio y/o divorcio">Acta de Matrimonio y/o Divorcio</label>
											<select name="matr_divr" title="Por favor indique si el trabajador consigno acta de matrimonio y/o divorcio" required>
												<option value=""></option>
												<option value="1" <?php if($fila->acta_mat_div == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->acta_mat_div == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno defunciones">Defunciones</label>
											<select name="defunc" title="Por favor indique si el trabajador consigno defunciones" required>
												<option value=""></option>
												<option value="1" <?php if($fila->defunciones == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->defunciones == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno titulos">Titulos</label>
											<select name="titul" title="Por favor indique si el trabajador consigno titulos" required>
												<option value=""></option>
												<option value="1" <?php if($fila->titulos == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->titulos == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno certificados">Certificados</label>
											<select name="certf" title="Por favor indique si el trabajador consigno certificados" required>
												<option value=""></option>
												<option value="1" <?php if($fila->certificados == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->certificados == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' title="Por favor indique si el trabajador consigno constancias y horarios de estudios">Constancias y Horarios de Estudios</label>
											<select name="const_hora" title="Por favor indique si el trabajador consigno constancias y horarios de estudios" required>
												<option value=""></option>
												<option value="1" <?php if($fila->const_hor_est == '1') echo 'selected="selected"'; ?>>Si</option>
												<option value="0" <?php if($fila->const_hor_est == '0') echo 'selected="selected"'; ?>>No</option>
											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Referencias Personales</legend>
									<?php
										$i = 0;//variable para determinar número de input
										while ($fila_r = $referencia->fetch_object()) {
									?>
											<div class='division'>
												<h3>Referencia número <?php echo ++$i; ?></h3>
											</div>
											<div class='derecha'>
												<div class='campo'>
													<label class='rotulo' for="nombre_rp_<?=$i?>" title="Por favor ingrese el nombre completo">Nombres</label>
													<input type="text" name="nombre_rp[]" value="<?=$fila_r->nombre_rp?>" id="nombre_rp_<?=$i?>" title="Por favor ingrese el nombre completo" required />
												</div>
												<div class='campo'>
													<label class='rotulo' for="cedula_rp_<?=$i?>" title="Por favor ingrese la cédula de identidad">Cédula</label>
													<input type="text" name="cedula_rp[]" value="<?=$fila_r->cedula_rp?>" id="cedula_rp_<?=$i?>" title="Por favor ingrese la cédula de identidad" required />
												</div>
												<div class='campo'>
													<label class='rotulo' for="telefono_rp_<?=$i?>" title="Por favor ingrese el número telefónico con formato 0000-0000000">Teléfono</label>
													<input type="text" name="telefono_rp[]" value="<?=$fila_r->telefono_rp?>" id="telefono_rp_<?=$i?>" class="tlf_formato" title="Por favor ingrese el número telefónico con formato 0000-0000000" size="20" maxlength="12" required />
												</div>
											</div>
											<div class='izquierda'>
												<div class='campo'>
													<label class='rotulo' for="apellido_rp_<?=$i?>" title="Por favor ingrese los apellidos">Apellidos</label>
													<input type="text" name="apellido_rp[]" value="<?=$fila_r->apellido_rp?>" id="apellido_rp_<?=$i?>" title="Por favor ingrese los apellidos" required />
												</div>
												<div class='campo'>
													<label class='rotulo' for="ocupacion_rp_<?=$i?>" title="Por favor ingrese la ocupación">Ocupación</label>
													<input type="text" name="ocupacion_rp[]" value="<?=$fila_r->ocupacion_rp?>" id="ocupacion_rp_<?=$i?>" title="Por favor ingrese la ocupación" required />
												</div>
											</div>
									<?php
										}
									?>
								</fieldset>
								<fieldset class="step">
									<legend>Otras Categorias</legend>
									<div class='centro'>
										<div class='campo'>
											<label class='rotulo' for="tall_cam" title="Por favor elija la talla de camisa del trabajador">Talla Camisa</label>
											<select name="tall_cam" id="tall_cam" title="Por favor elija la talla de camisa del trabajador" required>
												<option value=""></option>
												<option value="S" <?php if($fila->camisa == 'S') echo 'selected="selected"'; ?>>S</option>
												<option value="M" <?php if($fila->camisa == 'M') echo 'selected="selected"'; ?>>M</option>
												<option value="L" <?php if($fila->camisa == 'L') echo 'selected="selected"'; ?>>L</option>
												<option value="XL" <?php if($fila->camisa == 'XL') echo 'selected="selected"'; ?>>XL</option>
											</select>
										</div>
										<div class='campo'>
											<label class='rotulo' for="tall_pant" title="Por favor ingrese la talla del pantalon del trabajador">Talla Pantalon</label>
											<input type="text" name="tall_pant" value="<?php echo $fila->pantalon; ?>" id="tall_pant" title="Por favor ingrese la talla del pantalon del trabajador" required />
										</div>
										<div class='campo'>
											<label class='rotulo' for="tall_calz" title="Por favor ingrese la talla del calzado del trabajador">Talla Calzado</label>
											<input type="text" name="tall_calz" value="<?php echo $fila->calzado; ?>" id="tall_calz" title="Por favor ingrese la talla del calzado del trabajador" required />
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Guardar</legend>
									<p>Para guardar los datos, debe ingresar todos los datos del formulario correctamente.</p>
									<p class="error" id='errordesact'>
										Por favor, corrija los errores en el formulario
									</p>
									<p class="submit"><button id="registerButton" type="submit" title="Hacer cliclk para registrar las modificaciones de los datos del trabajador en SACLIPOP">Guardar</button></p>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>