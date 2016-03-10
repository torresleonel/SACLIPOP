<?php
	include("../_conexion/conexion_funcion.php");
	$cnx_bd = conexion();
	
	$user = $_POST["user"];
	$contra = $_POST["pass"];
	$contra = md5($contra);

	$sql = "SELECT * FROM usuario WHERE id_usuario = '$user' AND clave = '$contra'";
			
	$resultado = $cnx_bd->query($sql);
	error_sql($cnx_bd);



	$fila = $resultado->fetch_object();

	//vemos si el usuario y contraseña son válidos
	if ($user == $fila->id_usuario && $contra == $fila->clave){
		//usuario y contraseña válidos
		//se define una sesion y se guarda el dato
		session_start();
		$_SESSION["autenticado"]= 1;
		$_SESSION["usuario"] = $fila->id_usuario;
		$_SESSION["nombre"] = $fila->nombre;
		$_SESSION["apellido"] = $fila->apellido;
		$_SESSION["nivel_usuario"] = $fila->nivel;

		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION["sentencia"] = $sql;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($cnx_bd);

		header("Location: ../inicio.php");
	}else {
		//si no existe se va a index.php
		session_unset();
 		session_destroy();
		header("Location: ../../index.php?errorusuario=1");
	}
	
	$resultado->free();
	$cnx_bd->close();
?>