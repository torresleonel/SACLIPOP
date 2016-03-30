<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link http-equiv="Content-language" content="es" refresh="8" />
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
					<?php include('../_menu/menu_trabj.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$resultado = conslt_completa_trb($cnx_bd);
					$familia = conslt_familia($cnx_bd);
					$referencia = conslt_referencia($cnx_bd);
					$cnx_bd->close();
					$fila = $resultado->fetch_object();
					list($a,$m,$d) = explode("-",$fila->actualizado);
					list($an,$mn,$dn) = explode("-",$fila->fe_nac);
					list($ai,$mi,$di) = explode("-",$fila->fecha_ingreso);
					if ($fila->estudia == 0) $estud = 'No'; else $estud = 'Si';
					if ($fila->partida_naci == 0) $prtnac = 'No'; else $prtnac = 'Si';
					if ($fila->inscrip_militar == 0) $insmil = 'No'; else $insmil = 'Si';
					if ($fila->cedula_ident == 0) $ced = 'No'; else $ced = 'Si';
					if ($fila->rif == 0) $rif = 'No'; else $rif = 'Si';
					if ($fila->declaracion_jurada == 0) $decjur = 'No'; else $decjur = 'Si';
					if ($fila->informe_medico == 0) $infmed = 'No'; else $infmed = 'Si';
					if ($fila->parti_nac_h == 0) $prtnach = 'No'; else $prtnach = 'Si';
					if ($fila->acta_mat_div == 0) $matdiv = 'No'; else $matdiv = 'Si';
					if ($fila->defunciones == 0) $defu = 'No'; else $defu = 'Si';
					if ($fila->titulos == 0) $tit = 'No'; else $tit = 'Si';
					if ($fila->certificados == 0) $cert = 'No'; else $cert = 'Si';
					if ($fila->const_hor_est == 0) $che = 'No'; else $che = 'Si';
				?>
				<div id="content">
					<h1>Detalles del Personal</h1>
					<h4>Ultima Actualización: <?=$d.'-'.$m.'-'.$a; ?></h4>
					<div id="wrapper">
						<div id="navigation">
							<ul>
								<li class="selected" title="Datos personales del trabajador">
									<a href="#">Datos Personales</a>
								</li>
								<li title="Ingresar datos laborales del trabajador">
									<a href="#">Laboral</a>
								</li>
								<li title="Datos familiares del trabajador">
									<a href="#">Familia</a>
								</li>
								<li title="Datos de estudios del trabajador">
									<a href="#">Estudios</a>
								</li>
								<li title="Documentación consignada por el trabajador">
									<a href="#">Documentos</a>
								</li>
								<li title="Referencias personales del trabajador">
									<a href="#">Referencias</a>
								</li>
								<li title="Datos sobre otras categorias del trabajador">
									<a href="#">Otros</a>
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
											<span class="text_cons"><?=$fila->nombre?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Cédula</label>
											<span class="text_cons"><?=$fila->cedula?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Nacionalidad</label>
											<span class="text_cons"><?=$fila->ciudadania?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Estudia</label>
											<span class="text_cons"><?=$estud?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Dirección</label>
											<span class="text_cons"><?=$fila->direccion?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Estado Civil</label>
											<span class="text_cons"><?=$fila->est_civil?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Nombre del Conyugue</label>
											<span class="text_cons"><?=$fila->nconyugue?></span>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo'>Apellidos</label>
											<span class="text_cons"><?=$fila->apellido?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Libreta Militar</label>
											<span class="text_cons"><?=$fila->libreta_militr?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Pasaporte</label>
											<span class="text_cons"><?=$fila->pasaporte?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Lugar de Nacimiento</label>
											<span class="text_cons"><?=$fila->lug_nac?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Fecha de Nacimiento</label>
											<span class="text_cons"><?=$dn.'-'.$mn.'-'.$an?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Teléfono</label>
											<span class="text_cons"><?=$fila->telefono?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Teléfono Emergencia</label>
											<span class="text_cons"><?=$fila->telefono_em?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Datos Laborales</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo'>Rango</label>
											<span class="text_cons"><?=$fila->rango?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Condición Laboral</label>
											<span class="text_cons"><?=$fila->condicion?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Cargo</label>
											<span class="text_cons"><?=$fila->cargo?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Área de Desempeño</label>
											<span class="text_cons"><?=$fila->area_desemp?></span>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo'>Fecha de Ingreso</label>
											<span class="text_cons"><?=$di.'-'.$mi.'-'.$ai?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Resolución</label>
											<span class="text_cons"><?=$fila->resolucion?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Amparado Bajo</label>
											<span class="text_cons"><?=$fila->ley?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Familia</legend>
									<div id='sheepItForm'>
										<div id='sheepItForm_template'>
											<?php 
												$num_filas_f = $familia->num_rows;
												if ($num_filas_f != 0) {
													while ($fila_f = $familia->fetch_object()) {
														if ($fila_f->empleadof == 0) $empf = 'No'; elseif ($fila_f->empleadof == 1) $empf = 'De la institución'; else $empf = 'De la alcaldia';
														if ($fila_f->estudiaf == 0) $estf = 'No'; else $estf = 'Si';
														list($af,$mf,$df) = explode("-",$fila_f->fecha_nacf);
														$A_actual= date("Y");
														$M_actual = date("n");
														$D_actual = date("j");
														$edad = $A_actual-$af;
														if($mf > $M_actual) {
															$edad = $edad-1;
														}else if($mf == $M_actual) {
															if($df > $D_actual) {
																$edad = $edad-1;					
															}
														}
											?>
														<div class='division'>
															<h3>Datos Basicos del Familiar</h3>
														</div>
														<div class='derecha'>
															<div class='campo'>
																<label class='rotulo'>Nombres</label>
																<span class="text_cons"><?=$fila_f->nombref?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Cédula</label>
																<span class="text_cons"><?=$fila_f->cedulaf?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Parentesco</label>
																<span class="text_cons"><?=$fila_f->parentescof?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Empleado</label>
																<span class="text_cons"><?=$empf?></span>
															</div>
														</div>
														<div class='izquierda'>
															<div class='campo'>
																<label class='rotulo'>Apellidos</label>
																<span class="text_cons"><?=$fila_f->apellidof?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Fecha de Nacimiento</label>
																<span class="text_cons"><?=$df.'-'.$mf.'-'.$af?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Edad</label>
																<span class="text_cons"><?=$edad?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Estudia</label>
																<span class="text_cons"><?=$estf?></span>
															</div>
															<div class='campo'>
																<label class='rotulo'>Cargo</label>
																<span class="text_cons"><?=$fila_f->cargof?></span>
															</div>
														</div>
											<?php 
													}
												}else{
													echo '
														<div id="sheepItForm_noforms_template" class="no_familiar">
															<h3>Ningun familiar registrado</h3>
														</div>';
												}
											?>
								</fieldset>
								<fieldset class="step">
									<legend>Educación</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo'>Estudios</label>
											<span class="text_cons"><?=$fila->estudios?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Lugar de Estudio</label>
											<span class="text_cons"><?=$fila->lugar_estudio?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Año</label>
											<span class="text_cons"><?=$fila->anno?></span>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo'>Titulo Obtenido</label>
											<span class="text_cons"><?=$fila->titulo?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Observaciones</label>
											<span class="text_cons"><?=$fila->observacion?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Documentación Personal</legend>
									<div class='derecha'>
										<div class='campo'>
											<label class='rotulo'>Partida de nacimiento</label>
											<span class="text_cons"><?=$prtnac?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Inscripción Militar</label>
											<span class="text_cons"><?=$insmil?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Cédula de Identidad</label>
											<span class="text_cons"><?=$ced?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>RIF</label>
											<span class="text_cons"><?=$rif?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Declaración Jurada</label>
											<span class="text_cons"><?=$decjur?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Informe Medico</label>
											<span class="text_cons"><?=$infmed?></span>
										</div>
									</div>
									<div class='izquierda'>
										<div class='campo'>
											<label class='rotulo'>Partida de Nacimiento de Hijos</label>
											<span class="text_cons"><?=$prtnach?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Acta de Matrimonio y/o Divorcio</label>
											<span class="text_cons"><?=$matdiv?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Defunciones</label>
											<span class="text_cons"><?=$defu?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Titulos</label>
											<span class="text_cons"><?=$tit?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Certificados</label>
											<span class="text_cons"><?=$cert?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Constancias y Horarios de Estudios</label>
											<span class="text_cons"><?=$che?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<legend>Referencias Personales</legend>
									<?php
										$i = 1;
										while ($fila_r = $referencia-> fetch_object()) {
									?>
											<div class='division'>
												<h3>Referencia número <?=$i++?></h3>
											</div>
											<div class='derecha'>
												<div class='campo'>
													<label class='rotulo'>Nombres</label>
													<span class="text_cons"><?=$fila_r->nombre_rp?></span>
												</div>
												<div class='campo'>
													<label class='rotulo'>Cédula</label>
													<span class="text_cons"><?=$fila_r->cedula_rp?></span>
												</div>
												<div class='campo'>
													<label class='rotulo'>Teléfono</label>
													<span class="text_cons"><?=$fila_r->telefono_rp?></span>
												</div>
											</div>
											<div class='izquierda'>
												<div class='campo'>
													<label class='rotulo'>Apellidos</label>
													<span class="text_cons"><?=$fila_r->apellido_rp?></span>
												</div>
												<div class='campo'>
													<label class='rotulo'>Ocupación</label>
													<span class="text_cons"><?=$fila_r->ocupacion_rp?></span>
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
											<label class='rotulo'>Talla Camisa</label>
											<span class="text_cons"><?=$fila->camisa?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Talla Pantalon</label>
											<span class="text_cons"><?=$fila->pantalon?></span>
										</div>
										<div class='campo'>
											<label class='rotulo'>Talla Calzado</label>
											<span class="text_cons"><?=$fila->calzado?></span>
										</div>
									</div>
								</fieldset>
								<fieldset class="step">
									<?php
										$resultado->free();
										$familia->free();
										$referencia->free();
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