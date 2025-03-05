<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    require_once 'model/tarea.php';
    require_once 'model/tareaPDO.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        session_destroy();
        exit();
    }
    if($resultado=preg_grep("/cambiar/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $codigo=substr($resultado, 8, strlen($resultado)-9);
        TareaPDO::cambiarEstado($oUsuarioActivo->getCodigo(), intval($codigo));
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/mostrar/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $codigo=substr($resultado, 8, strlen($resultado)-9);
        $_SESSION['tareaEnCurso']= TareaPDO::buscarTareaPorCodigo($oUsuarioActivo->getCodigo(), intval($codigo));
        $_SESSION['paginaEnCurso']='mostrarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/editar/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $codigo=substr($resultado, 7, strlen($resultado)-8);
        $_SESSION['tareaEnCurso']= TareaPDO::buscarTareaPorCodigo($oUsuarioActivo->getCodigo(), intval($codigo));
        $_SESSION['paginaEnCurso']='editarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep("/borrar/", array_keys($_REQUEST))){
        $resultado=array_values($resultado)[0];
        $codigo=substr($resultado, 7, strlen($resultado)-8);
        $_SESSION['tareaEnCurso']= TareaPDO::buscarTareaPorCodigo($oUsuarioActivo->getCodigo(), intval($codigo));
        $_SESSION['paginaEnCurso']='borrarTarea';
        $_SESSION['paginaAnterior']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['crear']) && $_REQUEST['nuevaTarea']!=null){
        TareaPDO::crearTarea($oUsuarioActivo->getCodigo(), $_REQUEST['nuevaTarea']);
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['primeraPag'])){
        $_SESSION['paginaPaginacion']=1;
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['ultimaPag'])){
        $_SESSION['paginaPaginacion']='max';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['anteriorPag']) && $_SESSION['paginaPaginacion']>1){
        $_SESSION['paginaPaginacion']--;
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['siguientePag'])){
        $_SESSION['paginaPaginacion']++;
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['descripcionTarea'])){
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
    if(!isset($_SESSION['paginaPaginacion'])){
        $_SESSION['paginaPaginacion']=1;
    }
    $aCondicionesBusqueda=[
        'descripcionTarea' => "%".$_SESSION['criterioBusqueda']['descripcionTarea']."%",
        'estado' => $_SESSION['criterioBusqueda']['estado']
    ];
    $aTareas=TareaPDO::buscarTarea($oUsuarioActivo->getCodigo(), $aCondicionesBusqueda);
    $paginacionUltimo=ceil(sizeof($aTareas)/5);
    if($paginacionUltimo==0){$paginacionUltimo=1;}
    $paginacionMostrar=$_SESSION['paginaPaginacion'];
    if($paginacionUltimo<$paginacionMostrar || $paginacionMostrar=='max'){
        $paginacionMostrar=$paginacionUltimo;
        $_SESSION['paginaPaginacion']=$paginacionMostrar;
    }
    if(count($aTareas)!=0){
        $aTareasMostrar=array_chunk($aTareas, 5, true)[$paginacionMostrar-1];
    }else{
        $aTareasMostrar=null;
    }
?>