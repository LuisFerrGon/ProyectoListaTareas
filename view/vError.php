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
    <h1>Error</h1>
    <div></div>
</header>
<main>
    <div>
        CÓDIGO: <?php echo $avError['codigo'];?><br>
        DESCRIPCIÓN: <?php echo $avError['descripcion'];?><br>
        ARCHIVO: <?php echo $avError['archivo'];?><br>
        LINEA: <?php echo $avError['linea'];?><br>
    </div>
</main>