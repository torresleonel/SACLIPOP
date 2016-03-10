<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../../css/reporte.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
		<script type="text/javascript" src="../../js/valida_ficha.js"></script>
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
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$resultado = conslt_completa_trb($cnx_bd);
					$familia_depn = conslt_familia_depn($cnx_bd);
					$familia_emp = conslt_familia_emp($cnx_bd);
					$referencia = conslt_referencia($cnx_bd);
					$cnx_bd->close();
					$fila = $resultado->fetch_object();
					list($a,$m,$d) = explode("-",$fila->actualizado);
					list($an,$mn,$dn) = explode("-",$fila->fe_nac);
					list($ai,$mi,$di) = explode("-",$fila->fecha_ingreso);
					if ($fila->estudia == 1) $estudia = 'Si';
					else $estudia = 'No';
				?>
				<div id="ficha">
					<div class="membrete">
					</div>
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td class="foto bor_bot">&nbsp;</td>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td> </td>
							<th colspan="3">FICHA HISTORICA DEL TRABAJDOR</th>
							<td> </td>
							<td> </td>
							<td> </td>
							<td class="bor_top bor_bot">&nbsp;</td>
						</tr>
						<!-- FILA 3 -->
						<tr>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td class="foto bor_top">&nbsp;</td>
						</tr>
						<!-- FILA 4 -->
						<tr>
							<td class="bor_left bor_top" colspan="4"><b>ACTUALIZADO EL:</b> <span class="dato"><?=$d.'-'.nombre_fecha('mes',intval($m)).'-'.$a?></span></td>
							<td colspan="3"><b>FECHA DE INGRESO</b></td>
							<td><b>RESOLUCION N°</b></td>
						</tr>
						<!-- FILA 5 -->
						<tr>
							<td colspan="4" rowspan="2"><b>APELLIDOS Y NOMBRES:</b> <span class="dato"><?=$fila->apellido.' '.$fila->nombre?></span></td>
							<td><b>DIA</b></td>
							<td><b>MES</b></td>
							<td><b>AÑO</b></td>
							<td rowspan="2"><span class="dato"><?=$fila->resolucion?></span></td>
						</tr>
						<!-- FILA 6 -->
						<tr>
							<td><span class="dato"><?=$di?></span></td>
							<td><span class="dato"><?=$mi?></span></td>
							<td><span class="dato"><?=$ai?></span></td>
						</tr>
						<!-- FILA 7 -->
						<tr>
							<td colspan="2"><b>C.I. N°</b> <span class="dato"><?=$fila->cedula?></span></td>
							<td colspan="2"><b>LIBRETA MILITAR N°</b> <span class="dato"><?=$fila->libreta_militr?></span></td>
							<td colspan="3"><b>PASAPORTE N°</b> <span class="dato"><?=$fila->pasaporte?></span></td>
							<td><b>CARGO:</b></td>
						</tr>
						<!-- FILA 8 -->
						<tr>
							<td colspan="3"><b>NACIONALIDAD:</b> <span class="dato"><?=$fila->ciudadania?></span></td>
							<td><b>FECHA DE NACIMIENTO:</b></td>
							<td><b>DIA</b></td>
							<td><b>MES</b></td>
							<td><b>AÑO</b></td>
							<td rowspan="3"><span class="dato"><?=$fila->cargo?></span></td>
						</tr>
						<!-- FILA 9 -->
						<tr>
							<td colspan="3"><b>ESTADO CIVIL:</b> <span class="dato"><?=$fila->est_civil?></span></td>
							<td><b>ESTUDIA:</b> <span class="dato"><?=$estudia?></span></td>
							<td><span class="dato"><?=$dn?></span></td>
							<td><span class="dato"><?=$mn?></span></td>
							<td><span class="dato"><?=$an?></span></td>
						</tr>
						<!-- FILA 10 -->
						<tr>
							<td colspan="3"><b>TELFS:</b> <span class="dato"><?=$fila->telefono?></span></td>
							<td colspan="4"><b>LUGAR DE NACIMIENTO:</b> <span class="dato"><?=$fila->lug_nac?></span></td>
						</tr>
						<!-- FILA 11 -->
						<tr>
							<td colspan="5" rowspan="3"><b>DIRECCION DE HABITACION:</b> <span class="dato"><?=$fila->direccion?></span></td>
							<td colspan="3"><b>EN CASO DE EMERGENCIA LLAMAR</b></td>
						</tr>
						<!-- FILA 12 -->
						<tr>
							<td colspan="3"><span class="dato"><?=$fila-> telefono_em?></span></td>
						</tr>
						<!-- FILA 13 -->
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						<!-- FILA 14 -->
						<tr>
							<td colspan="5"><b>NOMBRE DEL CONYUGUE:</b> <span class="dato"><?=$fila->nconyugue?></span></td>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="13">PERSONAS QUE DEPENDEN DEL EMPLEADO</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td rowspan="2"><b>APELLIDOS Y NOMBRES</b></td>
							<td rowspan="2"><b>PARENTESCO</b></td>
							<td rowspan="2"><b>EDAD</b></td>
							<td rowspan="2"><b>ESTUDIA</b></td>
							<td colspan="3"><b>FECHA DE NACIMIENTO</b></td>
							<td rowspan="2"><b>C.I.N°</b></td>
						</tr>
						<!-- FILA 3 -->
						<tr>
							<td><b>DIA</b></td>
							<td><b>MES</b></td>
							<td><b>AÑO</b></td>
						</tr>
						<?php if ($familia_depn->num_rows == 0) { ?>
								<!-- FILA 4 -->
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<!-- FILA 5 -->
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
						<?php
							}else{
								while ($fila_fam_dep = $familia_depn->fetch_object()) {
									if ($fila_fam_dep->estudiaf == 1) $estudiafd = 'Si';
									else $estudiafd = 'No';
									list($afd,$mfd,$dfd) = explode("-",$fila_fam_dep->fecha_nacf);
									$A_actual = date("Y");
									$M_actual = date("n");
									$D_actual = date("j");
									$edad = $A_actual-$afd;
									if($mfd > $M_actual) {
										$edad = $edad-1;
									}else if($mfd == $M_actual) {
										if($dfd > $D_actual) {
											$edad = $edad-1;					
										}
									}
						?>
									<!-- FILA 4 -->
									<tr>
										<td><span class="dato"><?=$fila_fam_dep->apellidof.' '.$fila_fam_dep->nombref?></span></td>
										<td><span class="dato"><?=$fila_fam_dep->parentescof?></span></td>
										<td><span class="dato"><?=$edad?></span></td>
										<td><span class="dato"><?=$estudiafd?></span></td>
										<td><span class="dato"><?=$dfd?></span></td>
										<td><span class="dato"><?=$mfd?></span></td>
										<td><span class="dato"><?=$afd?></span></td>
										<td><span class="dato"><?=$fila_fam_dep->cedulaf?></span></td>
									</tr>
						<?php
								}
							}
						?>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="4">FAMILIARES EMPLEADOS EN LA ALCALDIA DE CAMPO ELIAS O CLINICA POPULAR "JOSE MARTI"</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td><b>APELLIDOS Y NOMBRES</b></td>
							<td><b>DEPENDENCIA</b></td>
							<td><b>CARGO</b></td>
						</tr>
						<?php if ($familia_emp->num_rows == 0) { ?>
								<!-- FILA 3 -->
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<!-- FILA 4 -->
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
						<?php }else{
								while ($fila_fam_emp = $familia_emp->fetch_object()) {
									if ($fila_fam_emp->empleadof == 1) $dependencia = 'De la institución';
									elseif ($fila_fam_emp->empleadof == 2) $dependencia = 'De la alcaldia';
						?>
									<!-- FILA 3 -->
									<tr>
										<td><span class="dato"><?=$fila_fam_emp->apellidof.' '.$fila_fam_emp->nombref?></span></td>
										<td><span class="dato"><?=$dependencia?></span></td>
										<td><span class="dato"><?=$fila_fam_emp->cargof?></span></td>
									</tr>
						<?php
								}
							}
						?>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="5">EDUCACION</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td><b>ESTUDIOS</b></td>
							<td><b>REALIZADOS EN:</b></td>
							<td><b>AÑOS</b></td>
							<td><b>TITULOS OBTENIDOS</b></td>
							<td><b>OBSERVACIONES</b></td>
						</tr>
						<!-- FILA 3 -->
						<tr>
							<td><b>PRIMARIA</b></td>
							<td><?php if($fila->estudios == 'Primaria') echo '<span class="dato">'.$fila->lugar_estudio.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Primaria') echo '<span class="dato">'.$fila->anno.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Primaria') echo '<span class="dato">'.$fila->titulo.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Primaria') echo '<span class="dato">'.$fila->observacion.'</span>'; else echo '&nbsp;';?></td>
						</tr>
						<!-- FILA 4 -->
						<tr>
							<td><b>SECUNDARIA</b></td>
							<td><?php if($fila->estudios == 'Secundaria') echo '<span class="dato">'.$fila->lugar_estudio.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Secundaria') echo '<span class="dato">'.$fila->anno.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Secundaria') echo '<span class="dato">'.$fila->titulo.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Secundaria') echo '<span class="dato">'.$fila->observacion.'</span>'; else echo '&nbsp;';?></td>
						</tr>
						<!-- FILA 5 -->
						<tr>
							<td><b>UNIVERSITARIO</b></td>
							<td><?php if($fila->estudios == 'Universitario') echo '<span class="dato">'.$fila->lugar_estudio.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Universitario') echo '<span class="dato">'.$fila->anno.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Universitario') echo '<span class="dato">'.$fila->titulo.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Universitario') echo '<span class="dato">'.$fila->observacion.'</span>'; else echo '&nbsp;';?></td>
						</tr>
						<!-- FILA 6 -->
						<tr>
							<td><b>POST/GRADO</b></td>
							<td><?php if($fila->estudios == 'Postgrado') echo '<span class="dato">'.$fila->lugar_estudio.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Postgrado') echo '<span class="dato">'.$fila->anno.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Postgrado') echo '<span class="dato">'.$fila->titulo.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Postgrado') echo '<span class="dato">'.$fila->observacion.'</span>'; else echo '&nbsp;';?></td>
						</tr>
						<!-- FILA 7 -->
						<tr>
							<td><b>OTROS</b></td>
							<td><?php if($fila->estudios == 'Otros') echo '<span class="dato">'.$fila->lugar_estudio.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Otros') echo '<span class="dato">'.$fila->anno.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Otros') echo '<span class="dato">'.$fila->titulo.'</span>'; else echo '&nbsp;';?></td>
							<td><?php if($fila->estudios == 'Otros') echo '<span class="dato">'.$fila->observacion.'</span>'; else echo '&nbsp;';?></td>
						</tr>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="4">DOCUMENTACION PERSONAL</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td><b>TIPO DE DOCUMENTO</b></td>
							<td colspan="2"><b>CONSIGNADO</b></td>
							<td><b>OBSERVACIONES</b></td>
						</tr>
						<!-- FILA 3 -->
						<tr>
							<td><b>PARTIDA DE NACIMIENTO</b></td>
							<td><b>SI</b><?php if ($fila->partida_naci == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->partida_naci == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 4 -->
						<tr>
							<td><b>INSCRIPCION MILITAR</b></td>
							<td><b>SI</b><?php if ($fila->inscrip_militar == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->inscrip_militar == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 5 -->
						<tr>
							<td><b>CEDULA DE IDENTIDAD AMPLIADA</b></td>
							<td><b>SI</b><?php if ($fila->cedula_ident == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->cedula_ident == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 6 -->
						<tr>
							<td><b>RIF</b></td>
							<td><b>SI</b><?php if ($fila->rif == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->rif == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 7 -->
						<tr>
							<td><b>DECLARACION JURADA</b></td>
							<td><b>SI</b><?php if ($fila->declaracion_jurada == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->declaracion_jurada == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 8 -->
						<tr>
							<td><b>INFORME MEDICO actualizado si lo amerita</b></td>
							<td><b>SI</b><?php if ($fila->informe_medico == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->informe_medico == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 9 -->
						<tr>
							<td><b>PARTIDA DE NACIMIENTO DE HIJOS</b></td>
							<td><b>SI</b><?php if ($fila->parti_nac_h == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->parti_nac_h == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 10 -->
						<tr>
							<td><b>ACTA DE MATRIMONIO Y/O DIVORCIO</b></td>
							<td><b>SI</b><?php if ($fila->acta_mat_div == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->acta_mat_div == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 11 -->
						<tr>
							<td><b>DEFUNCIONES</b></td>
							<td><b>SI</b><?php if ($fila->defunciones == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->defunciones == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 12 -->
						<tr>
							<td><b>TITULOS</b></td>
							<td><b>SI</b><?php if ($fila->titulos == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->titulos == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 13 -->
						<tr>
							<td><b>CERTIFICADOS</b></td>
							<td><b>SI</b><?php if ($fila->certificados == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->certificados == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
						<!-- FILA 14 -->
						<tr>
							<td><b>CONSTANCIAS Y HORARIOS DE ESTUDIO</b></td>
							<td><b>SI</b><?php if ($fila->const_hor_est == 1) echo '<span class="dato"> X </span>'; ?></td>
							<td><b>NO</b><?php if ($fila->const_hor_est == 0) echo '<span class="dato"> X </span>'; ?></td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="4">REFERENCIAS PERSONALES (No se aceptan familiares ni empleados)</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td><b>APELLIDOS Y NOMBRES</b></td>
							<td><b>CEDULA DE IDENTIDAD</b></td>
							<td><b>PROFESION/OCUPACION</b></td>
							<td><b>TELEFONO</b></td>
						</tr>
						<!-- FILA 3 -->
						<?php while ($fila_r = $referencia-> fetch_object()) { ?>
							<tr>
								<td><span class="dato"><?=$fila_r->apellido_rp.' '.$fila_r->nombre_rp?></span></td>
								<td><span class="dato"><?=$fila_r->cedula_rp?></span></td>
								<td><span class="dato"><?=$fila_r->ocupacion_rp?></span></td>
								<td><span class="dato"><?=$fila_r->telefono_rp?></span></td>
							</tr>
						<?php } ?>
					</table>
					<br />
					<table class="cel_vaci">
						<!-- FILA 1 -->
						<tr>
							<th colspan="2">OTRAS CATEGORIAS</th>
						</tr>
						<!-- FILA 2 -->
						<tr>
							<td><b>DESCRIPCION</b></td>
							<td><b>TALLA</b></td>
						</tr>
						<!-- FILA 3 -->
						<tr>
							<td><b>CAMISA</b></td>
							<td><span class="dato"><?=$fila->camisa?></span></td>
						</tr>
						<!-- FILA 4 -->
						<tr>
							<td><b>PANTALON</b></td>
							<td><span class="dato"><?=$fila->pantalon?></span></td>
						</tr>
						<!-- FILA 5 -->
						<tr>
							<td><b>CALZADO</b></td>
							<td><span class="dato"><?=$fila->calzado?></span></td>
						</tr>
					</table>
					<br />
					<br />
					<p class="n">Yo, <?=$fila->apellido.' '.$fila->nombre?> Cedula de Identidad N° <?=$fila->cedula?> declaro que toda la informacion suministrada es verdadera y autorizo 
						a la Direccion del I.A.M. Clinica Popular "Jose Marti", para que verifique la misma y de ser 
						falsa o maliciosa que se tomen las acciones correspondientes.</p>
					<br />
					<br />
					<br />
					<br />
					<p class="c n">_________________________________</p>
					<p class="c n">FIRMA DEL TRABAJADOR(A)</p>
				</div>
				<div class="boton_centro">
					<input type="button" name="imprimir" value="Imprimir" id="boton" title="Click para imprimir la ficha historica del trabajador" />
				</div>
			</div>
		</div>
	</body>
</html>