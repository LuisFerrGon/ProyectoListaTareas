<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    require_once 'core/lValidacionFormulario.php';
    define('OBLIGATORIO', 1);
    define('MAX_CODIGO', 8);
    define('MIN_CODIGO', 4);
    define('MAX_CONTRASENA', 8);
    define('MIN_CONTRASENA', 4);
    define('MAX_NOMBRE', 255);
    define('MIN_NOMBRE', 1);
    define('DEBIL', 1);     #La contraseña solo admite letras
    define('MEDIO', 2);     #La contraseña admite letras y números
    define('FUERTE', 3);    #La contraseña debe contener como mínimo una mayuscula y un número
    $aErrores=[
        'codigo'=>null,
        'constrasena'=>null,
        'nombre'=>null
    ];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='iniciarSesion';
        $_SESSION['paginaAnterior']='registro';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['registro'])){
        $aErrores['codigo']=validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], MAX_CODIGO, MIN_CODIGO, OBLIGATORIO);
        $aErrores['contrasena']=validacionFormularios::validarPassword($_REQUEST['contrasena'], MAX_CONTRASENA, MIN_CONTRASENA, MEDIO, OBLIGATORIO);
        $aErrores['nombre']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['nombre'], MAX_NOMBRE, MIN_NOMBRE, OBLIGATORIO);
        if($aErrores['codigo']==null){
            $aErrores['codigo']=(UsuarioPDO::usuarioExiste($_REQUEST['codigo']))
            ?"El código ya está en uso, escoja otro."
            :null;
        }
        if($aErrores['codigo']==null && $aErrores['contrasena']==null && $aErrores['nombre']==null){
            UsuarioPDO::crearUsuario($_REQUEST['codigo'], $_REQUEST['contrasena'], $_REQUEST['nombre']);
            $oUsuarioActivo=UsuarioPDO::buscarUsuario($_REQUEST['codigo'], $_REQUEST['contrasena']);
            if($oUsuarioActivo instanceof Usuario){
                $_SESSION['usuarioActivo']=$oUsuarioActivo;
                $_SESSION['paginaAnterior']='iniciarSesion';
                $_SESSION['paginaEnCurso']='inicioPrivado';
                header('Location: index.php');
                exit();
            }
        }
    }
?>