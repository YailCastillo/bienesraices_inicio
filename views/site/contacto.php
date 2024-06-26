<?php
    require '../../includes/app.php';
    incluirTemplate('header');
    
?>

<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="../../build/img/destacada3.webp" type="image/webp">
        <source srcset="../../build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="../../build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre...">

            <label for="email">E-mail</label>
            <input type="email" id="email" placeholder="Tu E-mail...">

            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" placeholder="Tu Teléfono...">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>
            <label for="opciones">Venda o compre</label>
            <select id="opciones">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compre">Compre</option>
                <option value="Venda">Venda</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" id="presupuesto" placeholder="$1,000,000">
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligió teléfono, elija fecha y hora</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha">

            <label for="hora">Teléfono:</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="enviar" class="boton-verde">
    </form>


</main>

<?php
    incluirTemplate('footer');
?>