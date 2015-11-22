<?php
	//Inicio la sesión
	session_start();
	//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
	if ($_SESSION["autenticado"] != 1) {
		//si no existe, va a la página de autenticacion
		if (basename($_SERVER['PHP_SELF']) == 'inicio.php') {
			header('Location: ../index.php?errorusuario=2');
			//salimos de este script
			exit();
		} else {
			header('Location: ../../index.php?errorusuario=2');
			//salimos de este script
			exit();
		}
	}

	if ($_SESSION["nivel_usuario"] == 2) {
		$actual = basename($_SERVER['PHP_SELF']);
		$autorizadas = array(
			'inicio.php',
			'reg_trabj_a.php',
			'conslt_trabj_a.php',
			'modf_trabj_a.php',
			'conslt_trabj_b.php',
			'gen_const_a.php',
			'gen_const_b.php',
			'reg_com_serv_a.php',
			'conslt_com_serv_a.php',
			'conslt_com_serv_b.php',
			'modf_com_serv_a.php',
			'gen_ficha.php',
			'ficha_trbj.php',
			'gen_rcb_qui.php',
			'gen_rcb_vac.php',
			'gen_rcb_agu.php',
			'recibo_quin.php',
			'recibo_vacac.php',
			'recibo_aguin.php',
			'modf_usuario_a.php'
		);

		$autorizado = false;
		foreach ($autorizadas as $archivo) {
			if ($archivo == $actual) {
				$autorizado = true;
				break;
			}
		}

		if (!$autorizado) {
			session_unset();
			session_destroy();
			header('Location: ../../index.php?errorusuario=6');
			//salimos de este script
			exit();
		}
	}
?>