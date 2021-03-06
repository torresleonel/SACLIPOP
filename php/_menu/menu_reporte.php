﻿<ul>
	<li title="Click para ir al inicio de SACLIPOP"><a href="../inicio.php"><span>Inicio</span></a></li>
	<li class="has-sub" title="Opciones para gestión del personal"><a href="#"><span>Gestionar Personal</span></a>
		<ul>
			<li title="Click para registrar nuevo personal"><a href="../trabajador/reg_trabj_a.php"><span>Registrar Personal</span></a></li>
			<li title="Click para consultar o modificar personal registrado"><a href="../trabajador/conslt_trabj_a.php"><span>Consultar Personal</span></a></li>
		</ul>
	</li>
	<li class="has-sub" title="Opciones para gestión de comisión de servicio"><a href="#"><span>Gestionar Comision de Servicio</span></a>
		<ul>
			<li title="Click para registrar nuevo comisión de servicio"><a href="../com_servicio/reg_com_serv_a.php"><span>Registrar Comisión de Servicio</span></a></li>
			<li title="Click para consultar o modificar comisión de servicio regitrado"><a href="../com_servicio/conslt_com_serv_a.php"><span>Consultar Comisión de Servicio</span></a></li>
		</ul>
	</li>
	<?php if($_SESSION["nivel_usuario"] == 1){ ?>
			<li class="has-sub" title="Opciones para gestión de pagos"><a href="#"><span>Gestionar Pagos</span></a>
				<ul>
					<li class="has-sub" title="Opciones para configurar el proceso de pago"><a href="#"><span>Configuración</span></a>
						<ul>
							<li title="Click para modificar el sueldo mensual del personal"><a href="../pago/modf_sueldo_mes_a.php"><span>Modificar Sueldo Mensual</span></a></li>
							<li class="has-sub" title="Opciones para gestionar el pago del ISLR"><a href="#"><span>ISLR</span></a>
								<ul>
									<li title="Click para modificar el valor de la U.T."><a href="#"><span>Valor Unidad Tributaria</span></a></li>
									<li title="Click para determinar que trabajadores pagan ISLR"><a href="#"><span>Asignar Pago ISLR</span></a></li>
								</ul>
							</li>
							<li class="has-sub" title="Opciones para gestionar las primas"><a href="#"><span>Primas</span></a>
								<ul>
									<li title="Click para crear nueva prima"><a href="../pago/gest_prima_a.php"><span>Gestionar Primas</span></a></li>
									<li title="Click para determinar que trabajadores recibira prima"><a href="#"><span>Asignar Primas</span></a></li>
								</ul>
							</li>
							<li title="Click para modificar el periodo de quincena donde se realizan las deducciones"><a href="../pago/modf_periodo_deduc_a.php"><span>Periodo Deducciones</span></a></li>
							<li title="Click para gestionar los dias feriados no laborables"><a href="../pago/conslt_feriado.php"><span>Gestionar Feriados</span></a></li>
						</ul>
					</li>
					<li class="has-sub" title="Opciones para calcular pagos"><a href="#"><span>Calcular Pagos</span></a>
						<ul>
							<li title="Click para calcular salario del personal"><a href="../pago/calc_salario_a.php"><span>Salario</span></a></li>
							<li title="Click para calcular bono vacacional del personal"><a href="../pago/calc_bono_vac_a.php"><span>Bono Vacacional</span></a></li>
							<li title="Click para calcular aguinaldos del personal"><a href="../pago/calc_aguinaldo_a.php"><span>Aguinaldos</span></a></li>
						</ul>
					</li>
					<li class="has-sub" title="Opciones para consultar pagos"><a href="#"><span>Consultar Pagos</span></a>
						<ul>
							<li class="has-sub" title="Opciones para consultar salario"><a href="#"><span>Salario</span></a>
								<ul>
									<li title="Click para consultar por periodo el salario individual por trabajador"><a href="../pago/conslt_salario_ind_a.php"><span>Consulta Individual</span></a></li>
									<li title="Click para consultar por periodo el salario en general de los trabajadores"><a href="../pago/conslt_salario_gen_a.php"><span>Consulta General</span></a></li>
								</ul>
							</li>
							<li class="has-sub" title="Opciones para consultar bono vacacional"><a href="#"><span>Bono Vacacional</span></a>
								<ul>
									<li title="Click para consultar por periodo el bono vacacional individual por trabajador"><a href="../pago/conslt_bono_vac_ind_a.php"><span>Consulta Individual</span></a></li>
									<li title="Click para consultar por periodo el bono vacacional en general de los trabajadores"><a href="../pago/conslt_bono_vac_gen_a.php"><span>Consulta General</span></a></li>
								</ul>
							</li>
							<li class="has-sub" title="Opciones para consultar aguinaldos"><a href="#"><span>Aguinaldos</span></a>
								<ul>
									<li title="Click para consultar por periodo el aguinaldo individual por trabajador"><a href="../pago/conslt_aguinaldo_ind_a.php"><span>Consulta Individual</span></a></li>
									<li title="Click para consultar por periodo los aguinaldos en general de los trabajadores"><a href="../pago/conslt_aguinaldo_gen_a.php"><span>Consulta General</span></a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
	<?php } ?>
	<li class="has-sub" title="Opciones para generar reportes"><a href="#"><span>Reportes</span></a>
		<ul>
			<li title="Click para generar constancia de trabajo"><a href="gen_const_a.php"><span>Constancias de Trabajo</span></a></li>
			<li title="Click para generar ficha historica del trabajador"><a href="gen_ficha.php"><span>Ficha Historica</span></a></li>
			<li class="has-sub" title="Click para generar recibo de pago"><a href="#"><span>Recibos de Pago</span></a>
				<ul>
					<li title="Click para generar recibo de pago Salario"><a href="gen_rcb_qui.php"><span>Salario</span></a></li>
					<li title="Click para generar recibo de pago Bono Vacacional"><a href="gen_rcb_vac.php"><span>Bono Vacacional</span></a></li>
					<li title="Click para generar recibo de pago Aguinaldos"><a href="gen_rcb_agu.php"><span>Aguinaldos</span></a></li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="has-sub" title="Opciones para gestionar usuario"><a href="#"><span>Gestionar Usuario</span></a>
		<ul>
			<?php if($_SESSION["nivel_usuario"] == 1){ ?>
				<li title="Click para regitrar un usuario en SACLIPOP"><a href="../usuario/reg_usuario_a.php"><span>Registrar Usuario</span></a></li>
				<li title="Click para eliminar un usuario de SACLIPOP"><a href="../usuario/elim_usuario_a.php"><span>Eliminar Usuario</span></a></li>
			<?php } ?>
			<li class="has-sub" title="Sección para modificar los datos del usuario"><a href="#"><span>Modificar Usuario</span></a>
				<ul>
					<li title="Click para modificar el perfil del usuario"><a href="../usuario/modf_perfil_a.php"><span>Perfil</span></a></li>
					<li title="Click para modificar la contraseña del usuario"><a href="../usuario/modf_pass_a.php"><span>Contraseña</span></a></li>
				</ul>
			</li>
		</ul>
	</li>
		<li class="has-sub" title="Opciones para gestionar SACLIPOP"><a href="#"><span>Gestionar Sistema</span></a>
			<ul>
			<?php if($_SESSION["nivel_usuario"] == 1){ ?>
				<li title="Click para respaldar la base de datos de SACLIPOP"><a href="../respaldo/respaldo_bd.php"><span>Respaldar Base de Datos</span></a></li>
				<li title="Click para restaurar la base de datos de SACLIPOP"><a href="../respaldo/conslt_respld_bd.php"><span>Restaurar Base de Datos</span></a></li>
				<li title="Click para consultar la bitacora de acciones en SACLIPOP"><a href="../respaldo/conslt_bitacora.php"><span>Consultar Bitacora</span></a></li>
			<?php } ?>
				<li title="Click para ver el manual de SACLIPOP"><a href="../../manual/manual.pdf" target="_blank"><span>Ayuda</span></a></li>
			</ul>
		</li>
	<li title="Click para para salir del sistema SACLIPOP"><a href="../_sesion/salir_sesion.php"><span>Salir</span></a></li>
</ul>