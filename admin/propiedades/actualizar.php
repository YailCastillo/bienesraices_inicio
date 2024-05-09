<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: ../index.php');
    }

    //Base de datos
    require '../../includes/config/db.php';
    $db = conectarDB();

    //Consultar para obtener datos de la propiedad
    $query = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    //Consultar para obtener vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // echo '<pre>';
    // var_dump($propiedad);
    // echo '</pre>';

    //Arreglo con mensajes de errores
    $errors = [];
 
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = mysqli_real_escape_string($db, date('Y/m/d'));

        //Asignar FILES a una variable
        $imagen = $_FILES['imagen'];

        // echo "<pre>";
        // var_dump($imagen);
        // echo "</pre>";

        if (!$titulo) {
            $errors[] = "Deber añadir un título";
        }
        if (!$precio) {
            $errors[] = "El precio es obligatorio";
        }
        if (strlen($descripcion) < 50) {
            $errors[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$habitaciones) {
            $errors[] = "El numero de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errors[] = "El numero de baños es obligatorio";
        }
        if (!$estacionamiento) {
            $errors[] = "El numero de estacionamientos es obligatorio";
        }
        if (!$vendedorId) {
            $errors[] = "Elige un vendedor";
        }

        //Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;

        if ($imagen['size'] > $medida) {
            $error[] = 'La imagen es muy pesada';
        }

    // echo "<pre>";
    // var_dump($errors);
    // echo "</pre>";

    //Revisar que el arreglo de errores esté vacío
        if (empty($errors)) {
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';
                
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /* SUBIDA DE ARCHIVOS */

            if ($imagen['name']) {
                //Eliminar imagen anterior
                unlink($carpetaImagenes . $propiedad['imagen']);

                //Generar un nombre único
                $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

                //Subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            //Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedorId = $vendedorId WHERE id = $id";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                //Redireccionar al usuario
                header("Location: ../index.php?resultado=2");
            }
        }
    }

    require '../../includes/functions.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a style="margin-bottom: 2rem;" href="../index.php" class="boton boton-amarillo">Regresar</a>

    <?php foreach($errors as $error) {?>
        <div class="alerta error">
            <?php echo "$error"; ?>
        </div>
    <?php }?>

    <form class="formulario" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" placeholder="Título de la propiedad...">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" placeholder="Precio de la propiedad...">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img class="imagen-small" src="../../imagenes/<?= $imagenPropiedad ?>" alt="">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones; ?>" placeholder="Ej: 3" min="1">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" value="<?php echo $wc ?>" placeholder="Ej: 3" min="1">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento; ?>" placeholder="Ex: 3" min="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="">--Seleccione--</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)) { ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ""; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php } ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>