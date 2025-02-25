<?php
    /**
     * Clase error
     * 
     * Clase para objetos error
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
    class error{
        /**
         * @var string $codError Código del error
         */
        private $codError;
        /**
         * @var string $descError Descripción del error
         */
        private $descError;
        /**
         * @var string $archivoError Archivo donde ocurrió el error
         */
        private $archivoError;
        /**
         * @var string $lineaError Linea del archivo donde ocurrió el error
         */
        private $lineaError;
        /**
         * @var string $paginaSiguiente Página a la que ir al darle a volver
         */
        private $paginaSiguiente;
        public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
            $this->codError = $codError;
            $this->descError = $descError;
            $this->archivoError = $archivoError;
            $this->lineaError = $lineaError;
            $this->paginaSiguiente = $paginaSiguiente;
        }
        public function getCodError(){
            return $this->codError;
        }
        public function getDescError(){
            return $this->descError;
        }
        public function getArchivoError(){
            return $this->archivoError;
        }
        public function getLineaError(){
            return $this->lineaError;
        }
        public function getPaginaSiguiente(){
            return $this->paginaSiguiente;
        }
    }
?>