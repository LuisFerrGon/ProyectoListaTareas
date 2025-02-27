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
        /**
         * Función buscarUsuario
         * 
         * Función que devuelve un usuario dado su código y contraseña
         * 
         * @param string $codigoUsuario Código de usuario a buscar
         * @param string $contrasenaUsuario Contraseña del usuario a buscar
         * @return null|\Usuario Devuelve un objeto Usuario si existe.
         *                          Devuelve null si no existe.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 25/02/2025
         * @since 1.0.0
         */
        public static function buscarUsuario(string $codigoUsuario, string $contrasenaUsuario){
            $consulta=<<<SQL
                SELECT * FROM Usuarios
                WHERE codigo='{$codigoUsuario}'
                AND contrasena=SHA2('{$codigoUsuario}{$contrasenaUsuario}', 256)
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
        /**
         * Función usuarioExiste
         * 
         * Función que devuelve si existe un usuario dado un código
         * 
         * @param string $codigoUsuario Código del usuario a buscar
         * @return boolean Devuelve true si existe el usuario
         *                  Devuelve false si no existe el usuario
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 27/02/2025
         * @since 1.0.0
         */
        public static function usuarioExiste(string $codigoUsuario){
            $consulta=<<<SQL
                SELECT * FROM Usuarios
                WHERE codigo='{$codigoUsuario}'
                ;
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            return ($resultado->fetchObject())!=null;
        }
        /**
         * Función crearUsuario
         * 
         * Función para crear un usuario
         * 
         * @param string $codigoUsuario Códgo del usuario a crear
         * @param string $contrasenaUsuario Contraseña del usuario a crear
         * @param string $nombreUsuario Nmbre del usuario a crear
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 27/02/2025
         * @since 1.0.0
         */
        public static function crearUsuario(string $codigoUsuario, string $contrasenaUsuario, string $nombreUsuario){
            $consulta=<<<SQL
                INSERT INTO Usuarios
                VALUES
                    ('{$codigoUsuario}', SHA2('{$codigoUsuario}{$contrasenaUsuario}', 256), '{$nombreUsuario}')
                ;
            SQL;
            DBPDO::ejecutarConsulta($consulta);
        }
    }
?>