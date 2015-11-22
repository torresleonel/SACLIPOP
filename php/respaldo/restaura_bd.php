<?php
    // Constantes con rutas
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath($_SERVER["DOCUMENT_ROOT"]) . DS);
    define('MYSQL', realpath($_SERVER["MYSQL_HOME"]) . DS);

	$user = 'root';
	$password = 'root';

	// Ruta donde se almacena el archivo de respaldo
    $dir = ROOT . 'SACLIPOP' . DS . 'php' . DS . 'respaldo'. DS . 'archivo' . DS . $_GET['a'];

    // Se evalua que sistema operativo se usa para determinar el comando
    if (PHP_OS == 'Linux')
        $comando = "mysql  --user=$user --password=$password cpjm < $dir";
    else
        $comando = MYSQL . "mysql  --user=$user --password=$password cpjm < $dir";

	system($comando,$error);
	if($error){
		echo "<script type='text/javascript'>alert('No se ha podido restaurar la Base de Datos')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}else{
	    echo "<script type='text/javascript'>alert('Se ha restaurado con exito la Base de Datos de SACLIPOP')</script>";
	    echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}
?>