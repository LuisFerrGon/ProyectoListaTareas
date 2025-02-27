<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 27/02/2025
     * @since 1.0.0
     */
    require_once 'core/lValidacionFormulario.php';
    require_once 'config/confDB.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    $tareaEnCurso=$_SESSION['tareaEnCurso'];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='borrarTarea';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['borrar'])){
        TareaPDO::borrarTarea($oUsuarioActivo->getCodigo(), $tareaEnCurso->getCodigo());
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='borrarTarea';
        header('Location: index.php');
        exit();
    }
?>