<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../../views/site/index.php">
                    <img src="../../build/img/logo.svg" alt="Logotipo de bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="../../build/img/barras.svg" alt="icono menu">
                </div>

                <div class="derecha">
                    <img src="../../build/img/dark-mode.svg" alt="boton dark mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="../../views/site/nosotros.php">Nosotros</a>
                        <a href="../../views/site/anuncios.php">Anuncios</a>
                        <a href="../../views/site/blog.php">Blog</a>
                        <a href="../../views/site/contacto.php">Contacto</a>
                        <?php if ($auth) { ?>
                            <a href="../../views/site/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php } ?>
                    </nav>
                </div>

            </div><!--.barra-->
            <?php if ($inicio) {?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>