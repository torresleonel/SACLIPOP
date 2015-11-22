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
                    <?php include('../_menu/menu_respaldo.php'); ?>
                </div>
            </div>
            <div id="inicio">
            </div>
            <div id="pagina">
                <h1>Lista de archivos con respaldo de SACLIPOP</h1>
                <table id="tabla">
                    <tr>
                        <th>Nombre de archivo respaldado</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                        // Constantes con rutas
                        define('DS', DIRECTORY_SEPARATOR);
                        define('ROOT', realpath($_SERVER["DOCUMENT_ROOT"]) . DS);
                        // ruta donde se encuentran los archivos de respaldo
                        $dir = ROOT . 'SACLIPOP' . DS . 'php' . DS . 'respaldo'. DS . 'archivo';
                        $directorio=opendir($dir);//opendir() funcion para el manejo de archivos
                        while ($archivo=readdir($directorio)){//readdir() funcion para el manejo de archivos
                            if($archivo=='.' or $archivo=='..') continue;// no muestra el . y .. que estan al principio de las carpetas
                    ?>
                                <tr>
                                    <td>
                                        <a href="#"><?php echo $archivo; ?></a>
                                    </td>
                                    <td>
                                        <div class="izq">
                                            <a href="restaura_bd.php?a=<?=$archivo?>" class="restaurar" title="Click para restaurar esta versión de la base de datos de SACLIPOP">Restaurar</a>
                                        </div>
                                        <div class="izq">
                                            <a href= "archivo/<?=$archivo?>" class="descargar" title="Click para descargar el respaldo de la Base de Datos de SACLIPOP">Descargar</a>
                                        </div>
                                        <div class="izq">
                                            <a href= "#" class="eliminar" title="Click para eliminar el respaldo de la Base de Datos de SACLIPOP" onclick="envia_elim_bd('<?php echo $archivo; ?>')">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                    <?php
                        }
                        closedir($directorio);
                    ?>
                </table>
                <a href="../inicio.php" class="enlaceboton" title="Click para ir al inicio de SACLIPOP">Inicio</a>
            </div>
        </div>
    </body>
</html>