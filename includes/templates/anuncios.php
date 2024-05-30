<?php
    //Importar base de datos
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades LIMIT $limit";

    //Obtener datos
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) { ?>
    <div class="anuncio">

        <img loading="lazy" src="../../imagenes/<?= $propiedad['imagen'] ?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?= $propiedad['titulo'] ?></h3>
            <p><?= $propiedad['descripcion'] ?></p>
            <p class="precio">$<?= $propiedad['precio'] ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="../../build/img/icono_wc.svg" alt="icono wc">
                    <p><?= $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="../../build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?= $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="../../build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?= $propiedad['habitaciones'] ?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?= $propiedad['id'] ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div><!--Contenido-anuncio-->
    </div><!--Anuncio-->
    <?php } ?>  
</div><!--Contenedor-anuncios-->

<?php
    //Cerrar conexión
    mysqli_close($db);
?>