<?php
    require '../../includes/functions.php';
    incluirTemplate('header');
    
?>

<main class="contenedor seccion">
    <h1>Iniciar sesión</h1>

    <form action="" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre...">

            <label for="email">E-mail</label>
            <input type="email" id="email" placeholder="Tu E-mail...">

            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" placeholder="Tu Teléfono...">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"></textarea>
        </fieldset>
    </form>
</main>

<?php
    incluirTemplate('footer');
?>