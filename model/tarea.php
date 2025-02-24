<?php
    /**
     * Clase Tarea
     * 
     * Clase para objetos tarea
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 24/02/2025
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
        public function __construct($codigo, $descripcion, $fechaCreacion, $fechaCompletado=null){
            $this->codigo=$codigo;
            $this->descripcion=$descripcion;
            $this->fechaCreacion=$fechaCreacion;
            $this->fechaCompletado=$fechaCompletado;            
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo=$codigo;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }
        public function getFechaCreacion(){
            return $this->fechaCreacion;
        }
        public function setFechaCreacion($fechaCreacion){
            $this->fechaCreacion=$fechaCreacion;
        }
        public function getFechaCompletado(){
            return $this->fechaCompletado;
        }
        public function setFechaCompletado($fechaCompletado){
            $this->fechaCompletado=$fechaCompletado;
        }
    }
?>