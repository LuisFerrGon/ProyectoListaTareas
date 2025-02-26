<?php
    /**
     * Clase TareaPDO
     * 
     * Clase para utilizar objetos Tarea
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 26/02/2025
     * @since 1.0.0
     */
    class TareaPDO{
        /**
         * Función buscarTarea
         * 
         * Función para buscar tareas dadas unas condiciones
         * 
         * @param string $codigoUsuario Codigo del usuario de las tareas
         * @param array $aCriteriosBusqueda Array con las condiciones de busqueda
         * @return array Contiene todas las tareas que se adhieren a las condiciones
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 26/02/2025
         * @since 1.0.0
         */
        public static function buscarTarea(string $codigoUsuario, array $aCriteriosBusqueda){
            $aTareas=[];
            $consulta=<<<SQL
                SELECT * FROM Tareas
                WHERE descripcion LIKE '{$aCriteriosBusqueda['descripcionTarea']}'
                AND codigoUsuario='{$codigoUsuario}'
            SQL;
            switch($aCriteriosBusqueda['estado']){
                case '01':
                    $consulta=$consulta." AND fechaCompletado IS NULL";
                    break;
                case '02':
                    $consulta=$consulta." AND fechaCompletado IS NOT NULL";
                    break;
            }
            $consulta=$consulta.";";
            $resultado= DBPDO::ejecutarConsulta($consulta);
            while($tarea=$resultado->fetchObject()){
                array_push($aTareas, new Tarea(
                    $tarea->codigoTarea,
                    $tarea->descripcion,
                    $tarea->fechaCreacion,
                    $tarea->fechaCompletado
                ));
            }
            return $aTareas;
        }
        /**
         * Función buscarTareaPorCodigo
         * 
         * Función que devuelve una tarea dados us códigos
         * 
         * @param string $codUsuario Código del usuario al que pertenece la tarea
         * @param int $codTarea Código de la tarea
         * @return null|\Tarea  Devuelve la tarea si existe la tarea.
         *                      Devuelve null si no existe la tarea.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 25/02/2025
         * @since 1.0.0
         */
        public static function buscarTareaPorCodigo(string $codUsuario, int $codTarea){
            $consulta=<<<SQL
                SELECT * FROM Tareas
                WHERE codigoUsuario='{$codUsuario}'
                AND codigoTarea={$codTarea}
                ;
                SQL;
            $resultado= DBPDO::ejecutarConsulta($consulta);
            $tarea=$resultado->fetchObject();
            if($tarea!=null){
                return new Tarea(
                    $tarea->codigoTarea,
                    $tarea->descripcion,
                    $tarea->fechaCreacion,
                    $tarea->fechaCompletado
                );
            }else{
                return null;
            }
        }
        public static function crearTarea($codigoUsuario, $descripcion){

        }
        public static function borrarTarea($codigoUsuario, $codigoTarea){

        }
        public static function editarTarea($codigoUsuario, $codigoTarea, $descripcion){
            
        }
        /**
         * Función cambiarEstado
         * 
         * Función para cambiar el estado de una tarea dados sus códigos
         * 
         * @param string $codigoUsuario Código del usuario al que pertenece la tarea
         * @param int $codigoTarea  Código de la tarea
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 25/02/2025
         * @since 1.0.0
         */
        public static function cambiarEstado(string $codigoUsuario, int $codigoTarea){
            if((TareaPDO::buscarTareaPorCodigo($codigoUsuario, $codigoTarea))->fechaCompletado==null){
                $consulta=<<<SQL
                    UPDATE Tareas SET
                        fechaCompletado=CURRENT_TIMESTAMP()
                    WHERE codigoUsuario='{$codigoUsuario}'
                    AND codigoTarea={$codigoTarea}
                    AND ISNULL(fechaCompletado);
                SQL;
            }else{
                $consulta=<<<SQL
                    UPDATE Tareas SET
                        fechaCompletado=NULL
                    WHERE codigoUsuario='{$codigoUsuario}'
                    AND codigoTarea={$codigoTarea}
                    AND fechaCompletado IS NOT NULL;
                SQL;
            }
            DBPDO::ejecutarConsulta($consulta);
        }
    }
?>