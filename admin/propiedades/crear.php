<?php
    //Base de datos
    require '../../includes/config/db.php';
    $db = conectarDB();

    var_dump($db);

    require '../../includes/functions.php';
    incluirTemplate('header');
    
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="../index.php" class="boton boton-amarillo">Regresar</a>
    <form class="formulario">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" placeholder="Título de la propiedad...">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio de la propiedad...">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ex: 3" min="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="" id="">
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