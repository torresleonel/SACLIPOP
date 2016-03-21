<?php

function reg_usuario($cnx_bd)
{
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$nombre = ucwords(strtolower($_POST['nombre']));
	$apellido = ucwords(strtolower($_POST['apellido']);
	$nivel = $_POST['nivel'];
	$pass = md5($clave);

	/*...................INSERCCION DE DATOS DEL USUARIO..................*/
	$sql = "INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)
			VALUES ('$usuario','$pass','$nombre','$apellido','$nivel')";
		
	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
}

function conslt_usuario($cnx_bd)
{
	$usuario = $_SESSION['usuario'];

	$sql = "SELECT id_usuario,nombre,apellido,pregunta,respuesta FROM usuario WHERE id_usuario='$usuario'";
		
	$resultado = $cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);
	
	//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
	return $resultado;
}

function conslt_usuario_all($cnx_bd)
{

	$sql = "SELECT id_usuario,nombre,apellido,nivel FROM usuario";
		
	$resultado = $cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);
	
	//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
	return $resultado;
}

function elimi_usuario($cnx_bd)
{
	$usuario = $_GET['usuario'];

	$sql = "DELETE FROM usuario WHERE id_usuario = '$usuario'";

	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
}

function modf_usuario($cnx_bd)
{
	$viejo_usuario = $_SESSION['usuario'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['rep_clave'];
	$nombre = ucwords(strtolower($_POST['nombre']));
	$apellido = ucwords(strtolower($_POST['apellido']));
	$preg_seg = $_POST['preg_seg'];
	$respuesta = $_POST['respuesta'];
	$clave = md5($clave);
	$respuesta = md5($respuesta);

	$sql = "UPDATE usuario 
			SET id_usuario = '$usuario',clave = '$clave',nombre = '$nombre',apellido = '$apellido',pregunta = '$preg_seg',respuesta = '$respuesta'
			WHERE usuario.id_usuario = '$viejo_usuario'";

	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
}

function modf_perfil($cnx_bd)
{
	$viejo_usuario = $_SESSION['usuario'];
	$usuario = $_POST['usuario'];
	$nombre = ucwords(strtolower($_POST['nombre']));
	$apellido = ucwords(strtolower($_POST['apellido']));
	$preg_seg = $_POST['preg_seg'];
	$respuesta = $_POST['respuesta'];
	$respuesta = md5($respuesta);

	$sql = "UPDATE usuario 
			SET id_usuario = '$usuario',nombre = '$nombre',apellido = '$apellido',pregunta = '$preg_seg',respuesta = '$respuesta'
			WHERE usuario.id_usuario = '$viejo_usuario'";

	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
}

function modf_pass($cnx_bd)
{
	$usuario = $_SESSION['usuario'];
	$clave = $_POST['rep_clave'];
	$clave = md5($clave);

	$sql = "UPDATE usuario 
			SET clave = '$clave'
			WHERE usuario.id_usuario = '$usuario'";

	$cnx_bd->query($sql);
	
	//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
	error_sql($cnx_bd);

	//SE ALMACENA LA SENTENCIA SQL
	$_SESSION['sentencia'] = $sql;
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($cnx_bd);
}
?>