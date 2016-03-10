<?php
	
	function verifica_usuario($cnx_bd){
		
		$user = $_POST["user"];

		$sql = "SELECT * FROM usuario WHERE id_usuario ='$user'";
				
		$resultado = $cnx_bd->query($sql);
		error_sql($cnx_bd);

		$fila = $resultado->fetch_object();

		//vemos si el usuario es válido
		if ($user != $fila->id_usuario){
			//si no existe se va a index.php
			header("Location: ../../index.php?errorusuario=3");
		}
		return $fila;
	}

	function verifica_respuesta($cnx_bd){

		$user = $_POST["usuario"];
		$resp = $_POST["respuesta"];
		$resp = md5($resp);

		$sql = "SELECT id_usuario,respuesta FROM usuario WHERE id_usuario = '$user'";
				
		$resultado = $cnx_bd->query($sql);
		error_sql($cnx_bd);

		$fila = $resultado->fetch_object();

		//vemos si el usuario y contraseña son válidos
		if ($resp != $fila->respuesta){
			//si es incorrecta se va a index.php
			header("Location: ../../index.php?errorusuario=4");
		}
	}

	function cambio_pass($cnx_bd){
		
		$user = $_POST["usuario"];
		$pass1 = $_POST["clave"];
		$pass2 = $_POST["rep_clave"];
		$pass = md5($pass2);


		$sql = "UPDATE usuario 
				SET clave = '$pass'
				WHERE usuario.id_usuario = '$user'";
				
		$cnx_bd->query($sql);
		error_sql($cnx_bd);

	}
?>