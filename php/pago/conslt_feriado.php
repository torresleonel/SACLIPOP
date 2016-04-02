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
                    <?php include('../_menu/menu_pago.php'); ?>
                </div>
            </div>
            <div id="inicio">
            </div>
            <div id="pagina">
                <h1>Lista de dias feriados no laborables</h1>
                <table id="tabla">
                    <tr>
                        <th>Dia feriado no laborable</th>
                        <th>Acción</th>
                    </tr>
                    <?php
					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA DIAS FERIADOS*/
					include('../_conexion/conexion_funcion.php');
					$cnx_bd = conexion();
					include('../_sql/calculo_pago_sql.php');
					$feriado = conslt_dias_feriados($cnx_bd);
					$cnx_bd->close();
                    $cant = count($feriado);
                    if ($cant < 1) {
                    ?>
                        <tr>
                            <td colspan="2">No hay dias feriados registrados.</td>
                        </tr>
                    <?php
                    }else{
                        for ($i=0; $i < $cant; $i++) {
							list($d,$m) = explode("-",$feriado[$i]);
                    ?>
                            <tr>
                                <td>
                                    <a href="#"><?=$d.' de '.nombre_fecha('mes',intval($m))?></a>
                                </td>
                                <td>
                                    <div class="izq">
                                        <a href= "#" class="eliminar" title="Click para eliminar el dia feriado" onclick="envia_elim('<?=$feriado[$i]?>')">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
                <a href="reg_feriado_a.php" class="enlaceboton" title="Click para registrar nuevo dia feriado">Nuevo Dia</a>
            </div>
        </div>
    </body>
</html>