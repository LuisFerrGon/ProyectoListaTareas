<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 24/02/2025
     * @since 1.0.0
     */
    require_once 'config/confAPP.php';
    require_once 'config/confDB.php';
    session_start;
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
    }
    require_once $aController[$_SESSION['paginaEnCurso']];
    require_once $aView['layout'];
?>