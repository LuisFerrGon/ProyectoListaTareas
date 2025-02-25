<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 25/02/2025
     * @since 1.0.0
     */
?>
<header>
    <div>
        <form action="post">
            <input type="submit" value="Cerrar sesión" name="cerrar">
        </form>
    </div>
    <h1>Lista de tareas</h1>
    <div></div>
</header>
<main>
    <form method="post" id="formularioBusqueda">
        <table border="1">
            <tbody>
                <tr>
                    <td>
                        <label for="descripcionTarea">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionTarea" maxlength="255" value="<?php echo $_SESSION['criterioBusqueda']['descripcion'];?>">
                    </td>
                    <td>
                        <select name="estado" id="estado">
                            <option value='00' <?php if($_SESSION['criterioBusqueda']['estado']=='00'){echo "selected";}?>>Todos</option>
                            <option value='01' <?php if($_SESSION['criterioBusqueda']['estado']=='01'){echo "selected";}?>>Incompletas</option>
                            <option value='02' <?php if($_SESSION['criterioBusqueda']['estado']=='02'){echo "selected";}?>>Completas</option>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="buscar" name="buscar" type="submit" value="Buscar">
                    </td>
                </tr>
            </tfoot>
        </table>
        <table id="tablaTareas">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Cambiar estado</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($aTareas)==0){
                        echo "<tr>"
                            . "<td>No hay tareas que se adhieran a la busqueda</td>"
                        . "</tr>";
                    }else{
                        foreach($aTareas as $oTarea){
                            $codigo=$oTarea->getCodigo();
                            $descripcion=$oTarea->getDescripcion();
                            $fechaCreacion=$oTarea->getFechaCreacion();
                            $fechaCompletado=$oTarea->getFechaCompletado();
                            $estado=($fechaCompletado!=null)
                                ?"&#9744;"
                                :"&#9745;"
                            ;
                            echo "<tr class='".$estado."'>"
                                . "<td>".$descripcion."</td>"
                                . "<td><input type='submit' id='cambiarEstado(".$codigo.")' name='cambiarEstado(".$codigo.")' value='".$estado."'></td>"
                                . "<td><input type='submit' id='mostrar(".$codigo.")' name='mostrar(".$codigo.")' value='&#128066;'></td>"
                                . "<td><input type='submit' id='cambiar(".$codigo.")' name='cambiar(".$codigo.")' value='&#128393;'></td>"
                                . "<td><input type='submit' id='borrar(".$codigo.")' name='borrar(".$codigo.")' value='128465'></td>"
                            . "</tr>"
                            ;
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <form method='post'>
                            <input type="submit" name="crear" value="Crear">
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>