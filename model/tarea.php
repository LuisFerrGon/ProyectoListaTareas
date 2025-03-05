<?php
    /**
     * Clase Tarea
     * 
     * Clase para objetos tarea
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
     * @since 1.0.0
     */
    class Tarea{
        /**
         * @var string $codigo Código de la tarea
         */
        private $codigo;
        /**
         * @var string $descripcion Descripción de la tarea
         */
        private $descripcion;
        /**
         * @var string $fechaCreacion Fecha de creación de la tarea
         */
        private $fechaCreacion;
        /**
         * @var string $fechaCompletado Fecha en la que se marcó la tarea como completada
         */
        private $fechaCompletado;
        /**
         * Función __construct
         * 
         * Función para crear un objeto Tarea
         * 
         * @param string $codigo    Código de la tarea
         * @param string $descripcion   Descripción de la tarea
         * @param string $fechaCreacion Fecha de creación de la tarea
         * @param string $fechaCompletado   Opcional. Null por defecto.
         *                                  Fecha en la que se marcó como completada la tarea
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 24/02/2025
         * @since 1.0.0
         */
        public function __construct($codigo, $descripcion, $fechaCreacion, $fechaCompletado=null){
            $this->codigo=$codigo;
            $this->descripcion=$descripcion;
            $this->fechaCreacion=$fechaCreacion;
            $this->fechaCompletado=$fechaCompletado;            
        }
        /**
         * @return string Devuelve el código de la tarea
         */
        public function getCodigo(){
            return $this->codigo;
        }
        /**
         * @param string $codigo Código de la tarea
         */
        public function setCodigo($codigo){
            $this->codigo=$codigo;
        }
        /**
         * @return string Devuelve la descripción de la tarea
         */
        public function getDescripcion(){
            return $this->descripcion;
        }
        /**
         * @param string $descripcion Descripción de la tarea
         */
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }
        /**
         * @return string Devuelve la fecha de creación de la tarea
         */
        public function getFechaCreacion(){
            return $this->fechaCreacion;
        }
        /**
         * @param string $fechaCreacion Fecha de creación de la tarea
         */
        public function setFechaCreacion($fechaCreacion){
            $this->fechaCreacion=$fechaCreacion;
        }
        /**
         * @return string Devuelve la fecha en la que se marcó como completada la tarea
         */
        public function getFechaCompletado(){
            return $this->fechaCompletado;
        }
        /**
         * @param string $fechaCompletado Fecha en la que se marcó como completada la tarea
         */
        public function setFechaCompletado($fechaCompletado){
            $this->fechaCompletado=$fechaCompletado;
        }
    }
?>