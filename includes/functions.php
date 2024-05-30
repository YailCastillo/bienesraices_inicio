<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');

function incluirTemplate($nombre, $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado() {
    if (!$_SESSION['login']) {
        header('Location: ../../views/site/index.php');
    }
}

function debugger($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}