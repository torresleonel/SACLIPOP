<?php
//++++++++++++++++++++++++++++++++++++++++++++FUNCIONES PARA CONSULTA DEL TRABAJADOR+++++++++++++++++++++++++++++++++++++++++++++++


	function conslt_director($cnx_bd){

		$sql = "SELECT nombre,apellido 
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				WHERE cargo = 'Director(a)'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_trb($cnx_bd,$estado){

		$sql = "SELECT trabajador.cedula,nombre,apellido
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				WHERE estado = $estado
				ORDER BY cedula
				ASC";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_completa_trb($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * 
				  FROM trabajador 
				  JOIN laboral ON laboral.cedula = trabajador.cedula
				  JOIN estudios ON estudios.cedula = trabajador.cedula
				  JOIN documentos ON documentos.cedula = trabajador.cedula
				  JOIN uniforme ON uniforme.cedula = trabajador.cedula
				  WHERE trabajador.cedula = '$cedula'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_familia($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * FROM familia WHERE cedula = '$cedula'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_familia_emp($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * FROM familia WHERE cedula = '$cedula' AND empleadof <> 0";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_familia_depn($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * FROM familia WHERE cedula = '$cedula' AND empleadof = 0";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_referencia($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * FROM referencia_personal WHERE cedula = '$cedula'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_laboral_trb($cnx_bd){

		if (isset($_GET['c'])) $cedula = $_GET['c'];
		if (isset($_POST['ced_suld'])) $cedula = $_POST['ced_suld'];

		$sql = "SELECT trabajador.cedula,nombre,apellido,laboral.*
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				WHERE trabajador.cedula = '$cedula'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_rango_trb($cnx_bd,$dato1,$dato2){

		$sql = "SELECT trabajador.cedula,nombre,apellido,cargo,sueldo_mensual,fecha_ingreso
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				WHERE rango = '$dato1'
				AND condicion = '$dato2'
				AND estado = 1
				ORDER BY sueldo_mensual
				DESC";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_condicion_trb($cnx_bd,$dato){

		$sql = "SELECT trabajador.cedula,nombre,apellido,cargo,sueldo_mensual,fecha_ingreso
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				WHERE condicion = '$dato'
				AND estado = 1
				ORDER BY sueldo_mensual
				DESC";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_fch_qicn($cnx_bd,$ced){

		$sql = "SELECT inicio_quincena,fin_quincena
				FROM salario 
				WHERE cedula = '$ced'
				ORDER BY inicio_quincena
				DESC
				LIMIT 1";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_fch($cnx_bd,$campo,$tabla,$ced){

		$sql = "SELECT $campo
				FROM $tabla 
				WHERE cedula = '$ced'
				ORDER BY $campo
				DESC
				LIMIT 1";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

//++++++++++++++++++++++++++++++++++++++++++FUNCIONES PARA CONSULTA DE COMISION DE SERVICIO++++++++++++++++++++++++++++++++++


	function conslt_coms($cnx_bd,$estado){

		$sql = "SELECT trabajador.cedula,nombre,apellido
				FROM trabajador 
				JOIN comision_servicio ON comision_servicio.cedula = trabajador.cedula
				WHERE estado = $estado
				ORDER BY cedula
				ASC";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_completa_coms($cnx_bd){

		$cedula = $_GET['c'];
		
		$sql = "SELECT * 
				  FROM trabajador 
				  JOIN comision_servicio ON comision_servicio.cedula = trabajador.cedula
				  WHERE trabajador.cedula = '$cedula'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}


//++++++++++++++++++++++++++++++++++++++++++FUNCIONES PARA MODIFICAR SUELDO MENSUAL DE LOS TRABAJADORES++++++++++++++++++++++++++++++++++

	function modf_suld_gen($cnx_bd){

		$suld_mes = $_POST['suld_mes'];
		$ced_suld = $_POST['ced_suld'];

		$num_ced = count($ced_suld);
		
		for ($i=0; $i < $num_ced; $i++) {
		
		
			$sql = "UPDATE laboral 
					SET sueldo_mensual = '$suld_mes[$i]'
					WHERE cedula = '$ced_suld[$i]'";
			
			$cnx_bd -> query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);
		}
	}

	function modf_suld_indv($cnx_bd){

		$suld_mes = $_POST['suld_mes'];
		$ced_suld = $_POST['ced_suld'];
		
			$sql = "UPDATE laboral 
					SET sueldo_mensual = '$suld_mes'
					WHERE cedula = '$ced_suld'";
			
			$cnx_bd -> query($sql);
			
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);
	}

//++++++++++++++++++++++++++++++++++++++++++ FUNCIONES PARA CONSULTA DE PAGOS ++++++++++++++++++++++++++++++++++++++++++++

	function conslt_pago($cnx_bd,$tabla,$campo){

		list($cedula,,) = explode(' ',$_POST['trbj']);
		if (isset($_POST['ano']) && isset($_POST['mes']) && isset($_POST['dia'])) $fch = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		if (isset($_POST['a'])) $fch = $_POST['a'];

		$sql = "SELECT * 
				  FROM trabajador 
				  JOIN laboral ON laboral.cedula = trabajador.cedula
				  JOIN $tabla ON $tabla.cedula = laboral.cedula
				  WHERE trabajador.cedula = '$cedula'
				  AND $campo = '$fch'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_pago_rango_gen($cnx_bd,$tabla,$dato1,$dato2,$campo){

		if (isset($_POST['ano']) && isset($_POST['mes']) && isset($_POST['dia'])) $fch = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		if (isset($_POST['a'])) $fch = $_POST['a'];

		$sql = "SELECT * 
				  FROM trabajador 
				  JOIN laboral ON laboral.cedula = trabajador.cedula
				  JOIN $tabla ON $tabla.cedula = laboral.cedula
				  WHERE rango = '$dato1'
				  AND condicion = '$dato2'
				  AND $campo = '$fch'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_pago_condicion_gen($cnx_bd,$tabla,$dato,$campo){

		if (isset($_POST['ano']) && isset($_POST['mes']) && isset($_POST['dia'])) $fch = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		if (isset($_POST['a'])) $fch = $_POST['a'];

		$sql = "SELECT * 
				  FROM trabajador 
				  JOIN laboral ON laboral.cedula = trabajador.cedula
				  JOIN $tabla ON $tabla.cedula = laboral.cedula
				  WHERE condicion = '$dato'
				  AND $campo = '$fch'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_bono_vac($cnx_bd){

		list($cedula,,) = explode(' ',$_POST['trbj']);
		$ini = $_POST['a'].'-01-01';
		$fin = $_POST['a'].'-12-31';

		$sql = "SELECT *
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				JOIN bono_vacac ON bono_vacac.cedula = laboral.cedula
				WHERE trabajador.cedula = '$cedula'
				AND ini_vacac
				BETWEEN '$ini' AND '$fin'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_bono_vac_rang_gen($cnx_bd,$dato1,$dato2){

		$ini = $_POST['a'].'-01-01';
		$fin = $_POST['a'].'-12-31';

		$sql = "SELECT *
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				JOIN bono_vacac ON bono_vacac.cedula = laboral.cedula
				WHERE rango = '$dato1'
				AND condicion = '$dato2'
				AND ini_vacac
				BETWEEN '$ini' AND '$fin'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_bono_vac_cond_gen($cnx_bd,$dato){

		$ini = $_POST['a'].'-01-01';
		$fin = $_POST['a'].'-12-31';

		$sql = "SELECT *
				FROM trabajador 
				JOIN laboral ON laboral.cedula = trabajador.cedula
				JOIN bono_vacac ON bono_vacac.cedula = laboral.cedula
				WHERE condicion = '$dato'
				AND ini_vacac
				BETWEEN '$ini' AND '$fin'";
			
		$resultado = $cnx_bd -> query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}
?>