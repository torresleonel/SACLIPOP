<?php
	//ZONA HORARIA
	date_default_timezone_set('America/Caracas');

	
	//FUNCIÓN PARA REALIZAR NUEVA CONEXION CON EL SERVIDOR Y LA BASE DE DATOS
	function conexion() {

		//SE DEFINEN LAS CONSTANTES QUE ALMACENARAN LOS DATOS PARA LA CONEXION AL SERVIDOR Y LA BASE DE DATOS
		define('USUARIO', 'root');
		define('CONTRASENA','root');
		define('SERVIDOR','localhost');
		define('BD','cpjm');

		//SE REALIZA UNA NUEVA CONEXIÓN
		$conexion_bd = new mysqli(SERVIDOR, USUARIO, CONTRASENA, BD);
		
		//SE EVALUA EL EXITO DE LA CONEXIÓN
		if ($conexion_bd->connect_errno > 0) {
			printf(
				'<h2>Error en la conexión con la base de datos</h2>
				<p>
					<b>Error #:</b> %d
					<br>
					<b>Mensaje:</b> %s
				</p>',
				$conexion_bd->connect_errno,
				$conexion_bd->connect_error
			);
			exit();
		}
		return $conexion_bd;
	}	
	
	//FUNCION PARA MOSTRAR ERROR DE LA CONSULTA A LA BASE DE DATOS
	function error_sql($cnx_bd) {
		if ($cnx_bd->errno > 0) {
			printf(
				'<h2>Error en la consulta a la base de datos</h2>
				<p>
					<b>Error #:</b> %d
					<br>
					<b>Mensaje:</b> %s
				</p>',
				$cnx_bd->errno,
				$cnx_bd->error
			);
			$cnx_bd->close();
			exit();
		}
	}

	//FUNCION PARA REGISTRAR LA BITACORA DE ACCIONES DE LOS USUARIOS
	

	function bitacora($cnx_bd){

		$usuario = $_SESSION["usuario"];
		$nombre = $_SESSION["nombre"];
		$apellido = $_SESSION["apellido"];
		$sentencia = mysql_real_escape_string($_SESSION["sentencia"]);

		$sql = "INSERT INTO bitacora (id_usuario,nombre,apellido,sentencia)
				VALUES ('$usuario','$nombre','$apellido','$sentencia')";
				
		$cnx_bd->query($sql);
	
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
	}
	

	//FUNCION PARA DAR NOMBRE AL NUMERO DE MES O AL NUMERO DE DIA DEL MES

	function nombre_fecha($tipo,$numero){
		if ($tipo == 'mes') {
			$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			return $meses[$numero];
		}elseif ($tipo == 'dia'){
			$dias = array('','primero','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez',
							'once','doce','trece','catorce','quince','dieciseis','diecisiete','dieciocho','diecinueve','veinte',
							'veintiuno','veintidos','veintitres','veinticuatro','veinticinco','veintiseis','veintisiete','veintiocho','veintinueve','treinta','treinta y uno');
			return $dias[$numero];
		}
	}
?>