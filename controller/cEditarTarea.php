<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    require_once 'core/lValidacionFormulario.php';
    require_once 'config/confDB.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    $tareaEnCurso=$_SESSION['tareaEnCurso'];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='editarTarea';
        header('Location: index.php');
        exit();
    }
    define('OBLIGATORIO', 1);
    define('MAX_DESC', 255);
    define('MIN_DESC', 1);
    $aErrores=[
        'descripcionTarea'=>null
    ];
    $entradaOK=true;
    if(isset($_REQUEST['editar'])){
        $aErrores['descripcionTarea']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcionTarea'], MAX_DESC, MIN_DESC, OBLIGATORIO);
        foreach($aErrores as $value){
            if($value!=null){
                $entradaOK=false;
            }
        }
        if($entradaOK){
            TareaPDO::editarTarea($oUsuarioActivo->getCodigo(), $tareaEnCurso->getCodigo(), $_REQUEST['descripcionTarea'], $_REQUEST['volumenTarea']);
            $_SESSION['paginaEnCurso']='inicioPrivado';
            $_SESSION['paginaAnterior']='editarTarea';
            header('Location: index.php');
            exit();
        }
    }
    require_once $aView['layout'];
?>