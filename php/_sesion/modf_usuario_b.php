<?php
include('verifica_sesion.php');
include('../_conexion/conexion_funcion.php');
include('../_sql/usuario_sql.php');
$cnx_bd = conexion();
modf_usuario($cnx_bd);
$cnx_bd->close();
header("Location: ../inicio.php");
exit();
?>