<?php
	$archivo = $_GET['a'];
	$user = 'root';
	$password = 'root';
	$directorio = 'C:\xampp\htdocs\SACLIPOP\php\respaldo\archivo';// ruta donde se encuentran el archivo que quiero recuperar
	$dir = $directorio.'\\'.$archivo; //concatena la ruta con el nombre del archivo
	$comando = "C:\\xampp\mysql\bin\mysql.exe  --user=$user --password=$password cpjm < $dir";
	system($comando,$error);
	if($error){
		echo "<script type='text/javascript'>alert('No se ha podido restaurar la Base de Datos')</script>";
		echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}else{
	    echo "<script type='text/javascript'>alert('Se ha restaurado con exito la Base de Datos de SACLIPOP')</script>";
	    echo "<script type='text/javascript'>window.location.href='conslt_respld_bd.php'</script>";
	}
?>