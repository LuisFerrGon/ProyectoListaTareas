<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 26/02/2025
     * @since 1.0.0
     */
    require_once 'config/confAPP.php';
    require_once 'config/confDB.php';
    require_once 'model/DBPDO.php';
    require_once 'model/error.php';
    require_once 'model/tarea.php';
    require_once 'model/tareaPDO.php';
    require_once 'model/usuario.php';
    require_once 'model/usuarioPDO.php';
    session_start();
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
    }
    require_once $aController[$_SESSION['paginaEnCurso']];
    require_once $aView['layout'];
?>