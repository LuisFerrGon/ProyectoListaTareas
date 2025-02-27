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
            <input type="submit" value="Volver" name="volver">
        </form>
    </div>
    <h1>Lista de tareas</h1>
    <div></div>
</header>
<main>
    <div id="formularioLogin">
        <h2>Iniciar sesión</h2>
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
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasena">Contraseña:</label>
                        </td>
                        <td>
                            <input type="password" id="contrasena" name="contrasena" class="obligatorio">
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input type="submit" value="Iniciar sesión" id="login" name="login">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</main>