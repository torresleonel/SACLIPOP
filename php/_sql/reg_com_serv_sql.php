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
	$nconyugue = $_POST["nconyugue"];
	$cargo = $_POST["cargo"];
	$fecha_ing = $_POST["anoing"].'-'.$_POST["mesing"].'-'.$_POST["diaing"];
	$actualizacion = date("Y").'-'.date("n").'-'.date("j");
	$dept_env = $_POST['dept_env'];
	$observacion = $_POST['observacion'];


/* +++++++++++++++++++++++++++++++++++++++++++SENTENCIAS SQL PARA TODOS LOS DATOS DEL TRABAJADOR++++++++++++++++++++++++++++++++++++ */

/*..........................................INSERCCION DE DATOS PERSONALES.........................................*/
	$sql = "INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,estado,actualizado)
			VALUES ('$cedula','$nombre','$apellido','$nacionalidad','$pasaporte','$libreta_militr','$fecha_nac','$lug_nac','$est_civil','$nconyugue','$estudia','$direccion','$telefono','1','$actualizacion')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);


/*..........................................INSERCCION DE DATOS COMISION SERVICIO...................................*/
	$sql = "INSERT INTO comision_servicio (cedula,dpt_envia,fecha_ingreso,cargo,observacion)
			VALUES ('$cedula','$dept_env','$fecha_ing','$cargo','$observacion')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);

?>