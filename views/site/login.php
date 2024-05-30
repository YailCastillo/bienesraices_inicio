<?php
    //Conexión a la base de datos
    require '../../includes/app.php';
    $db = conectarDB();

    //Autenticar usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errores[] = "El email ingresado no es válido";
        }
        if (!$password) {
            $errores[] = "La contraseña es obligatoria";
        }
        if (empty($errores)) {
            //Revisar si usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);

            if ($resultado->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);
                
                //Revisar si password es correcto
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    //El usuario está autenticado
                    session_start();

                    //Llenar arreglo de $_SESSION
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: ../../admin/site/index.php');

                } else {
                    $errores[] = "La contraseña es incorrecta";
                }
                
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    //Incluir header
    incluirTemplate('header');
    
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesión</h1>

    <?php foreach($errores as $error) { ?>
        <div class="alerta error">
            <?= $error; ?>
        </div>
    <?php } ?>

    <form method="POST" action="" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu E-mail...">

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Tu Contraseña...">
        </fieldset>

        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>