<?php

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++CAPTURA DATOS DEL FORMULARIO+++++++++++++++++++++++++++++++++++++++++ */


/*.........................DATOS PERSONALES.....................*/
	$nombre = ucwords(strtolower($_POST["nombre"]));
	$apellido = ucwords(strtolower($_POST["apellido"]));
	$cedula = $_POST["cedula"];
	$cedula_o = $_POST["cedula_o"];
	$nacionalidad = ucwords(strtolower($_POST["nacionalidad"]));
	$libreta_militr = $_POST["libreta_militr"];
	$pasaporte = $_POST["pasaporte"];
	$est_civil = $_POST["est_civil"];
	$estudia = $_POST["estudia_t"];
	$direccion = $_POST["direccion"];
	$lug_nac = ucwords(strtolower($_POST["lug_nac"]));
	$fecha_nac = $_POST["anonac"].'-'.$_POST["mesnac"].'-'.$_POST["dianac"];
	$telefono = $_POST["telefono"];
	$telefono_em = $_POST["telefono_em"];
	$nconyugue = ucwords(strtolower($_POST["nconyugue"]));
	$cargo = $_POST["cargo"];
	$rango = $_POST["rango"];
	$condicion = $_POST["condicion"];
	$area_d = $_POST["area_d"];
	$fecha_ing = $_POST["anoing"].'-'.$_POST["mesing"].'-'.$_POST["diaing"];
	$resolucion = $_POST["resolucion"];
	$ley = $_POST["ley"];
	$estado = $_POST["estado"];
	$actualizacion = date("Y").'-'.date("n").'-'.date("j");

/*.......................DATOS FAMILIARES.........................*/
	$familia = false;
	if (isset($_POST["cedula_fam"])) {
		$familia = true;
		$nombres_fam = $_POST["nombres_fam"];
		$cedula_fam = $_POST["cedula_fam"];
		$parentesco_fam = $_POST["parentesco_fam"];
		$empl_fam = $_POST["empl_fam"];
		$apellidos_fam = $_POST["apellidos_fam"];
		$estudia_fam = $_POST["estudia"];
		$dianac_fam = $_POST["dianac_fam"];
		$mesnac_fam = $_POST["mesnac_fam"];
		$anonac_fam = $_POST["anonac_fam"];
		$cargo_fam = $_POST["cargo_fam"];
	}

/*.....................DATOS ESTUDIOS...........................*/
	$estudio = $_POST["estudio"];
	$lug_estudio = ucwords(strtolower($_POST["lug_estudio"]));
	$ano = $_POST["ano"];
	$titulos = $_POST["titulos"];
	$observacion = ucwords(strtolower($_POST["observacion"]));

/*................DATOS DE DOCUMENTOS CONSIGNADOS................*/
	$part_nac = $_POST["part_nac"];
	$ins_milt = $_POST["ins_milt"];
	$ced_iden = $_POST["ced_iden"];
	$rif = $_POST["rif"];
	$dec_jur = $_POST["dec_jur"];
	$inf_med = $_POST["inf_med"];
	$part_nac_h = $_POST["part_nac_h"];
	$matr_divr = $_POST["matr_divr"];
	$defunc = $_POST["defunc"];
	$titul = $_POST["titul"];
	$certf = $_POST["certf"];
	$const_hora = $_POST["const_hora"];

/*.................DATOS DE REFERENCIAS PERSONALES................*/
	$nombre_rp = $_POST["nombre_rp"];
	$apellido_rp = $_POST["apellido_rp"];
	$cedula_rp = $_POST["cedula_rp"];
	$telefono_rp = $_POST["telefono_rp"];
	$ocupacion_rp = $_POST["ocupacion_rp"];

/*.................DATOS DE OTRAS CATEGORIAS(uniforme)..................*/
	$tall_cam = $_POST["tall_cam"];
	$tall_pant = $_POST["tall_pant"];
	$tall_calz = $_POST["tall_calz"];



/* +++++++++++++++++++++++++++++++++++++++++++SENTENCIAS SQL PARA TODOS LOS DATOS DEL TRABAJADOR++++++++++++++++++++++++++++++++++++ */
	$cnx_bd->autocommit(FALSE);
/*..........................................ACTUALIZACIÓN DATOS PERSONALES.........................................*/
	$sql = "UPDATE trabajador SET cedula = '{$cedula}', nombre = '{$nombre}', apellido = '{$apellido}', ciudadania = '{$nacionalidad}', pasaporte = '{$pasaporte}', libreta_militr = '{$libreta_militr}', fe_nac = '{$fecha_nac}', lug_nac = '{$lug_nac}', est_civil = '{$est_civil}', nconyugue = '{$nconyugue}', estudia = '{$estudia}',direccion = '{$direccion}', telefono = '{$telefono}', telefono_em = '{$telefono_em}', estado = '{$estado}', actualizado = '{$actualizacion}'
			WHERE cedula = '{$cedula_o}'";
		
	if ($cnx_bd->query($sql))
		$error[0] = false;
	else
		$error[0] = true;

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

