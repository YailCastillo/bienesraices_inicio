<?php
    //Importar la conexión
    require '../includes/config/db.php';
    $db = conectarDB();

    //Escribir el query
    $query = "SELECT * FROM propiedades";

    //Consultar db
    $consulta = mysqli_query($db, $query);

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    
    //Incluye un template
    require '../includes/functions.php';
    incluirTemplate('header2');
    
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes raíces</h1>

    <?php if ($resultado == 1) { ?>
        <p class="alerta exito">Anuncio Creado correctamente</p>
    <?php } ?>

    <a href="propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar los resultados -->
            <?php while($propiedad = mysqli_fetch_assoc($consulta)) { ?>
            <tr>
                <td><?= $propiedad['id'] ?></td>
                <td><?= $propiedad['titulo'] ?></td>
                <td><img src="../imagenes/<?= $propiedad['imagen'] ?>" class="imagen-tabla"></td>
                <td>$<?= $propiedad['precio'] ?></td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php
    //Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer2');
?>