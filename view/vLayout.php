<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="URF-8">
        <title>Lista de tareas</title>
        <link type="text/css" rel="stylesheet" href="../webroot/estilo.css">
    </head>
    <body>
        <?php require_once $aView[$_SESSION['paginaEnCurso']];?>
        <footer>
            <p>Última revisión: <?php echo date_format(new DateTime("2025/03/05"), "d/m/Y")?></p>
        </footer>
    </body>
</html>