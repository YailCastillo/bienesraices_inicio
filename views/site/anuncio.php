<?php
    require '../../includes/app.php';
    incluirTemplate('header');

    //Obtener ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: index.php');
    }

    //Importar base de datos
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades WHERE id = $id";

    //Obtener datos
    $resultado = mysqli_query($db, $query);

    if ($resultado->num_rows === 0) {
        header('Location: index.php');
    }

    $propiedad = mysqli_fetch_assoc($resultado);
    
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?= $propiedad['titulo'] ?></h1>

    <img loading="lazy" src="../../imagenes/<?= $propiedad['imagen'] ?>" alt="imagen destacada">    

    <div class="resumen-propiedad">
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

        <p><?= $propiedad['descripcion'] ?></p>
    </div>
</main>

<?php
    mysqli_close($db);

    incluirTemplate('footer');
?>