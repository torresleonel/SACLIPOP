<?php

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++CAPTURA DATOS DEL FORMULARIO+++++++++++++++++++++++++++++++++++++++++ */


/*.........................DATOS PERSONALES.....................*/
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$cedula = $_POST["cedula"];
	$nacionalidad = $_POST["nacionalidad"];
	$libreta_militr = $_POST["libreta_militr"];
	$pasaporte = $_POST["pasaporte"];
	$est_civil = $_POST["est_civil"];
	$estudia = $_POST["estudia"];
	$direccion = $_POST["direccion"];
	$lug_nac = $_POST["lug_nac"];
	$fecha_nac = $_POST["anonac"].'-'.$_POST["mesnac"].'-'.$_POST["dianac"];
	$telefono = $_POST["telefono"];
	$telefono_em = $_POST["telefono_em"];
	$nconyugue = $_POST["nconyugue"];
	$cargo = $_POST["cargo"];
	$rango = $_POST["rango"];
	$condicion = $_POST["condicion"];
	$area_d = $_POST["area_d"];
	$fecha_ing = $_POST["anoing"].'-'.$_POST["mesing"].'-'.$_POST["diaing"];
	$resolucion = $_POST["resolucion"];
	$ley = $_POST["ley"];
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
		$estudia_fam = $_POST["estudia_fam"];
		$dianac_fam = $_POST["dianac_fam"];
		$mesnac_fam = $_POST["mesnac_fam"];
		$anonac_fam = $_POST["anonac_fam"];
		$cargo_fam = $_POST["cargo_fam"];
	}

/*.....................DATOS ESTUDIOS...........................*/
	$estudio = $_POST["estudio"];
	$lug_estudio = $_POST["lug_estudio"];
	$ano = $_POST["ano"];
	$titulos = $_POST["titulos"];
	$observacion = $_POST["observacion"];

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
	$nombre_rp[0] = $_POST["nombre_rp_1"];
	$apellido_rp[0] = $_POST["apellido_rp_1"];
	$cedula_rp[0] = $_POST["cedula_rp_1"];
	$telefono_rp[0] = $_POST["telefono_rp_1"];
	$ocupacion_rp[0] = $_POST["ocupacion_rp_1"];
	$nombre_rp[1] = $_POST["nombre_rp_2"];
	$apellido_rp[1] = $_POST["apellido_rp_2"];
	$cedula_rp[1] = $_POST["cedula_rp_2"];
	$telefono_rp[1] = $_POST["telefono_rp_2"];
	$ocupacion_rp[1] = $_POST["ocupacion_rp_2"];
	$nombre_rp[2] = $_POST["nombre_rp_3"];
	$apellido_rp[2] = $_POST["apellido_rp_3"];
	$cedula_rp[2] = $_POST["cedula_rp_3"];
	$telefono_rp[2] = $_POST["telefono_rp_3"];
	$ocupacion_rp[2] = $_POST["ocupacion_rp_3"];

/*.................DATOS DE OTRAS CATEGORIAS(uniforme)..................*/
	$tall_cam = $_POST["tall_cam"];
	$tall_pant = $_POST["tall_pant"];
	$tall_calz = $_POST["tall_calz"];



/* +++++++++++++++++++++++++++++++++++++++++++SENTENCIAS SQL PARA TODOS LOS DATOS DEL TRABAJADOR++++++++++++++++++++++++++++++++++++ */

/*..........................................INSERCCION DE DATOS PERSONALES.........................................*/
	$sql = "INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,telefono_em,estado,actualizado)
			VALUES ('$cedula','$nombre','$apellido','$nacionalidad','$pasaporte','$libreta_militr','$fecha_nac','$lug_nac','$est_civil','$nconyugue','$estudia','$direccion','$telefono','$telefono_em','1','$actualizacion')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

/*..........................................INSERCCION DE DATOS LABORALES.........................................*/
	$sql = "INSERT INTO laboral (cedula,fecha_ingreso,condicion,cargo,rango,area_desemp,resolucion,ley)
			VALUES ('$cedula','$fecha_ing','$condicion','$cargo','$rango','$area_d','$resolucion','$ley')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

/*............................................INSERCCION DE DATOS FAMILIARES.........................................*/
	if($familia){
		$ciclo_fam = 0;
		foreach($cedula_fam as $cedula_f){

			$fecha_nac_fam = $anonac_fam[$ciclo_fam].'-'.$mesnac_fam[$ciclo_fam].'-'.$dianac_fam[$ciclo_fam];

			$sql = "INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)
					VALUES ('$cedula','$cedula_f','$nombres_fam[$ciclo_fam]','$apellidos_fam[$ciclo_fam]','$fecha_nac_fam','$parentesco_fam[$ciclo_fam]','$estudia_fam[$ciclo_fam]','$empl_fam[$ciclo_fam]','$cargo_fam[$ciclo_fam]')";

			$cnx_bd->query($sql);
	
			//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
			error_sql($cnx_bd);

			$ciclo_fam++;

			//SE ALMACENA LA SENTENCIA SQL
			$_SESSION['sentencia'] = $sql;
			//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
			bitacora($cnx_bd);
		}
	}


/*......................................INSERCCION DE DATOS DE ESTUDIO..........................................*/
	$sql = "INSERT INTO estudios (cedula,estudios,lugar_estudio,anno,titulo,observacion)
			VALUES ('$cedula','$estudio','$lug_estudio','$ano','$titulos','$observacion')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*...............................INSERCCION DE DATOS DE DOCUMENTACION CONSIGNADA................................*/
	$sql = "INSERT INTO documentos (cedula,partida_naci,inscrip_militar,cedula_ident,rif,declaracion_jurada,informe_medico,parti_nac_h,acta_mat_div,defunciones,titulos,certificados,const_hor_est)
			VALUES ('$cedula','$part_nac','$ins_milt','$ced_iden','$rif','$dec_jur','$inf_med','$part_nac_h','$matr_divr','$defunc','$titul','$certf','$const_hora')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*.................................INSERCCION DE DATOS DE REFERENCIAS PERSONALES...................................*/
	for($i=0;$i<=2;$i++){

		$sql = "INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)
				VALUES ('$cedula_rp[$i]','$nombre_rp[$i]','$apellido_rp[$i]','$ocupacion_rp[$i]','$telefono_rp[$i]','$cedula')";

		$cnx_bd->query($sql);

		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION['sentencia'] = $sql;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);

	}


/*...............................INSERCCION DE DATOS DE OTRAS CATEGORIAS(uniforme)...................................*/
	$sql = "INSERT INTO uniforme (cedula,camisa,pantalon,calzado)
			VALUES ('$cedula','$tall_cam','$tall_pant','$tall_calz')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

?>