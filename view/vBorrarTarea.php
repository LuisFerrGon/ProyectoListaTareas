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
            <input type="submit" value="Volver" name="volver">
        </form>
    </div>
    <h1>Borrar tarea</h1>
    <div></div>
</header>
<main>
    <form class="tarea" name="borrarTarea" id="borrarTarea" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="descripcionTarea">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionTarea" name="descripcionTarea" value="<?php echo ($tareaEnCurso->getDescripcion());?>" disabled>
                    </td>
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
                        <label for="fechaCompletacionTarea">Fecha de completacion:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaCompletacionTarea" name="fechaCompletacionTarea" value="<?php
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
                        <input id="borrar" name="borrar" type="submit" value="Borrar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>