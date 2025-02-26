<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 26/02/2025
     * @since 1.0.0
     */
    require_once 'model/tarea.php';
    require_once 'model/tareaPDO.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/cambiarEstado\(\d+\)/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $codigo=substr($resultado[0], 14, strlen($resultado[0])-15);
        TareaPDO::cambiarEstado($oUsuarioActivo->getCodigo(), intval($codigo));
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/mostrar\(\d+\)/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $_SESSION['tareaEnCurso']=substr($resultado[0], 8, strlen($resultado[0])-9);
        $_SESSION['paginaEnCurso']='mostrarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/cambiar\(\d+\)/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $_SESSION['tareaEnCurso']=substr($resultado[0], 8, strlen($resultado[0])-9);
        $_SESSION['paginaEnCurso']='cambiarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/borrar\(\d+\)/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $_SESSION['tareaEnCurso']=substr($resultado[0], 7, strlen($resultado[0])-8);
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
        'descripcionTarea' => "%".$_SESSION['criterioBusqueda']['descripcionTarea']."%",
        'estado' => $_SESSION['criterioBusqueda']['estado']
    ];
    $aTareas=TareaPDO::buscarTarea($oUsuarioActivo->getCodigo(), $aCondicionesBusqueda);
?>