<?php
    //programa que deben llamar para realizar respaldo de la base de datos
    // Constantes con rutas
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath($_SERVER["DOCUMENT_ROOT"]) . DS);
    // "MYSQL_HOME" es declarado especificamento por xampp-windows, no funciona en otros paquetes de servidores http
    define('MYSQL', realpath($_SERVER["MYSQL_HOME"]) . DS);
	//ZONA HORARIA
	date_default_timezone_set('America/Caracas');

    $user = 'root';
    $password = 'root';
    $nombre = 'respaldo_SACLIPOP_'.date('Y-m-d').'.sql';

    // Ruta donde se almacenara el archivo de respaldo
    $dir = ROOT . 'SACLIPOP' . DS . 'php' . DS . 'respaldo'. DS . 'archivo' . DS . $nombre;
    
    // Se evalua que sistema operativo se usa para determinar el comando
    if (PHP_OS == 'Linux')
        $comando = "mysqldump  --user=$user --password=$password cpjm > $dir";
    else
        $comando = MYSQL . "mysqldump  --user=$user --password=$password cpjm > $dir";

    system($comando,$error);
    if($error){
        echo "<script type='text/javascript'>alert('No se ha podido respaldar la Base de Datos de SACLIPOP')</script>";
        echo "<script type='text/javascript'>window.location.href='../inicio.php'</script>";
    }else{
        echo "<script type='text/javascript'>alert('Respaldo exitoso de la Base de Datos de SACLIPOP')</script>";
        echo "<script type='text/javascript'>window.location.href='../inicio.php'</script>";
    }
?>