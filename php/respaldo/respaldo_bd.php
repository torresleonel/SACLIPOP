<?php
    //programa que deben llamar para realizar respaldo de la base de datos
	//ZONA HORARIA
	date_default_timezone_set('America/Caracas');
    $user = 'root';
    $password = 'root';
    $nombre = 'respaldo_SACLIPOP_'.date('Y-m-d').'.sql';
    $directorio = 'C:\xampp\htdocs\SACLIPOP\php\respaldo\archivo';
    $dir = $directorio.'\\'.$nombre;
    $comando = "C:\\xampp\mysql\bin\mysqldump.exe  --user=$user --password=$password cpjm > $dir";
    system($comando,$error);
    if($error){
        echo "<script type='text/javascript'>alert('No se ha podido respaldar la Base de Datos de SACLIPOP')</script>";
        echo "<script type='text/javascript'>window.location.href='../inicio.php'</script>";
    }else{
        echo "<script type='text/javascript'>alert('Respaldo exitoso de la Base de Datos de SACLIPOP')</script>";
        echo "<script type='text/javascript'>window.location.href='../inicio.php'</script>";
    }
?>