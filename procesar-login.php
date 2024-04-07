<?php
include('includes/conexion.php');

// Verificar si se enviaron datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar la consulta SQL para obtener la contraseña hasheada del usuario
    $sql = "SELECT Contraseña FROM Administrador WHERE Nombre = ?";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("s", $usuario);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $resultado = $stmt->get_result();

    // Verificar si se encontró un usuario con ese nombre
    if ($resultado->num_rows == 1) {
        // Obtener la fila del resultado como un array asociativo
        $fila = $resultado->fetch_assoc();

        // Obtener la contraseña hasheada almacenada en la base de datos
        $contrasena_hasheada_bd = $fila['Contraseña'];

        // Verificar si la contraseña ingresada coincide con la contraseña hasheada almacenada
        if (password_verify($contrasena, $contrasena_hasheada_bd)) {
            // La contraseña es correcta, iniciar sesión y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            // La contraseña es incorrecta, establecer una variable de sesión para el mensaje de error y redirigir al usuario de vuelta al formulario de inicio de sesión
            session_start();
            $_SESSION['error'] = "La contraseña es incorrecta.";
            header("Location: login.php");
            exit();
        }
    } else {
        // No se encontró un usuario con ese nombre, establecer una variable de sesión para el mensaje de error y redirigir al usuario de vuelta al formulario de inicio de sesión
        session_start();
        $_SESSION['error'] = "El usuario no existe.";
        header("Location: login.php");
        exit();
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder a esta página directamente sin enviar datos desde el formulario, redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
