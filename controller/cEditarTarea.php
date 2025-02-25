<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
    require_once 'core/lValidacionFormularios.php';
    require_once 'config/confDB.php';
    $oUsuarioActivo=$_SESSION['usuarioActivo'];
    $tareaEnCurso=$_SESSION['tareaEnCurso'];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='inicioPrivado';
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
        $aErrores['descripcionTarea']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcionTarea'], MAX_DESC, MIN_DESC, OBLIGATORIO);
        foreach($aErrores as $value){
            if($value!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    if($entradaOK){
        TareaPDO::editarTarea($oUsuarioActivo->codigo, $tareaEnCurso->getCodigo(), $_REQUEST['descripcionTarea'], $_REQUEST['volumenTarea']);
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='editarTarea';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
?>