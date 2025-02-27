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
            <input type="submit" value="Volver" name="volver">
        </form>
    </div>
    <h1>Editar tarea</h1>
    <div></div>
</header>
<main>
    <form name="modificarTarea" id="modificarTarea" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="descripcionTarea">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionTarea" name="descripcionTarea" value="<?php
                            if(empty($aErrores['descripcionTarea']) && !empty($_REQUEST['descripcionTarea'])){
                                $tareaEnCurso->setDescripcion($_REQUEST['descripcionTarea']);
                            }
                            echo ($tareaEnCurso->getDescripcion());
                        ?>" class="obligatorio" required>
                    </td>
                    <?php
                        if(!empty($aErrores['descripcionTarea'])){
                            echo "<td class='error'>".$aErrores['descripcionTarea']."</td>";
                        }
                    ?>
                </tr>
                <tr>
                    <td>
                        <label for="fechaCreacionTarea">Fecha de creación:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaCreacionTarea" name="fechaCreacionTarea" value="<?php echo(date('Y-m-d', strtotime($tareaEnCurso->getFechaCreacion())));?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fechaBajaTarea">Fecha de baja:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaBajaTarea" name="fechaBajaTarea" value="<?php
                            if($tareaEnCurso->getFechaCompletado()!=null){
                                echo(date('Y-m-d', strtotime($tareaEnCurso->getFechaCompletado())));
                            }
                        ?>" disabled>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="editar" name="editar" type="submit" value="Editar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>