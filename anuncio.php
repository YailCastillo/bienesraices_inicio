<?php
    require 'includes/functions.php';
    incluirTemplate('header');
    
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta frente al bosque</h1>

    <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="imagen destacada">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$3,000,000</p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                <p>4</p>
            </li>
        </ul>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit, temporibus ipsa in et quaerat blanditiis unde, iusto ullam quidem magnam neque voluptatibus repellat quod. Porro quae dicta non magnam aliquam. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum omnis libero voluptatibus nulla sint itaque recusandae sed distinctio magnam est ducimus, atque ratione eaque, esse corporis ipsa ab veniam maiores. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad delectus quas ab enim corrupti amet distinctio aut, inventore, iusto asperiores hic harum laborum a facere nam perferendis ipsum vel rerum.</p>

        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fuga minima, tenetur ducimus quo vel fugiat voluptatum odit a maiores labore cumque. Ut ducimus dignissimos alias est expedita? Magnam, iusto?</p>
    </div>
</main>

<?php
    incluirTemplate('footer');
?>