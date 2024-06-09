<?php

include_once 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$foto = $_POST['foto'];

// Preparar la consulta
$stmt = $conexion->prepare("INSERT INTO emprendimientos(nombre, descripcion, telefono, correo, foto) VALUES (?, ?, ?, ?, ?)");

// Vincular los parámetros
$stmt->bind_param("sssss", $nombre, $descripcion, $telefono, $correo, $foto);

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
