<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'Perolin1', 'bienesraices_crud');

    if (!$db) {
        echo 'Error, no se pudo conectar';
        exit;
    }

    return $db;
}