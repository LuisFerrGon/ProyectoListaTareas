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
    <h1>Lista de tareas</h1>
    <div></div>
</header>
<main>
    <div id="formularioRegistro" class="formulario">
        <h2>Registro</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="codigo">Usuario:</label>
                        </td>
                        <td>
                            <input type="text" id="codigo" name="codigo" class="obligatorio">
                        </td>
                        <?php
                            if(isset($_REQUEST['registro']) && $aErrores['codigo']!=null){
                                echo "<td class='error'>".$aErrores['codigo']."</td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasena">Contraseña:</label>
                        </td>
                        <td>
                            <input type="password" id="contrasena" name="contrasena" class="obligatorio">
                        </td>
                        <?php
                            if(isset($_REQUEST['registro']) && $aErrores['contrasena']!=null){
                                echo "<td class='error'>".$aErrores['contrasena']."</td>";

                            }
                        ?>
                    </tr>
                    <tr>
                        <td>
                            <label for="nombre">Nombre:</label>
                        </td>
                        <td>
                            <input type="text" id="nombre" name="nombre" class="obligatorio">
                        </td>
                        <?php
                            if(isset($_REQUEST['registro']) && $aErrores['nombre']!=null){
                                echo "<td class='error'>".$aErrores['nombre']."</td>";
                            }
                        ?>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input type="submit" value="Registrarse" id="regstro" name="registro">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</main>