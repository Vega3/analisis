<?php

include_once 'conexion.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['contrasena'];
$cargo = $_POST['cargo'];

// Preparar la consulta
$stmt = $conexion->prepare("INSERT INTO n_usuarios(username, email, contrasena, cargo) VALUES (?, ?, ?, ?)");

// Vincular los parámetros
$stmt->bind_param("ssss", $username, $email, $password, $cargo);

// Verificar si el email ya existe
$stmt->prepare("SELECT * FROM n_usuarios WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '
        <script>
            alert("El email Ya Se encuentre En Uso.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Ejecutar la consulta
if ($stmt->execute()) {
    echo '
        <script>
            alert("Usuario Registrado Correctamente.");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Intentelo Nuevamente.");
            window.location = "../index.php";
        </script>
    ';
}

$stmt->close();
$conexion->close();
