<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 26/02/2025
     * @since 1.0.0
     */
    if(isset($_REQUEST['login'])){
        $_SESSION['paginaEnCurso']='iniciarSesion';
        $_SESSION['paginaAnterior']='inicioPublico';
        header('Location: index.php');
        exit();
    }
?>