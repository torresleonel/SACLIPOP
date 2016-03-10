<?php
	session_start();
	session_unset();
	session_destroy();
	if (basename($_SERVER['PHP_SELF']) == 'inicio.php') {
		header('Location: ../index.php');
		exit();
	} else {
		header('Location: ../../index.php');
		exit();
	}
?>