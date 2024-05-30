<?php

//importar conexión
require '../../includes/app.php';
$db = conectarDB();

//Crear email y pass
$email =  "correo@correo.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear al usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

mysqli_query($db, $query);