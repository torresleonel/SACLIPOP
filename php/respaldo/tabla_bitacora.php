<?php
	/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA CONSULTA DE BITACORA*/
	include('../_conexion/conexion_funcion.php');
	$cnx_bd = conexion();
	include('../_sql/bitacora_sql.php');
	if ($_POST['u'] == 'Todos los usuarios') $resultado = conslt_bitacora($cnx_bd);
	else $resultado = conslt_bitacora_user($cnx_bd);
	$cnx_bd -> close();
	if ($resultado -> num_rows <= 0) {
?>
		<div id="msnproceso">
			<h3>No existen registros para la consulta que ha realizado.</h3>
		</div>
<?php
	}else{
?>
		<table id="tabla">
			<caption>BITACORA</caption>
			<thead>
				<tr>
					<th>Que Hizo?</th>
					<th>Donde lo Hizo?</th>
					<th colspan="2">Quien lo Hizo?</th>
					<th>Cuando lo Hizo?</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($fila = $resultado -> fetch_object()){
						$sql = array();
						$sql = explode(" ",$fila -> sentencia);
						$num_palab = count($sql);
						for($i = 0; $i < $num_palab; $i++) {
							switch($sql[$i]) {
								case 'INSERT':
								$accion = 'Registrar';
								break;
								case 'UPDATE':
								$accion = 'Modificar';
								break;
								case 'SELECT':
								$accion = 'Seleccionar';
								break;
								case 'DELETE':
								$accion = 'Eliminar';
								break;
								case 'aguinaldo':
								$tabla = 'Aguinaldo';
								break;
								case 'bono_vacac':
								$tabla = 'Bono Vacacional';
								break;
								case 'comision_servicio':
								$tabla = 'Comisión de Servicio';
								break;
								case 'documentos':
								$tabla = 'Documentos';
								break;
								case 'estudios':
								$tabla = 'Estudios';
								break;
								case 'familia':
								$tabla = 'Familia';
								break;
								case 'laboral':
								$tabla = 'Laboral';
								break;
								case 'referencia_personal':
								$tabla = 'Referencia Personal';
								break;
								case 'salario':
								$tabla = 'Salario';
								break;
								case 'trabajador':
								$tabla = 'Trabajdor';
								break;
								case 'uniforme':
								$tabla = 'Uniforme';
								break;
								case 'usuario':
								$tabla = 'Usuario';
								if($accion == 'Seleccionar') {
									for($j = $i; $j < $num_palab; $j++) {
										if($sql[$j] == 'clave') {
											$accion = 'Ingresar';
											$tabla = 'SACLIPOP';
										}
									}
								}
								break;
							}
						}
						list($fch,$hr) = explode(' ',$fila -> fecha);
						list($a,$m,$d) = explode('-',$fch);
						list($h,$min,$seg) = explode(':',$hr);
						if($h == 0) {
							$h = 12;
							$format = 'AM';
						}elseif($h > 12) {
							$h -= 12;
							$format = 'PM';
						}elseif($h == 12) $format = 'PM';
						else $format = 'AM';
				?>
						<tr>
							<td><?=$accion?></td>
							<td><?=$tabla?></td>
							<td><?=$fila -> id_usuario?></td>
							<td><?=$fila -> nombre.' '.$fila -> apellido?></td>
							<td><?=$d.'-'.$m.'-'.$a.' '.$h.':'.$min.':'.$seg.' '.$format?></td>
						</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5">Cantidad de resultados: <?=$resultado -> num_rows?></th>
				</tr>
			</tfoot>
		</table>
<?php } ?>