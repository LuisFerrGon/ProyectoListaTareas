<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    $tareaEnCurso=$_SESSION['tareaEnCurso'];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='mostrarTarea';
        header('Location: index.php');
        exit();
    }
?>