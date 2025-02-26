<?php
    /**
     * Clase UsuarioPDO
     * 
     * Clase para utilizar objetos Usuario
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
    class UsuarioPDO{
        public static function buscarUsuario($codigoUsuario, $contrasenaUsuario){
            $consulta=<<<SQL
                SELECT * FROM Usuarios
                WHERE codigo='$codigoUsuario'
                AND contrasena=SHA2('$codigoUsuario$contrasenaUsuario', 256)
                ;
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            $resultado=$resultado->fetchObject();
            if($resultado!=null || $resultado instanceof PDOException){
                return new Usuario(
                    $resultado->codigo,
                    $resultado->contrasena,
                    $resultado->nombre
                );
            }else{
                return null;
            }
        }
    }
?>