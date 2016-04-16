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
                <h1>Primas</h1>
                <form action="gest_prima_b.php" method="post">
                    <table id="tabla">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad U.T.</th>
                            <th>Estado</th>
                        </tr>
                        <?php
    					/*SE LLAMA A LOS ARCHIVOS QUE CONTIENEN LA FUNCION DE CONEXION A LA BD Y LA FUNCION DE CONSULTA DIAS FERIADOS*/
    					include('../_conexion/conexion_funcion.php');
    					$cnx_bd = conexion();
    					include('../_sql/calculo_pago_sql.php');
    					$primas = conslt_prima($cnx_bd);
    					$cnx_bd->close();
                        while ($fila = $primas->fetch_object()) {
                        ?>
                            <tr>
                                <td>
                                    <a href="#"><?=ucwords(strtolower($fila->nombre))?></a>
                                    <input type="hidden" name="nombre[]" value="<?=$fila->nombre?>" />
                                </td>
                                <td>
                                    <input type="number" name="cantidad_ut[]" value="<?=$fila->cantidad_ut?>" required="required" />
                                </td>
                                <td>
                                    <select name="estatus[]" required="required">
                                        <option value="0"<?php if ($fila->estatus == 0) echo 'selected="selected"'; ?>>Inactiva</option>
                                        <option value="1"<?php if ($fila->estatus == 1) echo 'selected="selected"'; ?>>Activa</option>
                                    </select>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
                    <input type="submit" name="modificar" value="Modificar" id="boton" />
                </form>
            </div>
        </div>
    </body>
</html>