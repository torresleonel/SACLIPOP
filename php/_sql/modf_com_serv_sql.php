<?php

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++CAPTURA DATOS DEL FORMULARIO+++++++++++++++++++++++++++++++++++++++++ */


/*.........................DATOS PERSONALES.....................*/
	$estado  = $_POST["estado"];
	$nombre = ucwords(strtolower($_POST["nombre"]));
	$apellido = ucwords(strtolower($_POST["apellido"]));
	$ced_vj = $_POST["c"];
	$cedula = $_POST["cedula"];
	$nacionalidad = ucwords(strtolower($_POST["nacionalidad"]));
	$libreta_militr = $_POST["libreta_militr"];
	$pasaporte = $_POST["pasaporte"];
	$est_civil = $_POST["est_civil"];
	$estudia = $_POST["estudia"];
	$direccion = $_POST["direccion"];
	$lug_nac = ucwords(strtolower($_POST["lug_nac"]));
	$fecha_nac = $_POST["anonac"].'-'.$_POST["mesnac"].'-'.$_POST["dianac"];
	$telefono = $_POST["telefono"];
	$nconyugue = ucwords(strtolower($_POST["nconyugue"]));
	$cargo = ucwords(strtolower($_POST["cargo"]));
	$fecha_ing = $_POST["anoing"].'-'.$_POST["mesing"].'-'.$_POST["diaing"];
	$actualizacion = date("Y").'-'.date("n").'-'.date("j");
	$dept_env = ucwords(strtolower($_POST["dept_env"]));
	$observacion = ucwords(strtolower($_POST["observacion"]));


/* +++++++++++++++++++++++++++++++++++++++++++SENTENCIAS SQL PARA TODOS LOS DATOS DEL TRABAJADOR++++++++++++++++++++++++++++++++++++ */

/*..........................................MODIFICACION DE DATOS PERSONALES.........................................*/


	$sql = "UPDATE trabajador 
			SET cedula = '$cedula',nombre = '$nombre',apellido = '$apellido',ciudadania = '$nacionalidad',pasaporte = '$pasaporte',libreta_militr = '$libreta_militr',fe_nac = '$fecha_nac',lug_nac = '$lug_nac',est_civil = '$est_civil',nconyugue = '$nconyugue',estudia = '$estudia',direccion = '$direccion',telefono = '$telefono',estado = '$estado',actualizado = '$actualizacion'
			WHERE cedula = '$ced_vj'";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*..........................................INSERCCION DE DATOS COMISION SERVICIO...................................*/
	$sql = "UPDATE comision_servicio 
			SET cedula = '$cedula',dpt_envia = '$dept_env',fecha_ingreso = '$fecha_ing',cargo = '$cargo',observacion = '$observacion'
			WHERE cedula = '$ced_vj'";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

?>