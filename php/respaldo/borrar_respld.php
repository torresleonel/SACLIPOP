<?php
	$archivo=$_GET['a'];
    $directorio='C:\xampp\htdocs\SACLIPOP\php\respaldo\archivo';
	$ruta=$directorio.'\\'.$archivo;
	$resultado=unlink($ruta);
    if(!$resultado){
		echo "<script type='text/javascript'>alert('No se ha podido Eliminar el archivo de respaldo')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('El archivo de respaldo ha sido eliminado con exito')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}
?>