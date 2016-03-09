<?php include('../_sesion/verifica_sesion.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
	<head>
		<title>..::SACLIPOP::..</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="image/x-icon" href="../../imagen/sys.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen" />	
    </head>
	<body>
		<div id="cuerpo">
			<div id="menu">
				<div id="cssmenu">
					<?php include('../_menu/menu_trabj.php'); ?>
				</div>
			</div>
			<div id="inicio">
			</div>
			<div id="pagina">
				<?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA TRABAJADOR*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/conslt_trabj_sql.php');
					$trb_actv = conslt_trb($cnx_bd,1);
					$trb_inactv = conslt_trb($cnx_bd,0);
					$cnx_bd->close();
				?>
				<h1>Consulta Personal de la Clinica</h1>
				<table id="tabla">
					<caption>Personal activo</caption>
					<tr>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Acciones</th>
					</tr>
					<?php
					if ($trb_actv->num_rows < 1) {
					?>
					<tr>
						<td colspan="4">No hay Personal Activo registrado</td>
					</tr>
					<?php
					}else{
						while ($fila = $trb_actv->fetch_object()){
					?>
							<tr>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->apellido?></a></td>
								<td>				
									<div class="izq">
										<a href= "modf_trabj_a.php?c=<?=$fila->cedula?>" class="modificar" title="Click para modificar los datos del trabajador">Modificar</a>
									</div>
									<div class="izq">
										<a href= "../reporte/gen_const_b.php?c=<?=$fila->cedula?>" class="constancia" title="Click para generar constancia de trabajo">Constancia</a>
									</div>
								</td>
							</tr>
					<?php
						}
					}
					$trb_actv->free();
					?>
				</table>
				<table id="tabla">
					<caption>Personal no activo</caption>
					<tr>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Acciones</th>
					</tr>
					<?php
					if ($trb_inactv->num_rows < 1) {
					?>
					<tr>
						<td colspan="4">No hay Personal Inactivo registrado</td>
					</tr>
					<?php
					}else{
						while ($fila = $trb_inactv->fetch_object()){
					?>
							<tr>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->cedula?></a></td>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->nombre?></a></td>
								<td><a href="conslt_trabj_b.php?c=<?=$fila->cedula?>" title="Click para consultar los datos del trabajador"><?=$fila->apellido?></a></td>
								<td>				
									<div class="izq">
										<a href= "modf_trabj_a.php?c=<?=$fila->cedula?>" class="modificar" title="Click para modificar los datos del trabajador">Modificar</a>
									</div>
								</td>
							</tr>
					<?php
						}
					}
					$trb_inactv->free();
					?>
				</table>
				<a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
			</div>
		</div>
	</body>
</html>
