<?php
    require_once 'config/confDB.php';
    /**
     * Clase DBPDO
     * 
     * Clase para crear conexiones con una base de datos
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 26/02/2025
     * @since 1.0.0
     */
    class DBPDO{
        /**
         * Funcion ejecutarConsulta
         * 
         * Funcion que devuelve un objeto o una excepción dadas una sentenciaSQL
         * y un array de paramteros
         * 
         * @param string $sentenciaSQL Cadena en la que se pone la sentencia a
         *                              seguir.
         * @param mixed[] $aParametros Opcional. Array en el que se ponen los
         *                              paramteros en el orden deseado.
         * @return object|PDOException Devuelve un objeto si no hay error; sino
         *                              un PDOException.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 26/02/2025
         * @since 1.0.0
         */
        public static function ejecutarConsulta($sentenciaSQL, $aParametros=null){
            try{
                $conexion=new PDO(SERVIDOR, USUARIO, CONTRASENA);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query=$conexion->prepare($sentenciaSQL);
                $query->execute($aParametros);
                return $query;
            }catch(PDOException $ex){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['paginaEnCurso']='error';
                $_SESSION['error']=new ErrorApp(
                    $ex->getCode(),
                    $ex->getMessage(),
                    $ex->getFile(),
                    $ex->getLine(),
                    $_SESSION['paginaAnterior']
                );
                header('Location: index.php');
                exit();
            }finally{
                unset($conexion);
            }
        }
    }
?>