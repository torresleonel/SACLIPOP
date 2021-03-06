﻿<?php
	//++++++++++++++++++++++++++ FUNCIONES BASE PARA CALCULAR PAGOS +++++++++++++++++++++++++++++++++++
	
	//OBTIENE EL VALOR DE LA UNIDAD TRIBUTARIA (UT)
	function conslt_ut($cnx_bd)
	{
		$reslt = $cnx_bd->query("SELECT * FROM unidad_tributaria");
		$fila = $reslt->fetch_object();
		return $fila->valor;
	}


	//OBTIENE EL ESTATUS DEL PERIODO EN EL QUE SE DEBEN REALIZAR LAS DEDUCCIONES DEL SALARIO
	// 1 = deducciones en la quincena de fin de mes
	// 2 = deducciones en ambas quincenas
	function conslt_configuracion($cnx_bd, $nombre)
	{
		$reslt = $cnx_bd->query("SELECT estatus FROM configuracion WHERE nombre = '{$nombre}'");
		$fila = $reslt->fetch_object();
		return $fila->estatus;
	}
			
	//MODIFICA EL ESTATUS DEL PERIODO EN EL QUE SE DEBEN REALIZAR LAS DEDUCCIONES DEL SALARIO
	function modf_configuracion($cnx_bd, $nombre)
	{
		$estatus = $_POST['estatus'];
		$sql = "UPDATE configuracion SET estatus='{$estatus}' WHERE nombre='{$nombre}'";
		$cnx_bd->query($sql);

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION['sentencia'] = $sql;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);
	}


	//CONSULTA LAS PRIMAS
	function conslt_prima($cnx_bd)
	{
		$query = "SELECT *
				FROM prima
				JOIN configuracion ON configuracion.nombre = prima.nombre";
		$reslt = $cnx_bd->query($query);
		return $reslt;
	}

	//MODIFICA LA CANTIDAD DE UNIDADES TRIBUTARIAS POR PRIMA Y EL ESTATUS DE LAS MISMAS
	function modf_prima($cnx_bd)
	{

		$nombre = $_POST['nombre'];
		$cantidad_ut = $_POST['cantidad_ut'];
		$estatus = $_POST['estatus'];
		
		$num_prima = count($nombre);
		
		for ($i=0; $i < $num_prima; $i++) {
			$sql = "UPDATE configuracion 
					SET estatus = '$estatus[$i]'
					WHERE nombre = '$nombre[$i]'";
			
			$cnx_bd->query($sql);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);

			$sql = "UPDATE prima 
					SET cantidad_ut = '$cantidad_ut[$i]'
					WHERE nombre = '$nombre[$i]'";
			
			$cnx_bd->query($sql);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);
		}
	}


	//FUNCION PARA DETERMINAR AÑOS DE SERVICIO
	function a_servicio($fch_vacac){

		if (isset($_GET['fi'])) $fecha_ingreso = $_GET['fi'];
		if (isset($_POST['fch_ing'])) $fecha_ingreso = $_POST['fch_ing'];

		list($a_ing,$m_ing,$d_ing) = explode('-',$fecha_ingreso);
		list($a_vacac,$m_vacac,$d_vacac) = explode('-',$fch_vacac);
		$a_serv = $a_vacac - $a_ing;
		if($m_ing > $m_vacac) {
			--$a_serv;
		}else if($m_ing == $m_vacac) {
			if($d_ing > $d_vacac) {
				--$a_serv;				
			}
		}
		return $a_serv;
	}


	//REALIZA LA COMPROBACION DEL TRABAJADOR QUE CUMPLE LAS CONDICIONS PARA PRCIBIR PRIMAS
	//Y REALIZA EL CALCULO CORRESPONDIENTE A CADA UNA
	function gestion_primas($cnx_bd, $cedula, $fin_quincena)
	{
		$valor_ut = conslt_ut($cnx_bd);
		$prima = conslt_prima($cnx_bd);
		list($a_quinc, $m_quinc, $d_quinc) = explode('-', $fin_quincena);

		while ($fila_p = $prima->fetch_object()) {
			if ($fila_p->estatus = 1) {
				switch ($fila_p->nombre) {
					case 'antiguedad':
						$prima_antiguedad = 0;
						$fecha_rslt = $cnx_bd->query("SELECT fecha_ingreso FROM laboral WHERE cedula = '{$cedula}'");
						$fecha_fila = $fecha_rslt->fetch_object();
						list($a_ing, $m_ing, $d_ing) = explode('-', $fecha_fila->fecha_ingreso);
						
						$a_serv = $a_quinc - $a_ing;
						if ($m_ing > $m_quinc) {
							--$a_serv;
						} else if ($m_ing == $m_quinc) {
							if ($d_ing > $d_quinc)
								--$a_serv;
						}
						// 3 es la cantidad de años que debe tener el trabajador como minimo
						// para percibir prima por antiguedad
						if ($a_serv >= 3)
							$prima_antiguedad = $valor_ut * $fila_p->cantidad_ut;
						break;
					
					case 'hijo':
						$prima_hijo = 0;
						$hijo_rslt = $cnx_bd->query("SELECT fecha_nacf FROM familia WHERE cedula = '{$cedula}' AND parentescof = 'Hijo(a)'");
						if ($hijo_rslt->num_rows > 0) {
							while ($hijo_fila = $hijo_rslt->fetch_object()) {
								list($a, $m, $d) = explode('-', $hijo_fila->fecha_nacf);
								$edad = $a_quinc - $a;
								if ($m > $m_quinc) {
									--$edad;
								} else if ($m == $m_quinc) {
									if ($d > $d_quinc)
										--$edad;
								}
								// Si la edad del hijo es menor a 18 años, se le pagara prima por hijos
								if ($edad <= 18)
									$prima_hijo += $valor_ut * $fila_p->cantidad_ut;
							}
						}
						break;
					
					case 'hogar':
						$prima_hogar = 0;
						$query = "SELECT nconyugue, parentescof
								FROM trabajador
								JOIN familia ON familia.cedula = trabajador.cedula
								WHERE trabajador.cedula = '{$cedula}' AND parentescof = 'Hijo(a)'";
						$hogar_rslt = $cnx_bd->query($query);
						// Si el resultado es igual a 0 significa que no tiene hijos, no le corresponde la prima
						if ($hogar_rslt->num_rows > 0) {
							$hogar_fila = $hogar_rslt->fetch_object();
							// Si es igual a N/a entonces tampoco le corresponde esta prima
							if ($hogar_fila->nconyugue != 'N/a')
								$prima_hogar = $valor_ut * $fila_p->cantidad_ut;
						}
						break;
					
					case 'profesionalizacion/corta':
						$prima_pro_cor = 0;
						$prof_cor_rslt = $cnx_bd->query("SELECT estudios FROM estudios WHERE cedula = '{$cedula}' AND estudios = 'Universitario/Corta'");
						if ($prof_cor_rslt->num_rows > 0)
							$prima_pro_cor = $valor_ut * $fila_p->cantidad_ut;
						break;
					
					case 'profesionalizacion/larga':
						$prima_pro_lar = 0;
						$prof_lar_rslt = $cnx_bd->query("SELECT estudios FROM estudios WHERE (cedula = '{$cedula}') AND (estudios = 'Universitario/Larga' OR estudios = 'Postgrado')");
						if ($prof_lar_rslt->num_rows > 0)
							$prima_pro_lar = $valor_ut * $fila_p->cantidad_ut;
						break;
				}
			} else {
				switch ($fila_p->nombre) {
					case 'antiguedad':
						$prima_antiguedad = 0;
						break;
					
					case 'hijo':
						$prima_hijo = 0;
						break;
					
					case 'hogar':
						$prima_hogar = 0;
						break;
					
					case 'profesionalizacion/corta':
						$prima_pro_cor = 0;
						break;
					
					case 'profesionalizacion/larga':
						$prima_pro_lar = 0;
						break;
				}
			}
		}
		return array($prima_antiguedad, $prima_hijo, $prima_hogar, $prima_pro_cor, $prima_pro_lar);
	}


	//FUNCION PARA DETERMINAR FECHA DEL PEROIDO VACACIONAL SIN FINES DE SEMANA
	function fin_semana($t_dias_vac,$num_dia,$dia){
		$i = 1;
		while($i < $t_dias_vac) {
			++$num_dia;
			++$dia;
			if($num_dia != 6 && $num_dia != 7) ++$i;
			if($num_dia == 7) $num_dia = 0;
		}
		return $dia;
	}


	//FUNCION PARA DETERMINAR LA FECHA DE SEMANA SANTA Y CARNAVAL (DIAS FERIADOS PARA VACACIONES)
	function pascua($anno){
		//Constantes
		$M = 24;
		$N = 5;
		//Cálculo de residuos
		$a = $anno % 19;
		$b = $anno % 4;
		$c = $anno % 7;
		$d = (19*$a + $M) % 30;
		$e = (2*$b+4*$c+6*$d + $N) % 7;

		if ( $d + $e < 10 ) {
			$dia = $d + $e + 22;
			$mes = 3;
		}else{
			$dia = $d + $e - 9;
			$mes = 4;
		}
		//Excepciones especiales
		if ( $dia == 26  and $mes == 4 ) $dia = 19;
		if ( $dia == 25 and $mes == 4 and $d == 28 and $e == 6 and $a > 10 ) $dia = 18;

		//Se calculan Lunes y Martes de Carnaval, Jueves y Viernes Santo
		$lun_c = mktime(0,0,0,$mes,$dia-48,$anno);
		$mar_c = mktime(0,0,0,$mes,$dia-47,$anno);
		$jue_s = mktime(0,0,0,$mes,$dia-3,$anno);
		$vie_s = mktime(0,0,0,$mes,$dia-2,$anno);
		
		return array($lun_c,$mar_c,$jue_s,$vie_s);
	}

	//FUNCION PARA INSERTAR DIAS FERIADOS NO LABORABLES
	function reg_dias_feriados($cnx_bd)
	{
		$dia = $_POST['dia'];
		$mes = $_POST['mes'];
		$descripcion = $_POST['descripcion'];
		$feriado = $dia.'-'.$mes;
		$query = "INSERT INTO feriado (dia, mes, descripcion) VALUES ('{$dia}', '{$mes}', '{$descripcion}')";
		$cnx_bd->query($query);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION['sentencia'] = $query;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);
	}

	//FUNCION PARA CONSULTAR LOS DIAS FERIADOS NO LABORABLES ALMACENADOS
	function conslt_dias_feriados($cnx_bd)
	{
		$query = "SELECT dia, mes, descripcion
				FROM feriado
				ORDER BY mes ASC, dia ASC";
		$result = $cnx_bd->query($query);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		$feriado = null;
		$cont = 0;
		while ($fila = $result->fetch_object()) {
			$feriado[$cont] = $fila->dia.'-'.$fila->mes.'-'.$fila->descripcion;
			$cont++;
		}
		return $feriado;
	}

	//FUNCION PARA ELIMINAR LOS DIAS FERIADOS NO LABORABLES ALMACENADOS
	function elimina_dias_feriados($cnx_bd)
	{
		$feriado = $_GET['f'];
		$query = "DELETE FROM feriado WHERE dia = '{$feriado}'";
		$cnx_bd->query($query);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION['sentencia'] = $query;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);
	}


	//FUNCION PARA CALCULAR PERIODO VACACIONAL SIN DIAS FERIADOS NO LABORABLES
	function feriados($inicio,$fin,$cnx_bd){
		//LLAMADO DE LA FUNCION QUE DEVUELVE DIAS FERIADOS NO LABORABLES DD-MM
		$feriados = conslt_dias_feriados($cnx_bd);
		//SE CUENTA LA CANTIDAD DE DIAS FERIADOS NO LABORABLES
		$cant = count($feriados);
		list($a_i,,) = explode('-',date('Y-m-d',$inicio));
		list($a_f,,) = explode('-',date('Y-m-d',$fin));
		$a = $a_i;
		$ciclo = 1;
		if($a_i != $a_f)
			$ciclo = 2;

		$d_feria = 0;
		for($i=0;$i<$ciclo;$i++) {
			if($i == 10)
				$a = $a_f;
			for($j=0;$j < $cant;$j++) {
				list($dia,$mes,) = explode('-',$feriados[$j]);
				$fecha = mktime(0,0,0,$mes,$dia,$a);
				if($inicio <= $fecha && $fin >= $fecha) {
					$num_dia = date('N',$fecha);
					if($num_dia != 6 && $num_dia != 7) ++$d_feria;
				}
			}
			//LLAMADO DE LA FUNCION QUE NOS DEVUELVE LUNES Y MARTES DE CARNAVAL, JUEVES Y VIERNES SANTO
			list($lun_c,$mar_c,$jue_s,$vie_s) = pascua($a);
			if($inicio <= $lun_c && $fin >= $lun_c) ++$d_feria;
			if($inicio <= $mar_c && $fin >= $mar_c) ++$d_feria;
			if($inicio <= $jue_s && $fin >= $jue_s && $jue_s != mktime(0,0,0,4,19,$a)) ++$d_feria;
			if($inicio <= $vie_s && $fin >= $vie_s && $vie_s != mktime(0,0,0,4,19,$a)) ++$d_feria;
		}
		return $d_feria;
	}


	//FUNCION PARA REALIZAR EL CALCULO BASE DEL BONO VACACIONAL
	function calc_bono_vac($a_serv,$salr_dia){

		if (isset($_GET['l'])) $ley = $_GET['l'];
		if (isset($_POST['ley'])) $ley = $_POST['ley'];

		//SE EVALUA EL TIPO DE EMPLEADO PARA DETERMINAR LA CANTIDAD DE DIAS DE VACACIONES SEGUN LA LEY PARA EL PAGO
		if ($ley == 'LEFP'){
			$dias_vacac = 40;
			$dias_adic = 0;
		}else{
			$dias_vacac = 15;
			if ($a_serv <= 0) $dias_adic = 0;
			else if ($a_serv <= 16) $dias_adic = $a_serv - 1;
			else $dias_adic = 15;
		}
		//CALCULO DEL TOTAL A PAGAR POR LOS DIAS DE VACACIONES
		$total_dia_v = $dias_vacac * $salr_dia;
		//CALCULO DEL TOTAL A PAGAR POR LOS DIAS DE VACACIONES ADICIONALES
		$total_dia_adic = $dias_adic * $salr_dia;
		//CALCULO DEL BONO VACACIONAL TOTAL
		$bono_vacac = $total_dia_v + $total_dia_adic;

		return array($bono_vacac,$dias_vacac,$dias_adic,$total_dia_v,$total_dia_adic);

	}


	//++++++++++++++++++++++++++++++++++++++++++++++ FUNCION PARA CALCULAR SALARIO QUINCENAL +++++++++++++++++++++++++++++++++++++++++++
	function calc_salario($cnx_bd){

		$cedula = $_POST['cedula'];
		$d_adicional = $_POST['d_adicional'];
		$inasistencia = $_POST['inasistencia'];
		$salr_mes = $_POST['salr_mes'];
		$retro_suld = $_POST['retro_suld'];
		$retro_agin = $_POST['retro_agin'];
		$retro_vaci = $_POST['retro_vaci'];
		$gen_islr = $_POST['gen_islr'];
		$periodo = conslt_configuracion($cnx_bd, 'periodo');

		//------------------ESTRUCTURA PARA DETERMINAR DIA INICIO DE QUINCENA----------------------------------

		list($aa,$ma,$da) = explode('-',date('Y-n-j'));
		if ($da <= 15) $dia_i = 1;
		else $dia_i = 16;
		$inicio_quincena = $aa.'-'.$ma.'-'.$dia_i;

		//------------------ESTRUCTURA PARA DETERMINAR DIA FIN DE QUINCENA----------------------------------

		if ($dia_i == 1) $dia_f = 15;
		elseif ($dia_i == 16) $dia_f = date('t',strtotime($inicio_quincena));
		$fin_quincena = $aa.'-'.$ma.'-'.$dia_f;

		//------------------ESTRUCTURA PARA DETERMINAR NUMERO DE LUNES EN LA QUINCENA O EL MES------------
		if ($periodo == 2) {
			$num_dia = date('N',strtotime($inicio_quincena));
			
			$num_lun = 0;
			$linea_dia = $dia_i;

			if ($num_dia != 1) {
				$dia_falt = 8 - $num_dia;
				$linea_dia += $dia_falt;
			}
			while ($linea_dia <= $dia_f) {
				++$num_lun;
				$linea_dia += 7;
			}
		} else {
			$num_dia = date('N',strtotime($aa.'-'.$ma.'-1'));
			$dia_final_mes = date('t',strtotime($aa.'-'.$ma.'-1'));
			$num_lun = 0;
			$linea_dia = 1;

			if ($num_dia != 1) {
				$dia_falt = 8 - $num_dia;
				$linea_dia += $dia_falt;
			}
			while ($linea_dia <= $dia_final_mes) {
				++$num_lun;
				$linea_dia += 7;
			}
		}

		/*+++++++++++++++++++++++++++++++INICIO DE CALCULOS+++++++++++++++++++++++++++++++++++*/
		//SALARIO QUINCENA
		$salr_quincena = $salr_mes / 2;
		//SALARIO DIARIO
		$salr_dia = $salr_mes / 30;
		//TOTAL A PAGAR POR DIAS ADICIONALES
		$t_dia_adic = $d_adicional * $salr_dia;
		//CALCULO DE ASIGNACIONES
		$t_asign = $salr_quincena + $t_dia_adic + $retro_suld + $retro_vaci + $retro_agin;


		//SI EL PERIODO DE DEDUCCIONES ES 2 SE DEBEN DESCONTAR LAS DEDUCCIONES EN CADA QUINCENA
		//SI EL PERIODO DE DEDUCCIONES ES 1 Y EL DIA FINAL DE QUINCENA ES MAYOR A 15 SIGNIFICA
		//QUE SE HARAN LAS DEDUCCIONES SOLO EN LA ULTIMA QUINCENA DEL MES
		//ADEMAS TAMBIEN APLICA PARA EL PAGO DE PRIMAS
		if (($periodo == 2) || ($periodo == 1 && $dia_f > 15)) {
			//DEVUELVE EL VALOR DEL CALCULO DE LAS PRIMAS
			list($prima_antiguedad, $prima_hijo, $prima_hogar, $prima_pro_cor, $prima_pro_lar) = gestion_primas($cnx_bd, $cedula, $fin_quincena);
			if ($periodo == 2) {
				$prima_antiguedad = $prima_antiguedad / 2;
				$prima_hijo = $prima_hijo / 2;
				$prima_hogar = $prima_hogar / 2;
				$prima_pro_cor = $prima_pro_cor / 2;
				$prima_pro_lar = $prima_pro_lar / 2;
			}
			//CALCULO DE ASIGNACIONES + PRIMAS
			$t_asign += $prima_antiguedad + $prima_hijo + $prima_hogar + $prima_pro_cor + $prima_pro_lar;
			//CALCULO BASE NECESARIO PARA SSO Y SPF
			$calc_ini = ($salr_quincena * 12) / 52;
			//CALCULO DE SSO
			$sso = $calc_ini * 0.04 * $num_lun;
			//CALCULO DE SPF
			$spf = $calc_ini * 0.005 * $num_lun;
			//LLAMADO DE LA FUNCION QUE DETERMINA LOS AÑOS DE SERVCIO
			$a_serv = a_servicio($fin_quincena);
			//LLAMADO DE LA FUNCION QUE CALCULA EL BONO VACACIONAL
			list($bono_vacac,,,,) = calc_bono_vac($a_serv,$salr_dia);
			//CALCULO DE ALICUOTA VACACIONAL MENSUAL
			$ali_vacac = $bono_vacac / 12;
			//CALCULO DE SUELDO INTEGRAL MENSUAL
			$sim = $salr_mes + $ali_vacac;
			//SI EL PERIODO DE DEDUCCIONES ES 2 ENTONCES SE DEBE DESCONTAR EL FAOV EN CADA QUINCENA
			if ($periodo == 2)
				$faov = $sim * 0.01 / 2;//CALCULO DE FAOV QUINCENAL
			else
				$faov = $sim * 0.01;//CALCULO DE FAOV MENSUAL
			//CALCULO DE ISLR
			$islr = 0;
			if ($gen_islr == 1)
				$islr = $t_asign * 0.0059;
		} else {
			//sino se hacen las deducciones entonces se asigna 0 para no crear conflicto en el calculo
			$sso = 0;
			$spf = 0;
			$faov = 0;
			$islr = 0;
			$prima_antiguedad = 0;
			$prima_hijo = 0;
			$prima_hogar = 0;
			$prima_pro_cor = 0;
			$prima_pro_lar = 0;
		}


		//TOTAL A DESCONTAR POR INANSISTENCIAS
		$t_inasist = $inasistencia * $salr_dia;
		//CALCULO DE DEDUCCIONES
		$t_deduccion = $sso + $spf + $faov + $t_inasist + $islr;
		//CALCULO TOTAL A PAGAR EN LA QUINCENA
		$total_pagar = $t_asign - $t_deduccion;

		/*+++++++++++++++++++++++++++++++++++++FIN DE CALCULOS+++++++++++++++++++++++++++++++++++*/

		//SE CONSULTA SI YA EXISTE UN CALCULO DE SALARIO GENERADO PARA EL PERIODO Y TRABAJADOR INGRESADO
		$sql = "SELECT * FROM salario WHERE inicio_quincena = '$inicio_quincena' AND cedula = '$cedula'";
			
		$resultado = $cnx_bd->query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		if ($resultado->num_rows > 0){


			$sql = "UPDATE salario 
				SET sueldo_quincena = '$salr_quincena',dia_adicional = '$d_adicional',total_dia_adic = '$t_dia_adic',retro_sueldo = '$retro_suld',retro_aguinaldos = '$retro_agin',retro_vacaciones = '$retro_vaci',prima_antiguedad='$prima_antiguedad', prima_hijo='$prima_hijo', prima_hogar='$prima_hogar', prima_prof_corta='$prima_pro_cor', prima_prof_larga='$prima_pro_lar', sso = '$sso',spf = '$spf',faov = '$faov',islr = '$islr',inasistencias = '$inasistencia',total_inasist = '$t_inasist',total_asignaciones = '$t_asign',total_deducciones = '$t_deduccion',total_pagar = '$total_pagar' 
				WHERE cedula = '$cedula' AND inicio_quincena = '$inicio_quincena'";
			
			$cnx_bd->query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);

		}else{

			$sql = "INSERT INTO salario (sueldo_quincena,dia_adicional,total_dia_adic,retro_sueldo,retro_aguinaldos,retro_vacaciones,prima_antiguedad,prima_hijo,prima_hogar,prima_prof_corta,prima_prof_larga,sso,spf,faov,islr,inasistencias,total_inasist,inicio_quincena,fin_quincena,total_asignaciones,total_deducciones,total_pagar,cedula)
				VALUES ('$salr_quincena','$d_adicional','$t_dia_adic','$retro_suld','$retro_agin','$retro_vaci','$prima_antiguedad','$prima_hijo','$prima_hogar','$prima_pro_cor','$prima_pro_lar','$sso','$spf','$faov','$islr','$inasistencia','$t_inasist','$inicio_quincena','$fin_quincena','$t_asign','$t_deduccion','$total_pagar','$cedula')";
			
			$cnx_bd->query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);

		}

		return array($inicio_quincena, $fin_quincena, $salr_quincena, $d_adicional, $t_dia_adic, $retro_suld, $retro_agin, $retro_vaci, $sso, $spf, $faov, $inasistencia, $t_inasist, $islr, $t_deduccion, $t_asign, $total_pagar, $prima_antiguedad, $prima_hijo, $prima_hogar, $prima_pro_cor, $prima_pro_lar);
	}


	//++++++++++++++++++++++++++++++++++++++++++++++ FUNCION PARA GENERAR BONO VACACIONAL +++++++++++++++++++++++++++++++++++++++++++
	function genera_bono_vac($cnx_bd){

		$cedula = $_POST['cedula'];
		$ini_vacac = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];

		//LLAMADO DE LA FUNCION QUE DETERMINA LOS AÑOS DE SERVCIO
		$a_serv = a_servicio($ini_vacac);

		//SI EL TRABAJADOR NO TIENE UN AÑO DE SERVICIO NO SE DEBE REALIZAR EL CALCULO
		if ($a_serv < 1) {
			return false;
		}else{
			//SALARIO DIARIO
			$salr_dia = $_POST['salr_mes'] / 30;
			//LLAMADO DE LA FUNCION QUE CALCULA EL BONO VACACIONAL
			list($bono_vacac,$dias_vacac,$dias_adic,$total_dia_v,$total_dia_adic) = calc_bono_vac($a_serv,$salr_dia);

			//+++++++++++++++ SE DETERMINA LA FECHA EN QUE CULMINA EL PERIODO DE VACACIONES  +++++++++++++++++++
			//+++++++++++++++ PARTIENDO DE UNA FECHA DE INICIO DE VACACIONES YA DADA Y DE LA +++++++++++++++++++
			//+++++++++++++++ CANTIDAD DE DIAS DE VACACIONES								 +++++++++++++++++++
			$dia = $_POST['dia'];
			$mes = $_POST['mes'];
			$anno = $_POST['ano'];
			//SE EVALUA EL TIPO DE EMPLEADO PARA DETERMINAR LA CANTIDAD DE DIAS DE VACACIONES SEGUN LA LEY PARA EL DISFRUTE
			if ($_POST['ley'] == 'LEFP'){
				$dias_disft_ad = 0;
				if ($a_serv <= 5) $dias_disft = 15;
				else if ($a_serv <= 10) $dias_disft = 18;
				else if ($a_serv <= 15) $dias_disft = 21;
				else $dias_disft = 25;
			}else{
				$dias_disft = 15;
				if ($a_serv <= 16) $dias_disft_ad = $a_serv - 1;
				else $dias_disft_ad = 15;
			}
			$t_dias_vac = $dias_disft + $dias_disft_ad;
			$num_dia = date('N',strtotime($ini_vacac));
			//LLAMADO DE LA FUNCION QUE DEVUELVE EL DIA DONDE CULMINA EL PERIODO VACACIONAL SIN FINES DE SEMANA
			$dia = fin_semana($t_dias_vac,$num_dia,$dia);
			//CONTIENE LA FECHA EN LA CUAL CULMINAN LAS VACACIONES DEL TRABAJADOR SIN FINES DE SEMANA
			$fin_vacac = mktime(0, 0, 0, $mes,$dia,$anno);
			//CONTIENE LA FECHA EN LA CUAL INICIA EL PERIODO VACACIONAL
			$inicio = mktime(0,0,0,$_POST['mes'],$_POST['dia'],$_POST['ano']);
			//LLAMADO DE LA FUNCION QUE DEVUELVE LA CANTIDAD DE DIAS FERIADOS NO LABORABLES DENTRO DEL PERIODO VACACIONAL
			$d_feria = feriados($inicio,$fin_vacac,$cnx_bd);
			//ES NECESARIO EVALUAR FINES DE SEMANA Y DIAS FERIADOS HASTA QUE ARROJE CERO DIAS FERIADOS
			while($d_feria != 0){
				list($anno,$mes,$dia) = explode('-',date("Y-m-d",$fin_vacac));
				$num_dia = date('N',$fin_vacac);
				//LLAMADO DE LA FUNCION QUE DEVUELVE EL DIA DONDE CULMINA EL PERIODO VACACIONAL SIN FINES DE SEMANA
				$dia = fin_semana(++$d_feria,$num_dia,$dia);
				//CONTIENE LA FECHA EN LA CUAL CULMINAN LAS VACACIONES DEL TRABAJADOR (PRIMERA FASE)
				$fin = mktime(0, 0, 0, $mes,$dia,$anno);
				//LLAMADO DE LA FUNCION QUE DEVUELVE LA CANTIDAD DE DIAS FERIADOS NO LABORABLES DENTRO DEL PERIODO VACACIONAL
				$d_feria = feriados($fin_vacac,$fin,$cnx_bd);
				$fin_vacac = $fin;
			}
			//CONTIENE LA FECHA EN LA CUAL CULMINAN LAS VACACIONES DEL TRABAJADOR (SEGUNDA FASE)
			$fin_vacac = date('Y-m-d',$fin_vacac);

			//LLAMADO DE LA FUNCION QUE DEVUELVE DIAS FERIADOS NO LABORABLES DD-MM
			$feriados = conslt_dias_feriados($cnx_bd);
			//SE CUENTA LA CANTIDAD DE DIAS FERIADOS NO LABORABLES
			$cant = count($feriados);
			list($a,$m,$d) = explode('-',$fin_vacac);
			$num_dia = date('N',strtotime($fin_vacac));
			
			// SE DETERMINA LA FECHA EN QUE SE REINCORPORA EL TRABAJADOR LUEGO DE SUS VACACIONES
			if($num_dia == 5) {
				$fecha_rein = mktime(0,0,0,$m,$d+3,$a);
				$num_dia = 1;
			}else{
				$fecha_rein = mktime(0,0,0,$m,++$d,$a);
				++$num_dia;
			}
			do{
				list($a,$m,$d) = explode('-',date('Y-m-d',$fecha_rein));
				$num_dia = date('N',$fecha_rein);
				if ($num_dia == 6) $d += 2;
				else if ($num_dia == 7) ++$d;
				$fecha_rein = mktime(0,0,0,$m,$d,$a);
				list($a,$m,$d) = explode('-',date('Y-m-d',$fecha_rein));
				//LLAMADO DE LA FUNCION QUE NOS DEVUELVE LUNES Y MARTES DE CARNAVAL, JUEVES Y VIERNES SANTO
				list($lun_c,$mar_c,$jue_s,$vie_s) = pascua($a);
				for ($i=0; $i<$cant ; $i++) { 
					list($d_fe,$m_fe,) = explode('-',$feriados[$i]);
					$f = mktime(0,0,0,$m_fe,$d_fe,$a);
					if ($fecha_rein == $f) {
						$fecha_rein = mktime(0,0,0,$m,++$d,$a);
						$d_feriado = true;
						break;
					}else if($fecha_rein == $lun_c) {
						$fecha_rein = mktime(0,0,0,$m,++$d,$a);
						$d_feriado = true;
						break;
					}else if($fecha_rein == $mar_c) {
						$fecha_rein = mktime(0,0,0,$m,++$d,$a);
						$d_feriado = true;
						break;
					}else if($fecha_rein == $jue_s && $jue_s != mktime(0,0,0,4,19,$a)) {
						$fecha_rein = mktime(0,0,0,$m,++$d,$a);
						$d_feriado = true;
						break;
					}else if($fecha_rein == $vie_s && $vie_s != mktime(0,0,0,4,19,$a)) {
						$fecha_rein = mktime(0,0,0,$m,++$d,$a);
						$d_feriado = true;
						break;
					}else $d_feriado = false;
				}
			}while ($d_feriado);
			//CONTIENE LA FECHA EN QUE EL TRABAJADOR DEBE REINCORPORARSE A SUS LABORES
			$fecha_rein = date('Y-m-d',$fecha_rein);


			/*+++++++++++++++++++++++++++++++++++++FIN DE LOS PROCESOS PARA GENERAR BONO VACACIONAL+++++++++++++++++++++++++++++++++++*/

			//SE CONSULTA SI YA EXISTE UN CALCULO DE BONO VACACIONAL GENERADO PARA EL PERIODO Y TRABAJADOR INGRESADO
			$sql = "SELECT id_bono,ini_vacac
					FROM bono_vacac
					WHERE cedula = '$cedula'
					ORDER BY ini_vacac
					DESC
					LIMIT 1";
				
			$resultado = $cnx_bd->query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			$x = 0;
			if ($resultado->num_rows > 0) {
				$fila = $resultado->fetch_object();
				$id = $fila->id_bono;
				list($x,,) = explode('-',$fila->ini_vacac);
			}

			if ($_POST['ano'] == $x){

				$sql = "UPDATE bono_vacac 
						SET ini_vacac = '$ini_vacac',fin_vacac = '$fin_vacac',reincorpor = '$fecha_rein',dia_vacac = '$dias_vacac',dia_adicional = '$dias_adic',sueldo_dia = '$salr_dia',total_dia_v = '$total_dia_v',total_dia_adic = '$total_dia_adic',total_pagar = '$bono_vacac' 
						WHERE id_bono = '$id'";
				
				$cnx_bd->query($sql);
				
				//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
				error_sql($cnx_bd);

				//SE ALMACENA LA SENTENCIA SQL
				$_SESSION['sentencia'] = $sql;
				//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
				bitacora($cnx_bd);

			}else{

				$sql = "INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)
						VALUES ('$ini_vacac','$fin_vacac','$fecha_rein','$dias_vacac','$dias_adic','$salr_dia','$total_dia_v','$total_dia_adic','$bono_vacac','$cedula')";
				
				$cnx_bd->query($sql);
				
				//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
				error_sql($cnx_bd);

				//SE ALMACENA LA SENTENCIA SQL
				$_SESSION['sentencia'] = $sql;
				//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
				bitacora($cnx_bd);

			}
			return array($fin_vacac,$fecha_rein,$dias_vacac,$dias_adic,$salr_dia,$total_dia_v,$total_dia_adic,$bono_vacac);
		}

	}


	//++++++++++++++++++++++++++++++++++++++++++++++ FUNCION PARA CALCULAR AGUINALDOS +++++++++++++++++++++++++++++++++++++++++++
	function calc_aguinaldos($cnx_bd){

		$cedula = $_POST['cedula'];

		$m_ini = 1;
		$fch_fin = date('Y').'-'.$_POST['mes'].'-'.$_POST['dia'];
		list($a_ing,$m_ing,) = explode('-',$_POST['fch_ing']);
		if ($a_ing == date('Y')) $m_ini = $m_ing;

		//ESTRUCTURA PARA DETERMINAR LA CANTIDAD DE MESES DEL PERIODO DE AGUINALDOS A CALCULAR
		$meses = $_POST['mes'] - $m_ini;
		if ($_POST['dia'] == date('t',strtotime($fch_fin))) ++$meses;

		//LLAMADO DE LA FUNCION QUE DETERMINA LOS AÑOS DE SERVCIO
		$a_serv = a_servicio(date('Y').'-'.$_POST['mes'].'-'.$_POST['dia']);

		//SI EL TRABAJADOR NO TIENE 3 MESES DE SERVICIO NO SE PUEDE REALIZAR EL CALCULO
		if ($meses < 3) {
			return false;
		}else{
			//SALARIO DIARIO
			$salr_dia = $_POST['salr_mes'] / 30;
			//LLAMADO DE LA FUNCION QUE CALCULA EL BONO VACACIONAL
			list($bono_vacac,,,,) = calc_bono_vac($a_serv,$salr_dia);
			//CALCULO DE ALICUOTA VACACIONAL MENSUAL
			$ali_vacac = $bono_vacac / 12;
			//CALCULO DE SUELDO INTEGRAL MENSUAL
			$sim = $_POST['salr_mes'] + $ali_vacac;
			//CALCULO DE SUELDO INTEGRAL DIARIO
			$sid = $sim / 30;
			//DIAS TRABAJDOS PARA CALCULAR AGUINADOS
			$dias = $meses * 30;
			//CALCULO DE AGUINALDOS
			$aguinaldos = (90 / 360) * $dias * $sid;

			/*+++++++++++++++++++++++++++++++++++++FIN DE LOS PROCESOS PARA GENERAR AGUINALDOS+++++++++++++++++++++++++++++++++++*/

			//SE CONSULTA SI YA EXISTE UN CALCULO DE AGUINALDOS GENERADO PARA EL PERIODO Y TRABAJADOR INGRESADO
			$sql = "SELECT id_aguinaldo,anno_calculo
					FROM aguinaldo
					WHERE cedula = '$cedula'
					ORDER BY anno_calculo
					DESC
					LIMIT 1";
				
			$resultado = $cnx_bd->query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			$x = 0;
			if ($resultado->num_rows > 0) {
				$fila = $resultado->fetch_object();
				$id = $fila->id_aguinaldo;
				$x = $fila->anno_calculo;
			}

			$a_actu = date('Y');
			if ($a_actu == $x){

				$sql = "UPDATE aguinaldo 
						SET cantidad_mes = '$meses',sid = '$sid',total_pagar = '$aguinaldos' 
						WHERE id_aguinaldo = '$id'";
				
				$cnx_bd->query($sql);
				
				//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
				error_sql($cnx_bd);

				//SE ALMACENA LA SENTENCIA SQL
				$_SESSION['sentencia'] = $sql;
				//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
				bitacora($cnx_bd);

			}else{

				$sql = "INSERT INTO aguinaldo (cantidad_mes,anno_calculo,sid,total_pagar,cedula)
						VALUES ('$meses','$a_actu','$sid','$aguinaldos','$cedula')";
				
				$cnx_bd->query($sql);
				
				//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
				error_sql($cnx_bd);

				//SE ALMACENA LA SENTENCIA SQL
				$_SESSION['sentencia'] = $sql;
				//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
				bitacora($cnx_bd);

			}
			return array($meses,$sid,$aguinaldos);
		}
	}

?>