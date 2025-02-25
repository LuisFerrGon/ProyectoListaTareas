<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
    require_once 'model/tarea.php';
    require_once 'model/tareaPDO.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='inicioPublico';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep('cambiarEstado\(\d+\)', array_keys($_REQUEST))){
        $codigo=subtr($resultado, 14, strlen($resultado)-15);
        TareaPDO::cambiarEstado($_SESSION['usuarioActivo'], $codigo);
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep('mostrar\(\d+\)', array_keys($_REQUEST))){
        $_SESSION['tareaEnCurso']=subtr($resultado, 8, strlen($resultado)-9);
        $_SESSION['paginaEnCurso']='mostrarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep('cambiar\(\d+\)', array_keys($_REQUEST))){
        $_SESSION['tareaEnCurso']=subtr($resultado, 8, strlen($resultado)-9);
        $_SESSION['paginaEnCurso']='cambiarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep('borrar\(\d+\)', array_keys($_REQUEST))){
        $_SESSION['tareaEnCurso']=subtr($resultado, 7, strlen($resultado)-8);
        $_SESSION['paginaEnCurso']='borrarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }if(isset($_REQUEST['descripcionTarea'])){
        $_SESSION['criterioBusqueda']['descripcionTarea']=$_REQUEST['descripcionTarea'];
    }
    if(!isset($_SESSION['criterioBusqueda']['descripcionTarea'])){
        $_SESSION['criterioBusqueda']['descripcionTarea']=null;
    }
    if(isset($_REQUEST['estado'])){
        $_SESSION['criterioBusqueda']['estado']=$_REQUEST['estado'];
    }
    if(!isset($_SESSION['criterioBusqueda']['estado'])){
        $_SESSION['criterioBusqueda']['estado']='00';
    }
    $aCondicionesBusqueda=[
        'descripcion' => "%".$_SESSION['criterioBusqueda']['descripcionTarea']."%",
        'estado' => $_SESSION['criterioBusqueda']['estado']
    ];
    $aTareas= TareaPDO::buscarTarea($oUsuarioActivo->codigo, $aCondicionesBusqueda);
?>