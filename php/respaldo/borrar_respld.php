<?php
    // Constantes con rutas
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath($_SERVER["DOCUMENT_ROOT"]) . DS);

    // Ruta donde se almacena el archivo de respaldo
    $ruta = ROOT . 'SACLIPOP' . DS . 'php' . DS . 'respaldo'. DS . 'archivo' . DS . $_GET['a'];
    // Se elimina el archivo
	$resultado=unlink($ruta);
	
    if(!$resultado){
		echo "<script type='text/javascript'>alert('No se ha podido Eliminar el archivo de respaldo')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('El archivo de respaldo ha sido eliminado con exito')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}
?>