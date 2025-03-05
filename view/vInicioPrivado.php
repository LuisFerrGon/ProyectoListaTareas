<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 05/03/2025
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
    </form>
    <form action="post" id="tablaTareas">
        <table>
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
                        echo "<tr>"
                            . "<td colspan='5'>No hay tareas que se adhieran a la busqueda</td>"
                        . "</tr>";
                    }else{
                        foreach($aTareasMostrar as $oTarea){
                            $codigo=$oTarea->getCodigo();
                            $descripcion=$oTarea->getDescripcion();
                            $fechaCreacion=$oTarea->getFechaCreacion();
                            $fechaCompletado=$oTarea->getFechaCompletado();
                            $estado=($fechaCompletado!=null)
                                ?"&#9745;"#Caja sin marcar
                                :"&#9744;"#Caja marcada
                            ;
                            switch($estado){
                                case '&#9745;':
                                    $estadoNombre="completo";
                                    break;
                                case '&#9744;':
                                    $estadoNombre="incompleto";
                                    break;
                            }
                            echo "<tr class='".$estadoNombre."'>"
                                . "<td class='descripcion'>".$descripcion."</td>"
                                . "<td class='accion'><input type='submit' id='cambiar(".$codigo.")' name='cambiar(".$codigo.")' value='".$estado."'></td>"
                                . "<td class='accion'><input type='submit' id='mostrar(".$codigo.")' name='mostrar(".$codigo.")' value='&#128065;'></td>"#Ojo
                                . "<td class='accion'><input type='submit' id='editar(".$codigo.")' name='editar(".$codigo.")' value='&#128393;'></td>"#Lapiz
                                . "<td class='accion'><input type='submit' id='borrar(".$codigo.")' name='borrar(".$codigo.")' value='&#128465;'></td>"#Cubo
                            . "</tr>";
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" id="paginacion">
                        <input type="submit" id="primeraPag" name="primeraPag" value="&lt;&lt;">
                        <input type="submit" id="anteriorPag" name="anteriorPag" value="&lt;">
                        <?php echo $_SESSION['paginaPaginacion']."/".$paginacionUltimo;?>
                        <input type="submit" id="siguientePag" name="siguientePag" value="&gt;">
                        <input type="submit" id="ultimaPag" name="ultimaPag" value="&gt;&gt;">
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <label for="nuevaTarea">Nueva tarea:</label>
                        <input type="text" id="nuevaTarea" name="nuevaTarea" minlength="1" maxlength="255">
                        <input type="submit" id="crear" name="crear" value="Crear">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>