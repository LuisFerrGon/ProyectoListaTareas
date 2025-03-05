<?php
    /**
     * Clase Usuario
     * 
     * Clase para objetos usuario
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    class Usuario{
        /**
         * @var string $codigo Código del usuario
         */
        private $codigo;
        /**
         * @var string $contrasena Contraseña del usuario
         */
        private $contrasena;
        /**
         * @var string $nombre Nombre del usuario
         */
        private $nombre;
        /**
         * Función __construct
         * 
         * Función para crear un objeto Usuario
         * 
         * @param string $codigo Código del usuario
         * @param string $contrasena Contraseña del usuario
         * @param string $nombre Nombre del usuario
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 24/02/2025
         * @since 1.0.0
         */
        public function __construct($codigo, $contrasena, $nombre){
            $this->codigo=$codigo;
            $this->contrasena=$contrasena;
            $this->nombre=$nombre;
        }
        /**
         * @return string Devuelve el código del usuario
         */
        public function getCodigo(){
            return $this->codigo;
        }
        /**
         * @param string $codigo Código del usuario
         */
        public function setCodigo($codigo){
            $this->codigo=$codigo;
        }
        /**
         * @return string Devuelve la contraseña del usuario
         */
        public function getContrasena(){
            return $this->contrasena;
        }
        /**
         * @param string $contrasena Contraseña del usuario
         */
        public function setContrasena($contrasena){
            $this->contrasena=$contrasena;
        }
        /**
         * @return string Devuelve el nombre del usuario
         */
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * @param string $nombre Nombre del usuario
         */
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
    }
?>