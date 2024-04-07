<?php
include('includes/conexion.php');

// Verificar si se enviaron datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo']; // Se agrega la variable $correo
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Verificar si las contraseñas coinciden
    if ($contrasena !== $confirmar_contrasena) {
        header("Location: registro.php?error=contrasena");
        exit();
    }

    // Hashear la contraseña antes de almacenarla en la base de datos (es una buena práctica)
    $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta SQL con el valor predeterminado para 'Orden_idOrden'
    $sql = "INSERT INTO Administrador (Nombre, Correo, Contraseña, Orden_idOrden) VALUES (?, ?, ?, 1)";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sss", $usuario, $correo, $contrasena_hasheada);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Usuario registrado con éxito, redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de éxito
        header("Location: login.php?registro=exito");
        exit();
    } else {
        // Error al registrar el usuario, mostrar un mensaje de error o redirigir al usuario de vuelta al formulario de registro con un mensaje de error
        header("Location: registro.php?error=registro");
        exit();
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: registro.php");
    exit();
}
?>
