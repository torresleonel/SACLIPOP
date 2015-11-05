<?php
//++++++++++++++++++++++++++++++++++++++++++++FUNCIONES PARA CONSULTA DEL BITACORA DE SACLIPOP+++++++++++++++++++++++++++++++++++++++++++++++

	function conslt_bitacora($cnx_bd){

		$m = $_POST['m'];
		$a = $_POST['a'];
		$ini = $a.'-'.$m.'-01';
		$fin = $a.'-'.$m.'-'.date('t',strtotime($ini));

		$sql = "SELECT * 
				FROM bitacora 
				WHERE fecha 
				BETWEEN '$ini' 
				AND '$fin'";
			
		$resultado = $cnx_bd->query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}

	function conslt_bitacora_user($cnx_bd){
		
		$usuario = $_POST['u'];
		$m = $_POST['m'];
		$a = $_POST['a'];
		$ini = $a.'-'.$m.'-01';
		$fin = $a.'-'.$m.'-'.date('t',strtotime($ini));
		$sql = "SELECT * 
				FROM bitacora 
				WHERE id_usuario = '$usuario' 
				AND fecha 
				BETWEEN '$ini' 
				AND '$fin'";
			
		$resultado = $cnx_bd->query($sql);
		
		//LLAMADO DE LA FUNCION QUE EVALUA ERROR DE CONSULTA A LA BASE DE DATOS
		error_sql($cnx_bd);
		
		//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
		return $resultado;
	}
?>