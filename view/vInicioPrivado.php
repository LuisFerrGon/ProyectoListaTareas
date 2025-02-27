<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 27/02/2025
     * @since 1.0.0
     */
?>
<header>
    <div>
        <form action="post">
            <input type="submit" value="Cerrar sesión" name="cerrar">
        </form>
    </div>
    <h1>Lista de tareas de <?php echo $oUsuarioActivo->getNombre();?></h1>
    <div></div>
</header>
<main>
    <form method="post" id="formularioBusqueda">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="descripcionTarea">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionTarea" name="descripcionTarea" maxlength="255" value="<?php echo $_SESSION['criterioBusqueda']['descripcionTarea'];?>">
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
                    <th>Mostrar</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($aTareas)==0){
                        echo "<tr colspan='5'"
                            . "<td>No hay tareas que se adhieran a la busqueda</td>"
                        . "</tr>";
                    }else{
                        foreach($aTareas as $oTarea){
                            $codigo=$oTarea->getCodigo();
                            $descripcion=$oTarea->getDescripcion();
                            $fechaCreacion=$oTarea->getFechaCreacion();
                            $fechaCompletado=$oTarea->getFechaCompletado();
                            $estado=($fechaCompletado!=null)
                                ?"&#9745;"#Caja sin marcar
                                :"&#9744;"#Caja marcada
                            ;
                            echo "<tr class='".$estado."'>"
                                . "<td>".$descripcion."</td>"
                                . "<td><input type='submit' id='cambiar(".$codigo.")' name='cambiar(".$codigo.")' value='".$estado."'></td>"
                                . "<td><input type='submit' id='mostrar(".$codigo.")' name='mostrar(".$codigo.")' value='&#128065;'></td>"#Ojo
                                . "<td><input type='submit' id='editar(".$codigo.")' name='editar(".$codigo.")' value='&#128393;'></td>"#Lapiz
                                . "<td><input type='submit' id='borrar(".$codigo.")' name='borrar(".$codigo.")' value='&#128465;'></td>"#Cubo
                            . "</tr>";
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <label for="nuevaTarea">Nueva tarea:</label>
                        <input type="text" id="nuevaTarea" name="nuevaTarea" minlength="1" maxlength="255">
                        <input type="submit" name="crear" value="Crear">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>