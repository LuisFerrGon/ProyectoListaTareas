<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 27/02/2025
     * @since 1.0.0
     */
    require_once 'model/tarea.php';
    require_once 'model/tareaPDO.php';
    require_once 'model/usuario.php';
    require_once 'model/usuarioPDO.php';
    $aController=[
        'inicioPublico'=>'controller/cInicioPublico.php',
        'iniciarSesion'=>'controller/cIniciarSesion.php',
        'registro'=>'controller/cRegistro.php',
        'inicioPrivado'=>'controller/cInicioPrivado.php',
        'registro'=>'controller/cRegistro.php',
        'mostrarTarea'=>'controller/cMostrarTarea.php',
        'editarTarea'=>'controller/cEditarTarea.php',
        'borrarTarea'=>'controller/cBorrarTarea.php',
        'error'=>'controller/cError.php',
        'wip'=>'controller/cWIP.php'
    ];
    $aView=[
        'layout'=>'view/vLayout.php',
        'inicioPublico'=>'view/vInicioPublico.php',
        'iniciarSesion'=>'view/vIniciarSesion.php',
        'registro'=>'view/vRegistro.php',
        'inicioPrivado'=>'view/vInicioPrivado.php',
        'registro'=>'view/vRegistro.php',
        'mostrarTarea'=>'view/vMostrarTarea.php',
        'editarTarea'=>'view/vEditarTarea.php',
        'borrarTarea'=>'view/vBorrarTarea.php',
        'error'=>'view/vError.php',
        'wip'=>'view/vWIP.php'
    ];
?>