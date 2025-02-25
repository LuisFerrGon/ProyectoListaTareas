<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
    require_once 'core/lValidacionFormulario.php';
    define('OBLIGATORIO', 1);
    define('MAX_CODIGO', 8);
    define('MIN_CODIGO', 4);
    define('MAX_CONTRASENA', 8);
    define('MIN_CONTRASENA', 4);
    define('DEBIL', 1);     #La contraseña solo admite letras
    define('MEDIO', 2);     #La contraseña admite letras y números
    define('FUERTE', 3);    #La contraseña debe contener como mínimo una mayuscula y un número
    $aErrores=[
        'codigo'=>null,
        'constrasena'=>null
    ];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        $_SESSION['paginaAnterior']='login';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['login'])){
        $aErrores['codigo']=validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], MAX_CODIGO, MIN_CODIGO, OBLIGATORIO);
        $aErrores['conntrasena']=validacionFormularios::validarPassword($_REQUEST['contrasena'], MAX_CONTRASENA, MIN_CONTRASENA, MEDIO, OBLIGATORIO);
        if($aErrores['codigo']==null && $aErrores['conntrasena']=null){
            $oUsuarioActivo=UsuarioPDO::buscarUsuario($_REQUEST['codigo'], $_REQUEST['contrasena']);
            if($oUsuarioActivo instanceof Usuario){
                $_SESSION['usuarioActivo']=$oUsuarioActivo;
                $_SESSION['paginaAnterior']='login';
                $_SESSION['paginaEnCurso']='inicioPrivado';
                header('Location: index.php');
                exit();
            }
        }
    }
?>