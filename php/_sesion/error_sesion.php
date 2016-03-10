<?php
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="1"){
		echo "<span class='errse'>Usuario y/o contraseña incorrectos</span>";
	}
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="2"){
		echo "<span class='errse'>Debe iniciar sesión para tener acceso al sistema</span>";
	}
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="3"){
		echo "<span class='errse'>Nombre de usuario no existe</span>";
	}
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="4"){
		echo "<span class='errse'>La respuesta que ingreso es incorrecta</span>";
	}
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="5"){
		echo "<span class='errse'>Las contraseñas no coinciden, por favor vuelva a intentarlo</span>";
	}
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="6"){
		echo "<span class='errse'>No tiene autorización para acceder a la dirección que intenta ingresar</span>";
	}
?>