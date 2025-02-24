<?php
    /**
     * Clase Usuario
     * 
     * Clase para objetos usuario
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 24/02/2025
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
        public function __construct($codigo, $contrasena, $nombre){
            $this->codigo=$codigo;
            $this->contrasena=$contrasena
            $this->nombre=$nombre;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo=$codigo;
        }
        public function getContrasena(){
            return $this->contrasena;
        }
        public function setContrasena($contrasena){
            $this->contrasena=$contrasena;
        }
        public function getNombre(){
            return $this->fechaCreacion;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
    }
?>