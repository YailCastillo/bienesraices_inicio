<?php
    //Base de datos
    require '../../includes/config/db.php';
    $db = conectarDB();

    //Arreglo con mensajes de errores
    $errors = [];

    //Ejecutar el código después de que el usuario envía el formulario

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];

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

    // echo "<pre>";
    // var_dump($errors);
    // echo "</pre>";

    //Revisar que el arreglo de errores esté vacío
        if (empty($errors)) {
            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId') ";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                echo "Insertado correctamente";
            }
        }
    }

    require '../../includes/functions.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach($errors as $error) {?>
        <div class="alerta error">
            <?php echo "$error"; ?>
        </div>
    <?php }?>

    <a href="../index.php" class="boton boton-amarillo">Regresar</a>

    <form class="formulario" method="POST" action="/bienesraices_inicio/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título de la propiedad...">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad...">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ex: 3" min="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="">
                <option value="">--Seleccione--</option>
                <option value="1">Juan</option>
                <option value="2">Karen</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>