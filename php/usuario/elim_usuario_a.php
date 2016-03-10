<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../js/funcion_general.js"></script>
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_usuario.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA USUARIO*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/usuario_sql.php');
					$resultado = conslt_usuario_all($cnx_bd);
					$cnx_bd->close();
				?>
				<h1>Usuarios de SACLIPOP</h1>
				<table id="tabla">
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Usuario</th>
						<th>Nivel</th>
						<th>Acción</th>
					</tr>
					<?php
					if ($resultado->num_rows < 2) {
					?>
					<tr>
						<td colspan="5">No hay usuarios que se puedan eliminar.</td>
					</tr>
					<?php
					}else{
						while ($fila = $resultado->fetch_object()){
							if ($fila->id_usuario == $_SESSION["usuario"]) continue;
							if ($fila->nivel == 1) $nivel = "Administrador";
							else $nivel = "Básico";
					?>
							<tr>
								<td><?=$fila->nombre?></td>
								<td><?=$fila->apellido?></td>
								<td><?=$fila->id_usuario?></td>
								<td><?=$nivel?></td>
								<td>				
									<div class="izq">
										<a href= "#" class="eliminar" title="Click para eliminar usuario de SACLIPOP" onclick="envia_elim('<?=$fila->id_usuario?>')">Eliminar</a>
									</div>
								</td>
							</tr>
					<?php
						}
					}
					$resultado->free();
					?>
				</table>
				<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
			</div>
		</div>
	</body>
</html>