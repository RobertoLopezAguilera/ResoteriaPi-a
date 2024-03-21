<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = "root"; // Cambiar por tu nombre de usuario
$password = "root123"; // Cambiar por tu contraseña
$database = "ReposPiña"; // Cambiar si es necesario

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
