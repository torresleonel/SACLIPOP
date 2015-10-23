<?php
	//Inicio la sesión
	session_start();
	//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
	if ($_SESSION["autenticado"] != 1) {
		//si no existe, va a la página de autenticacion
		if (basename($_SERVER['PHP_SELF']) == 'inicio.php') header('Location: ../index.php');
		else header('Location: ../../index.php');
		//salimos de este script
		exit();
	}
?>