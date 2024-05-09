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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            //Eliminar archivo
            $query = "SELECT imagen FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink("../imagenes/" . $propiedad['imagen']);

            //Eliminar propiedad
            $query = "DELETE FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: index.php?resultado=3');
            }
        }
    }
    
    //Incluye un template
    require '../includes/functions.php';
    incluirTemplate('header2');
    
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes raíces</h1>

    <?php if ($resultado == 1) { ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php } elseif ($resultado == 2) { ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php } elseif ($resultado == 3) { ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>
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
                    <form action="" method="post" class="w-100">
                        <input type="hidden" name="id" value="<?= $propiedad['id'] ?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?= $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
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