/*..........................................ACTUALIZACIÓN DE DATOS LABORALES.........................................*/
	$sql = "UPDATE laboral SET fecha_ingreso = '{$fecha_ing}', condicion = '{$condicion}', cargo = '{$cargo}', rango = '{$rango}', area_desemp = '{$area_d}', resolucion = '{$resolucion}', ley = '{$ley}'
			WHERE cedula = '{$cedula}'";
		
	if ($cnx_bd->query($sql))
		$error[1] = false;
	else
		$error[1] = true;

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*......................................ACTUALIZACIÓN DE DATOS DE ESTUDIO..........................................*/
	$sql = "UPDATE estudios SET estudios = '{$estudio}', lugar_estudio = '{$lug_estudio}', anno = '{$ano}', titulo = '{$titulos}', observacion = '{$observacion}'
			WHERE cedula = '{$cedula}'";
		
	if ($cnx_bd->query($sql))
		$error[2] = false;
	else
		$error[2] = true;

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*...............................ACTUALIZACIÓN DE DATOS DE DOCUMENTACION CONSIGNADA................................*/
	$sql = "UPDATE documentos SET partida_naci = '{$part_nac}', inscrip_militar = '{$ins_milt}', cedula_ident = '{$ced_iden}', rif = '{$rif}', declaracion_jurada = '{$dec_jur}', informe_medico = '{$inf_med}', parti_nac_h = '{$part_nac_h}', acta_mat_div = '{$matr_divr}', defunciones = '{$defunc}', titulos = '{$titul}', certificados = '{$certf}', const_hor_est = '{$const_hora}'
			WHERE cedula = '{$cedula}'";
		
	if ($cnx_bd->query($sql))
		$error[3] = false;
	else
		$error[3] = true;

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*.................................ACTUALIZACIÓN DE DATOS DE REFERENCIAS PERSONALES...................................*/

	//SE ELIMINAN LOS DATOS DE REFERENCIAS PERSONALES PARA QUE SI EXITEN
	//DATOS DE NUEVAS REFERENCIAS PERSONALES PUEDAN SER INSERTADOS

	$sql = "DELETE FROM referencia_personal WHERE cedula = '{$cedula}'";
	
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
	
	$cont = 4;
	for($i=0;$i<=2;$i++){

		$sql = "INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)
				VALUES ('{$cedula_rp[$i]}','{$nombre_rp[$i]}','{$apellido_rp[$i]}','{$ocupacion_rp[$i]}','{$telefono_rp[$i]}','{$cedula}')";

		if ($cnx_bd->query($sql))
			$error[$cont] = false;
		else
			$error[$cont] = true;

		$cont++;

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION['sentencia'] = $sql;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);

	}


/*...............................ACTUALIZACIÓN DE DATOS DE OTRAS CATEGORIAS(uniforme)...................................*/
	$sql = "UPDATE uniforme SET camisa = '{$tall_cam}', pantalon = '{$tall_pant}', calzado = '{$tall_calz}'
			WHERE cedula = '{$cedula}'";
		
	if ($cnx_bd->query($sql))
		$error[$cont] = false;
	else
		$error[$cont] = true;

	$cont++;

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

/*............................................ACTUALIZACIÓN DE DATOS FAMILIARES.........................................*/

	//SE ELIMINAN LOS DATOS DE LA FAMILIA PARA QUE SI EXITEN
	//DATOS DE NUEVOS FAMILIARES PUEDANS SER INSERTADOS

	$sql = "DELETE FROM familia WHERE cedula = '{$cedula}'";
	
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

	if($familia){

		$ciclo_fam = 0;
		foreach($cedula_fam as $cedula_f){

			$fecha_nac_fam = $anonac_fam[$ciclo_fam].'-'.$mesnac_fam[$ciclo_fam].'-'.$dianac_fam[$ciclo_fam];

			$sql = "INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)
					VALUES ('{$cedula}','{$cedula_f}','{$nombres_fam[$ciclo_fam]}','{$apellidos_fam[$ciclo_fam]}','{$fecha_nac_fam}','{$parentesco_fam[$ciclo_fam]}','{$estudia_fam[$ciclo_fam]}','{$empl_fam[$ciclo_fam]}','{$cargo_fam[$ciclo_fam]}')";

			if ($cnx_bd->query($sql))
				$error[$cont] = false;
			else
				$error[$cont] = true;

			$cont++;
			$ciclo_fam++;

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);
		}
	}

	$e = false;
	for ($i=0; $i < $cont; $i++) { 
		if ($error[$i]) {
			$e = true;
			break;
		}
	}

	if ($e)
		$cnx_bd->rollback();
	else
		$cnx_bd->commit();

?>