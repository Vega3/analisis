<?php

include_once 'conexion.php';

$email = $_POST['email'];
$password = $_POST['contrasena'];

// Preparar la consulta
$stmt = $conexion->prepare("SELECT * FROM n_usuarios WHERE email=? and contrasena=?");

// Vincular los parámetros
$stmt->bind_param("ss", $email, $password);

// Ejecutar la consulta
$stmt->execute();

// Obtener los resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: ../login.php");
    exit(); // Es una buena práctica usar exit() después de un redireccionamiento
} else {
    echo '
        <script>
            alert("Usuario no existe, intentelo nuevamente.");
            window.location = "../index.php";
        </script>
    ';
}

$stmt->close();
$conexion->close();
